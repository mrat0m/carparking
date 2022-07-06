<?php
session_start();
include("include/connection.php");
$date1 = new DateTime(null, new DateTimezone("Asia/Kolkata"));
$date = $date1->format('Y-m-d H:i:s');
//$time = $date1->format('H:i a');
//header("Location:payment.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      $ps_id = $_POST['pslot'];  
      $amt = $_POST['amt'];
      $duration = $_POST['duration']; 
    }
    $email=$_SESSION['login'];
    $sql=mysqli_fetch_assoc(mysqli_query($conn,"select uid from user where email='$email' and type='customer'"));
    $uid=$sql['uid'];
   
    $_SESSION['date']=$date;
     $query=mysqli_query($conn,"insert into booking (uid,ps_id,duration,paid,status,time) values ('$uid','$ps_id','$duration','$amt','Pending','".$_SESSION['date']."')");
    
   
       echo "success";
       $qwerty=mysqli_fetch_assoc(mysqli_query($conn,"SELECT bid,time FROM booking  ORDER BY `bid` DESC LIMIT 1"));
       $_SESSION['bid']=$qwerty['bid'];
       $_SESSION['time0']=$qwerty['time'];
       $_SESSION['ps_id']=$ps_id;
       header("Location:payment.php");
  

?>