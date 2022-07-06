<?php
session_start();
include('include/connection.php');
$_SESSION['login']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'Y-m-d H:i:s', time () );
mysqli_query($conn,"UPDATE userlog  SET logoutTime = '$ldate' WHERE email = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['msg']="You have successfully logged out.";
$_SESSION['errmsg']="";
header('location:login.php');
?>
