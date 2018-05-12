<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
?>

<div class="container-fluid" style="padding:0; background-image: url('img/Signin_bg.jpg'); height: auto; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <h1 style="color: #FF6600">CONTACT INFORMATION</h1>
				<b>Customer Online Care</b><br>
				Call us at +65 1800 222 6868 for any assistance required.<br>
				Operating hour is from Monday to Saturday, 10am to 7pm;<br>
				Sunday & Public Holiday, 10am to 2pm.<br><br> 
   
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7600334737967!2d103.88985331447665!3d1.3196913620398996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19149fe4a925%3A0x82606eb494fd093c!2sLithan+Academy!5e0!3m2!1sen!2ssg!4v1514739525393" width="98%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>  
            </div>

			


<?php
include './feedback.php';
?>

<?php
include 'includes/footer.php';
?>