<?php
include "include/connection.php"; // Using database connection file here
session_start();
if(isset($_GET['fbid'])){
  extract($_GET);
  $finish = mysqli_query($conn,"UPDATE `booking` SET `status`='Exit' WHERE `bid`='$fbid'");
  $uplt=mysqli_query($conn,"UPDATE `pslot` SET `slotstatus`='Active' WHERE `ps_id`='$ps_id'");
  header("Location:yourbookings.php");

}
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
        <title>Park-iN</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
    

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--font asesome css -->
<link href="fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
<link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>

*{
	font-family: 'Times New Roman', Times, serif;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;

      
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
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
    background: white; 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: black; 
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
    .bg-dark1{
  background: #212529;
  box-shadow: 0px 0px 99px rgba(8, 6, 6, 0.877);
}
</style>
    
    <!-- Custom styles for this template -->
    <link href="assets/css/cover.css" rel="stylesheet">
  </head>
  
<body id="home" onload="myFunction()" data-spy="scroll" data-target="#navbar-wd" data-offset="98" class="  text-center text-white bg-dark1">
      <!-- LOADER -->
      <!-- <div id="loading"></div> -->
      <!-- END LOADER -->
      <?php include "scroll_top.php"; ?>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column " style="max-height: 130px;min-height: 130px;">
  <header class="mb-4">
    <div>
      <h3 class="txt-title float-md-start mb-0 ">PARK-iN</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link " href="home.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
        <a class="nav-link " href="booking.php">Book Your Slot</a>
        <a class="nav-link active " aria-current="page" href="yourbookings.php">Your Bookings <i class="fa fa-qrcode" aria-hidden="true"></i></a>
        <a class="nav-link " href="profile.php">Profile <i class="fa fa-user-o" aria-hidden="true"></i></a>
        <a class="nav-link " href="logout.php">Logout  <i class="fa fa-sign-out" aria-hidden="true"></i></a> 
      </nav>
    </div>
  </header><br>
</div>
      <div class="txt">
        <h1><b>Your Booking History<center><hr style="width:40%;"></center></b></h1>
      </div><br>
<div class="container fit-lg bg-white" style="width: 1260px;">
  
<table class="table table-bordered" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Booking ID</th>
      <th scope="col">Date & Time</th>
      <th scope="col">Parking slot</th>
      <th scope="col">Duration</th>
      <th scope="col">Paid</th>
      <th scope="col">Status</th>
      <th scope="col">Extend</th>
      <th class="column5">Balanace Time</th>
    <th class="column5">Extra Time Taken</th>
    <th class="column5">Payable</th>
    </tr>
  </thead>

  <tbody>
<?php

$i=1;
    $email=$_SESSION['login'];
    $sql=mysqli_fetch_assoc(mysqli_query($conn,"select uid from user where email='$email' and type='customer'"));
    $uid=$sql['uid'];

$records = mysqli_query($conn,"select * from booking where uid='$uid' and (status='PAID' or status='Exit') ORDER BY `time` DESC "); // fetch data from database

while($row = mysqli_fetch_array($records))
{
  $ftime=$row['time'];
  $timestamp = $ftime;
 $splitTimeStamp = explode(" ",$timestamp);
 $date = $splitTimeStamp[0];
 $from_time = $splitTimeStamp[1];
 

 $cdate1 = new DateTime(null, new DateTimezone("Asia/Kolkata"));
 $cdate = $cdate1->format('d-m-Y');
 $ctime = $cdate1->format('H:i:s');

   $to_time = strtotime($ctime);
    $from_times = strtotime($from_time);
     $tot= round(abs($to_time - $from_times) / 60/60,2);
    $bal=floatval($row['duration'])-floatval($tot);
    $hr =sprintf('%02d:%02d', (int) $bal, fmod($bal, 1) * 60);
    

// echo $hr = floatval($bal*60);

  $a=$row['ps_id'];
  $ps=mysqli_query($conn,"select npslot,slotstatus from pslot where ps_id='$a'");
  $pslot=mysqli_fetch_array($ps);
?>
      <td scope="col" style="width: 50px;"><?php echo $i; $i++; ?></td>
      <td scope="col" style="width: 120px;"><?php echo $row['bid']; ?></td>
      <td scope="col" style="width: 120px;"><?php echo $row['time']; ?></td>
      <td scope="col" style="width: 120px;"><?php echo $pslot['npslot']; ?></td>
      <td scope="col" style="width: 50px;"><?php echo $row['duration']; ?></td>
      <td scope="col" style="width: 50px;"><?php echo $row['paid']; ?></td>
      <td scope="col" style="width: 50px;"><?php echo $row['status']; ?></td>
      <?php 
        if($row['status'] !="Exit" ){

        if($pslot['slotstatus'] !="Active"){
         ?>
      <td class="column6" style="width: 100px;"><a class="btn btn-danger" href="extend.php?uid=<?php echo $row['bid']; ?>" role="button">Extend</a></td>
   <?php 
         }
         else{
          ?> <td class="column6"style="width: 100px;"><i class="fa fa-close"></i></td>
          <?php
         }
       }
    else{ ?>
        <td class="column6" style="width: 150px;"><i class="fa fa-close"></i></td>
   <?php }
      ?>
      <?php 
      if($bal<0){ ?>
    <td class="column5"style="width: 120px;">-</td>
      <?php }

      else{ ?>
         <td class="column5"style="width: 120px;"><?php echo $hr; ?></td>
    <?php  }
    if($bal<0){
        
       $hrs =sprintf('%02d:%02d', (int) trim($bal,"-"), fmod(trim($bal,"-"), 1) * 60);
       $bal_amt=trim($bal,"-")*50; 
       ?>
      <td class="column5"style="width: 120px;"><?php echo $hrs; ?></td>
      <?php 
        if($row['status'] !="Exit"){?>
        <td class="column6"style="width: 150px;"><a class="btn btn-danger" href="user_fine_payment.php?fine_bid=<?php echo $row['bid']; ?>&ps_id=<?php echo $row['ps_id']; ?>" role="button">
         Pay  ₹<?php echo $bal_amt; $_SESSION['bal_amt']=$bal_amt;$_SESSION['et_duration']=$hrs;?>/-</a></td>
        <?php }
         if($row['status'] =="Exit"){?>
         <td class="column5"style="width: 150px;"><i class="fa fa-close"></i></td>
         
         <?php }
      ?>
      <!-- <td class="column6"><a class="btn btn-danger" href="user_fine_payment.php?fine_bid=<?php echo $row['bid']; ?>&ps_id=<?php echo $row['ps_id']; ?>" role="button">Pay  ₹<?php echo $bal_amt; ?>/-</a></td> -->
        <?php }
        else{ 
          if($row['status'] =="PAID"){?>
        <td class="column5"style="width: 120px;">-</td>
        <!-- onclick=return confirm('Are you sure you are leaving PARK-iN?'); -->
        <td class="column6"style="width: 150px;"><a class="btn btn-danger" onclick="return confirm('Are you sure you are leaving PARK-iN?');" href="?fbid=<?php echo $row['bid']; ?>&ps_id=<?php echo $row['ps_id']; ?>" role="button">Finish</a></td>
<!--      
        data-toggle="confirmation"
        data-btn-ok-label="Continue" data-btn-ok-class="btn-success"
        data-btn-ok-icon-class="material-icons" data-btn-ok-icon-content="check"
        data-btn-cancel-label="Stoooop!" data-btn-cancel-class="btn-danger"
        data-btn-cancel-icon-class="material-icons" data-btn-cancel-icon-content="close"
        data-title="Is it ok?" data-content="This might be dangerous"
          -->
     <?php  }
       if($row['status'] =="Exit"){
    ?>
    <td class="column5"style="width: 120px;">-</td>
    <td class="column5"style="width: 150px;"><i class="fa fa-close"></i></td>
    <?php
  }
}

    ?>
    </tbody>
<?php
}
?>
</table>

</div>
<br><br><br><br>

<script>
        var preloader = document.getElementById('loading');

        function myFunction(){
            
            setTimeout(function(){
                preloader.style.display = 'none';
            },1500);

        }
    </script>

    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap-confirmation.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/script.js" charset="utf-8"></script>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
