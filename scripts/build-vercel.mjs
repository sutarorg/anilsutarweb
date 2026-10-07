#!/usr/bin/env node
/**
 * Builds the static, Vercel-ready version of the site into `public/`.
 *
 * Why a build step?
 * -----------------
 * The site is a mix of a modern `.php` portfolio and a large legacy static
 * archive. Vercel does not run PHP, and this build deliberately avoids a
 * serverless PHP runtime: everything is rendered/copied to plain files at
 * build time, so the deployment is 100% static (fast, free, nothing to keep
 * alive).
 *
 * What it does
 * ------------
 *  1. Copies every static asset/page of the repository into `public/` 1:1,
 *     skipping dev-only folders (see EXCLUDE_PATHS below).
 *  2. Renders the top-level `*.php` pages into plain HTML. Pages with legacy
 *     PHP conditionals are converted by the small renderer; plain HTML pages
 *     using a `.php` URL (such as the frontend-gated work page and login page)
 *     are copied through unchanged:
 *         index.php -> public/pages/index.html
 *         work.php  -> public/pages/work.html      (and so on)
 *     vercel.json rewrites `/work.php` -> `/pages/work.html`, so every
 *     existing URL keeps working exactly as before.
 *  3. `index.php` is the home page, so its HTML is *also* written to
 *     `public/index.html`: the bare domain (`/`, and `/index.html`) serves the
 *     portfolio, exactly like the `DirectoryIndex index.php` of the old PHP
 *     host did. The legacy 2009 homepage keeps living at `/home.html`.
 *  4. Password-protected pages (the ones reading PORTFOLIO_PASSWORD) are
 *     encrypted with AES-256-GCM and wrapped in a small unlock page. The
 *     plaintext never reaches the deployed site and the password itself is
 *     never stored anywhere - it only derives the key. Visitors unlock the
 *     page in their browser via WebCrypto.
 *
 * Environment variables
 * ---------------------
 *   PORTFOLIO_PASSWORD    Password for the protected case studies. When it is
 *                         not set, those pages show a "not configured" notice
 *                         instead of leaking their content.
 *   PORTFOLIO_PUBLIC_WORK Set to "1"/"true" to publish the protected pages as
 *                         plain HTML, with no password at all.
 *
 * `npm run build` / `npm run dev` load `.env` and `.env.local` automatically
 * (real environment variables always win); on Vercel the values come from the
 * project's Environment Variables settings.
 */

import crypto from 'node:crypto';
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

import { isGatedPage, renderPhpPage } from './lib/php-page.mjs';

const ROOT = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const OUT = path.join(ROOT, 'public');
const PAGES_DIR = path.join(OUT, 'pages');

/** PBKDF2 rounds used for the browser-side unlock. */
const KDF_ITERATIONS = 310_000;

/** Top-level folders that are not part of the deployment. */
const EXCLUDE_PATHS = new Set([
  '.git',
  '.vercel',
  '.arena',
  'node_modules',
  'public',
  'scripts', // build tooling, not site content
  'test', // leftover server-side language probes, never linked from the site
]);

/** Junk / dev files dropped anywhere in the tree. */
const EXCLUDE_FILE =
  /^(\.DS_Store|Thumbs\.db|desktop\.ini|web\.config|\.htaccess|\.htpasswd|\.user\.ini|\.env(\..*)?|\.gitignore|\.vercelignore|package(-lock)?\.json|vercel\.json|.*\.md)$/i;
const EXCLUDE_EXT = /\.(map|log)$/i;

const NEVER_COPY_DIRS = new Set(['node_modules', '.git', '.vercel', 'test']);

// ---------------------------------------------------------------------------
// tiny env loader (.env / .env.local) - real environment always wins
// ---------------------------------------------------------------------------
for (const file of ['.env', '.env.local']) {
  const p = path.join(ROOT, file);
  if (!fs.existsSync(p)) continue;
  for (const line of fs.readFileSync(p, 'utf8').split(/\r?\n/)) {
    const m = line.match(/^\s*([A-Za-z_][A-Za-z0-9_]*)\s*=\s*(.*)$/);
    if (!m) continue;
    const value = m[2].trim().replace(/^(['"])(.*)\1$/, '$2');
    if (process.env[m[1]] === undefined) process.env[m[1]] = value;
  }
}

const PASSWORD = (process.env.PORTFOLIO_PASSWORD || '').trim();
const PUBLIC_WORK = /^(1|true|yes)$/i.test((process.env.PORTFOLIO_PUBLIC_WORK || '').trim());

// ---------------------------------------------------------------------------
// helpers
// ---------------------------------------------------------------------------
const stats = { files: 0, copied: 0, bytes: 0 };
const shouldSkipFile = (name) => EXCLUDE_FILE.test(name) || EXCLUDE_EXT.test(name);

/** Recursively copies a folder, skipping dev/archive noise. */
function copyTree(from, to) {
  fs.mkdirSync(to, { recursive: true });
  for (const entry of fs.readdirSync(from, { withFileTypes: true })) {
    const src = path.join(from, entry.name);
    const dest = path.join(to, entry.name);
    if (entry.isDirectory()) {
      if (NEVER_COPY_DIRS.has(entry.name)) continue;
      copyTree(src, dest);
      continue;
    }
    if (!entry.isFile() || shouldSkipFile(entry.name)) continue;
    fs.copyFileSync(src, dest);
    stats.files += 1;
    stats.copied += 1;
    stats.bytes += fs.statSync(dest).size;
  }
}

/** Writes one generated file into public/ and tracks the output size. */
function writeOut(relPath, contents) {
  const dest = path.join(OUT, relPath);
  fs.mkdirSync(path.dirname(dest), { recursive: true });
  fs.writeFileSync(dest, contents);
  stats.files += 1;
  stats.bytes += Buffer.byteLength(contents);
}

// ---------------------------------------------------------------------------
// password-gated pages: encrypt, then wrap in an unlock page
// ---------------------------------------------------------------------------
function encryptHtml(html, password) {
  const salt = crypto.randomBytes(16);
  const iv = crypto.randomBytes(12);
  const key = crypto.pbkdf2Sync(password, salt, KDF_ITERATIONS, 32, 'sha256');
  const cipher = crypto.createCipheriv('aes-256-gcm', key, iv, { authTagLength: 16 });
  const body = Buffer.concat([cipher.update(html, 'utf8'), cipher.final()]);
  return {
    v: 1,
    kdf: 'PBKDF2-SHA256',
    iterations: KDF_ITERATIONS,
    salt: salt.toString('base64'),
    iv: iv.toString('base64'),
    // WebCrypto expects the GCM auth tag appended to the ciphertext
    data: Buffer.concat([body, cipher.getAuthTag()]).toString('base64'),
  };
}

const esc = (s) =>
  s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');

/** Self-contained unlock screen (no external CSS/JS, works offline). */
function unlockPage(title, payload, notice) {
  const json = JSON.stringify(payload).replace(/</g, '\\u003c');
  return `<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>${esc(title)}</title>
<style>
  :root { color-scheme: light; }
  * { box-sizing: border-box; }
  body {
    margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center;
    background: #f6f7f9; color: #33383f; padding: 24px;
    font-family: -apple-system, BlinkMacSystemFont, "SF Pro Text", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  }
  .card {
    width: 100%; max-width: 380px; background: #fff; border-radius: 14px; padding: 32px 28px;
    box-shadow: 0 8px 30px rgba(24, 32, 48, .10); text-align: center;
  }
  .card img { height: 56px; width: auto; margin-bottom: 22px; }
  h1 { font-size: 19px; font-weight: 600; margin: 0 0 6px; }
  p.lead { font-size: 14px; line-height: 1.5; color: #6b7280; margin: 0 0 22px; }
  label { display: block; text-align: left; font-size: 12px; font-weight: 600; letter-spacing: .02em;
          text-transform: uppercase; color: #8a93a3; margin-bottom: 6px; }
  input[type=password] {
    width: 100%; padding: 12px 14px; font-size: 15px; border: 1px solid #d6dae2; border-radius: 8px;
    background: #fff; color: inherit; outline: none; transition: border-color .15s, box-shadow .15s;
  }
  input[type=password]:focus { border-color: #6678a1; box-shadow: 0 0 0 3px rgba(102, 120, 161, .18); }
  button {
    width: 100%; margin-top: 16px; padding: 12px 14px; font-size: 15px; font-weight: 600; color: #fff;
    background: #6678a1; border: 0; border-radius: 8px; cursor: pointer; transition: background .15s;
  }
  button:hover:not(:disabled) { background: #57698f; }
  button:disabled { opacity: .65; cursor: default; }
  .msg { font-size: 13px; line-height: 1.45; margin-top: 14px; min-height: 18px; }
  .msg.error { color: #c0392b; }
  .msg.busy { color: #6b7280; }
  .notice { font-size: 12.5px; line-height: 1.5; text-align: left; margin-top: 20px; padding: 12px 14px;
            background: #fff8e5; border: 1px solid #f2e0ac; border-radius: 8px; color: #7a6420; }
  .notice code { font-size: 12px; }
  footer { margin-top: 22px; font-size: 13px; }
  footer a { color: #6678a1; text-decoration: none; }
  footer a:hover { text-decoration: underline; }
</style>
</head>
<body>
  <main class="card">
    <img src="/img/anil-sutar-logo.png" alt="Anil Sutar" onerror="this.style.display='none'">
    <h1>${esc(title)}</h1>
    <p class="lead">This case study is private. Enter the password to view it.</p>

    <form id="unlock" ${notice ? 'hidden' : ''} autocomplete="off">
      <label for="pw">Password</label>
      <input id="pw" name="pass" type="password" autocomplete="current-password" autofocus required ${notice ? 'disabled' : ''}>
      <button type="submit" id="go">View case study</button>
    </form>

    <div class="msg" id="msg" role="status" aria-live="polite"></div>
    ${notice ? `<div class="notice">${notice}</div>` : ''}

    <footer><a href="/">&#8592; Go to homepage</a></footer>
  </main>

<script type="application/json" id="payload">${json}</script>
<script>
(function () {
  var KEY = 'anilsutar.unlock';
  var payload = JSON.parse(document.getElementById('payload').textContent);
  var form = document.getElementById('unlock');
  var input = document.getElementById('pw');
  var button = document.getElementById('go');
  var msg = document.getElementById('msg');

  function b64ToBytes(b64) {
    var bin = atob(b64), bytes = new Uint8Array(bin.length);
    for (var i = 0; i < bin.length; i++) bytes[i] = bin.charCodeAt(i);
    return bytes;
  }

  function setMsg(text, kind) {
    msg.textContent = text || '';
    msg.className = 'msg' + (kind ? ' ' + kind : '');
  }

  if (!(window.crypto && window.crypto.subtle && window.TextDecoder)) {
    setMsg('This browser cannot decrypt the page. Please use a current version of Chrome, Safari, Firefox or Edge.', 'error');
    return;
  }

  function unlock(password) {
    var encoder = new TextEncoder();
    return crypto.subtle.importKey('raw', encoder.encode(password), 'PBKDF2', false, ['deriveKey'])
      .then(function (keyMaterial) {
        return crypto.subtle.deriveKey(
          { name: 'PBKDF2', salt: b64ToBytes(payload.salt), iterations: payload.iterations, hash: 'SHA-256' },
          keyMaterial, { name: 'AES-GCM', length: 256 }, false, ['decrypt']
        );
      })
      .then(function (key) {
        return crypto.subtle.decrypt(
          { name: 'AES-GCM', iv: b64ToBytes(payload.iv), tagLength: 128 },
          key, b64ToBytes(payload.data)
        );
      })
      .then(function (plain) { return new TextDecoder().decode(plain); });
  }

  function tryUnlock(password, remember) {
    button && (button.disabled = true);
    setMsg('Decrypting…', 'busy');
    unlock(password).then(function (html) {
      try { sessionStorage.setItem(KEY, password); } catch (e) {}
      document.open();
      document.write(html);
      document.close();
    }).catch(function () {
      if (remember) { try { sessionStorage.removeItem(KEY); } catch (e) {} }
      setMsg('Incorrect password. Please try again.', 'error');
      button && (button.disabled = false);
      input && input.select();
    });
  }

  form && form.addEventListener('submit', function (event) {
    event.preventDefault();
    input.value && tryUnlock(input.value, true);
  });

  var remembered = null;
  try { remembered = sessionStorage.getItem(KEY); } catch (e) {}
  if (remembered && input) {
    input.value = remembered;
    tryUnlock(remembered, false);
  }
})();
</script>
</body>
</html>
`;
}

/** Branded 404 page. */
const notFoundPage = `<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Page not found — Anil Sutar</title>
<style>
  body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center;
         background: #f6f7f9; color: #33383f; padding: 24px; text-align: center;
         font-family: -apple-system, BlinkMacSystemFont, "SF Pro Text", "Segoe UI", Roboto, Helvetica, Arial, sans-serif; }
  img { height: 56px; margin-bottom: 20px; }
  h1 { font-size: 20px; margin: 0 0 8px; }
  p { color: #6b7280; font-size: 14px; margin: 0 0 20px; }
  a { color: #6678a1; text-decoration: none; font-size: 14px; margin: 0 8px; }
  a:hover { text-decoration: underline; }
</style>
</head>
<body>
  <main>
    <img src="/img/anil-sutar-logo.png" alt="Anil Sutar" onerror="this.style.display='none'">
    <h1>This page does not exist</h1>
    <p>The link may be out of date, or the page may have moved.</p>
    <a href="/">Home</a> &middot; <a href="/work.php">Work</a> &middot; <a href="/home.html">Legacy site</a>
  </main>
</body>
</html>
`;

// ---------------------------------------------------------------------------
// build
// ---------------------------------------------------------------------------
const started = Date.now();
console.log('[build] Anil Sutar portfolio → public/');

fs.rmSync(OUT, { recursive: true, force: true });
fs.mkdirSync(PAGES_DIR, { recursive: true });

const phpPages = fs
  .readdirSync(ROOT, { withFileTypes: true })
  .filter((entry) => entry.isFile() && entry.name.toLowerCase().endsWith('.php'))
  .map((entry) => entry.name)
  .sort();
const phpSet = new Set(phpPages);

// 1. copy the static site (the .php sources are rendered in step 2 instead)
for (const entry of fs.readdirSync(ROOT, { withFileTypes: true })) {
  const src = path.join(ROOT, entry.name);
  if (entry.isDirectory()) {
    if (EXCLUDE_PATHS.has(entry.name)) continue;
    copyTree(src, path.join(OUT, entry.name));
    continue;
  }
  if (!entry.isFile()) continue;
  if (phpSet.has(entry.name) || shouldSkipFile(entry.name)) continue;
  const dest = path.join(OUT, entry.name);
  fs.copyFileSync(src, dest);
  stats.files += 1;
  stats.copied += 1;
  stats.bytes += fs.statSync(dest).size;
}

// 2. render the PHP pages
const gatedPages = [];
const publicModePages = [];
for (const name of phpPages) {
  const source = fs.readFileSync(path.join(ROOT, name), 'utf8');
  const html = renderPhpPage(source, name);
  const gated = isGatedPage(source) && !PUBLIC_WORK;
  const outName = `pages/${name.replace(/\.php$/i, '.html')}`;

  let output;
  if (gated) {
    const notice = PASSWORD
      ? ''
      : 'No password is configured for this deployment yet. Add the <code>PORTFOLIO_PASSWORD</code> ' +
        'environment variable to this project on Vercel (or to <code>.env</code> locally) and deploy ' +
        'again to unlock this case study.';
    output = unlockPage('Protected case study', PASSWORD ? encryptHtml(html, PASSWORD) : { v: 1, locked: true }, notice);
    gatedPages.push(name);
  } else {
    output = html;
    publicModePages.push(name);
  }

  writeOut(outName, output);

  // index.php is the home page: serve the very same HTML from the site root,
  // so `/` and `/index.html` show it too (PHP hosts do this automatically via
  // `DirectoryIndex index.php`, which static hosting has no equivalent for).
  if (/^index\.php$/i.test(name)) {
    writeOut('index.html', output);
  }
}

// 3. extras
writeOut('404.html', notFoundPage);

// 4. summary
const mb = (n) => (n / 1024 / 1024).toFixed(1) + ' MB';
console.log(`[build] copied ${stats.copied} static files`);
console.log('[build] homepage:  /  →  public/index.html   (rendered from index.php)');
console.log(`[build] rendered ${phpPages.length} PHP pages into public/pages/:`);
for (const name of phpPages) {
  const label = gatedPages.includes(name)
    ? (PASSWORD ? 'password-protected (AES-256-GCM)' : 'locked — password not configured')
    : PUBLIC_WORK
      ? 'published (PORTFOLIO_PUBLIC_WORK)'
      : 'public';
  console.log(`          /${name}  →  ${name.replace(/\.php$/i, '.html')}   [${label}]`);
}
console.log(`[build] output: ${stats.files} files, ${mb(stats.bytes)}`);
if (gatedPages.length && !PASSWORD && !PUBLIC_WORK) {
  console.log(
    '\n[build] !  PORTFOLIO_PASSWORD is not set, so ' +
      `${gatedPages.length} page(s) will show a "not configured" notice.\n` +
      '          Set it in the Vercel project settings (Settings → Environment Variables)\n' +
      '          or in .env locally, then deploy again.\n'
  );
} else if (PUBLIC_WORK && gatedPages.length === 0 && phpPages.length) {
  console.log('\n[build] !  PORTFOLIO_PUBLIC_WORK is on: protected pages are published without a password.\n');
}
console.log(`[build] done in ${Date.now() - started} ms`);
