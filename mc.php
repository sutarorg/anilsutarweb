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
<div class="row m-0 p-0 equbemcbg">
  <div class="container">
    <div class="row p-0">
      <div class="col-md-6 col-lg-6 col-12 py-4 pr-0 pr-lg-5" data-aos="fade-right" data-aos-duration="2000">
        <div class="row">
            <div class="col-md-10 col-lg-10 col-12">
                <h1 class="lorasmbold hdmccol blkfs50 mb-0">Mobile Center</h1>
                <p class="sfprolit blgre blkfs25 blabtfv">iPhone, Android, Tablet App</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">Overview</p>
                <p class="sfprolit blgre blkfs15 blabtsm">Mobile center is app which allows the IndigoVision customers to maintain an eye contact with cameras from anywhere and control video surveillance activities on the go using iPads and iPhones. Surveillance and management personnel can be in touch with what happens on a site from their mobile devices by immediately accessing accurate information without having to communicate with a central control room again.</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">The Problem</p>
                <p class="sfprolit blgre blkfs15 blabtsm">IndigiVision provides security management solutions to the users by establishing the control room with all hardwares and softwares needed. But now IndigoVision wanted to extend the surveillance capabilities of Control Center way beyond the control room so that the security personnel can monitor their system remotely from any location over mobile and wireless IP networks using a mobile phone or tablet.</p>
            </div>
            <div class="col-md-12 col-lg-12 col-12 pt-3">
                <p class="sfprosb blgre mb-2 blkfs20">My Role</p>
                <p class="sfprolit blgre blkfs15 mb-0 blabtsm">
                  UX Research and analysis, User flow, UI Design & Prototyping, Usability Testing<br><br>

                  <b>Tools:</b> Axure, Photoshop, paper, pencil
                </p>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-12 p-0">
          <img src="img/mc01.png" class="w-100 mt-3" data-aos="fade-left" data-aos-duration="2000"/>
        </div>
    </div>
  </div>
</div>
<!--Banner-->

<div class="row my-5">
    <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-12 pt-0 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdmccol mb-2 blkfs20">Design Process</p>
                        <p class="sfprolit blgre blkfs15 mb-5">My process will be different inn different projects and will be determined by many factors such as the project goals, business needs, complexity of the problem, time and etc. Here I’ll describe my process for solving this problem.</p>
                    </div>
                    <div class="col-md-8 col-lg-8 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdmccol mb-2 blkfs20">Discover</p>
                        <p class="sfprolit blgre blkfs15 mb-5">Before doing any ideation I started to analyzing the existing web application page by page to get an in-depth understanding of the field of security and Surveillance. My aim was to understand the existing features and the workflow to gather insights about it. I listed down all the existing features.</p>
                    </div>
                    <div class="col-md-8 col-lg-8 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdmccol mb-2 blkfs20">Competitive Analysis</p>
                        <p class="sfprolit blgre blkfs15 mb-5">Research and analysis was then followed by competitive analysis, in which I identified existing competitors to IndigoVision and took stock of the features they offered and evaluated their strengths and weaknesses. The current leader security solutions like ExacqVision, Y-Cam, iCamViewer, Asianwolf etc. so I started by assessing these product and then moved on to examining its competitors.</p>
                        <img src="img/mc02.jpg" class="w-100"/>
                    </div>
                    <div class="col-md-8 col-lg-8 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdmccol mb-2 blkfs20 mt-5">User Interviews</p>
                        <p class="sfprolit blgre blkfs15 mb-5">I then conducted 1:1 user interviews as primary research in order to learn directly from potential users about their habits, how they spend their whole day, methods of monitoring activity etc. The interviews were conducted remotely and all participants were from security domain.</p>
                        <p class="sfprolit blgre blkfs15 mb-5">
                            <b>Number of Participants:</b> 5<br>
                            <b>Gender breakdown:</b> 4 male / 1 female<br>
                            Age: 25 – 43<br><br>
                            
                            <b>Takeaways:</b><br>
                            1.	Users want to monitor their surveillance video on the move.<br>
                            2.	Users expect to maintain visual contact with cameras from wherever they happen to be.<br>
                            3.	Users look for the most accurate information immediately without having to communicate back to a central control room.<br>
                        </p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6 col-lg-6 col-12">
                        <!--Lightbox-->
                        <div class="row mt-5">
                                <div class="column">
                                  <img src="img/mc03.png" onclick="openModal();currentSlide(1)" class="hover-shadow cursor w-100"/>
                                </div>
                              </div>
                              
                              <div id="myModal" class="modal">
                                    <span class="close cursor" onclick="closeModal()">&times;</span>
                                    <div class="modal-content">
                                  
                                      <div class="mySlides">
                                        <div class="numbertext">1 / 4</div>
                                        <img src="img/mc03a.jpg" style="width:100%">
                                      </div>
                                  </div>
                                </div>
                        <!--Lightbox-->
                    </div>  
                    <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                      <p class="sfprosb hdmccol mb-2 blkfs20">Persona</p>  
                      <p class="sfprolit blgre blkfs15 mb-5">
                        The previous research and analysis was used to develop a primary persona, a fictional representation of my target user. Brad Scott emerged from the primary research findings, with her goals, frustrations, and motivations drawn from the trends observed in user interviews, while his needs came from the empathy map.
                      </p>
                    </div>
                </div>

                <div class="row mt-5">
                  <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                      <p class="sfprosb hdmccol mb-2 blkfs20">Group Brainstorming</p>  
                      <p class="sfprolit blgre blkfs15 mb-5">
                          In order to generate a wealth of ideas for potential solutions, I conducted a group brainstorming session. I gathered 3 participants, provided project background and introduced them to Brad’s persona. I asked the participants to brainstorm answers to each of the How-Might-We questions and facilitated a discussion of their ideas to develop a range of concepts that might address Brad’s needs.
                          Once I understood the security domain and different stakeholders involved, I conducted a ideation workshop at Spring Computing, India to kick start a process of exploration. 
                      </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                      <p class="sfprosb whicol mb-2 blkfs20">Persona</p>  
                      <p class="sfprolit blgre blkfs15 mb-5">
                          I asked the product managers, domain experts and Developers to brainstorm answers to each of the How-Might-We questions and facilitated a discussion of their ideas to develop a range of concepts that might address Brad’s needs.
                          After reviewing the ideas that emerged from the brainstorming session, I determined which features best met the shared goals identified earlier. 
                      </p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdmccol mb-2 blkfs20">App Map</p>  
                        <p class="sfprolit blgre blkfs15 mb-5">
                            The next step in the ideation phase was to focus on building the app structure. I created an app map, planning out key screens and determining where the main features would be located and how they would relate to each other within the app.
                        </p>
                        <img src="img/mc04.jpg" class="w-100"/>
                      </div>
                  </div>


                <div class="row mt-5 pt-5">
                    <div class="col-md-5 col-lg-5 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                      <p class="sfprosb hdmccol mb-2 blkfs20 mt-5 pt-5">User Flow</p>  
                      <p class="sfprolit blgre blkfs15 mb-5">
                          Considering Brad’s needs and the project goals, I created a diagram that described the pathways users might take while interacting with Mobile Center. This process helped me to identify the key screens and actions users might require.
                      </p>
                    </div>
                    <div class="col-md-7 col-lg-7 col-12">
                        <img src="img/mc05.jpg" class="w-100 crpoint"/>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                        <p class="sfprosb hdmccol mb-2 blkfs20">Task Flow</p>  
                        <p class="sfprolit blgre blkfs15 mb-5">
                            I also considered several key tasks that a user like Brad might need to complete using Mobile Center. This further helped me to determine the screens and actions that were necessary for accomplishing the tasks.
                        </p>
                        <img src="img/mc06.jpg" class="w-100"/>
                    </div>
                  </div>

                  <div class="row mt-5">
                      <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                          <p class="sfprosb hdmccol mb-2 blkfs20">Sketches</p>  
                          <p class="sfprolit blgre blkfs15 mb-5">
                            The first step of the design phase was to take pen to paper and sketch ideas for some of the main Mobile Center screens. These low-fidelity wireframes helped me to determine layouts and establish visual hierarchy, while exploring common design patterns and figuring out how to integrate the app’s key features.
                          </p>
                          <img src="img/mc07.png" class="w-100"/>
                      </div>
                    </div>

                  <div class="row mt-5">
                      <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                          <p class="sfprosb hdmccol mb-2 blkfs20">Mid-Fidelity Wireframes</p>  
                          <p class="sfprolit blgre blkfs15 mb-5">
                              I followed up the sketches by creating mid-fidelity wireframes, translating the sketches to a digital form and preparing for usability testing. By building the wireframes in grayscale, I was able to focus on the functionality of the features.
                          </p>
                          <img src="img/mc08.jpg" class="w-100"/>
                      </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                            <p class="sfprosb hdmccol mb-2 blkfs20">Prototype</p>  
                            <p class="sfprolit blgre blkfs15 mb-2">
                                Before applying the branding and visual style to the wireframes, I needed to test the design of the features to determine if they could be successfully used to accomplish key tasks. I created a prototype using the mid-fidelity wireframes and recruited participants to test it. This helped me evaluate the ease of use of the app and identify any potential points of confusion.
                            </p>
                        </div>
                      </div>
                  
                      <div class="row mt-5">
                        <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                            <p class="sfprosb hdmccol mb-2 blkfs20">Usability Testing</p>  
                            <p class="sfprolit blgre blkfs15 mb-5">
                                I created a test plan in preparation for conducting usability testing. I developed 4 scenarios and 4 tasks that I asked users to complete using the prototype in order to evaluate the design. Participants were recruited from the local community and recorded each session so I could later synthesize my findings.<br><br>
                                <b>Number of Participants:</b> 5<br>
                                <b>Age:</b> 35 - 55<br>
                                <b>Gender Breakdown:</b> 3 male / 2 female<br>
                                All participants described themselves as familiar with iPhone/iPad usage<br>
                            </p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                            <p class="sfprosb whicol mb-2 blkfs20">Usability Testing</p>  
                            <p class="sfprolit blgre blkfs15 mb-5">
                                <b>Tasks:</b><br>
                                Select/setup cameras for viewing<br>
                                View camera streams<br>
                                Perform operations around cameras to Pan, Tilt, Zoom etc based on permissions<br>
                                Take snapshots of the Streams<br>
                                Share the snapshots<br>
                                Record the streams<br>
                                Play, Stop, Rewind, Forward the streams<br>
                                Bookmark a recorded stream<br>
                                Respond to alarms<br>
                                Operate relays<br>                         
                            </p>
                        </div>
                      </div>

                      <div class="row mt-5">
                          <div class="col-md-8 col-lg-8 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                              <p class="sfprosb hdmccol mb-2 blkfs20">Branding</p>  
                              <p class="sfprolit blgre blkfs15 mb-5">
                                  I began to develop branding for Mobile Center by identifying 3 brand attributes that captures the intended look and feel of the app: Delightful, Trustworthy, Contemporary. With these adjectives in mind, I sketched out the required icons, before digitizing the concept that fit the attributes most effectively.
                                  Next, I created a style tile as a guide for the visual design of the app, establishing a color palette, typography styles, and imagery that would then be applied across the mid-fidelity wireframes.                                  
                              </p>
                          </div>
                        </div>

                      <div class="row mt-5">
                          <div class="col-md-8 col-lg-8 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                              <p class="sfprosb hdmccol mb-2 blkfs20">High Fidelity Wireframes</p>  
                              <p class="sfprolit blgre blkfs15 mb-5">
                                  The visual design and branding defined in the style tile were applied to the mid-fidelity wireframes to create high-fidelity wireframes. The recommendations identified above were implemented as well, in order to address sources of confusion and frustration that emerged during usability testing. Those specific changes are outlined in the wireframe annotations below.
                              </p>
                          </div>
                        </div>

                      <div class="row mt-5">
                          <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                            <img src="img/mc09.jpg" class="w-100"/>
                          </div>
                        </div>

                    
                        <div class="row mt-5">
                            <div class="col-md-8 col-lg-8 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5" data-aos="fade-up" data-aos-duration="2000">
                                <p class="sfprosb hdmccol mb-2 blkfs20">Revised Prototype</p>  
                                <p class="sfprolit blgre blkfs15 mb-2">
                                    Those high-fidelity wireframes were then used to create a revised prototype. This version captures the intended look and feel of the app and improves upon the mid-fidelity prototype by including the recommended revisions determined from usability testing. 
                                </p>
                                <p class="sfprolit blgre blkfs15"><a href="iphone_ph2_v2/login.html" target="blank" style="text-decoration: none;"><span class="hdmccol">Click to see the prototype</span></a></p>
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
                    <p class="sfprosb hdmccol mb-2 blkfs20">UI Design</p>
                    <p class="sfprolit blgre blkfs15">
                        Finally, having applied the Mobile Center style and branding to the layouts defined in the mid-fidelity wireframes, I created a UI Kit. This is a living document that can serve as a resource, ensuring that the visual design remains consistent as the app is further developed.
                    </p>
                </div>
                <div class="col-md-12 col-lg-12 col-12 pt-4 pt-lg-2 pr-3 pr-5 pl-5 pl-lg-5">
                    <p class="sfprolit blgre blkfs15 text-center mb-2"><b>iPad</b></p>
                    <img src="img/mc10.png" class="w-100"/>
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
