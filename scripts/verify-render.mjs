#!/usr/bin/env node
/**
 * Optional developer check: renders every top-level .php page with *real* PHP
 * (php-wasm, running locally) and compares it with what
 * `scripts/lib/php-page.mjs` produces for the static build.
 *
 * It exists to prove that skipping PHP on Vercel does not change a single byte
 * of what visitors see. Run it whenever the .php pages are edited:
 *
 *     npm install --no-save php-wasm
 *     npm run verify:render
 */

import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

import { renderPhpPage } from './lib/php-page.mjs';

const ROOT = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');

let PhpNode;
try {
  ({ PhpNode } = await import('php-wasm/PhpNode.mjs'));
} catch {
  console.error(
    'php-wasm is not installed (it is only needed for this check).\n' +
      '  npm install --no-save php-wasm\n' +
      '  npm run verify:render'
  );
  process.exit(2);
}

const phpQuote = (value) => `'${value.replace(/\\/g, '\\\\').replace(/'/g, "\\'")}'`;
const normalize = (html) => html.replace(/\r\n?/g, '\n').replace(/[ \t]+\n/g, '\n').trim();

const password = process.env.PORTFOLIO_PASSWORD || 'verify-render-password';
const pages = fs
  .readdirSync(ROOT)
  .filter((name) => name.toLowerCase().endsWith('.php'))
  .sort();

const php = new PhpNode();
let buffer = '';
php.addEventListener('output', (event) => {
  buffer += Array.isArray(event.detail) ? event.detail.join('') : String(event.detail);
});

const runPhp = async (code) => {
  buffer = '';
  await php.run(code);
  return buffer;
};

// Seed the session exactly like a visitor who already entered the password.
await runPhp(
  '<?php putenv("PORTFOLIO_PASSWORD=" . ' +
    phpQuote(password) +
    '); session_start(); $_SESSION["password"] = getenv("PORTFOLIO_PASSWORD"); session_write_close(); echo "seeded";'
);

let failures = 0;
let identical = 0;
let whitespaceOnly = 0;

for (const page of pages) {
  const source = fs.readFileSync(path.join(ROOT, page), 'utf8');
  const expected = (await runPhp(source)).replace(/^seeded/, '');
  let actual;
  try {
    actual = renderPhpPage(source, page);
  } catch (error) {
    console.log(`FAIL  ${page}: renderer threw — ${error.message.split('\n')[0]}`);
    failures += 1;
    continue;
  }

  if (actual === expected) {
    identical += 1;
    console.log(`ok    ${page}  (${actual.length} bytes, byte-identical to PHP)`);
    continue;
  }
  if (normalize(actual) === normalize(expected)) {
    whitespaceOnly += 1;
    console.log(`ok    ${page}  (identical to PHP apart from whitespace)`);
    continue;
  }

  failures += 1;
  const a = actual.split('\n');
  const b = expected.split('\n');
  let line = 0;
  while (line < Math.max(a.length, b.length) && a[line] === b[line]) line += 1;
  console.log(`FAIL  ${page}: differs from PHP output at line ${line + 1}`);
  console.log(`        php:    ${JSON.stringify((b[line] ?? '<eof>').slice(0, 160))}`);
  console.log(`        static: ${JSON.stringify((a[line] ?? '<eof>').slice(0, 160))}`);
}

console.log(
  `\n${pages.length} page(s): ${identical} byte-identical, ${whitespaceOnly} whitespace-only, ${failures} failing`
);
process.exit(failures ? 1 : 0);
