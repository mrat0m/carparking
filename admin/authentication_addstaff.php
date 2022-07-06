<?php
include 'include/connection.php';

session_start();

//renaming _POST variable
$impdata = $_POST;

//variables
$firstname = $lastname = $email = $phone =  $pass = $resaddress = $street = $city = $state = $datejoined = $jobpos = $status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_input($impdata['firstname']);
  $lastname = test_input($impdata['lastname']);
  $email = test_input($impdata['email']);
  $pass = test_input($impdata['pass']);
  $phone = test_input($impdata['phone']);
  $resaddress = test_input($impdata['resaddress']);
  $street = test_input($impdata['street']);
  $city = test_input($impdata['city']);
  $state = test_input($impdata['state']);
  $datejoined = test_input($impdata['datejoined']);
  $jobpos = test_input($impdata['jobpos']);
  //$status = test_input($impdata['status']);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//query execution

//query to check if email already exists
$sql = "select * from staff where email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


if($count == 1 ){
 echo 'Staff already exists!';
    
}

else{
  mysqli_query($conn, "insert into user (name,lname,email,password,status,type) values('$firstname','$lastname','$email','$pass','active','staff')");
  $uid=mysqli_fetch_assoc(mysqli_query($conn, "select uid from user where email='$email'"));
$uid1=$uid['uid'];
  
     //query to insert to staff
     mysqli_query($conn,"insert into staff (uid,firstname,lastname,email,phone,resaddress,street,city,state,datejoined,jobpos,status) values('$uid1','$firstname','$lastname','$email','$phone','$resaddress','$street','$city','$state','$datejoined','$jobpos','active')");
            
     header("Location:vstaff.php");

    }
    
?>