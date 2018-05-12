<?php
session_start();
require_once '../../includes/autoload.php';
include '../../includes/header.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;
use classes\business\Validation;


$formerror="";

$firstname="";
$lastname="";
$email="";
$password="";
$cpassword="";
$wants_news="";
$error_firstname="";
$error_lastname="";
$error_passwd="";
$error_cpasswd="";
$error_email="";

$validate=new Validation();

if(isset($_SESSION['Remail']))
{
    $firstname= $_SESSION['RFname'];
    $lastname=$_SESSION['RLname'];
    $email=$_SESSION['Remail'];
}

if(isset($_REQUEST["submitted"])){
    $firstname=$_REQUEST["firstname"];
    $lastname=$_REQUEST["lastname"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $cpassword=$_REQUEST["cpassword"];
    $wants_news=isset($_REQUEST["wants_news"]);
    
    
    $validate->check_name($firstname, $error_firstname);
    $validate->check_name($lastname, $error_lastname);
    $validate->check_email($email, $error_email);
    $validate->check_password($password, $error_passwd);
    $validate->check_cpassword($password, $cpassword, $error_cpasswd);
    if(empty($error_firstname) && empty($error_lastname) && empty($error_email) && empty($error_passwd) && empty($error_cpasswd)){
        $UM=new UserManager();
        $user=new User();
        $user->firstname=$firstname;
        $user->lastname=$lastname;
        $user->email=$email;
        $user->wants_news=$wants_news;
        
        $options = ['cost' => 11,];
        $passwordFromPost = $_REQUEST['password'];
        $hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
        
        $user->password=$hash;
        $user->role="user";
        $existuser=$UM->getUserByEmail($email);
    
        if(!isset($existuser)){
            $_SESSION['RFname']=$firstname;
            $_SESSION['RLname']=$lastname;
            $_SESSION['Remail']=$email;
            $_SESSION['Rpassword']=$hash;
            $_SESSION['Rwants_news']=$wants_news;
            #header("Location:registerthankyou.php");
			echo '<meta http-equiv="Refresh" content="1; url=./signupcheck.php">';
        }
        else{
            $formerror="User Already Exist";
        }
    }else{
        $formerror="Please fill in the fields";
    }
}
?>

<div class="container-fluid" style="padding:0; background-image: url('../../img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="margin-bottom:100px">
            <h3 style="text-align: right; color: white">Step - <img src="../../img/Step1.png"></h3>
            <form  name="myForm" method="post" style="background-color:white; padding: 20px; border-radius: 10px">
                <h1 style="text-align:center; color: #FF6600">Get started - it’s free</h1>
                <h3 style="text-align:center; color: #FF0000"><?php echo $formerror?></h3>
                
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                <label for="exampleFirstName">First name</label>
                <input type="FirstName" class="form-control" name="firstname" value="<?=$firstname?>" id="exampleFirstName" placeholder="First name" required>
                <p class="error"><?php echo $error_firstname?></p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                <label for="exampleLastName">Last name</label>
                <input type="LastName" class="form-control" name="lastname" value="<?=$lastname?>" id="exampleLastName" placeholder="Last name" required>
                <p class="error"><?php echo $error_lastname?></p>
                </div>
                </div>
                </div>
                
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="<?=$email?>" id="exampleInputEmail1" placeholder="Email" required>
                <p class="error"><?php echo $error_email?></p>
                </div>
                
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" value="<?=$password?>" id="exampleInputPassword1" placeholder="Password (6 or more characters)" required>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" value="<?=$cpassword?>" id="exampleInputPassword1" placeholder="Password (6 or more characters)">
                </div>
                </div>
                </div>
                <p class="error"><?php echo $error_passwd?></p>
                <p class="error"><?php echo $error_cpasswd?></p>
                
                 <input type="checkbox" name="wants_news" value="1"> Subscribe newsletter<br>
                <br>
                <button type="submit" name="submitted" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Sign Up</button>
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
    


<?php
include '../../includes/footer.php';
?>