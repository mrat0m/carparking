<?php 
include "include/connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from user"); // fetch data from database

if(isset($_POST['aslt'])){
  extract($_POST);
  $records=mysqli_query($conn,"SELECT * FROM user WHERE `status`='active' ORDER BY `uid` ASC");
}

if(isset($_POST['inaslt'])){
  extract($_POST);
  $records=mysqli_query($conn,"SELECT * FROM user WHERE `status`='in-active' ORDER BY `uid` ASC");
}
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARK-iN | ADMIN | Users</title>
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
    <!--link rel="stylesheet" href="css/main.css"-->
</head>
<body style="font-family: 'Times New Roman', Times, serif;">

<?php include_once("include/nav.php"); ?>     
<?php include "../scroll_top.php"; ?> 
<div class="main">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
       <span class="heading">
       <h4 class="txt-title float-md-start mb-0"> USERS</h4>

       <form action="" method="post">
        <h6>Filter By : <input type="submit"  class="btn btn-success btn-sm" name="aslt" value="Active" id="">
                        <input type="submit"  class="btn btn-danger btn-sm" name="inaslt" value="In-Active" id="">
                        <input type="submit"  class="btn btn-warning btn-sm" name="" value="Clear" id=""></h6>
          </form>

      </span>
      
<table id="utable">
	<thread>
   <tr class="table100-head">
		<th class="column1" onclick="sortTable(1)">ID</th>
		<th class="column2" onclick="sortTable(1)">First Name</th>
		<th class="column3" onclick="sortTable(1)">Last Name</th>
		<th class="column4" onclick="sortTable(1)">e-Mail</th>
		<th class="column5" onclick="sortTable(0)">Type</th>
    <th class="column6" onclick="sortTable(4)">Status</th>
	 </tr>
	</thread>
					
<?php


while($data = mysqli_fetch_array($records))
{ $uid=$data['uid'];
?>
  <tr>
    <td class="column1"><?php echo $data['uid']; ?></td>
    <td class="column2"><?php echo $data['name']; ?></td>
    <td class="column3"><?php echo $data['lname']; ?></td>
    <td class="column4"><?php echo $data['email']; ?></td>
    <td class="column5"><?php echo $data['type']; ?></td>
    <?php
     $query=mysqli_fetch_assoc(mysqli_query($conn, "select status,type from user where uid='$uid'"));
     if($query['status']=="active" && $query['type'] !="admin" ){ ?>
      <td class="column6"><a class="btn btn-success" href="include/disable.php?a=1&uid=<?php echo $uid; ?>" role="button">In-activate</a></td>    
    <?php }
     else if($query['status']=="in-active" && $query['type'] !="admin"){ ?>
      <td class="column6"><a class="btn btn-danger" href="include/disable.php?a=2&uid=<?php echo $uid; ?>" role="button">Activate</a></td>
     <?php
     }
    ?>
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
  <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("utable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>


</body>
</html>

