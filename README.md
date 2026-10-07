# Anil Sutar — portfolio site

The source of **anilsutar.com**: a modern portfolio (`.php` pages, Bootstrap, AOS)
plus the older static site and the carried-over prototype archives.

The repository is set up to deploy to **Vercel as a fully static site** — no PHP
runtime, no server to maintain, nothing that can go down.

```bash
npm run dev      # build + preview on http://localhost:3000
npm run build    # produce the deployable site in public/
```

---

## Deploy to Vercel

### Option A — from Git (recommended, gives you previews on every change)

1. Push this repository to GitHub.
2. On Vercel: **Add New → Project → Import** the repository. Everything needed is
   already in `vercel.json`:

   | Setting | Value |
   | --- | --- |
   | Framework preset | Other (auto-detected, `framework: null`) |
   | Build command | `node scripts/build-vercel.mjs` |
   | Output directory | `public` |

3. Add the environment variable for the protected case studies:
   **Project → Settings → Environment Variables**

   | Name | Value | Environments |
   | --- | --- | --- |
   | `PORTFOLIO_PASSWORD` | the password you hand out with the case studies | Production, Preview, Development |

4. **Deploy.** That is the whole setup.

### Option B — with the Vercel CLI

```bash
npm i -g vercel
vercel env add PORTFOLIO_PASSWORD production   # or set it in the dashboard
vercel --prod
```

---

## Environment variables

| Variable | Purpose |
| --- | --- |
| `PORTFOLIO_PASSWORD` | Password that unlocks the individually protected case studies. If it is not set, those pages show a "not configured" notice instead of their content. |
| `PORTFOLIO_PUBLIC_WORK` | Set to `1` to publish those protected case-study pages as plain HTML, with no password at all. |

Locally, `npm run build` / `npm run dev` also read `.env` and `.env.local`
(git-ignored); real environment variables always win.

Changing the password only requires changing the variable and redeploying — the
encrypted pages are rebuilt from it.

---

## How the deployment works

**1. The PHP pages are rendered at build time.**
Vercel does not run PHP. `scripts/build-vercel.mjs` renders each top-level
`*.php` page into plain HTML in `public/pages/`, and `vercel.json` keeps every
existing URL working:

```
/                  →  public/index.html         (home page — rendered from index.php)
/index.php         →  public/pages/index.html   (the same home page, old URL kept)
/login.php         →  public/pages/login.html   (separate sign-in page)
/work.php          →  public/pages/work.html    (work page)
/home.html         →  public/home.html          (legacy 2009 homepage + archive nav)
/old-portfolio/    →  public/old-portfolio/     (older site on this domain)
/anything-else     →  public/...                (1:1 static copy)
```

The PHP-to-HTML rendering can be checked against real PHP output with
`npm run verify:render` (install the optional `php-wasm` package first).

**2. Case-study pages can be password-protected without a server.**
`bi.php`, `dw.php`, `mc.php`, `mi.php`, `tm.php` and `work2.php` read
`PORTFOLIO_PASSWORD`. At build time their HTML is encrypted with
**AES-256-GCM** (key derived from the password with PBKDF2-SHA256, 310 000
rounds) and wrapped in a small unlock page. The visitor's browser decrypts it
with WebCrypto after the correct password is entered; the plaintext is not
included in the deployed page files.

**3. `/work.php` has a separate frontend-only sign-in page.**
Visitors who open `/work.php` are sent to `/login.php`; a successful sign-in
returns them to the work page. The credentials and access check are in
`js/login.js`, as requested. This is only a convenience gate, not secure access
control: anyone can inspect the deployed frontend or bypass browser storage.
Do not use it to protect sensitive information.

Notes:

* A protected case-study password is remembered per browser tab
  (`sessionStorage`), so reloading a case study does not ask again.
* Because the encrypted page is public, a weak password could be brute-forced
  offline — use something reasonable.
* If the whole repository is public, remember that the *page source* is in the
  `.php` files there. Keep the repo private (or move those files) if that
  matters to you.

---

## Local commands

| Command | What it does |
| --- | --- |
| `npm run dev` | Builds the site and serves it at http://localhost:3000 with the same URL rules as Vercel. |
| `npm run build` | Builds into `public/`. |
| `npm run preview` | Serves an existing build (no rebuild). |
| `npm run check` | Scans the built site for broken links, missing assets and case-sensitivity bugs. |
| `npm run verify:render` | Optional: compares the static pages against real PHP (`npm install --no-save php-wasm` first). |

`npm run dev` is the closest thing to production you can get locally. Opening
http://localhost:3000/work.php sends you to the separate sign-in page first.

---

## The home page

`index.php` is the home page of the site — the modern portfolio.

* **On Vercel (static):** the build renders `index.php` and writes the result to
  `public/index.html`, so `/`, `/index.html` and `/index.php` all show it. This
  is the static stand-in for `DirectoryIndex index.php`, which static hosting
  has no equivalent for.
* **On the PHP host:** `web.config` (IIS) and `.htaccess` (Apache) list
  `index.php` first as the default document, so a request for `/` is served by
  `index.php`.
* **The legacy 2009 homepage** is still there, at `/home.html`; the old pages
  under it (`about_me.html`, `websites.html`, `graphic_design.html`,
  `2d_animation.html`, `interest.html`, `contact.html`, the `sample_*.html` and
  `painting*.html` galleries) link back to it from their HOME links.

So there is exactly one home page — `index.php` — and the old homepage and its
archive stay reachable without any redirects in between. `index.php` carries a
`rel="canonical"` pointing at `https://anilsutar.com/` so the three equivalent
addresses (`/`, `/index.html`, `/index.php`) do not compete in search results.

## Repository notes

* **Included in the deployment:** everything at the top level, plus `css/`,
  `js/`, `fonts/`, `img/`, `images/`, `documents/`, `flashpages/`,
  `old-portfolio/`, `iphone_ph2_v2/` and `wireframes_iphone_ios7/` (the latter
  two are linked from the case studies). The older site is available on this
  domain at `/old-portfolio/`.
* **Excluded from the deployment** (still in Git, just not uploaded): `test/`
  (leftover server-language probes), source maps, `Thumbs.db`, `web.config`,
  `.htaccess`, `.user.ini`, and the build tooling. Change `EXCLUDE_PATHS` in
  `scripts/build-vercel.mjs` (and `.vercelignore`) if needed.
* **Static upload size:** about 85 MB with the older-site archive included
  (roughly 16 MB); this is under Vercel Hobby's 100 MB limit, so keep an eye on
  size when adding more media.
* **Dead Flash content:** the `.swf` greeting cards are kept for the archive;
  no current browser can play them.
* **Known missing assets:** a handful of fonts/images referenced by the old
  stylesheets (`AvenirLTStd-*.otf`, `img/obot*.png`, `img/farm-finest-*.png`, …)
  are missing from this backup and already returned 404 on the old host.
  `npm run check` lists them separately and they are safe to ignore.
