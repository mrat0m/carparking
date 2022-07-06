<?php
 session_start();
 include "include/connection.php"; // Using database connection file here

function alert($msg){
  
    echo "<script> alert('$msg')</script>";

}

if(strlen($_SESSION['login'])==0)
{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
  extract($_POST);
  $sql = "select password from user where email = '".$_SESSION['login']."' and password='".$_POST['password']."'";  
  $result = mysqli_query($conn, $sql);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result);  
        
if($count>0)
{
// alert($newpassword);
// alert($confirmpassword);
if($newpassword==$confirmpassword){

 $conn=mysqli_query($conn,"update user set password='".$_POST['newpassword']."' where email = '".$_SESSION['login']."' and type='customer'");
 $_SESSION['smsg']="Password Changed Successfully !!";
}
else{
  $_SESSION['msg']="Password does not match !!";
}
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
        <title>PARK-iN | Change Password</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Raleway&display=swap" rel="stylesheet">
   <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

	<script type="text/javascript">
function valid()
{
// if(document.chngpwd.password.value=="")
// {
// alert("Current Password Filed is Empty !!");
// document.chngpwd.password.focus();
// return false;
// }
if(document.chngpwd.newpassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}

return true;
}
</script>
        
    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
<!--font asesome css -->
<link href="fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
<link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<!-- scroll top  -->
<!-- 
<style>


#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style> -->

<style>
    #loading{
        position: fixed;
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100vh;
        /* background:  url('images/f.gif') no-repeat center; */
        background-size: cover;
        z-index: 99999;
        /* opacity: 55%; */
    }
</style>

<!-- end Scroll top  -->

    
    <!-- Custom styles for this template -->
    <link href="assets/css/cover.css" rel="stylesheet">
<!--========================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main1.css">
  </head>
  <body id="profile" data-spy="scroll" onload="myFunction()" style="font-family: 'Times New Roman', Times, serif;" data-target="#navbar-wd" data-offset="98" class=" text-center text-white bg-dark" style="height : 820px">
<!-- LOADER -->
<div id="loading"></div>
      <!-- END LOADER -->
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
  <header class="mb-5">
    <div>
      <h3 class="txt-title float-md-start mb-0 ">PARK-iN</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link " href="home.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
        <a class="nav-link " href="yourbookings.php">Your Bookings <i class="fa fa-qrcode" aria-hidden="true"></i></a>
        <a class="nav-link " aria-current="page" href="profile.php">Profile <i class="fa fa-user-o" aria-hidden="true"></i></a>
        <a class="nav-link " href="logout.php">Logout
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a> 
      </nav>
    </div>
  </header>

  <main class="px-4">
 <?php include "scroll_top.php"; ?>
  <div class="container box-up  col-4 justify-content-center">
  <div class="box-lg">
  <div class="heading" style="font-size:50px">
                <b><i class="fa fa-user-o" aria-hidden="true"></i></b>
   </div>
<!--change password-->
   <div class="wrapper">
		<div class="container">
			<div class="row">		
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Change Password</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{ ?>
   <meta http-equiv = "refresh" content = "2;" />
   
   <?php 
    if($_SESSION['msg']){ ?>
    <div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
      
    <?php } else { ?>
 <div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">×</button>
 <?php echo htmlentities($_SESSION['smsg']);?><?php echo htmlentities($_SESSION['smsg']="");
//  header('location:profile.php');
 ?>
 </div>
 <!-- <script type="text/javascript">
			window.location="profile.php";
		</script> -->
    
</div>
  <?php  }
   ?>
									

                 
<?php } ?>
									

			<form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
									
<div class="control-group">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">Current Password</h5></label>      
<div class="controls">
<input type="password" placeholder="Enter your current Password"  name="password" class="input100 form-control" required>
</div>
</div>


<div class="control-group">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">New Password</h5></label>      
<div class="controls">
<input type="password" placeholder="Enter your new current Password" id="password" name="newpassword" class="input100 form-control" required>
</div>
</div>

<div class="control-group">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">Confirm New Password</h5></label>      
<div class="controls">
<input type="password" placeholder="Enter your new Password again"  id="confirm_password" name="confirmpassword" class="input100 form-control" required>
</div>
<div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
</div>
<hr>
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-outline-info btn-lg">Submit</button>
                                 </div>
										</div>
									</form>
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

   </div>
    </div>
   </main>
    </div>

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


      <!-- scroll  -->

<!--       
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script> -->
<!-- Scroll  -->

<script>
        var preloader = document.getElementById('loading');

        function myFunction(){
            
            setTimeout(function(){
                preloader.style.display = 'none';
            },1000);

        }
    </script>

      <script>
    $(document).ready(function() {
      $("#confirm_password").on('keyup', function() {
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();
        if (password != confirmPassword)
          $("#CheckPasswordMatch").html("Password does not match !").css("color", "red");
        else
          $("#CheckPasswordMatch").html("Password match !").css("color", "green");
      });
    });
  </script>
      
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>

<?php 
   }
?>
  
  </body>
</html>

