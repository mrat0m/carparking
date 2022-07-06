<?php
 session_start();
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
        <title>PARK-iN | Profile</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
    
        <link href="https://fonts.googleapis.com/css?family=Dosis|Raleway&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
<!--font asesome css -->
<link href="fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
<link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
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

    
    <!-- Custom styles for this template -->
    <link href="assets/css/cover.css" rel="stylesheet">
  </head>
  <body style="font-family: 'Times New Roman', Times, serif;" id="profile" data-spy="scroll" data-target="#navbar-wd" data-offset="98" class=" h-100 text-center text-white bg-dark">
<!-- LOADER -->
<!-- <div id="preloader">
         <div class="loader">
            <i class="fa fa-spin" aria-hidden="true"></i>
         </div>
</div> -->
<!-- END LOADER -->
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
  <header class="mb-5">
    <div>
       <!-- <img src="images/carparking-logo.png" width="7%" height="10%"/> -->
      <h3 class="txt-title float-md-start mb-0 ">PARK-iN</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link " href="home.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
        <a class="nav-link " href="yourbookings.php">Your Bookings <i class="fa fa-qrcode" aria-hidden="true"></i></a>
        <a class="nav-link active " aria-current="page" href="profile.php">Profile <i class="fa fa-user-o" aria-hidden="true"></i></a>
        <a class="nav-link " href="logout.php">Logout
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a> 
      </nav>
    </div>
  </header>

  <main class="px-4">
  <?php include "scroll_top.php"; ?>
  <!--div class="container box-up  d-flex justify-content-center"-->
  <div class="box-lg">
  <div class="heading" style="font-size:50px">
                <b><i class="fa fa-user-o" aria-hidden="true"></i></b>
              </div>
<?php

include "include/connection.php"; // Using database connection file here
$email=$_SESSION['login'];
$records = mysqli_query($conn,"select * from customer where email='$email'"); // fetch data from database

if($data = mysqli_fetch_array($records))
{
?>
<form class="account"  method="post" style="font-size:25px;">
   <label for=""><b>First Name :</b> <?php echo $data['name'];?> </label><br>
   <label for=""><b>Last Name :</b> <?php echo $data['lname'];?> </label><br>
   <label for=""><b>e-mail :</b> <?php echo $data['email'];?> </label><br>
   <label for=""><b>Phone :</b> <?php echo $data['phone'];?> </label><br>
   <label for=""><b>House Name :</b> <?php echo $data['hna'];?> </label><br>
   <label for=""><b>City :</b> <?php echo $data['city'];?> </label><br>
   <label for=""><b>Pincode :</b> <?php echo $data['pin'];?> </label><br>
   <span class='badge badge-edit'><a class="btn btn-info" href='edit_customer.php?id=<?php echo "".$data['id'].""?>'>Edit Profile</a></span>
   <span class='badge badge-edit'><a class="btn btn-info" href='changepass.php?id=<?php echo "".$data['id'].""?>'>Change password</a></span>
</form>
<?php
 
}
$_SESSION['urlpass']=$data['id'];
?>
   </div>
<!--/div-->
   </main>
    </div>

<!-- Start Footer -->
<footer class="footer-box">
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
                                 <p align="left">&emsp;&emsp;&emsp;&emsp;&emsp; <i class="fa fa-address-card" aria-hidden="true"></i> PARK-iN, Park-in city,India. 
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
                                   <li>PARK-iN is a site to book parking slots to park your car</li>
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
         <div class="footer_bottom text-dark bg-white">
            <div class="container">
               <div class="row">
                  <div class="col-12">              
                     <div align="center" class="crp mt-1">
                              <img src="images/social_icons.png"/>
                             </div>
                     <p class="crp mt-0">&emsp;&emsp;&emsp;&emsp;2021 ©&emsp;PARK-iN.&ensp;All Right Reserved.</p>
                  </div>
               </div>
            
         </div>
      </div>
      
  </body>
</html>

