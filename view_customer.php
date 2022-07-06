<?php
include_once("include/connection.php");

$name='';
$lname='';
$phone='';
$email='';
$hna='';
$city='';
$pin='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con, "select * from customer where id='$id'");
$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
	
        $name=$user_data['name'];
		    $lname=$user_data['lname'];
        $phone=$user_data['phone'];
        $email=$user_data['email'];
        $hna=$user_data['hna'];
        $city=$user_data['city'];
        $pin=$user_data['pin'];

	}else{
		header('location:profile.php');
		die();
	}

}
if(isset($_POST['submit']))
{

	$name=get_safe_value($con,$_POST['name']);
	$lname=get_safe_value($con,$_POST['lname']);
	$email=get_safe_value($con,$_POST['email']);
	$phone=get_safe_value($con,$_POST['phone']);
	$hna=get_safe_value($con,$_POST['hna']);
	$city=get_safe_value($con,$_POST['city']);
	$pin=get_safe_value($con,$user_data['pin']);
	$password=get_safe_value($con,$_POST['password']);

	$res=mysqli_query($con,"select * from customer where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		
		if(isset($user_data['id']) && $user_data['id']!='')
		{
			$getData=mysqli_fetch_assoc($res);
			if($id== $user_data['id'])
			{

			}
			else
			{
				$msg="customer already exists";
			}
		}else{
			$msg="customer already exists";
		}
	}
	if($msg=='')
	
if($msg=='')

	{
		if(isset($_GET['id']) && $_GET['id']!='')
		 {
			$sql="update customer set name='$name',lname='$lname',phone='$phone',email='$email',hna='$hna',city='$city',pin='$pin',password='$password' where id='$id'";
			mysqli_query($con,$sql);
			$sql="update user set name='$name',lname='$lname',email='$email',password='$password' where id='$id'";
			mysqli_query($con,$sql);
		}
		else
		{
			$sql="insert into tb_location(name,lname,email,phone,hna,city,pin,password) values ('$name','$lname','$email','$phone','$hna','$city','$pin','$password')";
            mysqli_query($con,$sql); 

		}
		header('location:profile.php');

	}
}
echo $id;
?>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARK-iN | Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Dosis|Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body style="font-family: 'Times New Roman', Times, serif;">
<center>
      <div class="loader" id="loader">
        <img src="images/loader.svg" alt=""></img>
      </div>

<center>
    <div class="container-fluid wide fit-lg">
      <div class="container box-up  d-flex justify-content-center">
            <div class="box-lg">

<div class="content pb-0">
<?php include "scroll_top.php"; ?>
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>My Profile</strong></div>
                        <form method="POST">




                           <div class="form-group"><label for="vat" class=" form-control-label">First Name</label>

                           	<input type="text" name="name"  class="form-control" required value="<?php echo $user_data['name']?>"></div>

						    <div class="form-group"><label for="vat" class=" form-control-label">Last Name</label>

                            <input type="text" name="lname"  class="form-control" required value="<?php echo $user_data['lname']?>"></div>

							<div class="form-group"><label for="vat" class=" form-control-label">email</label>

                           	<input type="text" name="email"  class="form-control" required value="<?php echo $user_data['email']?>"></div>

                           	<div class="form-group"><label for="vat" class=" form-control-label">Phone</label>

                           	<input type="text" name="phone"  class="form-control" required value="<?php echo $user_data['phone']?>"></div>

                           	<div class="form-group"><label for="vat" class=" form-control-label">House name</label>

                           	<input type="text" name="hna"  class="form-control" required value="<?php echo $user_data['hna']?>"></div>

                           	<div class="form-group"><label for="vat" class=" form-control-label">city</label>

                           	<input type="text" name="city"  class="form-control" required value="<?php echo $user_data['city']?>"></div>

                           <div class="form-group"><label for="city" class=" form-control-label">Pincode</label>

                           	<input type="text" name="pin"  class="form-control" required value="<?php echo $user_data['pin']?>"> </div>

                           	<div class="form-group"><label for="city" class=" form-control-label">Password</label>

                           	<input type="text" name="password"  class="form-control" required value="<?php echo $user_data['password']?>"> </div>
                           
                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
                           </button>
                           <div class="field_error"><?php echo $msg?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
