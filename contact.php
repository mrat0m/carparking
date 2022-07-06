<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
        <title>PARK-iN | Contact</title>
        <link rel="icon" href="images/carparking-logo.png" type="images/carparking-logo.png" sizes="16x16">
    

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
  height: 581.5px; /* Used in this example to enable scrolling */
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


#pr_loader{
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0.7;
 
  z-index: 99;
  background: url(images/pre.gif);
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
    
</head>
  <body class="d-flex h-100 text-center text-white bg-dark" onload="myFunction()" style="font-family: 'Times New Roman', Times, serif;">

  <!-- LOADER -->
  <div id="loading"></div>
      <!-- END LOADER -->
      
  <!-- <div id="pr_loader"></div> -->
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
  <header class="mb-auto">
    <div>
    <h3 class="txt-title float-md-start mb-0">PARK-iN</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link " aria-current="page" href="index.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
        <a class="nav-link active " aria-current="page" href="contact.php">Contact Us</a>
        <a class="nav-link " href="login.php">Login/Sign Up <i class="fa fa-sign-in" aria-hidden="true"></i></a>
      </nav>
    </div>
  </header>

  <main class="px-3" >
  <?php include "scroll_top.php"; ?>
  <div class="container" >
	<div class="row">
      <div class="container col-md-7 ">
        <div class="container ">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="txt-title1">Contact us</legend>
    
            <!-- Name input-->
          <center>
            <div class="form-group">
                <br>
              <div class="txt2 col-7">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
               <br>
              <div class="txt2 col-7">
                <input  id="email" name="email" pattern="[Aa-Zz0-9]" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
               <br>
              <div class="txt2 col-7">
                <textarea class="form-control" id="message" pattern="[Aa-Zz0-9]" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
          </center>
      <br>
            <!-- Form actions -->
            <div class="form-group">
              <div class="">
                <button type="submit" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
  </main>

<footer class="mt-auto text-white-50">
    <p class="text-white-50"></p>
  </footer>


</div>

<script>
        var preloader = document.getElementById('loading');

        function myFunction(){
            
            setTimeout(function(){
                preloader.style.display = 'none';
            },500);

        }
    </script>

 
  </body>
</html>

