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
| `PORTFOLIO_PASSWORD` | Password that unlocks the protected case studies. If it is not set, those pages show a "not configured" notice instead of their content. |
| `PORTFOLIO_PUBLIC_WORK` | Set to `1` to publish the protected pages as plain HTML, with no password at all. |

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
/                  →  public/index.html        (the legacy homepage, as today)
/index.php         →  public/pages/index.html  (modern portfolio)
/about_me.html     →  public/about_me.html     (1:1 static copy)
/anything-else     →  public/...               (1:1 static copy)
```

The rendering was verified **byte for byte** against real PHP output
(`npm run verify:render` → *9 pages, 9 byte-identical, 0 failing*), so nothing
changes for visitors.

**2. The protected case studies keep their password — without a server.**
`bi.php`, `dw.php`, `mc.php`, `mi.php`, `tm.php`, `work.php` and `work2.php`
read `PORTFOLIO_PASSWORD`. At build time their HTML is encrypted with
**AES-256-GCM** (key derived from the password with PBKDF2-SHA256, 310 000
rounds) and wrapped in a small unlock page. The visitor's browser decrypts it
with WebCrypto after the correct password is entered; the plaintext is never
part of the deployed site and the password is never stored anywhere.

Notes:

* The password is remembered per browser tab (`sessionStorage`), so reloading a
  case study does not ask again.
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

`npm run dev` is the closest thing to production you can get locally, including
the password gate: open http://localhost:3000/work.php.

---

## Repository notes

* **Included in the deployment:** everything at the top level, plus `css/`,
  `js/`, `fonts/`, `img/`, `images/`, `documents/`, `flashpages/`,
  `iphone_ph2_v2/` and `wireframes_iphone_ios7/` (the last two are linked from
  the case studies).
* **Excluded from the deployment** (still in Git, just not uploaded):
  `old-portfolio/` (an archived copy of an earlier site generation, linked only
  as an absolute URL to the old host), `test/` (leftover server-language
  probes), source maps, `Thumbs.db`, `web.config`, `.user.ini`, and the build
  tooling. Change `EXCLUDE_PATHS` in `scripts/build-vercel.mjs` (and
  `.vercelignore`) if you want any of them online.
* **Static upload size:** ~70 MB, within Vercel's 100 MB limit for the Hobby
  plan. If you later add large media, keep an eye on it.
* **Dead Flash content:** the `.swf` greeting cards are kept for the archive;
  no current browser can play them.
* **Known missing assets:** a handful of fonts/images referenced by the old
  stylesheets (`AvenirLTStd-*.otf`, `img/obot*.png`, `img/farm-finest-*.png`, …)
  are missing from this backup and already returned 404 on the old host.
  `npm run check` lists them separately and they are safe to ignore.
