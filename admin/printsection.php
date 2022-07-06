<?php

include 'include/connection.php';

session_start();



$date1 = new DateTime(null, new DateTimezone("Asia/Kolkata"));
$date = $date1->format('d-m-Y');
$time = $date1->format('H:i a');
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARK-iN | ADMIN | Bookings</title>
    <link rel="icon" href="img/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
    <meta http-equiv="refresh" content="0; url=http://localhost/carparking/admin/bookings.php" />

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
       text-align: left; 
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
 </style>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="font-family: 'Times New Roman', Times, serif;">

<?php include_once("include/nav.php"); ?> 
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 
<!-- <script type="text/javascript">
        $(document).ready(function () {
          // alert("SDFS");
          $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            if(inputValue=="slot")
            {
                document.getElementById('searchss').type = 'text';
            }
            if(inputValue=="date")
            {
                document.getElementById('searchss').type = 'date';
            }
            if(inputValue=="month")
            {
                document.getElementById('searchss').type = 'month';
            }
            if(inputValue=="year")
            {
                document.getElementById('searchss').type = 'number';
            }
            // alert("Radio button '" + inputValue + "' is selected");
          });
        });
      </script> -->
      <!-- Script to print the content of a div -->
  <script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 

<div class="main">  
<?php include "../scroll_top.php"; ?>

<body onload="printDiv()">
<div class="cover-container w-100 h-100  mx-auto flex-column ">
       <!-- <span class="heading">
       <h4 class="txt-title float-md-start mb-0"> BOOKINGS</h4>
       
      </span> -->
      <div id="div_print" class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
      <br>
      <h5 class="navbar-brand brand float-md-start mb-0" style="text-align: right;margin-top: -30px;">
      <img style="width:75px; height:50px;" src="img/carparking-logo.png">PARK-iN
      </h5>
    <p align="leftt" style="margin-top: -50px;"> <i class="fa fa-address-card" aria-hidden="true"></i> PARK-iN, Park-in Street,India. 
                     <br><i class="fa fa-phone" aria-hidden="true"></i> +1 234 567 
                  <br><i class="fa fa-envelope" aria-hidden="true"></i> park.in@gmail.com
    </p>
  
    <h4 class="txt-title float-md-start mb-0" style="text-align: center;margin-top: -10px;">
    <?php echo $_SESSION['head'] ?>
    </h4>
    <br>
    <h5 align="right">Date: <?php echo $date ?></h5>
    <h5 align="right">Time: <?php echo $time ?></h5>
  <HR style="border-width: 10px;">
        <br>
        <br>
<table class="table">

  <thead>
   <tr class="table100-head">
   <th class="column1"></th>
    <th class="column1">BOOKING ID</th>
    <th class="column2">UID</th>
    <th class="column2">Name</th>
    <th class="column3">DATE & TIME</th>
    <th class="column4">PARKING SLOT</th>
    <th class="column4">DURATION (Hr)</th>
    <th class="column5">PAID</th>
    <th class="column5">STATUS</th>
    <th class="column5">BALANCE TIME</th>
    <th class="column5">EXTRA TIME TAKEN</th>
   </tr>
  </thead>
          
<?php
$i=1;

//$records = mysqli_query($conn,"select * from booking "); // fetch data from database when status='Paid' or status='pending'
$records = mysqli_query($conn,$_SESSION['valsss']);

while($row = mysqli_fetch_array($records))
{

  $ftime=$row['time'];
   $timestamp = $ftime;
  $splitTimeStamp = explode(" ",$timestamp);
  $dateee = $splitTimeStamp[0];
  $from_time = $splitTimeStamp[1];
  

  $cdate1 = new DateTime(null, new DateTimezone("Asia/Kolkata"));
  $cdate = $cdate1->format('d-m-Y');
  $ctime = $cdate1->format('H:i:s');

    $to_time = strtotime($ctime);
    $from_times = strtotime($from_time);
     $tot= round(abs($to_time - $from_times) / 60/60,2);
    $bal=floatval($row['duration'])-floatval($tot);
    $hr =sprintf('%02d:%02d', (int) $bal, fmod($bal, 1) * 60);
    $hrs =sprintf('%02d:%02d', (int) trim($bal,"-"), fmod(trim($bal,"-"), 1) * 60);

  $a=$row['ps_id'];       //storing ps_id to variable
  $ps=mysqli_query($conn,"select npslot from pslot where ps_id='$a'"); //fetch npslot from database
  $pslot=mysqli_fetch_array($ps);
  
  $uid=$row['uid'];
  $fname=mysqli_query($conn,"select name from user where uid='$uid'");
  $name=mysqli_fetch_array($fname);
  
?>
  <tr>
    <th class="column1"><?php echo $i;$i++; ?></th>
    <td class="column1"><?php echo $row['bid']; ?></td>
    <td class="column2"><?php echo $row['uid']; ?></td>
    <td class="column2"><?php echo $name['name']; ?></td>
    <td class="column3"><?php echo $row['time']; ?></td>
    <td class="column4"><?php echo $pslot['npslot']; ?></td>
    <td class="column5"><?php echo $row['duration']; ?></td>
    <td class="column5"><?php echo $row['paid']; ?></td>
    <td class="column5"><?php echo $row['status']; ?></td>
  
  <?php 
      if($bal<0){ ?>
    <td class="column5">0</td>
      <?php }
      else{ ?>
         <td class="column5"><?php echo $hr; ?></td>
    <?php  }
    if($bal<0){ ?>
      <td class="column5"><?php echo $hrs; ?></td>
        <?php }
        else{ ?>
        <td class="column5">0</td>
           
      <?php  }
    ?>
  </tr>
<?php
}
?>
</table>      
</div>
</div> 
  
  

</div>

</body>
</html>