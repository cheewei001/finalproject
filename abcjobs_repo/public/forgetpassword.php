<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
require_once "phpmailer/PHPMailerAutoload.php";
include 'includes/header.php';
$formerror="";
$newpassword="";

$email="";
$password="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();

if(isset($_POST["submitted"])){
    $email=$_POST["email"];
    $mail = new PHPMailer;
	$UM=new UserManager();
	$existuser=$UM->getUserByEmail($email);
	if(isset($existuser)){
			//generate new password
			$newpassword=$UM->randomPassword(8,1,"lower_case,upper_case,numbers");
			
			$options = ['cost' => 11,];
			$hash = password_hash($newpassword[0], PASSWORD_BCRYPT, $options);
			
			//update database with new password
			$UM->updatePassword($email,$hash);  
			//$formerror="Valid email user. password: ".$newpassword[0];
			//coding for sending email
			// do work here
			
			
			//Enable SMTP debugging.
			//$mail->SMTPDebug = 3;
			//Set PHPMailer to use SMTP.
			$mail->isSMTP();
			//Set SMTP host name
			$mail->Host = " in-v3.mailjet.com";
			//Set this to true if SMTP host requires authentication
			$mail->SMTPAuth = true;
			//Provide username and password
			$mail->Username = "xxx";
			$mail->Password = "xxx";
			//If SMTP requires TLS encryption then set it
			$mail->SMTPSecure = "tls";
			//Set TCP port to connect to
			$mail->Port = 587;
			//$mail->Port = 25;
			$mail->From = "abc@gmail.com";
			$mail->FromName = "cheewei";
			$mail->addAddress($email, "cheewei");
			$mail->isHTML(TRUE);
			$mail->Subject = "Do not reply";
			$mail->Body = "<p>Your temporary password is: <br>$newpassword[0]</p>";
			$mail->AltBody = "This is the plain text version of the email content";
			if(!$mail->send())
			{
			    $formerror="Invalid email user";
			}
			else
			{    
			    $_SESSION['email2']=$email;
			    echo '<meta http-equiv="Refresh" content="1; url=/abcjobs/public/passresetok.php">';
			    //$formerror="New password have been sent to ".$email;
			}
	}else{$formerror="Invalid email user";
	}
}

?>

<div class="container-fluid" style="padding:0; background-image: url('./img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
			<div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10">
            <h3 style="text-align: right; color: white">Step - <img src="img/StepB1.png"></h3>
            <form name="myForm" method="post" style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <img src="/abcjobs/public/img/Alert.png">
                <br><br>
                <h4>Please fill in your email to reset your password.<br></h4>
                
                <div class="form-group">
                <input type="email" name="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <h4 class="error"><?php echo $formerror?></h4>
                <br>
                <button type="submit" name="submitted" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Submit</button>
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
        
    


<?php
include 'includes/footer.php';
?>