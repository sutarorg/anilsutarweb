<?php
session_start();
$match = getenv('PORTFOLIO_PASSWORD');

if(isset($_POST['submit_pass']) && $_POST['pass'])
{
 $pass=$_POST['pass'];
 if($pass==$match)
 {
  $_SESSION['password']=$pass;
 }
 else
 {
  $error="Incorrect Pssword";
 }
}

if(isset($_POST['page_logout']))
{
 unset($_SESSION['password']);
}
?>
<?php
if($_SESSION['password']==$match)
{
 ?>
 <html>
<head>
  <title>Anil Sutar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<nav class="navbar navbar-expand-lg navbar-light whibg pr pt-1 pb-2">
    <div class="container">
      <div class="row m-0 w-100">
      <div class="col-md-6 col-lg-7 col-4">
        <a class="navbar-brand ml-lg-4" href="index.php">
          <img src="img/anil-sutar-logo.png"  height="80" alt="Anil Sutar" class="my-1 d-block d-sm-block d-xs-block d-md-block d-lg-none">
          <span id="surround">
              <span id="initial"><img src="img/anil-sutar-logo.png"  alt="Anil Sutar" height="80" class="mr-auto my-2 ml-5 d-none d-sm-none d-xs-none d-md-none d-lg-block"></span>
              <span id="onhover"><img src="img/anil-sutar-logo-hover.png"  alt="Anil Sutar" height="80" class="mr-auto my-2 ml-5 d-none d-sm-none d-xs-none d-md-none d-lg-block"></span>
          </span>
        </a>
      </div>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#slide-navbar-collapse" aria-controls="slide-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="col-md-6 col-lg-5 col-12">
    <div class="collapse navbar-collapse" id="slide-navbar-collapse">
      <ul class="navbar-nav mr-auto mt-0 mt-lg-4 ml-lg-4">
        <li class="nav-item text-center">
          <a class="nav-link mr-2 ml-2 mt-2 sfprohev" href="work.php"><span class="blgre blnav">Work</span></a>
        </li>
        <li class="nav-item text-center">
          <div id="examples">
            <div class="example">
              <span class="hover hover-3"><a class="nav-link btnbg mr-2 ml-2 mt-2 px-4 sfproreg" href="index.php"><span class="blgre blnav">About</span></a></span>
          </div>
          </div>
          </li> 
      </ul>
    </div>
    </div>
  </div>
  </nav>
<!--Mainmenu-->


<div class="row m-0 p-0 p-lg-4">
  <div class="container">
    <div class="row mb-5 pb-5">
      <div class="col-md-12 col-lg-12 col-12">
        <h1 class="sfprolit blkfs18 blgre">Projects</h1>
      </div>
      <div class="col-md-6 col-lg-6 col-12 mb-4" data-aos="fade-up" data-aos-duration="2000">
        <a href="mi.php">
          <div class="blkone px-4 pb-4">
            <h1 class="sfprosb blkfs18 mb-1 blgrehd">MI-Migration & Integration</h1>
            <p class="sfprolit blkfs16 mb-0 blgre">An Application Integration Plateform</p>
          </div>
        </a>
      </div>
		 <div class="col-md-6 col-lg-6 col-12 mb-4" data-aos="fade-up" data-aos-duration="2000">
        <a href="mi.php">
          <div class="blkone px-4 pb-4">
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
  <meta name="revisit-after" content="7 days" />
  <meta name="Description" content="Anil Sutar" />
  <meta name="keywords" content="Anil Sutar" />


  <link href="favicon.ico" rel="icon" type="image/x-icon" />

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/aos.css" rel="stylesheet">
  <link href="css/extra.css" rel="stylesheet">
  <link href="css/text.css" rel="stylesheet">

</head>

<body style="overflow-x:hidden;">
<div class="row m-0 p-0 p-lg-4">
  <div class="container">
    <div class="row mb-5 pb-5">
      <div class="col-md-5 col-lg-5 col-12 mb-4 mx-auto mt-lg-5 pt-lg-5">
          <div class="password border rounded mt-5 p-4">
            <h1 class="sfprohev blkfs18 mb-3 blgrehd">Enter Password</h1>
            <form method="post" action="" id="login_form">
              <div class="form-group">
                <input type="password" class="form-control sfprolit" name="pass" placeholder="Enter Password">
              </div>
              <div class="row">
                <div class="col-md-6 col-lg-6 col-6 pt-2">
                  <a href="index.php" class="sfprolit small"> < Go Home</a>
                </div>
                <div class="col-md-6 col-lg-6 col-6 text-right">
				  <input type="submit" name="submit_pass" class="btn btn-primary border-0 sfprohev whicol rounded px-4" style="background-color: #6678a1;" value="OK">
                </div>
              </div>
            </form>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
 <?php	
}
?>
