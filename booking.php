<?php
include 'include/connection.php';
session_start();
$date1 = new DateTime(null, new DateTimezone("Asia/Kolkata"));
$date = $date1->format('d-m-Y');
$time = $date1->format('H:i a');

// $qwerty = "select npslot from pslot where slotstatus = 'Active' ";  
// $result1 = mysqli_query($conn, $qwerty);  
// $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);  
// $slotcount = mysqli_num_rows($row1); 
// if(!$slotcount)
// {
//   $_SESSION['slotcheck']="NO SLOTS AVAILABLE";
// }
// else
// {
//   $_SESSION['slotcheck']="";
// }

//  header('location:booking.php');
// $slotcheck=$_SESSION['slotcheck'];
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>PARK-iN | Book Your Slot</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
        
    <!-- booking bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style1.css">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
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
  height: 781.5px; /* Used in this example to enable scrolling */
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
    
</style>
    
    <!-- Custom styles for this template -->
    <link href="assets/css/cover.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main1.css">
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dist/css/bootstrap-select.css">
  </head>
  
<body id="home" onload="myFunction()" style="font-family: 'Times New Roman', Times, serif;"  data-spy="scroll" data-target="#navbar-wd" data-offset="98" class=" h-100 text-center text-white bg-dark1">
    <!-- LOADER -->
    <div id="loading"></div>
      <!-- END LOADER -->
  <!-- MENU BAR -->
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
  <header class="mb-auto">
    <div style="font-family: 'Times New Roman', Times, serif;">
      <h3 class="txt-title float-md-start mb-0 ">PARK-iN</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end" style="font-size: 16px;">
        <a class="nav-link " href="home.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
        <a class="nav-link active " aria-current="page" href="booking.php">Book Your Slot</a>
        <a class="nav-link " href="yourbookings.php">Your Bookings <i class="fa fa-qrcode" aria-hidden="true"></i></a>
        <a class="nav-link " href="profile.php">Profile <i class="fa fa-user-o" aria-hidden="true"></i></a>
        <a class="nav-link " href="logout.php">Logout
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a> 
      </nav>
    </div>
  </header>
  <!-- END MENU BAR -->
<!-- BOOKING -->
<main class="px-1">
<?php include "scroll_top.php"; ?>
<div class="container"><br>
<form role="form" action="pgRedirect.php" method="post">
 <center><div class="col-lg-3">
  <span class="heading1" STYLE="font-size:38px">
   <b>
       <?php echo $date;?> <hr>
   </b> 
   
  </span>
  <b style="color:red;">
       <?php echo htmlentities($_SESSION['slotcheck']);?> 
   </b> 
        <br>
      </div>
  
  </center>
<H1>HOURLY PARKING </H1><br>
  <div class="form-group row">
  <div class="col-lg-2"></div>
    <div class="col-lg-3">
      <label class="heading1">Available parking slots :</label>
      <select class="selectpicker form-control" style="text-align: center;" id="pslot" name="pslot" title="Select parking slot" required> 
<?php

      $slot=mysqli_query($conn,"SELECT * from pslot where slotstatus='Active'");
?>
<option value="0" selected>---Select parking slot---</option>
<?php 

 while($row=mysqli_fetch_assoc($slot))
{ 
  ?>
<option value="<?php echo $row['ps_id']; ?>" data-price="<?php echo ['slotrate']; ?>"><?php echo $row['npslot']; ?></option>
<?php
} 
?>
</select>
    </div>
    <div class="col-lg-2">
      <label class="heading1">Duration :</label>
        <select class="selectpicker form-control" style="text-align: center;" id="duration" name="duration" required>
        <option value="0" selected>--Select Duration--</option> 
        <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
        </select>
      </div>
      
    <div class="col-lg-4" id="rate" >
    <label class="heading1">Slot-rate per hr :</label>
    <br>₹ <input name="rate" style="text-align: center;" id="rate1" placeholder="0.00" readonly> </p>
    </div>
     
    </div><br>
        <div class="price ">
          
					<!--span class="heading1">Price for one slot:</span> 
				  <div class="rate" id="slotrate">
          ₹0.00
           
           </div--> 
        </div>
        <div class="heading-mini">
      If you want to park your vehicle for a month <a href="bookmonthly.php">click here</a>  
    </div>
        <div class="terms">
    <div class="heading-mini">
      *Parking Slot will only be valid for seleted duration.You can park your car once payment is complete.  
    </div>
                  <div class="payable">
                    <div class="heading-sm">

                    </div>
                    <div class="payment">
					<div class="booking-rate">
                        Amount to be paid :
                        <div class="amt" >
                     
                        <center><input class="input100 form-control" name="amt" id="amt" placeholder="₹ 0.00" onkeydown="return false;"
                style="caret-color: transparent !important; text-align: center;" required autocomplete="off">
                        </div>
                      </div>   <br> 
        <div class="paybtnt">  
        <button type="submit" class="btn btn-success btn-lg" name="paynow" >Pay Now</button>
</form>
       </div>

        <div class="heading-mini">
        *Extend parking slot duration to avoid fine.            
        </div>     
      </div>
    </div>
    <div class="terms">
    <div class="heading-mini">
      *Cancellation Policy
    </div>
    <div class="terms-txt">
    Cancellation is not allowed once payment is completed.
      Amount will not be refunded.   
    </div>
  </div>
</div>
</main>
</div>
<!-- END BOOKING -->

<script>
        var preloader = document.getElementById('loading');

        function myFunction(){
            
            setTimeout(function(){
                preloader.style.display = 'none';
            },1500);

        }
    </script>


<script src="js/jquery.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script>
      $(document).ready(function(){
          $('#pslot').on('change', function(){
              var pk_id = $(this).val();
              console.log(pk_id);
              if(pk_id){
                  $.ajax({
                      type:'POST',
                      url:'include/abc.php',
                      data:'pk_id='+pk_id,
                      success:function(html){
                          $('#rate').html(html);
                          
                      }
                  }); 
              }
          });
          
    
      });
    </script>
<script>
  $(document).ready(function(){
  var duration=0;
  var rate=0;

  $('#duration').on('change', function() {
    duration = this.value;
    console.log(duration);
}); 
$('#duration').on('change', function() {
 
  rate=$('#rate1').val();
  console.log(rate);
  var amt= parseFloat(parseInt(duration) * parseFloat(rate));
  console.log(amt);
  $('#amt').val(amt);
}); 
 
  });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


