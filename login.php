<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Work | Anil Sutar</title>

  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
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
    <section class="login-card" aria-label="Work access">
      <form class="login-form" id="work-login" novalidate>
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
            autofocus
          >
        </div>
        <p class="login-feedback sfproreg" id="login-feedback" role="status" aria-live="polite"></p>
        <button class="login-submit sfprosb" type="submit" id="login-submit">Submit</button>
      </form>
    </section>
  </main>
</body>
</html>
