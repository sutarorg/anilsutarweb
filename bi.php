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

if($_SESSION['password'])
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
  <link href="../css/aos.css" rel="stylesheet">
  <link href="css/extra.css" rel="stylesheet">
  <link href="css/text.css" rel="stylesheet">
  
  <script src="js/others.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>

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


<!-- Banner-->
<div class="row m-0 p-0 p-lg-4 equbebibg">
  <div class="container">
    <div class="row py-3">
      <div class="col-md-6 col-lg-6 col-12" data-aos="fade-right" data-aos-duration="2000">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-12">
                <h1 class="lorasmbold hdblbicol blkfs50 mb-0">eQube BI</h1>
                <p class="sfprolit blgre blkfs25 blabtfv">Business Intelligence</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">Project Overview</p>
                <p class="sfprolit blgre blkfs15 blabtsm">
                  <b>Making complex data easier to understand</b><br><br>
                  If you are a business analyst or if you simply send frequently reports to clients or managers, then you know how difficult and time consuming it is to create nice and effective reports. eQube is a Business Intelligence and analytical tool. It’s a web based tool which allows users to analyse their business data. A huge data is stored in multiple data sources and its very difficult to read and analyse the required data as its stored in different sources in various formats. eQube BI helps to fetch the relevant data from the data source with the help of connectors like Teamcenter, oracle etc and helps in creating the reports and dashboard based on the business logic applied. Users can generate variety of dynamically updated charts and visualizations which are live.
                </p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">My Role</p>
                <p class="sfprolit blgre blkfs15 mb-0 blabtsm">
                  User research, User testing, Prototyping, Wireframing and Visual design<br><br>
                  I focus on creating a more human experience for users to help them better understand their data and make better decisions for their business. While I cannot share all of my work, here are some project tasks during my time in eQube BI.<br><br>
                  <b>Tools:</b><br>
                  Adobe XD (wireframes, visual designs prototype, UI UX deliverables), Photoshop (visual mockups), 
                </p>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 pl-0 pl-lg-5">
        <img src="img/bi.png" class="w-100 mt-5 pt-3" data-aos="fade-left" data-aos-duration="2000"/>
      </div>
    </div>
  </div>
</div>
<!--Banner-->

<div class="row my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-lg-10 col-12 mx-auto">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdblbicol mb-2 blkfs20">Design Process</p>
                        <p class="sfprosb hdblbicol mb-2 blkfs18">Discovery</p>
                        <p class="sfprolit blgre blkfs15">
                          eQube BI is a huge web based application and it has tons of features and functionalities which keep on revamping to deliver the best user experience possible. Before diving into the features and the overall UX of the product, I establish brainstorming session, user interviews to understand the requirement into detail. This approach allowed me to gain deeper insights about the problem to be solved and identifying the objective.<br><br>
                          <b>Designing the foundations for a usable interface</b><br>
                          As soon as we are all at the same page concerning the objectives, I start working on userflows and how to achieve tasks in the app. I work on different directions which I validate with the teams. Here is the sample of completing a  task of migrate mapping userflow.
                        </p>
                        <img src="img/bi02.jpg" class="w-100"/>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdblbicol mb-2 blkfs18">Sketching the interface and modules</p>
                        <p class="sfprolit blgre blkfs15">
                          I sketch various solutions and ran user tests to find the best way to integrating the newly defined functions.
                        </p>
                        <img src="img/bi03.jpg" class="w-100"/>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdblbicol mb-2 blkfs18">Mid-fidelity wireframing</p>
                        <p class="sfprolit blgre blkfs15">Once I validate navigation principles with teams and managers and we all satisfied with the rough ideas on <br>paper, I lstart with a low fidelity wireframing and then refine it to communicate with teams and provide a <br>common understanding. </p>
                    </div>
                </div>
        </div>
        <div class="col-md-12 col-lg-11 col-12 mx-auto mt-4">
            <!--Lightbox-->
            <div class="row mt-5">
                    <div class="column">
                      <img src="img/bi04.png" onclick="openModal();currentSlide(1)" class="hover-shadow cursor w-100"/>
                    </div>
                  </div>
                  
                  <div id="myModal" class="modal">
                        <span class="close cursor" onclick="closeModal()">&times;</span>
                        <div class="modal-content">
                      
                          <div class="mySlides">
                            <div class="numbertext">1 / 4</div>
                            <img src="img/bi-processes-1.png" style="width:100%">
                          </div>
                      
                          <div class="mySlides">
                            <div class="numbertext">2 / 4</div>
                            <img src="img/bi-processes-2.png" style="width:100%">
                          </div>
                      
                          <div class="mySlides">
                            <div class="numbertext">3 / 4</div>
                            <img src="img/bi-processes-3.png" style="width:100%">
                          </div>
                          
                          <div class="mySlides">
                            <div class="numbertext">4 / 4</div>
                            <img src="img/bi-processes-4.png" style="width:100%">
                          </div>
                          
                          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                          <a class="next" onclick="plusSlides(1)">&#10095;</a>
                      </div>
                    </div>
            <!--Lightbox-->
        </div>
        <div class="col-md-11 col-lg-10 col-12 mx-auto">
            <div class="row mt-5">
                <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5">
                    <p class="sfprosb hdblbicol mb-2 blkfs18" data-aos="fade-up" data-aos-duration="2000">Prototype</p>
                    <p class="sfprolit blgre blkfs15" data-aos="fade-up" data-aos-duration="2000">
                      Keeping the user's needs and pain points in mind I come up with my final version of the design and create a prototype to start my testing with the users. For that, I quickly jump onto Adobe XD to create an interactive prototype in order to test dynamically the tool and validate all the principles.
                    </p>
                    <iframe style="width:100%; height:500px;" src="https://www.youtube.com/embed/kIvCWYb-86A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="row equmibg">
    <div class="container">
        <div class="row">
        <div class="col-md-11 col-lg-10 col-12 mx-auto">
            <div class="row mt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                    <p class="sfprosb hdblbicol mb-2 blkfs18">Visual Mockups</p>
                    <p class="sfprolit blgre blkfs15">
                      With the skeleton and the prototype validated and tested, I work on the User Interface. I pick up the relevant UI components from the visual library (which I keep updating and modifying) and arrange it properly on the screen real estate. 
                    </p>
                </div>
            </div>    
        </div>
        <div class="col-md-11 col-lg-12 col-12 mx-auto">
          <img src="img/bi05.png" class="w-100"/>
        </div>
        <div class="col-md-11 col-lg-10 col-12 mx-auto">
            <div class="row mt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                    <p class="sfprosb hdblbicol mb-2 blkfs18">Design Style Guide</p>
                    <p class="sfprolit blgre blkfs15">
                      For a good period now, the dark mode design is trending in both web and mobile design. Dark mode is a low-light user interface (UI) that uses a dark color—usually black or a shade of grey—as the primary background color. It’s a reversal of the default white UI that designers have used for decades. 
                      I created style tile as a guide for the visual design of the app. It included all of the design elements and interactions that occur within a product, UX components (color palette, buttons, typography styles, imagery, navigation menus, popup designs etc.) like hover states, dropdown fills, animations, etc.<br><br>

                      I want to keep the interface simple and minimal, yet colorful as well as playful and attractive. Colors quickly inform the user what he/she can interact with and where the important pieces of information can be found. 
                    </p>
                </div>
            </div>    
        </div>
        <div class="col-md-11 col-lg-11 col-12 mx-auto mb-5 pb-5">
          <img src="img/bi06.jpg" class="w-100 mt-4"/>
          <img src="img/bi07.jpg" class="w-100 my-5"/>
        </div>
        </div>
    </div>
</div>

<!--<script>
$('#exampleModal').modal();

function afterModalTransition(e) {
  e.setAttribute("style", "display: none !important;");
}
$('#exampleModal').on('hide.bs.modal', function (e) {
	setTimeout( () => afterModalTransition(this), 200);
})

</script>-->
<script>
  function openModal() {
    document.getElementById("myModal").style.display = "block";
  }
  
  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }

  function openModalone() {
    document.getElementById("myModalone").style.display = "block";
  }
  
  function closeModalone() {
    document.getElementById("myModalone").style.display = "none";
  }
  
  var slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }

  function currentSlides(n) {
    showSlide(slideIndex = n);
  }
  
  function showSlide(n) {
    var i;
    var slides = document.getElementsByClassName("mySlide");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
  </script>

<script src="../js/aos.js"></script>
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
  <link href="../css/aos.css" rel="stylesheet">
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
