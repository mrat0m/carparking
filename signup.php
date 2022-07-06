<?php
	include_once "include/connection.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PARK-iN | Create new account</title>
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
        .vl{
            border-left: 2px black;
            height: 100px;
        }
body {
  background-image: url('images/bgimg1.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
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
    background: grey; 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: black; 
}
/*   
  #loading{
        position: fixed;
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100vh;
        background:  url('images/pre1.gif') no-repeat center;
        background-size: cover;
        z-index: 99999;
    }   */
</style>
<!-- <script>
        var preloader = document.getElementById('loading');

        function myFunction(){
            
            setTimeout(function(){
                preloader.style.display = 'none';
            },1000);

        }
    </script>
       -->
</head>
<body onload="myFunction()" style="font-family: 'Times New Roman', Times, serif;">
<!-- LOADER -->
<!-- <div id="loading"></div> -->
      <!-- END LOADER -->
<?php include_once("include/nav.php"); ?>
    <div class="container-login100" width="75">
    
        <div class="wrap-login100 p-l-55 p-r-55 p-t-20 p-b-30">
            <form name="f1" action="authentication_signup.php" method="POST" class="login100-form validate-form">
                <!--form p-l-55 p-r-55 p-t-178"-->
                <span class="login100-form-title2  p-b-7 ">
                    PARK-iN
                </span>
                <span class="login100-form-title p-b-30">
                    Create New Account
                </span>
				<div class="text-center p-b-10" style="color:red;font-size:15px;" >
                    <?php
                        echo htmlentities($_SESSION['errmsg']);
                    ?>
                    <?php
                        echo htmlentities($_SESSION['errmsg']="");
                    ?>
	            </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter first name">
                    <input class="input100" type="text" id="name" name="name" placeholder="first name*" pattern="[A-Za-z]{1,26}" title="Name can only contain Alphabets" required="" />
                    <span class="focus-input100"></span>

                </div>
                
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter last name">
                    <input class="input100" type="text" id="lname" name="lname" placeholder="last name*" pattern="[A-Za-z]{1,26}" title="Name can only contain Alphabets" required="" />
                    <span class="focus-input100"></span>

                </div>
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
                    <input class="input100" type="text" id="email" name="email" placeholder="e-mail*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter valid email" required="" />
                    <span class="focus-input100"></span>

                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter mobile number">
                    <input class="input100" type="text" id="phone" name="phone" placeholder="mobile number*" pattern="[6-9]{1}[0-9]{9}" title="Enter valid mobile number" required="" />
                    <span class="focus-input100"></span>
                </div>
                 
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter house number">
                    <input class="input100" type="text" id="hna" name="hna" placeholder="house name">
                    <span class="focus-input100"></span>
                </div>

                <!--div class="wrap-input100 validate-input m-b-20" data-validate="Enter street">
                    <input class="input100" type="text" id="street" name="street" placeholder="street">
                    <span class="focus-input100"></span>
                </div-->

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter city">
                    <input class="input100" type="text" id="city" name="city" placeholder="city">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter pincode">
                    <input class="input100" type="txt" id="pin" name="pin" placeholder="pincode">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" id="pass" name="pass" placeholder="new password*" required="" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password2">
                    <input class="input100" type="password" id="password2" name="password2" placeholder="Confirm password*" required="" />
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>


                <br>
                <div class="text-center">   
      Already a customer?
                    <a href="login.php" class="txt2 hov1">
                        Login
                    </a>
                </div>
            </form>
            
          

    
            <script>
            window.onload = function() {
                document.getElementById("pass").onchange = validatePassword;
                document.getElementById("password2").onchange = validatePassword;
            }

            function validatePassword() {
                var pass2 = document.getElementById("password2").value;
                var pass1 = document.getElementById("pass").value;
                if (pass1 != pass2)
                    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("password2").setCustomValidity("");
                //empty string means no validation error
            }
            </script>



        </div>
    </div>
    
    <div id="dropDownSelect1"></div>
    
</body>
</html>


