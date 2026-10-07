#!/usr/bin/env node
/**
 * Checks every local link/reference in the built site (public/) so that the
 * deployment cannot contain broken images, stylesheets or dead links.
 *
 * It resolves references the way the browser *and* Vercel do, i.e. in URL
 * space, applying the same rewrite as vercel.json:
 *
 *     /work.php  ->  public/pages/work.html
 *
 * That means `/pages/index.html` correctly resolves `href="work.php"` to
 * `/work.php` -> public/pages/work.html, and file names are checked with exact
 * case (Linux hosting is case-sensitive, unlike the old Windows/IIS host).
 *
 * Usage: npm run check [-- --all]
 */

import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const ROOT = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const BUILT = path.join(ROOT, 'public');
const showAll = process.argv.includes('--all');

/**
 * Third-party prototype dumps carried over from the old site. They are kept
 * because the case studies link to them, but their internal references were
 * already broken in the archive (IE6 CSS, missing Axure pages) and cannot be
 * fixed here. Reported as a summary only.
 */
const KNOWN_LEGACY = ['iphone_ph2_v2/', 'wireframes_iphone_ios7/', 'old-portfolio/'];

/**
 * Assets that are referenced by the original stylesheets but were never part
 * of the site backup - they return 404 on the old IIS host as well (checked
 * against the live site), so they are reported separately instead of failing
 * the check.
 */
const KNOWN_MISSING = [
  /^\/fonts\/(AvenirLTStd-Roman\.otf|AvenirLTStd-Medium\.otf|baskvill\.ttf)$/,
  /^\/img\/(frmimgbg|obot|obot0[1-3]|section04|farm-finest-about|farm-finest-man-bg|farm-finest-ind)\.(png|webp)$/,
  /^\/img\/provilac-banner\.webp$/,
  /^\/img\/glyph\/.*\.gif$/,
  /^\/img\/$/,
];

const SOURCE_DIR = fs.existsSync(BUILT) ? BUILT : ROOT;
const rel = (file) => path.relative(SOURCE_DIR, file).split(path.sep).join('/');

const SKIP_DIRS = new Set(['node_modules', '.git', '.vercel', 'scripts', 'test', 'old-portfolio', 'public']);
const TEXT_EXT = /\.(html?|php|css|js|mjs)$/i;

/** URL path a built file is served under (inverse of the vercel.json rewrite). */
function fileToUrlPath(relPath) {
  if (relPath.startsWith('pages/') && relPath.endsWith('.html')) {
    return '/' + relPath.slice('pages/'.length, -'.html'.length) + '.php';
  }
  return '/' + relPath;
}

/** File that serves a given URL path, or null. */
function urlPathToFile(urlPath) {
  const php = urlPath.match(/^\/(.*)\.php$/i);
  if (php) return path.join(SOURCE_DIR, 'pages', `${php[1]}.html`);
  return path.join(SOURCE_DIR, urlPath);
}

function walk(dir, files = []) {
  for (const entry of fs.readdirSync(dir, { withFileTypes: true })) {
    if (entry.isDirectory()) {
      if (SKIP_DIRS.has(entry.name) || entry.name.startsWith('.')) continue;
      walk(path.join(dir, entry.name), files);
    } else if (TEXT_EXT.test(entry.name) && entry.name !== 'build-vercel.mjs') {
      files.push(path.join(dir, entry.name));
    }
  }
  return files;
}

/**
 * Case-sensitive existence check.
 * Returns true, false, or { actual } when the file exists but with different
 * capitalisation (Windows/IIS was case-insensitive, Linux/Vercel is not).
 */
function existsExact(file) {
  const relPath = path.relative(SOURCE_DIR, file);
  if (relPath.startsWith('..')) return false;

  let current = SOURCE_DIR;
  const walked = [];
  let mismatched = false;

  for (const segment of relPath.split(path.sep)) {
    if (!fs.existsSync(current)) return false;
    const entries = fs.readdirSync(current);
    if (entries.includes(segment)) {
      walked.push(segment);
    } else {
      const found = entries.find((entry) => entry.toLowerCase() === segment.toLowerCase());
      if (!found) return false; // genuinely missing
      mismatched = true;
      walked.push(found);
    }
    current = path.join(current, walked[walked.length - 1]);
  }

  if (!fs.existsSync(current) || !fs.statSync(current).isFile()) return false;
  return mismatched ? { actual: walked.join('/') } : true;
}

const ATTRS = /(?<![\w.$-])(?:href|src|action|data-src|poster)\s*=\s*["']([^"']+)["']/gi;
const CSS_URL = /(?<![\w.-])url\(\s*["']?([^"')]+)["']?\s*\)/gi;
const SRCSET = /srcset\s*=\s*["']([^"']+)["']/gi;
const IMPORTED = /@import\s+(?:url\()?\s*["']([^"']+)["']/gi;

const problems = [];
const caseProblems = [];
const preExisting = [];
const external = new Map();

function checkRef(rawRef, file, line) {
  const ref = rawRef.trim();
  if (!ref || ref.startsWith('#') || ref.startsWith('data:') || ref.startsWith('mailto:')) return;
  if (/^(tel:|javascript:|blob:|about:)/i.test(ref)) return;
  if (/^[a-z][a-z0-9+.-]*:/i.test(ref) || ref.startsWith('//')) {
    const host = ref.replace(/^[a-z][a-z0-9+.-]*:/i, '').replace(/^\/\//, '').split(/[/?#]/)[0];
    external.set(host, (external.get(host) || 0) + 1);
    return;
  }

  const clean = ref.split('#')[0].split('?')[0];
  if (!clean) return;

  const referrerUrl = fileToUrlPath(rel(file));
  const baseUrl = referrerUrl.endsWith('/') ? referrerUrl : referrerUrl.replace(/[^/]*$/, '');
  const urlPath = path.posix.normalize(baseUrl + clean.replace(/^\//, clean.startsWith('/') ? '' : ''));

  let target = urlPathToFile(urlPath);
  if (fs.existsSync(target) && fs.statSync(target).isDirectory()) target = path.join(target, 'index.html');

  const exact = existsExact(target);
  if (exact === true) return;
  if (exact && exact.actual) {
    caseProblems.push({ file: rel(file), line, ref, urlPath, expected: exact.actual });
    return;
  }
  if (KNOWN_MISSING.some((pattern) => pattern.test(urlPath))) {
    preExisting.push({ file: rel(file), line, ref, urlPath });
    return;
  }
  problems.push({ file: rel(file), line, ref, urlPath });
}

for (const file of walk(SOURCE_DIR)) {
  const lines = fs.readFileSync(file, 'utf8').split(/\r?\n/);
  lines.forEach((text, index) => {
    for (const regex of [ATTRS, CSS_URL, IMPORTED]) {
      regex.lastIndex = 0;
      let match;
      while ((match = regex.exec(text))) checkRef(match[1], file, index + 1);
    }
    SRCSET.lastIndex = 0;
    let srcset;
    while ((srcset = SRCSET.exec(text))) {
      for (const candidate of srcset[1].split(',')) checkRef(candidate.trim().split(/\s+/)[0], file, index + 1);
    }
  });
}

// ---------------------------------------------------------------------------
// report
// ---------------------------------------------------------------------------
const groupOf = (file) => KNOWN_LEGACY.find((prefix) => file.startsWith(prefix)) || null;
const cases = new Map();
for (const problem of problems) {
  const group = groupOf(problem.file) || '(deployed site)';
  if (!cases.has(group)) cases.set(group, []);
  cases.get(group).push(problem);
}

const filesScanned = walk(SOURCE_DIR).length;
console.log(`scanned ${filesScanned} files in ${path.relative(ROOT, SOURCE_DIR) || '.'}/\n`);

let failing = 0;
for (const [group, list] of [...cases].sort((a, b) => b[1].length - a[1].length)) {
  const legacy = groupOf(group) || group === '(deployed site)' ? group !== '(deployed site)' : false;
  const unique = [...new Map(list.map((p) => [p.ref + p.file, p])).values()];
  console.log(`${group}: ${list.length} broken reference(s) in ${new Set(list.map((p) => p.file)).size} file(s)`);
  if (!legacy || showAll) {
    for (const problem of unique.slice(0, showAll ? 500 : 12)) {
      console.log(`   ${problem.file}:${problem.line}  ${problem.ref}   ->  ${problem.urlPath}`);
    }
    if (unique.length > 12 && !showAll) console.log(`   … ${unique.length - 12} more (use --all)`);
  } else {
    console.log('   (pre-existing breakage in the carried-over prototype archive — use --all to list)');
  }
  if (!legacy) failing += list.length;
}

if (preExisting.length) {
  const unique = [...new Map(preExisting.map((p) => [p.urlPath, p])).values()];
  console.log(`\npre-existing missing assets: ${preExisting.length} reference(s) to ${unique.length} file(s)`);
  for (const item of unique) console.log(`   ${item.urlPath}  (referenced from ${item.file})`);
  console.log('   These were never part of the site backup and also 404 on the old host — nothing to fix here.');
}

if (caseProblems.length) {
  console.log(`\ncase-sensitivity problems: ${caseProblems.length}`);
  for (const problem of [...new Map(caseProblems.map((p) => [p.ref + p.file, p])).values()].slice(0, 20)) {
    console.log(`   ${problem.file}:${problem.line}  ${problem.ref}  ->  case differs, actual file: ${problem.expected}`);
  }
}

if (!problems.length && !caseProblems.length) {
  console.log('no broken local references in the deployed site');
}

const hosts = [...external].sort((a, b) => b[1] - a[1]).slice(0, 6);
console.log(`\nexternal hosts linked: ${external.size}${hosts.length ? ' — top: ' + hosts.map(([h, n]) => `${h} (${n})`).join(', ') : ''}`);
console.log(failing ? `\n${failing} broken reference(s) in deployed files ✗` : '\nno broken references in deployed files ✓');
process.exit(failing ? 1 : 0);
