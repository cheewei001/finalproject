<?php
session_start();
require_once '../../includes/autoload.php';
include '../../includes/header.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

if(isset($_SESSION["Remail"])){
    $firstname=$_SESSION["RFname"];
    $lastname=$_SESSION["RLname"];
    $email=$_SESSION["Remail"];
    $password=$_SESSION['Rpassword'];
    $wants_news=$_SESSION['Rwants_news'];
}

if(isset($_REQUEST["submitted"])){
        $UM=new UserManager();
        $user=new User();
        $user->firstname=$firstname;
        $user->lastname=$lastname;
        $user->email=$email;
        $user->password=$password;        
        $user->role="user";
        $user->wants_news=$wants_news;
            // Save the Data to Database
        $UM->saveUser($user);
        echo '<meta http-equiv="Refresh" content="1; url=./signupthankyou.php">';
}

if(isset($_REQUEST["edit"])){
    echo '<meta http-equiv="Refresh" content="1; url=./signup.php">';
}

?>



<div class="container-fluid" style="padding:0; background-image: url('../../img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10">
            <h3 style="text-align: right; color: white">Step - <img src="../../img/Step2.png"></h3>
           	<form  name="myForm" method="post" style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <h1 style="color: #FF6600">Please check your details.</h1>
                <br>
                <h5>Your First Name</h5>
                <h4><?php echo $firstname?></h4>
                <br>
                <h5>Your Last Name</h5>
                <h4><?php echo $lastname?></h4>
                <br>
                <h5>Your Email</h5>
                <h4><?php echo $email?></h4>
                <br>
                <button type="submit" class="btn btn-primary" name="edit" style="background-color: #ff9900; border-color: #ff9900; width:100%; margin-bottom: 10px">Edit Details</button>
                <button type="submit" class="btn btn-primary" name="submitted" style="background-color: #ff9900; border-color: #ff9900; width:100%">Confirm</button>
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
    


<?php
include '../../includes/footer.php';
?>