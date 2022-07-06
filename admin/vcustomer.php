<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARK-iN | ADMIN | Customers</title>
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
<?php include "../scroll_top.php"; ?>
  <div class="main">  
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
       <span class="heading">
       <h4 class="txt-title float-md-start mb-0"> <center>CUSTOMERS</center></h3>
       <form action="" method="post">
         <table class="table" style="width: 39em" align="center">
           <tr>
            <td>
            <select name="ord" id="" class="form-control">
            <option value="">Order By </option>
            <option value="uid">UID</option>
            <option value="nasc">Name Ascending</option>
            <option value="ndesc">Name Descending</option>
          </select>
        </td>
          <!-- <td style="font-size: 16px;">Order By : 
            <input type="radio" name="ord" id="" checked value="uid"> UID </td>
          <td style="font-size: 16px;"><input type="radio" name="ord" id="" value="nasc"> Name Ascending</td>
          <td style="font-size: 16px;"><input type="radio" name="ord" id="" value="ndesc"> Name Descending</td> -->
          <td><input type="submit" name="filter" class="btn btn-primary btn-sm" value="Filter"></td>
       </tr>
         </table>
         <table class="table" style="width: 39em" align="center">
       <tr>
         <td><input type="text" class="form-control"  placeholder="Pincode Or City" name="search" id=""></td>
         <td colspan="3" align="center"><input type="submit" name="srch" class="btn btn-primary" style="width: 150px;" value="Search" id=""></td>
         <td colspan="3" align="center"><input type="submit" name="" class="btn btn-warning" style="width: 100px;"  value="Clear" id=""></td>
       </tr>
         </table>
       </form>
      </span>

<table>

<br><br>
<h4 class="txt-title float-md-start mb-0" style="text-align: center;"> 
       <?php if(isset($_POST['filter'])){
         extract($_POST);
         if($ord=="uid"){?>Order By UID  <?php } 
         else if($ord=="nasc"){ ?>Order By Name Ascending <?php }
         else if($ord=="ndesc"){ ?>Order By Name Descending <?php }
          } 

         else if(isset($_POST['srch'])){  ?>Search By Pincode or City <?php }  ?></h4>

	<thead>
   <tr class="table100-head">
		<th class="column1">ID</th>
    <th class="column1">UID</th>
		<th class="column2">First Name</th>
		<th class="column3">Last Name</th>
		<th class="column4">e-Mail</th>
		<th class="column5">Phone</th>
    <th class="column7">House Name</th>
    <th class="column8">City</th>
    <th class="column9">Pincode</th>
		<th class="column10">Type</th>
	 </tr>
	</thead>
					
<?php

include "include/connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from customer"); // fetch data from database

if(isset($_POST['filter'])){
  extract($_POST);
  if($ord=="uid"){
    // echo "hiiii"
    $records = mysqli_query($conn,"SELECT * FROM `customer`  ORDER BY `uid` ASC ");
  }
  else if($ord=="nasc"){
    
    
     $records = mysqli_query($conn,"SELECT * FROM `customer`  ORDER BY `name` ASC ");
  }
  else if($ord=="ndesc"){
    
    
    $records = mysqli_query($conn,"SELECT * FROM `customer`  ORDER BY `name` DESC ");
 }
  
}
if(isset($_POST['srch'])){
  extract($_POST);
  $records = mysqli_query($conn,"SELECT * FROM `customer`  WHERE  (`pin` LIKE '%$search%' OR `city` LIKE '%$search%')");
}

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td class="column1"><?php echo $data['id']; ?></td>
    <td class="column1"><?php echo $data['uid']; ?></td>
    <td class="column2"><?php echo $data['name']; ?></td>
    <td class="column3"><?php echo $data['lname']; ?></td>
    <td class="column4"><?php echo $data['email']; ?></td>
    <td class="column5"><?php echo $data['phone']; ?></td>
    <td class="column7"><?php echo $data['hna']; ?></td>
    <td class="column8"><?php echo $data['city']; ?></td>
    <td class="column9"><?php echo $data['pin']; ?></td>
    <td class="column10"><?php echo $data['type']; ?></td>
  </tr>	
<?php
}
?>
</table> 
   
</div>
</div>
<!--footer class="mt-auto text-white-50">
    <p>---Have a nice day---</p>
  </footer-->
<!-- <script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script> -->

</body>
 
</html>

