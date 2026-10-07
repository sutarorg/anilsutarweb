#!/usr/bin/env node
/**
 * Dependency-free preview server for the built site.
 *
 * It serves `public/` (the output of `npm run build`) and emulates the same
 * URL rules as vercel.json, so that `/work.php` behaves locally exactly like
 * it will on Vercel:
 *
 *   /                -> /index.html        (the legacy homepage, as today)
 *   /work.php        -> /pages/work.html   (rendered PHP, password gate)
 *   /about_me.html   -> /about_me.html     (1:1 static copy)
 *   /nope            -> /404.html          (404 status)
 *
 * Usage:
 *   npm run dev              # build, then serve
 *   npm run preview          # serve an existing build
 *   node scripts/dev-server.mjs --port 8080 --no-open
 */

import { execFileSync } from 'node:child_process';
import fs from 'node:fs';
import http from 'node:http';
import os from 'node:os';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const ROOT = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const OUT = path.join(ROOT, 'public');

const args = process.argv.slice(2);
const flag = (name) => args.includes(name);
const value = (name, fallback) => {
  const index = args.indexOf(name);
  return index >= 0 && args[index + 1] ? args[index + 1] : fallback;
};
const PORT = Number(value('--port', process.env.PORT || 3000));

// ---------------------------------------------------------------------------
// build (optional)
// ---------------------------------------------------------------------------
if (flag('--build') || !fs.existsSync(path.join(OUT, 'index.html'))) {
  console.log('[dev] building the site…');
  execFileSync(process.execPath, [path.join(ROOT, 'scripts', 'build-vercel.mjs')], {
    cwd: ROOT,
    stdio: 'inherit',
  });
}

// ---------------------------------------------------------------------------
// static file handling (mirrors the rewrites in vercel.json)
// ---------------------------------------------------------------------------
const MIME = {
  '.html': 'text/html; charset=utf-8',
  '.htm': 'text/html; charset=utf-8',
  '.php': 'text/html; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.js': 'text/javascript; charset=utf-8',
  '.mjs': 'text/javascript; charset=utf-8',
  '.json': 'application/json; charset=utf-8',
  '.map': 'application/json; charset=utf-8',
  '.txt': 'text/plain; charset=utf-8',
  '.xml': 'application/xml; charset=utf-8',
  '.svg': 'image/svg+xml',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.gif': 'image/gif',
  '.webp': 'image/webp',
  '.bmp': 'image/bmp',
  '.ico': 'image/x-icon',
  '.pdf': 'application/pdf',
  '.woff': 'font/woff',
  '.woff2': 'font/woff2',
  '.ttf': 'font/ttf',
  '.otf': 'font/otf',
  '.eot': 'application/vnd.ms-fontobject',
  '.mp4': 'video/mp4',
  '.webm': 'video/webm',
  '.mp3': 'audio/mpeg',
  '.swf': 'application/x-shockwave-flash',
  '.ppt': 'application/vnd.ms-powerpoint',
  '.doc': 'application/msword',
  '.docx': 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
  '.zip': 'application/zip',
  '.wasm': 'application/wasm',
};

/** Maps a request path to a file inside public/, or null when nothing matches. */
function resolveFile(urlPath) {
  let pathname;
  try {
    pathname = decodeURIComponent(new URL(urlPath, 'http://localhost').pathname);
  } catch {
    return null;
  }
  if (pathname.includes('\0')) return null;

  // vercel.json: "/(.*)\.php" -> "/pages/$1.html"
  const phpMatch = pathname.match(/^\/(.*)\.php$/i);
  if (phpMatch) pathname = `/pages/${phpMatch[1]}.html`;

  if (pathname.endsWith('/')) pathname += 'index.html';

  const file = path.resolve(OUT, `.${pathname}`);
  if (!file.startsWith(OUT + path.sep) && file !== OUT) return null; // traversal guard
  if (!fs.existsSync(file) || !fs.statSync(file).isFile()) return null;
  return file;
}

const send = (res, status, file, body) => {
  res.writeHead(status, {
    'Content-Type': MIME[path.extname(file).toLowerCase()] || 'application/octet-stream',
    'Content-Length': body.length,
    'Cache-Control': 'no-store',
    // deliberately no X-Frame-Options / CSP: the preview is embedded in a frame
  });
  res.end(body);
};

const server = http.createServer((req, res) => {
  if (req.method !== 'GET' && req.method !== 'HEAD') {
    res.writeHead(405, { Allow: 'GET, HEAD' });
    res.end('Method Not Allowed');
    return;
  }

  const file = resolveFile(req.url || '/');
  if (file) {
    const body = fs.readFileSync(file);
    if (req.method === 'HEAD') {
      res.writeHead(200, {
        'Content-Type': MIME[path.extname(file).toLowerCase()] || 'application/octet-stream',
        'Content-Length': body.length,
        'Cache-Control': 'no-store',
      });
      res.end();
      return;
    }
    console.log(`200  ${req.url}`);
    send(res, 200, file, body);
    return;
  }

  const notFound = path.join(OUT, '404.html');
  console.log(`404  ${req.url}`);
  if (fs.existsSync(notFound)) send(res, 404, notFound, fs.readFileSync(notFound));
  else {
    res.writeHead(404, { 'Content-Type': 'text/plain; charset=utf-8' });
    res.end('Not found');
  }
});

server.listen(PORT, '0.0.0.0', () => {
  const addresses = new Set([`http://localhost:${PORT}`]);
  for (const list of Object.values(os.networkInterfaces())) {
    for (const info of list || []) {
      if (info.family === 'IPv4' && !info.internal) addresses.add(`http://${info.address}:${PORT}`);
    }
  }
  console.log(`\n[dev] serving public/ on port ${PORT}`);
  for (const address of addresses) console.log(`      ${address}`);
  console.log('      /  ·  /index.php  ·  /work.php  ·  /about_me.html\n');
});
