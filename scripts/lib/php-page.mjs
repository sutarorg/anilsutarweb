/**
 * Turns the site's `.php` pages into the plain HTML a logged-in visitor would
 * have received from the old PHP host, without running PHP.
 *
 * The legacy protected case-study pages share a common template: a leading
 * session/password prologue, followed by the unlocked page and a password form
 * in the `else` branch. This helper strips the PHP scaffolding and fallback
 * form so the static build can wrap protected content separately.
 *
 * Plain HTML pages that happen to use a `.php` URL (for example, the work page
 * and the login page) pass through unchanged. Some legacy pages close their
 * gate condition inside the prologue block, so the renderer strips leading PHP
 * blocks and cuts the document at the `} else {` marker.
 *
 * `npm run verify:render` compares rendered output against real PHP
 * (php-wasm) for the legacy page templates.
 */

const PHP_BLOCK = /<\?(?:php|=)?[\s\S]*?\?>/;
const ELSE_MARKER = /<\?(?:php)?\s*\}?\s*else\s*\{/;
const IS_GATED = /PORTFOLIO_PASSWORD|_SESSION\[.password.\]/;

/** True when the PHP source is one of the password-protected pages. */
export const isGatedPage = (source) => IS_GATED.test(source);

/**
 * @param {string} source  contents of the .php file
 * @param {string} file    file name, used for error messages
 * @returns {string} the HTML for an unlocked visitor
 */
export function renderPhpPage(source, file) {
  let text = source;
  let prefix = '';

  // Drop the leading PHP scaffolding (session prologue + gate condition).
  //
  // Whitespace between the blocks is output by PHP, so it is carried over -
  // except for a single newline directly after `?>`, which PHP itself
  // swallows ("the closing tag includes the immediately trailing newline").
  for (;;) {
    const trimmed = text.replace(/^[\s\uFEFF]+/, '');
    const whitespace = text.slice(0, text.length - trimmed.length);
    const block = trimmed.match(PHP_BLOCK);
    if (!block || block.index !== 0) break;
    if (ELSE_MARKER.test(block[0])) break; // never eat an else-branch marker
    const after = trimmed.slice(block[0].length);
    prefix += whitespace;
    text = after.startsWith('\r\n') ? after.slice(2) : after.startsWith('\n') ? after.slice(1) : after;
  }

  // Everything from the `} else {` marker onwards is the password prompt.
  const elseAt = text.search(ELSE_MARKER);
  if (elseAt >= 0) {
    text = text.slice(0, elseAt);
  } else if (IS_GATED.test(source)) {
    throw new Error(
      `[render] ${file}: this page looks password-protected, but no "} else {" branch was found.\n` +
        '         The PHP template changed — please update scripts/lib/php-page.mjs and re-check it\n' +
        '         with `npm run verify:render` (compares against real PHP output).'
    );
  }

  // No PHP can run on Vercel: make any leftover block visible in the logs.
  if (/<\?(?:php|=)?/.test(text)) {
    console.warn(`[render] ${file}: stripping leftover PHP block(s) — PHP cannot run on Vercel.`);
    text = text.replace(new RegExp(PHP_BLOCK.source, 'g'), '');
  }

  const html = prefix + text;
  const head = html.trimStart().slice(0, 200).toLowerCase();
  if (!/^<!doctype html|^<html/.test(head)) {
    throw new Error(`[render] ${file}: rendered output does not look like an HTML document.`);
  }
  if (!/<\/html>\s*$/.test(html)) {
    throw new Error(`[render] ${file}: rendered output does not end with </html>.`);
  }
  return html;
}
