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

<body style="overflow-x:hidden;">

  
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
<div class="row m-0 p-0 p-lg-4 equbetmbg">
  <div class="container">
    <div class="row py-3">
      <div class="col-md-6 col-lg-6 col-12" data-aos="fade-right" data-aos-duration="2000">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-12">
                <h1 class="lorasmbold hdtmcol blkfs50 mb-0">eQube TM</h1>
                <p class="sfprolit blgre blkfs25 blabtfv">Transformation Modeler</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">The Brief</p>
                <p class="sfprolit blgre blkfs15 blabtsm">eQube TM stands for Transformation Modeler. Its is a data modelling and mapping solution. When user create a process in eQube MI as a business logic, it might involve one of the biggest activity called Map Driven activity that allow to transfer data from source to destination (i.e. from excel to Json object). In that case, eQube TM integrates with eQube MI through application connectors. </p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">Objective</p>
                <p class="sfprolit blgre blkfs15 blabtsm">eQ requires a design for an web based app, along with clearly defined branding that can be presented in a prototype that effectively shows the key features users need from eQube MI app.</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">My Role</p>
                <p class="sfprolit blgre blkfs15 mb-0 blabtsm">As a UI UX Designer, I integrated with the eQ Team to designon best practices and designed the complete User flow and visual experience. 
                  - Research, Interaction Design, Visual Design, <br><br>
                  <b>Tools:</b> Adobe XD, Photoshop</p>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 pl-0 pl-lg-5">
        <img src="img/tm.png" class="w-100 mt-5 pt-3 px-5 px-lg-0" data-aos="fade-left" data-aos-duration="2000"/>
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
                            <img src="img/tm02.jpg" class="w-100 px-5 px-lg-0" data-toggle="modal" data-target="#exampleModal"/>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-0 pr-5 pl-0 pl-lg-5 px-5 px-lg-0" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdtmcol mb-2 blkfs20">Research & Analysis</p>
                        <p class="sfprolit blgre blkfs15 pr-0">My first task was to get an in-depth understanding overall functioning of the eQube TM and its different features involved. I conducted brainstorming sessions with concerned product manager and the back end team of developers to kick start a process of exploration. This workshop resulted in a clear understanding of the features and functionalities to be included. This application will be mainly used to create a Map which involves certain steps like create map, add source node and attributes, add destination node & attributes, map the attributes and then save & release the map.</p>
                    </div>
                </div>

                <div class="row mt-5 pt-5">
                    <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdtmcol mb-2 blkfs20">Information Architecture</p>
                        <p class="sfprolit blgre blkfs15">For a complex system like this with multiple stakeholders, it was important to create an end-to-end information architecture and build a seamless workflow from one phase of the lifecycle to the next. Here is where the backbone of the system was created and informed the UI design process.</p>
                    </div>
                    <div class="col-md-12 col-lg-12 col-12">
                        <img src="img/tm03.jpg" class="w-100"/>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdtmcol mb-2 blkfs20">Sketches</p>
                        <p class="sfprolit blgre blkfs15">
                          I used the user flow to start sketching some ideas on paper. This sketch represents the how the user would create a new map followed by adding source nodes & attributes to the destination. Getting the ideas rapidly down on paper really helped to solidify the flow. I find this method the best way for getting ideas down quickly and being able to iterate on them just as quickly. 
                        </p>
                    </div>
                    <div class="col-md-12 col-lg-12 col-12">
                        <img src="img/tm04.jpg" class="w-100"/>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdtmcol mb-2 blkfs20">Low fidelity Wireframing & Prototyping</p>
                        <p class="sfprolit blgre blkfs15">After we defined the flow and thus what screens we needed I proceeded with creating the low-fidelity wireframes to explore the experience in more detail on a screen-by-screen level. The main focus was to support the creation of map driven activity and jumped into the Adobe XD to create the prototypes with the screens to evaluate it with the users.</p>
                    </div>
                    <div class="col-md-12 col-lg-12 col-12">
                    <iframe style="width:100%; height:500px;" src="https://www.youtube.com/embed/kYgJhCl9tjU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-10 col-lg-10 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdtmcol mb-2 blkfs20 mt-5">Usability Testing</p>
                        <p class="sfprolit blgre blkfs15">I created a test plan in preparation for conducting usability testing. I developed 4 scenarios and 4 tasks that I asked users to complete using the prototype in order to evaluate the design. Participants were recruited from another team of developers who had an experience in back end programming like database, XML, API gateway, Json etc and recorded each session so I could later synthesize my findings.<br><br>

                          <b>Tasks</b><br>
                          How would you add new source node<br>
                          How would you add new source attribute<br>
                          How would you add destination node<br>
                          How would you add destination attribute<br>
                          Map the Attributes<br><br>
                          
                          Number of Participants: 5<br>
                          Age: 23 - 55<br>
                          Gender Breakdown: 3 female / 2 male<br>
                          </p>
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
                    <p class="sfprosb hdtmcol mb-2 blkfs20">Revised Prototype</p>
                    <p class="sfprolit blgre blkfs15">
                      Based on the usability testing results and the feedback received, I modified and created newer versions of the screens and the flow which went into many iterations. <br>
Once I was sure about screens and the flow , I began creating the high-fidelity wireframe/prototype using the software Adobe XD. Here, is where the UI starts to come together and I was careful to stay within the parameters of the already established visual design library which contains all the UI components. I wanted to be sure I keep consistency across all the eQ products in terms of visual and interaction point of view.
                    </p>
                </div>
            </div>  
            <!--Lightbox-->
            <div class="row mt-0 mb-5 pb-4">
                <div class="column col-md-6 col-lg-6 col-12 pt-2">
                        <img src="img/thumbnail01.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow cursor w-100"/>
                </div>
                <div class="column col-md-6 col-lg-6 col-12 pt-2">
                        <img src="img/thumbnail02.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow cursor w-100"/>
                </div>
                <div class="column col-md-6 col-lg-6 col-12 pt-4 mt-2">
                        <img src="img/thumbnail03.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow cursor w-100"/>
                </div>
              </div>
              
              <div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">
                  
                      <div class="mySlides">
                        <div class="numbertext">1 / 2</div>
                        <img src="img/tm03.png" style="width:100%">
                      </div>
                  
                      <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="img/tm05.png" style="width:100%">
                      </div>

                      <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="img/tm07.png" style="width:100%">
                      </div>
                      
                      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                      <a class="next" onclick="plusSlides(1)">&#10095;</a>
                  </div>
                </div>
        <!--Lightbox-->
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
                      <p class="sfprosb hdtmcol mb-2 blkfs20">Next Step</p>
                      <p class="sfprolit blgre blkfs15">
                        eQube TM is ongoing application which keeps on revising with additional features and functionality but I as a UX designer, I follow the design process whenever new enhancements come to me is Reserch – Define – Ideate – Design – prototype – Iterate
More usability testing, Research, and Analytics would uncover additional pain points and would lead us to make better design decisions.
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
