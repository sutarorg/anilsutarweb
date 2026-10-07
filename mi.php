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
<html style="overflow-x:hidden;">
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
<div class="row m-0 p-0 p-lg-4 equbemibg">
  <div class="container">
    <div class="row py-3">
      <div class="col-md-6 col-lg-6 col-12" data-aos="fade-right" data-aos-duration="2000">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-12">
                <h1 class="lorasmbold hdbldcol blkfs50 mb-0">eQube MI</h1>
                <p class="sfprolit blgre blkfs25 blabtfv">Migration & Integration</p>
            </div>
            <div class="col-md-5 col-lg-5 col-12 pt-3">
                <p class="sfproreg blgre mb-0 blabtsm blkfs15">Role : <span class="sfprosb">UI UX Designer</span></p>
                <p class="sfprolit blgre small blabtfv">July 2017 - Ongoing</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">The Brief</p>
                <p class="sfprolit blgre blkfs15 blabtsm">eQube MI is the Application Integration Platform. It allows the users to integrate multiple enterprise applications like SAP, Teamcenter etc and migrate data from one enterprise application to another. The user can create and execute a process on the canvas which is a collection of related, structured activities or tasks that produces a specific product or serve a particular goal for the customer. It often can be visualized with a flowchart as a sequence of activities. It includes various activities like create trigger configuration, configure connections, transports, properties, nodes, logs, audit, create and debug MLV, manage user and their roles etc. eQube MI is a complex tool through which much of company’s revenue is generated.</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">Design Challenge</p>
                <p class="sfprolit blgre blkfs15 mb-0 blabtsm">Redesign of the complete eQube MI application with additional features to build a cohesive experience that feels seamless and familiar to the user and provide them a better way to Control & Manage the data during migration and application integration.</p>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 pl-0 pl-lg-5">
        <img src="img/mi.png" class="w-100 mt-5 pt-3" data-aos="fade-left" data-aos-duration="2000"/>
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
                    <div class="col-md-6 col-lg-6 col-12">
                            <img src="img/mi02.jpg" class="w-100 px-3 px-lg-0" data-toggle="modal" data-target="#exampleModal"/>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdblcol mb-2 blkfs20">Research & Analysis</p>
                        <p class="sfprolit blgre blkfs15 pr-0 pr-lg-5">In my role as UI/UX designer I started evaluating the existing design page by page to understand the pain points and finding opportunities with usability improvements. I conducted an expert review of the complete application and focused on Nielsen's 10 usability heuristics followed by the competitive analysis of the similar products like IBM Infosphere, Microsoft SQL, Oracle Data Service Integrator etc. A competitive analysis revealed the strengths, weaknesses, similarities, and differences between competitors.</p>
                    </div>
                </div>

                <div class="row mt-0 mt-lg-5 pt-0 pt-lg-5">
                    <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdblcol mb-2 blkfs20 pt-0 pt-lg-5">Visual Thinking on Paper</p>
                        <p class="sfprolit blgre blkfs15">In order to help understand many of the complex processes involved in eQube MI, I mapped workflows on paper. Doing so helped me to understand the particular points where our system could help minimise some of the pain points as well as highlight opportunities where we could really try to improve.</p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <img src="img/mi03.jpg" class="w-100 px-3 px-lg-0"/>
                    </div>
                </div>

                <div class="row mt-0 mt-lg-5 pt-0 pt-lg-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdblcol mb-2 blkfs20">Structuring Content First</p>
                        <p class="sfprolit blgre blkfs15">Before starting any design, I spent a great deal of time making sense of app flows and existing content. I face particular challenges with labelling and terminology as we found that language varied between enterprise and another apps. Mapping out the sitemap is also challenging as it involves many different touch‑points with many developers as users.</p>
                    </div>
                    <div class="col-md-12 col-lg-12 col-12">
                        <img src="img/mi04.jpg" class="w-100 px-3 px-lg-0"/>
                    </div>
                </div>

                <div class="row mt-0 mt-lg-5 pt-0 pt-lg-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdblcol mb-2 blkfs20">Sketching Interfaces</p>
                        <p class="sfprolit blgre blkfs15">Instead of wireframing, I opted to sketch my designs on paper. I used paper prototyping techniques to bring the designs to life and evaluate them with our users. This helped me work rapidly and led me to consider more ideas. Sketching many concepts helped me form a broader view of the system 
                                earlier ensuring a more cohesive design.</p>
                    </div>
                </div>

                <div class="row mt-0 mt-lg-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdblcol mb-2 blkfs20">Mid-fidelity wireframing</p>
                        <p class="sfprolit blgre blkfs15">Once I validated conceptual sketches with teams and managers and satisfied with the workflows, I started to work on the user interface itself. I started with a medium fidelity wireframing and then refine it to communicate with teams and provide a common understanding.</p>
                    </div>
                </div>
        </div>
        <div class="col-md-12 col-lg-11 col-12 mx-auto mt-4">
            <!--Lightbox-->
            <div class="row mt-5">
                    <div class="column">
                      <img src="img/mi05.png" onclick="openModal();currentSlide(1)" class="hover-shadow cursor w-100 px-3 px-lg-0"/>
                    </div>
                  </div>
                  
                  <div id="myModal" class="modal">
                        <span class="close cursor" onclick="closeModal()">&times;</span>
                        <div class="modal-content">
                      
                          <div class="mySlides">
                            <div class="numbertext">1 / 4</div>
                            <img src="img/create-process-1.png" style="width:100%">
                          </div>
                      
                          <div class="mySlides">
                            <div class="numbertext">2 / 4</div>
                            <img src="img/homepage-processes–1.png" style="width:100%">
                          </div>
                      
                          <div class="mySlides">
                            <div class="numbertext">3 / 4</div>
                            <img src="img/homepage-processes–2.png" style="width:100%">
                          </div>
                          
                          <div class="mySlides">
                            <div class="numbertext">4 / 4</div>
                            <img src="img/homepage-processes.png" style="width:100%">
                          </div>
                          
                          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                          <a class="next" onclick="plusSlides(1)">&#10095;</a>
                      </div>
                    </div>
            <!--Lightbox-->
        </div>
        <div class="col-md-11 col-lg-10 col-12 mx-auto">
            <div class="row mt-0 mt-lg-5">
                <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5">
                    <p class="sfprosb hdblcol mb-2 blkfs20" data-aos="fade-up" data-aos-duration="2000">Prototyping and Usability Testing</p>
                    <p class="sfprolit blgre blkfs15" data-aos="fade-up" data-aos-duration="2000">I work closely with our developers team to bring our designs to life as a working prototype. Communicating requirements face-to-face and discussing constraints and possibilities is an effective way of solving the Interaction Design. We work collaboratively, test constantly and iterate progressively.</p>
                    <iframe style="width:100%; height:500px;" src="https://www.youtube.com/embed/t9ooBvckyaw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            <div class="row mt-0 mt-lg-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                    <p class="sfprosb hdblcol mb-2 blkfs20">Hi-fidelity Mockups</p>
                    <p class="sfprolit blgre blkfs15">To move forward with the design I use adobe XD or Photoshop to create sets of detailed visual mockups. This approach is beneficial in showing our stakeholders design progress.</p>
                </div>
            </div>    
        </div>
        <div class="col-md-11 col-lg-12 col-12 mx-auto">
            <div class="row mt-5">
                    <!--Lightbox-->
            <div class="row">
                    <div class="col-md-6 col-lg-6 col-12">
                    <div class="column">
                        <img src="img/mi-screenshot01.png" onclick="openModalone();currentSlides(1)" class="hover-shadow cursor w-100 mb-3 mb-lg-0"/>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                    <div class="column">
                        <img src="img/mi-screenshot02.png" onclick="openModalone();currentSlides(2)" class="hover-shadow cursor w-100"/>
                    </div>
                    </div>
                  </div>
                  
                  <div id="myModalone" class="modal">
                        <span class="close cursor" onclick="closeModalone()">&times;</span>
                        <div class="modal-content">
                      
                          <div class="mySlide">
                            <div class="numbertext">1 / 2</div>
                            <img src="img/mi-screenshot01.png" style="width:100%">
                          </div>

                          <div class="mySlide">
                            <div class="numbertext">2 / 2</div>
                            <img src="img/mi-screenshot02.png" style="width:100%">
                          </div>
                      
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                      </div>
                    </div>
            <!--Lightbox-->
                </div>
            </div>
        </div>
        <div class="col-md-11 col-lg-10 col-12 mx-auto">
            <div class="row mt-5 mb-5 pb-5">
              <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-4 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                <p class="sfprolit blgre blkfs15">
                For a good period now, the dark mode design is trending in both web and mobile design. Dark mode is a low-light user interface (UI) that uses a dark color—usually black or a shade of grey—as the primary background color. It’s a reversal of the default white UI that designers have used for decades. 
                I designed a visual UI style guide which record all of the design elements and interactions that occur within a product, UX components (buttons, typography, color, navigation menus, etc.) like hover states, dropdown fills, animations, etc.</p>
              </div>
            </div>    
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
