/**
 * The site's search-engine files: `sitemap.xml` and `robots.txt`.
 *
 * Both are generated from the repository itself, so the sitemap cannot list a
 * page that no longer exists, and a new page does not have to be remembered
 * anywhere:
 *
 *   - `sitemap.xml` lists every public page (the portfolio home page and the
 *     legacy 2009 pages with their galleries) under its canonical absolute
 *     URL.
 *   - `robots.txt` allows the public pages, keeps the prototype archives of the
 *     password-protected case studies out of search results, and points
 *     crawlers at the sitemap.
 *
 * The same rules feed the two deployments this repository supports:
 *
 *   `npm run seo`    writes the copies at the repository root, which the
 *                    PHP/IIS host serves as-is (that host has no build step).
 *   `npm run build`  writes the copies into `public/`, which Vercel serves.
 *                    They are identical apart from one extra rule for the
 *                    `/pages/` duplicates the static build creates.
 *
 * Every page that is *not* listed is reported with a reason (see
 * `ARCHIVE_DIRS`, `NOT_ADVERTISED` and the gated pages below), so it stays
 * obvious why a URL is missing and how to add it back.
 *
 * `lastmod` is deliberately left out: without a trustworthy per-page date
 * (file timestamps are just the checkout time on a CI build) a wrong value is
 * worse than none, and search engines only use `loc` and `lastmod` anyway.
 */

import fs from 'node:fs';
import path from 'node:path';

import { isGatedPage } from './php-page.mjs';

/** Every URL in the sitemap is absolute and uses this origin. */
export const SITE_ORIGIN = 'https://anilsutar.com';

/**
 * Folders that are part of the deployment. The case-study prototypes are kept
 * out of the index (`disallow`); the other two are archives of content that is
 * either listed elsewhere or that no browser can display any more, so they are
 * simply not advertised.
 */
const ARCHIVE_DIRS = [
  {
    dir: 'iphone_ph2_v2',
    reason: 'prototype archive of the password-protected case studies',
    disallow: true,
  },
  {
    dir: 'wireframes_iphone_ios7',
    reason: 'prototype archive of the password-protected case studies',
    disallow: true,
  },
  {
    dir: 'old-portfolio',
    reason: 'mirror of the legacy 2009 pages that are listed at the site root',
  },
  {
    dir: 'flashpages',
    reason: 'Flash e-cards: no current browser can play them',
  },
];

/** Pages that hand the visitor over to the sign-in screen of the work section. */
const WORK_GATE = ['work.php', 'login.php'];

/**
 * Public pages that are deliberately left out of the sitemap. Delete a line to
 * advertise the page again.
 */
const NOT_ADVERTISED = [
  ['index.php', 'the home page is listed as "/"'],
  ['work1.php', 'superseded by the password-gated /work.php; nothing on the site links to it'],
  ['card1.html', 'Flash e-card: the page only ever held a .swf no browser can play'],
  ['404.html', 'error page, should it ever be added at the root for the PHP host'],
];

/**
 * Works out what the site publishes.
 *
 * @param {string} root  repository root (the deployment mirrors it 1:1)
 * @param {{ publicWork?: boolean }} [options]  mirrors `PORTFOLIO_PUBLIC_WORK`:
 *        when the protected case studies are published without a password,
 *        they become ordinary pages and are listed like any other.
 * @returns {{
 *   pages: { url: string, file: string }[],
 *   disallow: { path: string, reason: string }[],
 *   skipped: { url: string, reason: string }[],
 * }}
 */
export function collectSitePages(root, { publicWork = false } = {}) {
  const entries = fs.readdirSync(root, { withFileTypes: true });
  const files = entries.filter((entry) => entry.isFile()).map((entry) => entry.name);
  const notAdvertised = new Map(NOT_ADVERTISED);

  // The home page first: `/` is the canonical address, `index.php` renders it.
  const pages = [{ url: '/', file: 'index.php' }];
  const skipped = [];
  const disallow = [];

  /** Skips a page, recording why it is not in the sitemap. */
  const skip = (name, reason) => skipped.push({ url: `/${name}`, reason });

  // 1. the legacy 2009 pages, which live next to the modern ones at the root
  for (const name of files.filter((file) => /\.html$/i.test(file)).sort()) {
    if (notAdvertised.has(name)) skip(name, notAdvertised.get(name));
    else pages.push({ url: `/${name}`, file: name });
  }

  // 2. the .php pages, rendered to plain HTML at build time
  for (const name of files.filter((file) => /\.php$/i.test(file)).sort()) {
    if (/^index\.php$/i.test(name)) continue; // already listed as "/"
    if (WORK_GATE.includes(name)) {
      skip(name, 'the gated work section: the visitor is signed in at /login.php (noindex)');
      continue;
    }
    if (isGatedPage(fs.readFileSync(path.join(root, name), 'utf8'))) {
      if (publicWork) {
        // PORTFOLIO_PUBLIC_WORK publishes these pages without a password.
        pages.push({ url: `/${name}`, file: name });
      } else {
        skip(name, 'password-protected case study');
        disallow.push({
          path: `/${name}`,
          reason: 'password-protected case studies: visitors only ever see a password prompt',
        });
      }
      continue;
    }
    if (notAdvertised.has(name)) skip(name, notAdvertised.get(name));
    else pages.push({ url: `/${name}`, file: name });
  }

  // 3. folders that are served but never advertised
  for (const { dir, reason, disallow: keepOut } of ARCHIVE_DIRS) {
    if (!fs.existsSync(path.join(root, dir))) continue;
    skipped.push({ url: `/${dir}/`, reason });
    if (keepOut) disallow.push({ path: `/${dir}/`, reason });
  }

  return { pages, disallow, skipped };
}

/**
 * Renders `sitemap.xml`.
 *
 * @param {{ url: string }[]} pages  from {@link collectSitePages}
 * @param {{ origin?: string }} [options]
 * @returns {string} the XML document
 */
export function renderSitemap(pages, { origin = SITE_ORIGIN } = {}) {
  const urls = pages
    .map(({ url }) => `  <url>\n    <loc>${origin}${url.replace(/&/g, '&amp;')}</loc>\n  </url>`)
    .join('\n');
  return `<?xml version="1.0" encoding="UTF-8"?>
<!--
  Anil Sutar - portfolio sitemap. Generated from scripts/lib/seo.mjs by
  \`npm run seo\` (PHP/IIS host) and scripts/build-vercel.mjs (static build);
  do not edit by hand.

  Pages behind a password (the work section and the case studies) and the
  prototype archives of those case studies are not listed.
-->
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
${urls}
</urlset>
`;
}

/**
 * Renders `robots.txt`. Rules are grouped by their reason, which is written out
 * as the comment above them, so the file explains itself.
 *
 * @param {{ disallow?: { path: string, reason: string }[], origin?: string }} [options]
 * @returns {string} the file contents
 */
export function renderRobots({ disallow = [], origin = SITE_ORIGIN } = {}) {
  const groups = new Map(); // reason -> paths, in order of first appearance
  for (const { path: target, reason } of disallow) {
    if (!groups.has(reason)) groups.set(reason, new Set());
    groups.get(reason).add(target);
  }

  const blocks = [...groups]
    .map(([reason, paths]) => {
      const comment = reason.charAt(0).toUpperCase() + reason.slice(1);
      const rules = [...paths].sort().map((p) => `Disallow: ${p}`);
      return `# ${comment}\n${rules.join('\n')}`;
    })
    .join('\n\n');

  return `# robots.txt for ${origin} - generated from scripts/lib/seo.mjs by
# \`npm run seo\` (PHP/IIS host) and scripts/build-vercel.mjs (static build);
# do not edit by hand.
#
# The public pages of the site are listed in ${origin}/sitemap.xml.

User-agent: *
Allow: /

${blocks}

Sitemap: ${origin}/sitemap.xml
`;
}

/**
 * Checks that every URL of the sitemap has a file in the static build, so a
 * deploy can never publish a sitemap full of 404s.
 *
 * @param {{ url: string }[]} pages  from {@link collectSitePages}
 * @param {string} outDir            the built site (public/)
 * @returns {string[]} the URLs without a file, empty when all is well
 */
export function missingPages(pages, outDir) {
  /** Where a URL ends up in the static build (see vercel.json + build script). */
  const target = (url) => {
    if (url === '/') return 'index.html';
    if (/\.php$/i.test(url)) return `pages/${url.slice(1).replace(/\.php$/i, '.html')}`;
    return url.slice(1);
  };
  return pages.filter(({ url }) => !fs.existsSync(path.join(outDir, target(url)))).map(({ url }) => url);
}
