<?php
session_start();
include "include/connection.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
	<title>PARK-iN | Payment successfull</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">

    <!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
<script> 
		function printDiv() { 
			var divContents = document.getElementById("div_print").innerHTML; 
			var a = window.open('', '', 'height=500, width=500'); 
			a.document.write(divContents); 
			a.document.close(); 
			a.print(); 
		} 
	</script> 
<body id="home" onload="myFunction()" style="font-family: 'Times New Roman', Times, serif;" data-spy="scroll" data-target="#navbar-wd" data-offset="98" class=" h-100 text-center text-white bg-dark">
      <!-- LOADER -->
	  <div id="loading"></div>
      <!-- END LOADER -->

<div class="cover-container d-flex w-100 h-90 p-3 mx-auto flex-column ">
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
<br><br>
<main class="px-3">
<?php include "scroll_top.php"; ?>
<h1>PAYMENT SUCCESSFUL!!!</h1>
<br>
<div id="div_print" > 
  <a onclick="printDiv()">
<img src="images/qrcode.png" alt="qr code_booking_id" width="175" height="175"/></a>
<br>
<?php 
   $bid=$_SESSION['bid'];
?>
<h2>BOOKING ID: <?php echo $bid;?></h2>
  </div>
<h4>This Qr code is to be shown at Parking area.</h4>
<h4>Have Safe Parking!!</h4>
<!-- <br><br> -->
<p class="lead">
      <a href="booking.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Book Another Slot</a>
    </p>
    <br><br><br>
    <p>
      *Click the QRCODE to print
    </p>

</main>
</div>


<script>
        var preloader = document.getElementById('loading');

        function myFunction(){
            
            setTimeout(function(){
                preloader.style.display = 'none';
            },1800);

        }
    </script>

</body>
</html>

