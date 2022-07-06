<?php
 session_start();
include "include/connection.php"; // Using database connection file here
extract($_GET);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
        <title>PARK-iN | Edit Profile</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
    
    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
<!--font asesome css -->
<link href="fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
<link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/css/cover.css" rel="stylesheet">
<!--========================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main1.css">
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

  </head>
<body id="profile" data-spy="scroll" onload="myFunction()" style="font-family: 'Times New Roman', Times, serif;"  data-target="#navbar-wd" data-offset="98" class=" text-center text-white bg-dark" style="height : 1000px">
<!-- LOADER -->
<div id="loading"></div>
      <!-- END LOADER -->
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
  <header class="mb-4">
    <div>
      <h3 class="txt-title float-md-start mb-0 ">PARK-iN</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link " href="home.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
        <a class="nav-link " href="yourbookings.php">Your Bookings <i class="fa fa-qrcode" aria-hidden="true"></i></a>
        <a class="nav-link " href="profile.php">Profile <i class="fa fa-user-o" aria-hidden="true"></i></a>
        <a class="nav-link " href="logout.php">Logout
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a> 
      </nav>
    </div>
  </header>

  <main class="px-5" >

  <?php include "scroll_top.php"; ?>
  <div class="container box-up  col-6 justify-content-center">
  <div class="heading" style="font-size:50px">
    <b><i class="fa fa-user-o" aria-hidden="true"></i></b>
  </div>

<?php
$email=$_SESSION['login'];
$records = mysqli_query($conn,"select * from customer where email='$email'"); // fetch data from database
//$change = mysqli_query($conn,"select * from user where email='$email'"); // fetch data from database

while($row=mysqli_fetch_assoc($records))
{
  $uid=$row['uid'];
?>
<?php
  if(isset($_POST['submit']))
  {  
    $name = $_POST['name'];  
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];  
    $hna = $_POST['hna'];
    $city = $_POST['city'];  
    $pin = $_POST['pin'];  
    mysqli_query($conn, "update customer SET name='$name',lname='$lname',phone='$phone',hna='$hna',city='$city',pin='$pin' where email='$email'");
    mysqli_query($conn, "update user SET name='$name',lname='$lname' where uid='$uid' and type='customer'");
    // header("Location:profile.php");
    ?>
     <script type="text/javascript">
			window.location="profile.php";
		</script>
    <?php
  }
?>
<br>
<div class="container">
<form id="editc" name="editc" method="POST" onSubmit="return valid();">
<div class="row">
  <div class="col-md-3">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">First Name :</h5></label>            
  </div>
  <div class="col-md-7">
    <div class="wrap-input100 validate-input m-b-5" data-validate="Enter first name">             
      <input class="input100" type="text" id="name" name="name" value="<?php echo $row['name']; ?>" pattern="[A-Za-z]{1,26}" title="Name can only contain Alphabets" required="" />
      <span class="focus-input100"></span>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">Last Name :</h5></label>            
  </div>
  <div class="col-md-7">
  <div class="wrap-input100 validate-input m-b-5" data-validate="Enter last name">
      <input class="input100" type="text" id="lname" name="lname" value="<?php echo $row['lname']; ?>" pattern="[A-Za-z]{1,26}" title="Name can only contain Alphabets" required="" />
      <span class="focus-input100"></span>
  </div>
  </div>
</div>
 
<div class="row">
  <div class="col-md-3">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">e-mail :</h5></label>            
  </div>
  <div class="col-md-7">
  <div class="wrap-input100 validate-input m-b-5" data-validate="Enter email">
      <input class="input100" type="text" id="email" name="email" value="<?php echo $row['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter valid email" disabled/>
      <span class="focus-input100"></span>
  </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">Mobile :</h5></label>            
  </div>
  <div class="col-md-7">
  <div class="wrap-input100 validate-input m-b-5" data-validate="Enter mobile number">
      <input class="input100" type="text" id="phone" name="phone" value="<?php echo $row['phone'];?>" pattern="[6-9]{1}[0-9]{9}" title="Enter valid mobile number" required="" />
      <span class="focus-input100"></span>
                </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">House name :</h5></label>            
  </div>
  <div class="col-md-7">
  <div class="wrap-input100 validate-input m-b-5" data-validate="Enter house number">
      <input class="input100" type="text" id="hna" name="hna" value="<?php echo $row['hna'];?>">
      <span class="focus-input100"></span>
  </div>
  </div>
</div>
      
<div class="row">
  <div class="col-md-3">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">City :</h5></label>            
  </div>
  <div class="col-md-7">
  <div class="wrap-input100 validate-input m-b-5" data-validate="Enter city">
      <input class="input100" type="text" id="city" name="city" value="<?php echo $row['city'];?>">
      <span class="focus-input100"></span>
  </div>
  </div>
</div>
      
<div class="row">
  <div class="col-md-3">
      <label for="" ><h5 class="text-justify" style="padding-top: 20px;">Pincode :</h5></label>            
  </div>
  <div class="col-md-7">
  <div class="wrap-input100 validate-input m-b-15" data-validate="Enter pincode">
      <input class="input100" type="txt" id="pin" name="pin" value="<?php echo $row['pin'];?>">
      <span class="focus-input100"></span>
  </div>
  </div>
</div>
<hr>
                <!--div class="wrap-input100 validate-input m-b-5" data-validate="Enter street">
                    <input class="input100" type="text" id="street" name="street" value="street">
                    <span class="focus-input100"></span>
                </div-->
<div class="container-login100-form-btn">
  <button type="submit" name="submit" class="btn btn-outline-info btn-lg ">
    Save
  </button>
</div>
</form>
</div>
<?php
}
?>
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
            <div class="crp mt-1">
               <!-- img src="images/social_icons.png"/ -->
               <i class="fa fa-facebook-square" style="font-size:28px;" aria-hidden="true"></i>
               <i class="fa fa-instagram" style="font-size:28px;" aria-hidden="true"></i>
               <i class="fa fa-twitter-square" style="font-size:28px;" aria-hidden="true"></i>  
               <i class="fa fa-google-plus-square" style="font-size:28px;" aria-hidden="true"></i> 
            </div>
            <p class="crp mt-0">&emsp;&emsp;2021 ©&ensp;PARK-iN.&ensp;All Right Reserved.</p>
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
            },2000);

        }
    </script>
</body>
</html>

