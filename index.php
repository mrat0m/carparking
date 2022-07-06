<?php
session_start();
$_SESSION['errmsg']=""; 
$_SESSION['msg']=""; 
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
        <title>Park-iN</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

   <style>
       /* Let's get this party started */
::-webkit-scrollbar {
    width: 12px;
}
 
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: white; 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: black; 
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;

      
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .main {
  padding: 20px;
  margin-top: 75px;
  height: 581.5px; /* Used in this example to enable scrolling */
}

 /* Let's get this party started */
::-webkit-scrollbar {
    width: 12px;
}
 
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: white; 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: black; 
}

   </style>


<style>
#bg {box-sizing: border-box;
background-size: cover;
padding: 0;
margin: 0;}
#bg {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container-fluid {
  max-width: 100%;
  background-size: cover;
  padding: 0;
  margin: 0;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>


<style>
    #loading{
        position: fixed;
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100vh;
        background:  url('images/pre1.gif') no-repeat center;
        background-size: cover;
        z-index: 99999;
        

    }
</style>

   <!--font asesome css -->
   <link href="fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
   <link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/cover.css" rel="stylesheet">
         
</head>
  <body id="home" onload="myFunction()" style="font-family: 'Times New Roman', Times, serif;" data-spy="scroll" data-target="#navbar-wd" data-offset="98" class=" text-center text-white bg-dark" style="height : 593px">
     <!-- LOADER -->
     <div id="loading"></div>
      <!-- END LOADER -->
<div class="cover-container d-flex  h-1000 p-3 mx-auto flex-column " style="background-image: url(images/cg.jpg);height: 800px;background-size: cover;">
  <header class="mb-5">
    <div>
      <h3 class="txt-title float-md-start mb-0">PARK-iN</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active " aria-current="page" href="index.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
        <a class="nav-link " href="contact.php">Contact Us</a>
        <a class="nav-link " href="login.php">Login/Sign Up <i class="fa fa-sign-in" aria-hidden="true"></i></a>
        
      </nav>
    </div>
  </header>

  <main class="px-4">
  <?php include "scroll_top.php"; ?>
    <h1 class="txt1">Welcome to PARK-iN</h1>
    <p class="lead">Car Parking System</p>
    <p class="lead">
      <a href="login.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Book Your Slot</a><br>
    </p>
  </main>
  <!--br><br>
<div class="container">
<img src="images\carparking-logo.png" width="75" height="60"/>

</div-->
    </div>
    
<br>



    <div class="container" id="contact">
	<div class="row">
      <div class="container col-md-7 ">
        <div class="container ">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="txt-title1">Contact us</legend>
    
            <!-- Name input-->
            <div class="form-group">
                <br>
              <div class="txt2 ">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
               <br>
              <div class="txt2 ">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
               <br>
              <div class="txt2 ">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
      <br>
            <!-- Form actions -->
            <div class="form-group">
              <div class="">
                <button type="submit" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
<br><br>


    

         <!-- Start Footer -->
         <footer class="footer-box">
           <hr>
            <div class="container">
               <div class="row">
                  <div class="col-md-12 white_fonts">
                     <div class="row">
                     <div class="col-sm-12 col-md-12 col-lg-4">
                           <div class="full">
                           <img src="images\carparking-logo.png" width="75" height="60"/>
                           <h3 class="txt-title">PARK-iN</h3>
                            
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                           <div class="full">
                              <div class="footer_blog full white_fonts">
                                 <h3>ADDRESS</h3>
                                 <p align="left">&emsp;&emsp;&emsp;&emsp;&emsp; <i class="fa fa-address-card" aria-hidden="true"></i> PARK-iN, Park-in Street,India. 
                                   <br>&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fa fa-phone" aria-hidden="true"></i> +1 234 567 
                                 <br>&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fa fa-envelope" aria-hidden="true"></i> park.in@gmail.com</p>
                              </div>
                              <div class="full">
                               
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                           <div class="full">
                              <div class="footer_blog full white_fonts">
                                 <h3 align="left">&emsp;INFORMATION</h3>
                                 </div>
                              <div class="full timetable_blog">
                                 <ul class="time_table text_align_left">
                                   
                                   <li>Car Parking Available 24x7</li>
                                    
                                 </ul>
                                
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- End Footer -->

         <!-- Second Footer -->
<footer>
         <div class="footer_bottom text-dark bg-white">
            <div class="container">
               <div class="row">
                  <div class="col-12">              
                     <div align="center" class="crp mt-1">
                            <!-- img src="images/social_icons.png"/ -->
                           <i class="fa fa-facebook-square" style="font-size:28px; aria-hidden:true"></i>
                           <i class="fa fa-instagram" style="font-size:28px; aria-hidden:true"></i>
                           <i class="fa fa-twitter-square" style="font-size:28px; aria-hidden:true"></i>  
                           <i class="fa fa-google-plus-square" style="font-size:28px; aria-hidden:true"></i> 
                             </div>
                     <p class="crp mt-0">&emsp;&emsp;2021 ©&ensp;PARK-iN.&ensp;All Right Reserved.</p>
                     <!--a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a-->
                  </div>
               </div>
            
         </div>
      </div>
</footer>
         <!-- End Second Footer -->


         <script>
        var preloader = document.getElementById('loading');

        function myFunction(){
            
            setTimeout(function(){
                preloader.style.display = 'none';
            },1200);

        }
    </script>


         
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

  </body>
</html>

