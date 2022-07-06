<?php
	include_once("include/connection.php");
	session_start();
  $ssid = mysqli_real_escape_string($conn, $_GET['s']);

if($ssid==1)
{ 
  $stid = mysqli_real_escape_string($conn, $_GET['stid']);
  $query=mysqli_query($conn, "SELECT * FROM staff where sid='$stid'");
  $staffe=mysqli_fetch_array($query); 
  $uid=$staffe['uid'];
//else {
  //header("location:../pslot.php");
?>

<?php
  if(isset($_POST['submit']))
  {  
    $firstname = $_POST['firstname']; 
    $lastname = $_POST['lastname']; 
    $phone = $_POST['phone']; 
    $resaddress = $_POST['resaddress']; 
    $street = $_POST['street']; 
    $city = $_POST['city']; 
    $state = $_POST['state']; 
    $jobpos = $_POST['jobpos'];  
    mysqli_query($conn, "update staff SET lastname='$lastname',phone='$phone',resaddress='$resaddress',street='$street',city='$city',state='$state',jobpos='$jobpos' where sid='$stid'");
    mysqli_query($conn, "update user SET lname='$lastname' where uid='$uid' and type='staff'");
    
    $_SESSION['msg']="Staff details updated !!!";
    header("location:vstaff.php");
  }
?>
<?php
 }
 ?>
 <!doctype html>
<html lang="en" class="h-100">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARK-iN | ADMIN | Edit Staff</title>
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
			<form id="editstaff" class="clearfix" method="POST">
				<div class="input-box input-small left" data-validate="Enter Firstname">
          <label for="firstname">First Name</label><br>
          <input type="text" class="inputField" name="firstname" value="<?php echo $staffe['firstname']; ?>" pattern="[A-Z]{1}[A-Za-z]{1,26}" disabled/>
        </div>
        <div class="input-box input-small right" data-validate="Enter Lastname">
          <label for="lastname">Last Name</label><br>
          <input type="text" class="inputField" name="lastname" value="<?php echo $staffe['lastname']; ?>" pattern="[A-Z]{1}[A-Za-z]{1,26}">
          <!--div class="error lastnameerror"></div-->
        </div>				
        <div class="input-box input-small left" data-validate="Enter email">
          <label for="email">Staff e-mail</label><br>
          <input type="text" class="inputField" name="email" value="<?php echo $staffe['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" disabled/>
        </div>
        <div class="input-box input-small right" data-validate="Enter Phone no.">
          <label for="phone">Phone number</label><br>
          <input type="text" class="inputField" name="phone" value="<?php echo $staffe['phone']; ?>" pattern="[6-9]{1}[0-9]{9}" required="" />
        </div>
        <div class="input-box input-small left" data-validate="Enter resaddress">
          <label for="resaddress">Residential Address</label><br>
          <input type="text" class="inputField" name="resaddress" value="<?php echo $staffe['resaddress']; ?>" required="" />		
        </div>
					
					<div class="input-box input-small right">
						<label for="street">Street</label><br>
						<input type="text" class="inputField" name="street" value="<?php echo $staffe['street']; ?>" required="" />
						
					</div>
					<div class="input-box input-small left">
						<label for="city">City</label><br>
						<input type="text" class="inputField" name="city" value="<?php echo $staffe['city']; ?>" pattern="[A-Z]{1}[A-Za-z]{1,26}" required="" />
						
					</div>
					<div class="input-box input-small right">
						<label for="state">State</label><br>
						<input type="text" class="inputField" name="state" value="<?php echo $staffe['state']; ?>" pattern="[A-Z]{1}[A-Za-z]{1,26}" required="" />
						
					</div>
					<div class="input-box input-small left">
						<label for="datejoined">Date joined</label><br>
						<input type="date" id="datepicker" class="inputField" name="datejoined" value="<?php echo $staffe['datejoined']; ?>" disabled/>
						
					</div>
					<div class="input-box input-small right">
						<label for="jobpos">Job Type</label><br>
						<input type="text" class="inputField" name="jobpos" value="<?php echo $staffe['jobpos']; ?>" required="" />
				
					</div>
					<div class="input-box">
						<button type="submit" name="submit" class="submitField">
							Update Staff Details
						</button>
					    <div>
                          <br><br>
                        </div>
				    </div>
					
				</form>

			</div>
		</div>
</div>		
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>