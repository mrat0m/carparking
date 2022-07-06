<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PARK-iN | Login</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--font asesome css -->
   <link href="fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
   <link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
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
    background: grey; 
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
<body onload="myFunction()" style="font-family: 'Times New Roman', Times, serif;">
	 <!-- LOADER -->
     <div id="loading"></div>
      <!-- END LOADER -->
<?php
 include_once("include/nav.php");
?>
  	<div class="container-login100" style="background-image: url('images/bgimg1.jpeg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
		

		<form name="f1" action = "authentication.php" onsubmit = "return true" method = "POST" class="login100-form validate-form">
<!-- p-l-55 p-r-55 p-t-178 -->	
			<span class="login100-form-title2  p-b-7">
					PARK-iN		
				</span>
                <span class="login100-form-title p-b-20">
					Login
				</span>
				<div class="text-center p-b-10" style="color:red;font-size:15px;" >
                    <?php
                        echo htmlentities($_SESSION['errmsg']);
                    ?>
                    <?php
                        echo htmlentities($_SESSION['errmsg']="");
                    ?>
	            </div>
				<div class="text-center p-b-10" style="color:green;font-size:15px;" >
                    <?php
                        echo htmlentities($_SESSION['msg']);
                    ?>
                    <?php
                        echo htmlentities($_SESSION['msg']="");
                    ?>
	            </div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
					<input class="input100"  type="text" name="email" placeholder="email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate ="Enter password">
					<input class="input100" type="password" name="pass" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<input type="submit" id="btn" name="login" value="login" class="login100-form-btn">
				</div>
    
				<br><hr>
				<br>
				<div class="text-center">
                                       New customer?
					<a href="signup.php" class="txt2 hov1">
						Create new account
					</a>
                </div>
   			</form>

			
		</div>
	</div>
	<div id="dropDownSelect1"></div>

	<script>
        var preloader = document.getElementById('loading');

        function myFunction(){
            
            setTimeout(function(){
                preloader.style.display = 'none';
            },1000);

        }
    </script>

</body>
</html>