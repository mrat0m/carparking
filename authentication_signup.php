<?php
 //session_start(); 
 session_start();
include 'include/connection.php';
$email = $_POST['email'];
$password = $_POST['pass'];
$phone = $_POST['phone'];
$name = $_POST['name'];
$lname = $_POST['lname'];
$hna = $_POST['hna'];
$city = $_POST['city'];
$pin = $_POST['pin'];

//database connection
$conn = new mysqli('localhost', 'root', '', 'carparking');
if ($conn->connect_error) {die('Connection Failed:' . $conn->connect_error);} else {
	$stmt = $conn->prepare("INSERT INTO user (name,lname,pass,email) values( ?, ?, ?, ?)");
}

//to prevent from mysqli injection
$email = stripcslashes($email);
$name = stripcslashes($name);
$lname = stripcslashes($lname);
$phone = stripcslashes($phone);
$password = stripcslashes($password);
$hna = stripcslashes($hna);
$city = stripcslashes($city);
$pin = stripcslashes($pin);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$name = mysqli_real_escape_string($conn, $name);
$lname = mysqli_real_escape_string($conn, $lname);
$phone = mysqli_real_escape_string($conn, $phone);
$hna = mysqli_real_escape_string($conn, $hna);
$city = mysqli_real_escape_string($conn, $city);
$pin = mysqli_real_escape_string($conn, $pin);

$sql = "select * from user where email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
	header("Location:signup.php");
	//echo "User already exist";
	$_SESSION['errmsg']="User already exist";
} else {
    mysqli_query($conn, "insert into user (name,lname,email,password,status) values('$name','$lname','$email','$password','active')");
  $uid=mysqli_fetch_assoc(mysqli_query($conn, "select uid from user where email='$email'"));
$uid1=$uid['uid'];
  mysqli_query($conn, "insert into customer (uid,name,lname,email,phone,hna,city,pin) values('$uid1','$name','$lname','$email','$phone','$hna','$city','$pin')");

  $_SESSION['msg']="Account Successfull created";
	header("Location:login.php");

}

?>