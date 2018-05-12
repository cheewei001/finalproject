<?php
session_start();
require_once 'includes/autoload.php';
include 'includes/header.php';

if(isset($_SESSION["email2"])){
    $email=$_SESSION["email2"];
}

?>

<div class="container-fluid" style="padding:0; background-image: url('./img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10">
            <h3 style="text-align: right; color: white">Step - <img src="img/StepB2.png"></h3>
            <form  method="post" action="/abcjobs/public/login.php" style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <img src="img/Success.png">
                <h1 style="color: #FF6600">Success!</h1>
                <h4>New password have been sent to <?php echo $email; ?></h4>
                <br>
                <button type="submit" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Sign In</button>
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
        
    
   

<?php
include 'includes/footer.php';
?>
