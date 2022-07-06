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
    <meta http-equiv = "refresh" content = "30; url = http://localhost/carparking/staff/bookings.php" />
    <title>PARK-iN | STAFF | Bookings</title>
    <link rel="icon" href="img/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">

<style>
  .main {
  padding: 20px;
  margin-top: 75px;
  height: 671.5px; /* Used in this example to enable scrolling */
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
<?php include "../scroll_top.php"; ?>
<div class="main">  
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
       <span class="heading">
       <h4 class="txt-title float-md-start mb-0"> BOOKINGS</h3>
       <form action="" method="post">
         <table class="table" style="width: 600px;" align="center">
           <tr>
          <td style="font-size: 17px;">Order By : <input type="radio" name="ord" id="" checked value="date"> Date </td>
          <td style="font-size: 17px;"><input type="radio" name="ord" id="" value="slot"> Slot</td>
          <td><input type="submit" name="filter" class="btn btn-primary btn-sm" value="Filter"></td>
       </tr>
       <tr>
         <td><input type="text" class="form-control"  placeholder="date or slot name" name="search" id=""></td>
         <td ><input type="submit" name="srch" class="btn btn-primary" style="width: 150px;" value="Search" id=""></td>
         <td><input type="submit" name="" class="btn btn-warning" style="width: 150px;" value="Clear" id=""></td>
       </tr>
         </table>
       </form>
      </span>
<table>
	<thead>
   <tr class="table100-head">
        <th class="column1"></th>
		<th class="column1">BOOKING ID</th>
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
$records = mysqli_query($conn,"select * from booking where status='PAID'"); // fetch data from database
//$records = mysqli_query($conn,"select * from booking "); // fetch data from database when status='Paid' or status='pending'

if(isset($_POST['filter'])){
  extract($_POST);
  if($ord=="date"){
    // echo "hiiii";
    $records = mysqli_query($conn,"select * from booking where status='PAID' order by time desc ");
  }
  else if($ord=="slot"){
    
    
     $records = mysqli_query($conn,"select * from booking where status='PAID' order by ps_id desc ");
  }
  
}
if(isset($_POST['srch'])){
  extract($_POST);
  $records = mysqli_query($conn,"SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE STATUS='PAID' AND (`time` LIKE '%$search%' OR `npslot` LIKE '%$search%')");
}

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

</body>
</html>