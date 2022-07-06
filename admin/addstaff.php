<?php
	include_once("include/connection.php");
	session_start();
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARK-iN | ADMIN | Add Staff</title>
        <link rel="icon" href="img/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
		
	<style>
/* For the "inset" look only */

body {
    position: abstract;
    top: 20px;
    left: 20px;
    bottom: 20px;
    right: 20px;
    padding: 30px; 
    overflow-y: scroll;
    overflow-x: hidden;
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
.main {
  padding: 20px;
  margin-top: 40px;/* Used in this example to enable scrolling */
}
</style>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
  
  </head>
  <body style="font-family: 'Times New Roman', Times, serif;">
  <?php include_once("include/nav.php"); ?> 
  <?php include "../scroll_top.php"; ?>
  <div class="main">
  <div class="displaysuccess"></div>
		<div class="container">
			<div class="wrapper add_employee clearfix">
			<div class="section_title">Add Staff<hr></div>
			<form id="addstaff" action="authentication_addstaff.php" class="clearfix" method="POST">
				<div class="input-box input-small left" data-validate="Enter Firstname">
						<label for="firstname">First Name</label><br>
						<input type="text" class="inputField" name="firstname" pattern="[A-Z]{1}[A-Za-z]{1,26}" required="" />
						
					</div>
					<div class="input-box input-small right" data-validate="Enter Lastname">
						<label for="lastname">Last Name</label><br>
						<input type="text" class="inputField" name="lastname" pattern="[A-Z]{1}[A-Za-z]{1,26}">
						<!--div class="error lastnameerror"></div-->
					</div>
					
					<div class="input-box input-small left" data-validate="Enter email">
						<label for="email">Staff e-mail</label><br>
						<input type="text" class="inputField" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="" />
						
					</div>
					<div class="input-box input-small right" data-validate="Enter Phone no.">
						<label for="phone">Phone number</label><br>
						<input type="text" class="inputField" name="phone" pattern="[6-9]{1}[0-9]{9}" required="" />
			
					</div>
					<div class="input-box input-small left" data-validate="Enter Password">
						<label for="pass">Passwords</label><br>
						<input type="password" id="pass" class="inputField" name="pass" required="" />

					</div>
					<div class="input-box input-small right" data-validate="Enter confirm Password">
						<label for="newpass">Confirm password</label><br>
						<input type="password" id="newpass" class="inputField" name="newpass" required="" />

					</div>
					<div class="input-box input-small left" data-validate="Enter resaddress">
						<label for="resaddress">Residential Address</label><br>
						<input type="text" class="inputField" name="resaddress"  required="" />
			
					</div>
					
					<div class="input-box input-small right">
						<label for="street">Street</label><br>
						<input type="text" class="inputField" name="street" required="" />
						
					</div>
					<div class="input-box input-small left">
						<label for="city">City</label><br>
						<input type="text" class="inputField" name="city" pattern="[A-Z]{1}[A-Za-z]{1,26}" required="" />
						
					</div>
					<div class="input-box input-small right">
						<label for="state">State</label><br>
						<input type="text" class="inputField" name="state" pattern="[A-Z]{1}[A-Za-z]{1,26}" required="" />
						
					</div>
					<div class="input-box input-small left">
						<label for="datejoined">Date joined</label><br>
						<input type="date" id="datepicker" class="inputField" name="datejoined" required="" />
						
					</div>
					<div class="input-box input-small right">
						<label for="jobpos">Job Type</label><br>
						<input type="text" class="inputField" name="jobpos" required="" />
				
					</div>
					<div class="input-box">
						<button type="submit" class="submitField">
							Add Staff Details
						</button>
					    <div>
                          <br><br>
                        </div>
				    </div>
					
				</form>
				
				<script>
            window.onload = function() {
                document.getElementById("pass").onchange = validatePassword;
                document.getElementById("newpass").onchange = validatePassword;
            }

            function validatePassword() {
                var pass2 = document.getElementById("newpass").value;
                var pass1 = document.getElementById("pass").value;
                if (pass1 != pass2)
                    document.getElementById("newpass").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("newpass").setCustomValidity("");
                //empty string means no validation error
            }
            </script>
			</div>
		</div>
</div>		
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>