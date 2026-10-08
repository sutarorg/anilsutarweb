<!DOCTYPE html>
<html lang="en" class="work-auth-pending">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    (function () {
      var accessKey = 'anilsutar.workAccess';
      try {
        if (window.sessionStorage.getItem(accessKey) === 'granted') {
          document.documentElement.classList.remove('work-auth-pending');
          return;
        }
      } catch (error) {
        // If browser storage is unavailable, keep the page locked and send the visitor to enter the password.
      }
      window.location.replace('/login.php');
    }());
  </script>
  <style>
    html.work-auth-pending body { visibility: hidden; }
  </style>
  <title>Anil Sutar</title>
  <meta name="revisit-after" content="7 days" />
  <meta name="Description" content="Anil Sutar" />
  <meta name="keywords" content="Anil Sutar" />


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

  
  <style>
	 .project-link {
  font-size: 18px;
  font-weight: 600;
  text-decoration: none;
		 padding:10px 25px;
	background-color:#e03e28;
		 border-radius:200px;
		 color:#ffffff;
}

.project-link:hover {
  text-decoration: none;
	color:#ffffff;
	background-color:#9f1300;
}
 
	</style>
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
<nav class="navbar navbar-expand-lg whibg pr pt-1 pb-0">

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
          <a class="nav-link mr-2 ml-2 mt-2 sfprohev" href="work.php">
            <span class="blgre blnav blkfs18">Work</span>
          </a>
        </li>

        <li class="nav-item text-center">
          <div id="examples">
            <div class="example">
              <span class="hover hover-3">
                <a class="nav-link btnbg mr-2 ml-2 mt-2 px-4 sfproreg" href="index.php">
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


<div class="row m-0 p-0 pt-lg-0 pb-lg-4 px-lg-4">
  <div class="container">
    <div class="row mb-5 pb-5">
      <div class="col-md-12 col-lg-12 col-12 d-flex justify-content-between align-items-center">

<h1 class="sfprolit blkfs18 blgre"></h1>
	  <a href="https://www.figma.com/proto/qMrUk1T5NtkT3q8c2kGQ4Z/My-Portfolio---2025?node-id=1-2&t=28cquacyW3PFCm7t-0&scaling=min-zoom&content-scaling=fixed&page-id=0%3A1&starting-point-node-id=1%3A2" class="sfprolit blgre project-link" target="blank">Recent Case Studies →</a>
	</div>
		
		<div class="col-md-12 col-lg-12 col-12 d-flex justify-content-between align-items-center">
	  <h1 class="sfprolit blkfs18 blgre">Earlier Case Studies</h1>


	</div>
      <div class="col-md-6 col-lg-6 col-12 mb-4" data-aos="fade-up" data-aos-duration="2000">
        <a href="mi.php">
          <div class="blkone px-4 pb-4">
			<p class="sfprolit blkfs20 mb-3 blgre">Enterprise</p>
            <h1 class="sfprosb blkfs18 mb-1 blgrehd">MI-Migration & Integration</h1>
            <p class="sfprolit blkfs16 mb-0 blgre">An Application Integration Plateform</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mb-4" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
        <a href="mc.php">
          <div class="blktwo px-4 pb-4">
            <p class="sfprolit blkfs20 mb-3 blgre">Security</p>
            <h1 class="sfprosb blkfs18 mb-1 blgrehd">Mobile Center</h1>
            <p class="sfprolit blkfs16 mb-1 blgre">Security Management Solution</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mb-4 mt-2" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
        <a href="dw.php">
          <div class="blkthr px-4 pb-4">
            <p class="sfprolit blkfs20 mb-3 blgre">Sales</p>
            <h1 class="sfprosb blkfs18 mb-1 blgrehd">Dealwall</h1>
            <p class="sfprolit blkfs16 mb-0 blgre">Collaborate and close deals faster</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mb-4 mt-2" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="900">
        <a href="tm.php">
          <div class="blkfor px-4 pb-4">
            <p class="sfprolit blkfs20 mb-3 blgre">Enterprise</p>
            <h1 class="sfprosb blkfs18 mb-1 blgrehd">TM-Transformation Modeler</h1>
            <p class="sfprolit blkfs16 mb-1 blgre">Data modelling and Mapping solutions</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mb-4 mt-2" data-aos="fade-up" data-aos-duration="2000">
        <a href="bi.php">
          <div class="blkfiv px-4 pb-4">
            <p class="sfprolit blkfs20 mb-3 blgre">Enterprise</p>
            <h1 class="sfprosb blkfs18 mb-1 blgrehd">BI-Business Intelligence</h1>
            <p class="sfprolit blkfs16 mb-1 blgre">Making complex data easier to understand</p>
          </div>
        </a>
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
