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
<div class="row m-0 p-0 equbedwbg">
    <div class="row p-0">
      <div class="col-md-7 col-lg-7 col-12 p-0">
        <img src="img/dw01.png" class="w-100 mt-5 pt-3 mb-0" data-aos="fade-right" data-aos-duration="2000"/>
      </div>
      <div class="col-md-5 col-lg-5 col-12 py-4 pr-0 pr-lg-5" data-aos="fade-left" data-aos-duration="2000">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-12 px-5 px-lg-0">
                <h1 class="lorasmbold hddwcol blkfs50 mb-0">Dealwall</h1>
                <p class="sfprolit blgre blkfs25 blabtfv">iPad, iPhone, Android, Web App</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3 px-5 px-lg-0">
                <p class="sfprosb blgre mb-2 blkfs20">The Brief</p>
                <p class="sfprolit blgre blkfs15 blabtsm">Dealwall is a deal app for account and sale executives to collaborate on deals from any device, anyplace, anytime. It helps companies grow revenues while improving sales force productivity by making the sales people working closely with deal teams and customers to close deals faster.                 </p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3 px-5 px-lg-0">
                <p class="sfprosb blgre mb-2 blkfs20">Goal</p>
                <p class="sfprolit blgre blkfs15 blabtsm">To design a centralized and collaborative framework which allows the users to store the relevant data at one location and it addresses two mental models "get in touch" with a person or group  and "what's going on" in my deal. I need to review, analyze and act</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3 px-5 px-lg-0">
                <p class="sfprosb blgre mb-2 blkfs20">My Role</p>
                <p class="sfprolit blgre blkfs15 mb-0 blabtsm">
                    I was involved in everything from defining the brand and personas, creating flows and wireframes, all the way to creating final UI designs as well as designing the logo.<br>
                    <b>Skills utilized:</b> Expert Review and heuristic analysis, Usability testing, User interview, wireframing, prototyping, visual design, competitive analysis.                    
                </p>
            </div>
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
                    <div class="col-md-5 col-lg-5 col-12">
                      <img src="img/dw02.png" class="w-100 dwmobfl" data-toggle="modal" data-target="#exampleModal"/>
                    </div>
                    <div class="col-md-7 col-lg-7 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs20">Design Challenge</p>
                        <p class="sfprolit blgre blkfs15 pr-0 mb-3">To design an interactive interface which provides access to common information to the whole deal team and allows them to take an action but at the same time have the same efficiency and access to data as a laptop.</p>
                        <p class="sfprosb hddwcol mb-2 blkfs20">Research & Analysis</p>
                        <p class="sfprolit blgre blkfs15 pr-0 mb-3">I began the project with research, in order to establish an understanding of sales domain.
                          To address the given challenge of designing an interface with features into dealwall, I started with exploring various similar applications from salesforce to other CRM tools. I participated in the user interviews to understand user needs, pain points and potential opportunities so that I will have a better understanding on how to create a cohesive user experience. Regarding the users I was happy to find out that the team has already been talking to their target audience and had a lot of insight so it was only a matter of consolidating the findings to form a user persona. My aim was to gather insights about strategies and best practices when it comes to user-centred design approach.<br>
                        </p>
                        <p class="sfprolit blgre blkfs15 pr-0">After executing a series of competitive analysis and based on the user interviews, I outlined the scenario which is a short story about a specific user accomplishing a specific goal using the application </p>
                    </div>
                </div>

                <div class="row mt-5 pt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs20">Define</p>
                    </div>
                    <div class="col-md-8 col-lg-8 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5 ml-0 ml-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs18">Persona</p>
                        <p class="sfprolit blgre blkfs15 mb-5">After getting insights from user research, I had a clear understanding of who my target user will be and created a persona. User persona will help me make better design decisions that will satisfy the user's needs.</p>
                    </div>
                    <div class="col-md-12 col-lg-12 col-12">
                        <img src="img/dw03.jpg" class="w-100 px-4 px-lg-0"/>
                    </div>
                </div>

                <div class="row mt-5 pt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-2 pr-0 pr-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs20 px-4 px-lg-0">Ideate</p>
                    </div>
                    <div class="col-md-5 col-lg-5 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprolit blgre blkfs15 mb-5">
                            <b>Defining Problem<br>
                            Point of view = User's + Needs + Insights</b><br><br>
                            
                            Keeping user needs and Insights POV statement allows me to generate possible solutions in a goal-oriented manner followed by HMW to kick start my ideation process.                            
                        </p>
                    </div>
                    <div class="col-md-7 col-lg-7 col-12">
                        <img src="img/dw04.jpg" class="w-100 px-4 px-lg-0"/>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs18">Brainstorming Solutions</p>
                        <p class="sfprolit blgre blkfs15">
                            From HMW statement I started generating as possible ideas as I can possible. The goal here was to cover every aspect of the problem and find an appropriate solution.
                        </p>
                    </div>
                </div>


                <div class="row mt-5 pt-5">
                    <div class="col-md-5 col-lg-5 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                      <p class="sfprosb hddwcol mb-2 blkfs18 mt-5">Product Features Roadmap</p>  
                      <p class="sfprolit blgre blkfs15 mb-5">
                        After brainstorming different ideas, I created a product features road map and prioritize them.
                      </p>
                    </div>
                    <div class="col-md-7 col-lg-7 col-12">
                        <img src="img/dw05.jpg" class="w-100 px-4 px-lg-0"/>
                    </div>
                </div>

                <div class="row mt-5 pt-5">
                    <div class="col-md-5 col-lg-5 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                      <p class="sfprosb hddwcol mb-2 blkfs18 mt-5">User Flow</p>  
                      <p class="sfprolit blgre blkfs15 mb-5">
                          A user flow was then created to understand how a user would navigate through the structure of the app. Here I primarily focused on how the user would communicate within the deal team and easily tracking the multiple deal activities. 
                      </p>
                    </div>
                    <div class="col-md-7 col-lg-7 col-12">
                        <img src="img/dw06.jpg" class="w-100"/>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs18">Initial Sketches</p>
                        <p class="sfprolit blgre blkfs15">The main function of this app was easy collaboration within deal team members, but that the idea quickly outgrew that initial intent. Before moving to tools for designing I started by sketching few designs and see what ideas I can come up with.
                          At this phase of the design process, early user feedback was crucial to eliminate pain points and enhance usability and existing features.
                        </p>
                    </div>
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5">
                        <p class="sfprolit blgre blkfs15 text-center" data-aos="fade-up" data-aos-duration="2000">
                            Early sketches exploring different solutions of the communicating with members  iPad
                          </p>
                        <img src="img/dw07.jpg" class="w-100"/>
                        <img src="img/dw08.jpg" class="w-100 mt-5"/>
                    </div>
                </div>

                <div class="row mt-5 pt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-2 pr-0 pr-5 pl-0 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs20 px-4 px-lg-0">Build</p>
                    </div>
                    <div class="col-md-8 col-lg-8 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs18">Low-fidelity wireframes</p>
                        <p class="sfprolit blgre blkfs15 mb-5">With the beginning of wireframing I tried the drag & drop option as well. Evaluation showed that this layout was too complex to use and took to much time. So I did the simpler approach and focused on speed.
                            Nevertheless, I find it very useful to test ideas in an early phase with wireframes. They make it more understandable how an interface and interactions would feel like.
                            </p>
                    </div>
                    <div class="col-md-12 col-lg-12 col-12">
                        <img src="img/dw09.png" class="w-100 px-4 px-lg-0"/>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs18">Developing the Prototype</p>
                        <p class="sfprolit blgre blkfs15">
                            After creating low-fidelity wireframes, I converted them into an interactive prototype using Axure software. This prototype was used to run the second round of user tests, remote and in person, that enhanced features and eliminated user pain points.
                        </p>
                        <p class="sfprolit blgre blkfs15"><a href="wireframes_iphone_ios7/login.html" target="blank" style="text-decoration: none;"><span class="hddwcol">Click to see the prototype</span></a></p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hddwcol mb-2 blkfs18">Onboarding & Registration</p>
                        <p class="sfprolit blgre blkfs15">
                            Onboarding is one of the most critical phases in an app user’s journey. I designed an interface through which the user should easily transfer their all sales data to dealwall app.
                        </p>
                    </div>
                    <!--Lightbox-->
                      <div class="row mt-5">
                              <div class="column col-md-6 col-lg-6 col-12 pt-2">
                                      <img src="img/dw09.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow cursor w-100"/>
                              </div>
                              <div class="column col-md-6 col-lg-6 col-12 pt-2">
                                      <img src="img/dw10.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow cursor w-100"/>
                              </div>
                            </div>
                            
                            <div id="myModal" class="modal">
                                  <span class="close cursor" onclick="closeModal()">&times;</span>
                                  <div class="modal-content">
                                
                                    <div class="mySlides">
                                      <div class="numbertext">1 / 2</div>
                                      <img src="img/dw09a.jpg" style="width:100%">
                                    </div>
                                
                                    <div class="mySlides">
                                      <div class="numbertext">2 / 2</div>
                                      <img src="img/dw10a.jpg" style="width:100%">
                                    </div>
                                    
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                </div>
                              </div>
                      <!--Lightbox-->

                    <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5">
                        <p class="sfprosb hddwcol mb-2 blkfs18 mt-5">Usability Testing</p>
                        <p class="sfprolit blgre blkfs15">
                            To ensure seamless usability, I conducted user testing in-person and with 5 individuals. In general, participants could navigate easily through the app and enjoyed its simplicity; but testing also detected some pain points. The user criteria was that he/she should be well familiar with computers doing online transactions or browsing. 
                        </p>
                      </div>
                      <div class="col-md-6 col-lg-6 col-12 pt-5">
                        <img src="img/dw.jpg" class="w-100"/>
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
            <div class="row my-5">
                <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                    <p class="sfprosb hddwcol mb-2 blkfs20">UI Design</p>
                    <p class="sfprolit blgre blkfs15">
                        Once I tested out all usability mistakes, I started designing the final screens in Photoshop. Using the design system components and guidelines, I started creating iPad screens first and then Iphone, Andorid, web version of the dealwall app.  I eliminated unnecessary UI elements and kept all design elements consistent throughout the app to ensure a clean and well-spaced design.
                    </p>
                </div>
                <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5">
                    <p class="sfprolit blgre blkfs15 text-center mb-2"><b>iPad</b></p>
                    <img src="img/dw11.jpg" class="w-100"/>
                </div>
            </div>    
        </div>
        </div>
        </div>
    </div>

    <div class="row">
      <div class="container">
          <div class="row">
          <div class="col-md-11 col-lg-10 col-12 mx-auto">
              <div class="row my-5">
                      <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                      <p class="sfprolit blgre blkfs15">
                        Definitely it was not the end of the project. Each and every step of the design process went into many iterations with lots of modifications to enhance the features and overall functionality to make it better user experience.
                      </p>
                  </div>
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
