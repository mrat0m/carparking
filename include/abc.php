<?php 
// Include the database config file 
require_once('connection.php'); 
$pkid = $_POST['pk_id'];
if(!empty($pkid)){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM pslot WHERE ps_id = '$pkid' AND slotstatus='Active'" ;
    $result = mysqli_query($conn,$query);  
    // Generate HTML of state options list 
    if(!empty($result)){ 
        echo '<label class="heading1">Slot-rate per hr :</label><br>'; 
        while($row = mysqli_fetch_assoc($result)){  
            echo '₹ <input name="rate" id="rate1" value='.$row['slotrate']. ' readonly>'; 
        } 
    }else{ 
        echo '<option value="">0.00</option>'; 
    } 
}
?>