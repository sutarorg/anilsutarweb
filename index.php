<?php
// Stateless password gate for the home page.
//
// Unlike the case-study pages (bi.php, dw.php, ...), the correct password is
// NOT remembered anywhere - not in $_SESSION, not in a cookie, not in the
// visitor's browser. It is checked against the POSTed value on every request,
// so the page locks itself again as soon as the visitor leaves: the next
// visit always asks for the password again.
//
// The static (Vercel) build detects this page via PORTFOLIO_PASSWORD below and
// wraps the HTML in its AES-256-GCM unlock screen - with remembering disabled
// for exactly the same reason (see scripts/build-vercel.mjs).

$gate_pass = (string) getenv('PORTFOLIO_PASSWORD');
$gate_error = '';
$gate_ok = false;

if (isset($_POST['submit_pass'], $_POST['pass']) && (string) $_POST['pass'] !== '') {
    if ($gate_pass !== '' && hash_equals($gate_pass, (string) $_POST['pass'])) {
        $gate_ok = true; // unlocked for this response only - nothing is stored
    } else {
        $gate_error = 'Incorrect password. Please try again.';
    }
}

if ($gate_ok) {
?>
<html>
<head>
  <title>Anil Sutar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="revisit-after" content="7 days" />
  <meta name="Description" content="Anil Sutar" />
  <meta name="keywords" content="Anil Sutar" />

  <!-- index.php is the home page; /, /index.html and /index.php all serve it -->
  <link rel="canonical" href="https://anilsutar.in/" />


  <link href="favicon.ico" rel="icon" type="image/x-icon" />

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/aos.css" rel="stylesheet">
  <link href="css/extra.css" rel="stylesheet">
  <link href="css/text.css" rel="stylesheet">
  
  <script src="js/others.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>

  

  <script>
      $(window).on("load resize scroll", function() {
        $(".bg-static").each(function() {
          var windowTop = $(window).scrollTop() / 10;
          var elementTope = $(this).offset().top + 1600;
          var elementTop = $(this).offset().top + 1000;
          var leftPosition = windowTop - elementTop / 20;
          var rightPosition = windowTop - elementTope / 20;
            $(this)
              .find(".bg-move")
              .css({ left: leftPosition });
              $(this)
              .find(".bg-movee")
              .css({ right: rightPosition });
        });
      
        $(".bg-statics").each(function() {
          var windowTop = $(window).scrollTop() / 10;
          var elementTope = $(this).offset().top + 1600;
          var elementTop = $(this).offset().top + 1000;
          var leftPosition = windowTop - elementTop / 20;
          var rightPosition = windowTop - elementTope / 20;
            $(this)
              .find(".bg-move")
              .css({ right: rightPosition });
              $(this)
              .find(".bg-movee")
              .css({ left: leftPosition });
        });
      });     
      </script>
</head>

<body style="overflow-x:hidden;" oncontextmenu="return false" onselectstart="return false"
onkeydown="if ((arguments[0] || window.event).ctrlKey) return false">

  
<!--Mainmenu-->
<nav class="navbar navbar-expand-lg navbar-light whibg pr pt-1 pb-0">

  <div class="container">

    <!-- LOGO : LEFT -->
    <a class="navbar-brand mr-auto" href="index.php">
      <img src="img/anil-sutar-logo.png" height="80" alt="Anil Sutar"
        class="my-1 d-block d-lg-none">

      <span id="surround" class="d-none d-lg-block">
        <span id="initial">
          <img src="img/anil-sutar-logo.png" alt="Anil Sutar" height="80" class="my-2">
        </span>
        <span id="onhover">
          <img src="img/anil-sutar-logo-hover.png" alt="Anil Sutar" height="80" class="my-2">
        </span>
      </span>
    </a>

    <!-- TOGGLER -->
    <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#slide-navbar-collapse" aria-controls="slide-navbar-collapse"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- LINKS : RIGHT -->
    <div class="collapse navbar-collapse justify-content-end" id="slide-navbar-collapse">
      <ul class="navbar-nav mt-0 mt-lg-4">
        <li class="nav-item text-center">
          <a class="nav-link mr-2 ml-2 mt-2 sfproreg" href="work.php">
            <span class="blgre blnav blkfs18">Work</span>
          </a>
        </li>

        <li class="nav-item text-center">
          <div id="examples">
            <div class="example">
              <span class="hover hover-3">
                <a class="nav-link btnbg mr-2 ml-2 mt-2 px-4 sfprohev" href="index.php">
                  <span class="blgre blnav blkfs18">About</span>
                </a>
              </span>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </div>
</nav>

<!--Mainmenu-->


<div class="row m-0 p-0 p-lg-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-lg-4 col-12">
        <img src="img/anil-sutar-profile_new.png" class="w-100">
      </div>
      <div class="col-md-6 col-lg-6 col-12 pl-3 pl-lg-5">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-12">
                <h1 class="lorabold blabthd mt-0" style="font-size:35px;">Hi, I'm Anil Sutar!</h1><br>
                <p class="lorareg prftsz mt-3 blabtfv">
                I'm a Senior UX Product Designer passionate about designing AI-driven products that simplify complexity.<br> <p class="sfprolit blkfs18">I believe great products are built by understanding <strong>people</strong>,
<strong>business goals</strong>, and <strong>technology</strong> together.
Throughout my career, I've helped <strong>startups</strong> and
<strong>enterprise companies</strong> transform
<strong>complex problems</strong> into
<strong>intuitive digital experiences</strong> that are simple, scalable, and meaningful.<br>
                </p>
            </div>
            <div class="col-md-12 col-lg-12 col-12">
                <a href="Resume-AnilSutar (Sr. UX Product Designer).pdf" target="blank" class="py-2 mr-4"> <img src="img/My Resume.png"></a>
                <a href="https://www.instagram.com/anilrs2/" target="blank" class="py-2 mr-4"> <img src="img/instagram.png"></a>
                <a href="https://www.linkedin.com/in/anil-sutar-47653524/" target="blank" class="py-2 mr-5"> <img src="img/linkedin.png"></a>
                <a href="https://www.humanfactors.com/hfi-training/certification/cua_directorylist_byname.asp?listview=lastname&alphabet=S" target="blank" class="py-2"> <img src="img/hfi.jpg"></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row m-0 p-0 p-lg-4">
  <div class="container">
    <div class="row mb-5 pb-5">
      <div class="col-md-12 col-lg-12 col-12">
        <p class="sfprolit blkfs18">

My expertise spans the complete
<strong>product design lifecycle</strong>—from
<strong>user research</strong>,
<strong>product discovery</strong>,
<strong>information architecture</strong>,
<strong>user journeys</strong>,
<strong>interaction design</strong>,
<strong>prototyping</strong>,
<strong>usability testing</strong>, and
<strong>design systems</strong> to successful product delivery.
<br><br>
Over the years, I've designed products across
<strong>AI</strong>,
<strong>Enterprise SaaS</strong>,
<strong>FinTech</strong>,
<strong>Healthcare</strong>,
<strong>Telecom</strong>,
<strong>Automotive</strong>, and
<strong>Consumer applications</strong>.
I'm passionate about simplifying
<strong>complex workflows</strong>,
improving <strong>decision-making</strong>, and creating experiences users can
<strong>understand and trust</strong>.
<br><br>
Technology continues to evolve rapidly, especially with
<strong>AI</strong>, and I believe great designers should evolve with it.
I'm constantly exploring <strong>AI tools</strong>,
<strong>emerging technologies</strong>, and modern
<strong>product design practices</strong> while continuing to learn and improve every day.
        </p>
      </div>

      <div class="col-md-12 col-lg-12 col-12 py-5 text-center">
        <h2 class="sfprosb mb-5">My Journey to UI → UX → AI Product Design </h2>
        <img src="img/anir-sutar-journey_new.png"/>
      </div>
      <div class="col-md-12 col-lg-12 col-12 py-2">
        <h2 class="sfprosb">Let's connect!</h2>
        <p class="sfprolit blkfs18"><a href="mailto:anilrsutar@gmail.com">anilrsutar@gmail.com</a></p>
      </div>
      <div class="col-md-7 col-lg-7 col-12 pt-5">
        <h2 class="sfprosb">More About Me</h2>
        <p class="sfprolit blkfs18">I love Painting, Making thermocole articles, fitness, And love trying new things. </p>
      </div>
      <div class="col-md-5 col-lg-5 col-12 pt-0 pt-lg-5 text-center">
        <p class="sfprolit blkfs18 mt-4"><a href="/old-portfolio/"><u>Older Website</u></a></p>
      </div>
      <div class="col-md-12 col-lg-12 col-12 pt-0 pt-lg-5">
        <div class="hr-sect w-100 w-lg-50 sfprolit mx-auto small"><i>Paintings drawan by me</i></div>
      </div>
      <div class="col-md-4 col-lg-4 col-12 pt-3 pr-4">
        <img src="img/art01.jpg" class="w-100"/>
      </div>
      <div class="col-md-7 col-lg-7 col-12 pt-3 px-2">
        <img src="img/art02.jpg" class="w-100"/>
      </div>
    </div>
  </div>
</div>

<script>
  $('.carousel').carousel({
      cycle: true,
      pause: false
  })
</script>
<script src="js/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
<?php
}
else
{
?>
 <html>
<head>
  <title>Anil Sutar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <link href="favicon.ico" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/text.css">

</head>

<body style="overflow-x:hidden;">
<div class="row m-0 p-0 p-lg-4">
  <div class="container">
    <div class="row mb-5 pb-5">
      <div class="col-md-5 col-lg-5 col-12 mb-4 mx-auto mt-lg-5 pt-lg-5">
          <div class="border rounded mt-5 p-4">
            <h1 class="sfprohev blkfs18 mb-3 blgrehd">Enter Password</h1>
            <?php if ($gate_error !== '') { ?>
            <p class="sfprolit small" style="color: #a52a2a;"><?php echo htmlspecialchars($gate_error); ?></p>
            <?php } ?>
            <form method="post" action="" id="login_form" autocomplete="off">
              <div class="form-group">
                <input type="password" class="form-control sfprolit" name="pass" placeholder="Enter Password" autocomplete="current-password" required autofocus>
              </div>
              <div class="row">
                <div class="col-md-6 col-lg-6 col-6 pt-2">
                  <span class="sfprolit small">This page is private.</span>
                </div>
                <div class="col-md-6 col-lg-6 col-6 text-right">
                  <input type="submit" name="submit_pass" class="btn btn-primary border-0 sfprohev whicol rounded px-4" style="background-color: #6678a1;" value="OK">
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php
}
?>
