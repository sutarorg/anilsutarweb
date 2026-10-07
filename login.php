<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Sign in | Anil Sutar</title>

  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/login.css">
  <script src="/js/login.js" defer></script>
</head>
<body class="login-body">
  <header class="login-header">
    <nav class="container login-nav" aria-label="Main navigation">
      <a class="login-brand" href="/" aria-label="Anil Sutar home">
        <img src="/img/anil-sutar-logo.png" alt="Anil Sutar" width="193" height="80">
      </a>
      <a class="login-home-link sfproreg" href="/">About</a>
    </nav>
  </header>

  <main class="login-main">
    <section class="login-card" aria-labelledby="login-title">
      <div class="login-icon" aria-hidden="true">
        <i class="fa fa-lock"></i>
      </div>
      <p class="login-eyebrow sfprosb">Private portfolio</p>
      <h1 class="login-title sfprohev" id="login-title">Welcome to my work</h1>
      <p class="login-intro sfproreg">Sign in to explore selected projects and case studies.</p>

      <form class="login-form" id="work-login" novalidate>
        <div class="login-field">
          <label class="sfprosb" for="email">Email address</label>
          <input
            class="sfproreg"
            id="email"
            name="email"
            type="email"
            autocomplete="username"
            placeholder="you@example.com"
            required
            autofocus
          >
        </div>
        <div class="login-field">
          <label class="sfprosb" for="password">Password</label>
          <input
            class="sfproreg"
            id="password"
            name="password"
            type="password"
            autocomplete="current-password"
            placeholder="Enter your password"
            required
          >
        </div>
        <p class="login-feedback sfproreg" id="login-feedback" role="status" aria-live="polite"></p>
        <button class="login-submit sfprosb" type="submit" id="login-submit">
          Sign in <span aria-hidden="true">→</span>
        </button>
      </form>

      <a class="login-back sfproreg" href="/">← Back to home</a>
    </section>
  </main>
</body>
</html>
