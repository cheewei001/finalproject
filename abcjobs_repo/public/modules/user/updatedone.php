<?php
session_start();
require_once '../../includes/autoload.php';
include '../../includes/header.php';

if(isset($_SESSION["donemessage"])){
    $donemessage=$_SESSION["donemessage"];
    
}
?>

<div class="container-fluid" style="padding:0; background-image: url('../../img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10"  style="padding-top:50px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <img src="../../img/Success.png">
                <h1 style="color: #FF6600">Success!</h1>
                <h3><?php echo $donemessage; sleep(2);
                echo '<meta http-equiv="Refresh" content="1; url=./userlistadmin.php">';?></h3>                
                <br>
            </div>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
    


<?php
include '../../includes/footer.php';

?>