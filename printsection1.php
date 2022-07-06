<?php

include 'include/connection.php';

session_start();
$records = mysqli_query($conn,"select * from booking where status='PAID' or status='Leaved'"); // fetch data from database

$t=mysqli_query($conn,"select SUM(`paid`) AS tot from booking where status='PAID' or status='Leaved'");
$tss=mysqli_fetch_all($t,MYSQLI_ASSOC);
$_SESSION['valtot']=$tss;

if(isset($_POST['filter'])){
  extract($_POST);
  if($ord=="pdate"){
    // echo "hiiii";
    $q="select * from booking where status='PAID' or status='Leaved' order by time desc ";
    $records = mysqli_query($conn,"select * from booking where status='PAID' or status='Leaved' order by time desc ");
  }
  else if($ord=="pslot"){
    
    $q="select * from booking where status='PAID' or status='Leaved' order by ps_id asc ";
     $records = mysqli_query($conn,"select * from booking where status='PAID' or status='Leaved' order by ps_id asc ");
  }
 
  
}
if(isset($_POST['srch'])){
  extract($_POST);
  if($jsfilter=="slot"){
    $q="SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID'  AND `npslot` LIKE '%$search%') or (STATUS='Leaved'  AND `npslot` LIKE '%$search%')";
    $records = mysqli_query($conn,"SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID'  AND `npslot` LIKE '%$search%') or (STATUS='Leaved'  AND `npslot` LIKE '%$search%')");
    $t=mysqli_query($conn,"SELECT SUM(`paid`) AS tot FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID'  AND `npslot` LIKE '%$search%') or (STATUS='Leaved'  AND `npslot` LIKE '%$search%') ");
     $tss=mysqli_fetch_all($t,MYSQLI_ASSOC);
     $_SESSION['valtot']=$tss;
}
  else if($jsfilter=="date"){
    // echo "<script> alert('$search')</script>";
    if($search1==""){
       $q="SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID'  AND `time` LIKE '%$search%') or  (STATUS='PAID'  AND `time` LIKE '%$search%')";
        $records = mysqli_query($conn,"SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID'  AND `time` LIKE '%$search%') or  (STATUS='PAID'  AND `time` LIKE '%$search%')");
        $t=mysqli_query($conn,"SELECT SUM(`paid`) AS tot FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID'  AND `time` LIKE '%$search%') or (STATUS='PAID'  AND `time` LIKE '%$search%')");
        $tss=mysqli_fetch_all($t,MYSQLI_ASSOC);
        $_SESSION['valtot']=$tss;
    }
    else{
        $q="SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND `time` >='$search' and `time`<= '$search1.23:59:59.999') or (STATUS='Leaved' AND `time` >='$search' and `time`<= '$search1.23:59:59.999')";
        $records = mysqli_query($conn,"SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND `time` >='$search' and `time`<= '$search1.23:59:59.999') or (STATUS='Leaved' AND `time` >='$search' and `time`<= '$search1.23:59:59.999')");

        $t=mysqli_query($conn,"SELECT SUM(`paid`) AS tot FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND  `time` >='$search' and `time`<= '$search1.23:59:59.999') or  (STATUS='Leaved' AND `time` >='$search' and `time`<= '$search1.23:59:59.999')");
        $tss=mysqli_fetch_all($t,MYSQLI_ASSOC);
        $_SESSION['valtot']=$tss;
    }
     
     
     
    //  echo "SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE STATUS='PAID' AND `time` LIKE '%$search%'";
  }
  else if($jsfilter=="month"){
    $q="SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND `time` LIKE '%$search%') or (STATUS='Leaved' AND `time` LIKE '%$search%')";
    $records = mysqli_query($conn,"SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND `time` LIKE '%$search%') or (STATUS='Leaved' AND `time` LIKE '%$search%')");
    
    $t=mysqli_query($conn,"SELECT SUM(`paid`) AS tot FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND `time` LIKE '%$search%') or (STATUS='Leaved' AND `time` LIKE '%$search%')");
     $tss=mysqli_fetch_all($t,MYSQLI_ASSOC);
     $_SESSION['valtot']=$tss;
}
  else if($jsfilter=="year"){
    $q="SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND `time` LIKE '%$search%') or (STATUS='Leaved' AND `time` LIKE '%$search%')";
    $records = mysqli_query($conn,"SELECT * FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND `time` LIKE '%$search%') or (STATUS='Leaved' AND `time` LIKE '%$search%')");
    
    $t=mysqli_query($conn,"SELECT SUM(`paid`) AS tot FROM booking INNER JOIN `pslot` USING(`ps_id`) WHERE (STATUS='PAID' AND `time` LIKE '%$search%') or (STATUS='Leaved' AND `time` LIKE '%$search%')");
   
    $tss=mysqli_fetch_all($t,MYSQLI_ASSOC);  
    $_SESSION['valtot']=$tss;
}
  
}
$_SESSION['valsss']=$q;
$date1 = new DateTime(null, new DateTimezone("Asia/Kolkata"));
$date = $date1->format('d-m-Y');
$time = $date1->format('H:i a');
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin panel</title>
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
<script type="text/javascript">
        $(document).ready(function () {
          // alert("SDFS");
          $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            if(inputValue=="slot")
            {
                document.getElementById('searchss').type = 'text';
                document.getElementById('searchss1').hidden = true;
            }
            if(inputValue=="date")
            {
                document.getElementById('searchss').type = 'date';
                document.getElementById('searchss1').hidden = false;

            }
            if(inputValue=="month")
            {
                document.getElementById('searchss').type = 'month';
                document.getElementById('searchss1').hidden = true;
            }
            if(inputValue=="year")
            {
                document.getElementById('searchss').type = 'number';
                document.getElementById('searchss1').hidden = true;
            }
            // alert("Radio button '" + inputValue + "' is selected");
          });
        });
      </script>
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
<body onload="printDiv()">
<div class="main">  

     
      <div id="div_print" > 
<table align="center" class="table" style="width: auto;">
<br><h4 class="txt-title float-md-start mb-0" style="text-align: center;">  </h4><br>
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

<br>
<table align="center" style="color: blue;"> 
<tr>
    <th >Total Amount : </th>
    <?php 
       
        if(sizeof($tss)>0){ ?>
        <td><?php echo $tss[0]['tot']; ?></td>

       <?php }
       else{ ?>
        <td>0</td>
       <?php }
    ?>
    
</tr>

</table>      
</div>
</div> 
	
	

</div>

</body>
</html>