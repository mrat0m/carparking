<?php
 
 include('connection.php'); 
 $aid = mysqli_real_escape_string($conn, $_GET['a']);
 
 if($aid==3)
 {
    
    $ps_id = mysqli_real_escape_string($conn, $_GET['uid']);
    $query=mysqli_query($conn, "update pslot SET slotstatus='in-active' where ps_id='$ps_id'");

    header("location:../pslot.php");
 }
 
 else if($aid==4)
 {
    $ps_id = mysqli_real_escape_string($conn, $_GET['uid']);
    $query=mysqli_query($conn, "update pslot SET slotstatus='Active' where ps_id='$ps_id'");

    header("location:../pslot.php");
 }
 
 ?>