<?php
session_start();
include("include/connection.php");

$bid= $_SESSION['bid'];
$ps_id=$_SESSION['ps_id'];
echo $bid;
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $card_na=$_POST['card_na'];
        $card_no=$_POST['card_no'];
        $expdate=$_POST['exp_date'];
    }
    $email=$_SESSION['login'];
    $time0=$_SESSION['time0'];
    $sql=mysqli_fetch_assoc(mysqli_query($conn,"select uid from user where email='$email' and type='customer'"));
    $uid=$sql['uid'];
   
    $sql=mysqli_query($conn,"insert into card_pay(uid,card_na,card_no,exp_date) values('$uid','$card_na','$card_no','$expdate')");
    if($sql)
    {
        $query=mysqli_query($conn,"update booking SET status='PAID' where bid='$bid'  ");
        if($query)
        {
            echo "success";
            $qwerty=mysqli_query($conn,"insert into payment (bid) values ('$bid')");   //insert correct values such as amt
            if($qwerty)
            {
                mysqli_query($conn,"update pslot SET slotstatus='in-active' where ps_id='$ps_id'");
                header("Location:payment_success.php");
            }
            else
            {
                echo "fail";
                echo mysqli_error($conn);  
               // $abc=mysqli_query($conn,"insert into payment_err (uid,paid) values ('$uid','0.00')");
            }
        }
        else
        {
            echo mysqli_error($conn);
            //$abc=mysqli_query($conn,"insert into payment_err (uid,paid) values ('$uid','0.00')");
        }
    }
    

?>