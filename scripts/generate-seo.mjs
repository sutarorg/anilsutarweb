#!/usr/bin/env node
/**
 * Writes the search-engine files for the PHP/IIS deployment - `sitemap.xml` and
 * `robots.txt` at the repository root - which that host serves as-is.
 *
 * The rules themselves live in scripts/lib/seo.mjs, which is also what the
 * static build (scripts/build-vercel.mjs) uses to write the copies into
 * `public/` for Vercel. Run this after adding or removing a page, so the
 * committed files stay in step with the site:
 *
 *     npm run seo               # rewrite both files
 *     npm run seo -- --check    # report whether they are up to date (no writes)
 *
 * The command also prints every page that is *not* in the sitemap and why, so
 * the rules can be reviewed without reading the code.
 */

import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

import { SITE_ORIGIN, collectSitePages, renderRobots, renderSitemap } from './lib/seo.mjs';

const ROOT = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const checkOnly = process.argv.includes('--check');

// On the PHP host the pages are gated by the PHP session, not by the static
// build, so the case studies are never part of the sitemap here.
const { pages, disallow, skipped } = collectSitePages(ROOT);
const files = [
  ['sitemap.xml', renderSitemap(pages)],
  ['robots.txt', renderRobots({ disallow })],
];

const stale = [];
for (const [name, contents] of files) {
  const file = path.join(ROOT, name);
  const current = fs.existsSync(file) ? fs.readFileSync(file, 'utf8') : null;
  if (current !== contents) stale.push([name, file, contents]);
}

if (checkOnly) {
  if (stale.length) {
    console.error(`[seo] ${stale.map(([name]) => name).join(' and ')} out of date - run \`npm run seo\`.`);
    process.exit(1);
  }
  console.log(`[seo] sitemap.xml (${pages.length} URLs) and robots.txt are up to date`);
  process.exit(0);
}

for (const [, file, contents] of stale) fs.writeFileSync(file, contents);

console.log(`[seo] sitemap.xml: ${pages.length} URLs for ${SITE_ORIGIN}`);
console.log(`[seo] robots.txt: ${disallow.length} disallowed path(s)`);
if (skipped.length) {
  console.log('[seo] not in the sitemap:');
  for (const { url, reason } of skipped) console.log(`          ${url}  -  ${reason}`);
}
console.log(
  stale.length ? `[seo] updated ${stale.map(([name]) => name).join(', ')}` : '[seo] both files were already up to date'
);
