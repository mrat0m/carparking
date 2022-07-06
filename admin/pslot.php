<?php
  session_start();
	include_once("include/connection.php");

  $slot=mysqli_query($conn,"SELECT * from pslot ORDER BY npslot");
  if(isset($_POST['aslt'])){
    extract($_POST);
    $slot=mysqli_query($conn,"SELECT * FROM pslot WHERE `slotstatus`='Active' ORDER BY npslot ASC");
  }

  if(isset($_POST['inaslt'])){
    extract($_POST);
    $slot=mysqli_query($conn,"SELECT * FROM pslot WHERE `slotstatus`='in-active' ORDER BY npslot ASC");
  }
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARK-iN | ADMIN | Parking Slots</title>
        <link rel="icon" href="img/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
      
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <!--font asesome css -->
<link href="fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
<link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <style> 
   .main {
    padding: 40px;
  margin-top: 50px;
   /* Used in this example to enable scrolling */
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
/*----*/
.txt-title{
       display: block;
       
       font-family: JosefinSans-Bold;
       font-size: 35px;
       color: black;
       margin-top: -60px;
       line-height: 1.2;
       text-align: left; 
       }
       .txt-title1{
       display: block;
       margin-top: -20px;
       margin-bottom: -30px;
       margin-right: 10px;
       font-family: JosefinSans-Bold;
       font-size: 35px;
       color: black;
       line-height: 1.2;
       text-align: left; 
       }
       .title1{
       margin-top: -50px;
       margin-right: 10px;
       text-align: right; 
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
      .btn-b {
  background-color: black;
  border: none;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 40px 15px;
  cursor: pointer;
}
.btn-b1 {
  background-color: black;
  border: none;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  /*margin: 40px 15px;*/
  cursor: pointer;
}
</style>
  </head>

  <body style="font-family: 'Times New Roman', Times, serif;">

      <div class="loader" id="loader">
        <img src="img/loader.svg" alt=""></img>
      </div>

        <?php include_once("include/nav.php");?>
<div class="main">
    

<!--ADD NEW PARKING SLOT-->
<div class="wrapper add_employee clearfix">
<?php include "../scroll_top.php"; ?>
<form id="pslot" action="action_pslot.php" class="clearfix" method="POST">
      <div class="section_title"><h4 class="txt-title1 float-md-start mb-0">NEW PARKING SLOT </h4>
        <h4 class="txt-title1 title1 mb-0"><button type="submit" class="btn-b1">ADD SLOT </button></h4>
        <hr> 
        <div class="text-center p-b-10" style="color:red;font-size:15px;" >
                    <?php
                        echo htmlentities($_SESSION['errmsg']);
                    ?>
                    <?php
                        echo htmlentities($_SESSION['errmsg']="");
                    ?>
	      </div>
        <div class="text-center p-b-10" style="color:blue;font-size:15px;" >
                    <?php
                        echo htmlentities($_SESSION['msg']);
                    ?>
                    <?php
                        echo htmlentities($_SESSION['msg']="");
                    ?>
	      </div>
       </div> 
      <div class="input-box input-small left">
        <label for="Slot No.">Slot No.</label><br>
        <input type="text" class="inputField" id="nplsot" name="npslot" placeholder="New Parking Slot No." pattern="[P]+[0-5]{1}[0-9]{1}" title="eg. P01" required="" oninput="this.value = this.value.toUpperCase()" />
      </div>
      <div class="input-box input-small right">
				<label for="slotrate">Slot Rate</label><br>
        <input type="number" class="inputField" id="slotrate" name="slotrate" placeholder="Slot Rate" pattern="[0-9]{}" title="eg. 100.00" required="" />
      </div>
      <!--td>
        <input type="text" id="slotstatus" name="slotstatus" placeholder="slot status" title="slot status" required="" />
      </td-->

      <div>
          <br>        
        </div>
  </form>
</div>
<!--br-->
<!--div class="container fit-lg bg-white">
<div class="table-responsive"-->
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
      <span class="heading">
        <h4 class="txt-title float-md-start mb-0"> PARKING SLOT</h4>

        <form action="" method="post">
        <h6>Filter By : <input type="submit"  class="btn btn-success btn-sm" name="aslt" value="Active" id="">
                        <input type="submit"  class="btn btn-danger btn-sm" name="inaslt" value="In-Active" id="">
                        <input type="submit"  class="btn btn-warning btn-sm" name="" value="Clear" id=""></h6>
          </form>

      </span>
<!--DISPLAY PARKING SLOTS-->

<table class="table100-head"> <!--table table-bordered-->
  <!--thead class="thead-dark"-->
  <thead>
    <tr>
      <!--th class="column1">#</th-->
      <th></th>
      <th class="column2">Parking Slot </th>
      <th class="column3">Slot Rate</th>
      <th class="column4">Status</th>
    </tr>
</thead>
<!--form name="save" action="update_pslot.php" method="POST"-->
<?php
include 'include/connection.php';
    $i=1;
     
      
      while($row=mysqli_fetch_assoc($slot)){
        $ps_id=$row['ps_id'];
        //$npslot=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from pslot where ps_id='$row[ps_id]'"));
        ?>
         <tr>
           <th scope="row"><?php echo $i; $i++;?></th>
           <td class="column1"><?php echo $row['npslot']; ?></td>
           <td class="column2"><?php echo $row['slotrate']; ?></td>
           <?php
     $query=mysqli_fetch_assoc(mysqli_query($conn, "select slotstatus from pslot where ps_id='$ps_id'"));
     if($query['slotstatus']=="Active"){ ?>
      <td class="column6"><a class="btn btn-success" href="include/disable.php?a=3&uid=<?php echo $ps_id; ?>" role="button">In-activate</a></td>    
    <?php }
     else if($query['slotstatus']=="in-active"){ ?>
      <td class="column6"><a class="btn btn-danger" href="include/disable.php?a=4&uid=<?php echo $ps_id; ?>" role="button">Activate</a></td>
     <?php
     }
    ?>
      <?php
     {
    ?>   
      <td class="column7"><a class="btn btn-info" href="slot_updates.php?p=1&psid=<?php echo $ps_id; ?>" role="button">Edit</a></td>
     <?php
     }
    ?>
    </tr>
        <?php
      }
     ?>
  </table>
  <!--button type="submit" class="btn-b1">Save </button>
    </form-->
    </div>
    </div>
    <script type="text/javascript" src="../js/global.js"></script>
</body>
</html>

