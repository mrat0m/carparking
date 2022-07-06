<?php
  include 'include/connection.php';

  session_start();
  $npslot = $_POST['npslot'];
  $slotrate = $_POST['slotrate'];  
//renaming _POST variable
$impdata = $_POST;

//to prevent from mysqli injection
$npslot = stripcslashes($npslot);
$slotrate = stripcslashes($slotrate);
$npslot = mysqli_real_escape_string($conn, $npslot);
$slotrate = mysqli_real_escape_string($conn, $slotrate);


//query to check if parking slot already exists
$sql = "select * from pslot where npslot = '$npslot'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


if($count == 1 ){
  
	$_SESSION['errmsg']="Parking Slot already exists !";
  
  header("Location:pslot.php");
 //echo "Parking Slot already exists!";   
}

else{
     //query to insert to pslot
	mysqli_query($conn, "insert into pslot (npslot,slotrate) values('$npslot','$slotrate')");

  $_SESSION['msg']="New Parking Slot added !!";
  header("Location:pslot.php");
}
?>
