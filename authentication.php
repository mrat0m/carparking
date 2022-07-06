<?php 
 //session_start(); 
 session_start();
 function generateNumericOTP($n) 
 {
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) 
    {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    return $result;
  }  
    include('include/connection.php');  
    if(isset($_POST['login']))
    {
      $email = $_POST['email'];  
      $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($conn, $email);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select type from user where email = '$email' and password = '$password' and status='active'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        //sample
        
        $sqla = "select type from user where email = '$email' and password = '$password' and status='in-active'";  
        $resulta = mysqli_query($conn, $sqla);  
        $rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC);  
        $counta = mysqli_num_rows($resulta);  
        //sample end
        //session
        //$email=$row['email'];
        if($count == 1){  

   $logc=mysqli_query($conn,"UPDATE customer set status='verified' where email='$email'");
   // $sql_logc = $conn->query("SELECT * FROM customer WHERE email='$email'");
    //$user_data=mysqli_fetch_assoc($sql_logc);
       // $_SESSION['qwerty']=$user_data['id'];
          $_SESSION['login']=$_POST['email'];
  
          $_SESSION['password']=$_POST['pass'];
          $ip=gethostbyname("www.google.com");  //$_SERVER['REMOTE_ADDR'];
          $status=1;
          $log=mysqli_query($conn,"insert into userlog(email,ip,status) values('".$_SESSION['login']."','$ip','$status')");

    
      //to direct to different user panels
       if($row['type']=="admin")
       {
         header("Location:admin/home.php");
       }
       elseif($row['type']=="staff")
       {
         header("Location:staff/home.php");
       }
       elseif($row['type']=="customer")
       {
        $_SESSION['slotcheck']="";
         header("Location:home.php");
       }
      }
      else
      {  
        if($counta == 1){
            
         header("Location:login.php");
         $_SESSION['errmsg']="Your account is banned !!";     
        }
        else{
         //echo '<script>alert("Login failed. Invalid username or password")</script>';  
         header("Location:login.php");
           $_SESSION['errmsg']="Invalid email id or Password";        
        }    
      }
  }
?>  