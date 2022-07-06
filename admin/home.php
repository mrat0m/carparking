<?php
session_start();
include('include/connection.php');
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARK-iN | ADMIN | Change Password</title>
        <link rel="icon" href="img/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
     <style>
        .main {
       padding: 20px;
  margin-top: 75px;
  height: 670.5px; /* Used in this example to enable scrolling */
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
        .txt-title{
       display: block;
       
       font-family: JosefinSans-Bold;
       font-size: 35px;
       color: black;
       margin-top: 10px;
       line-height: 1.2;
       text-align: center; 
       }
       @font-face {
         font-family: JosefinSans-Bold;
         src: url('../fonts/JosefinSans/JosefinSans-Bold.ttf'); 
        }
       @font-face {
        font-family: 'FontAwesome';
        src: url('../fonts/fontawesome-webfont.eot?v=4.7.0');
        src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('../fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
        font-weight: normal;
        font-style: normal;
      }
      .btn-b {
  background-color: black;
  border: none;
  color: white;
  padding: 4px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 15px 15px;
  cursor: pointer;
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
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  
  </head>
  <body >
      <!-- LOADER -->
      <div id="loading"></div>
      <!-- END LOADER -->
  <?php include_once("include/nav.php"); ?>  
  
  <div class="main">

  <br><br><br>
    <h1 class="txt-title float-md-start mb-0">Welcome back !</h1>
    <h1 class="txt-title float-md-start mb-0">#Admin </h1>
    
<?php
if(strlen($_SESSION['login'])==0)
{	
header('location:../index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
  $sql = "select password from user where email = '".$_SESSION['login']."' and password='".$_POST['password']."'";  
  $result = mysqli_query($conn, $sql);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result);  
        
if($count>0)
{
 $conn=mysqli_query($conn,"update user set password='".$_POST['newpassword']."' where type='admin'");
 // $_SESSION['msg']="Password Changed Successfully !!";
 alert("Password Changed Successfully !!");
}
else
{
   alert("Old Password not match !!");
// $_SESSION['msg']="Old Password not match !!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
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
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body style="font-family: 'Times New Roman', Times, serif;" onload="myFunction()">

	<div class="wrapper">
		<div class="container">
    <?php include "../scroll_top.php"; ?>
			<div class="row">		
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Admin Change Password</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
<meta http-equiv = "refresh" content = "2; url = http://localhost/carparking/admin/home.php" />
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
									<br />

			<form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
									
<div class="control-group">
<label class="control-label" for="basicinput">Current Password</label>
<div class="controls">
<input type="password" placeholder="Enter your current Password"  name="password" class="span8 tip form-control" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">New Password</label>
<div class="controls">
<input type="password" placeholder="Enter your new current Password"  name="newpassword" class="span8 tip form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Current Password</label>
<div class="controls">
<input type="password" placeholder="Enter your new Password again"  name="confirmpassword" class="span8 tip form-control" required>
</div>
</div>




										

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn-b">Submit</button>
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


	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
<?php } ?>
  
</div>

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

