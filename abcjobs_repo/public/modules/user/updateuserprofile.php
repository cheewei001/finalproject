<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;
use classes\business\Validation;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$formerror="";
$firstname="";
$lastname="";
$email="";
$password="";
$cpassword="";
$error_firstname="";
$error_lastname="";
$error_passwd="";
$error_cpasswd="";
$error_email="";
$validate=new Validation();

if(!isset($_POST["submitted"])){
  $UM=new UserManager();
  $existuser=$UM->getUserById($_GET["id"]);
  $firstname=$existuser->firstname;
  $lastname=$existuser->lastname;
  $email=$existuser->email;
  $password=$existuser->password;
  $cpassword=$existuser->password;
}else{
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $email=$_POST["email"];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $validate->check_name($firstname, $error_firstname);
  $validate->check_name($lastname, $error_lastname);
  $validate->check_email($email, $error_email);
  $validate->check_password($password, $error_passwd);
  $validate->check_cpassword($password, $cpassword, $error_cpasswd);
  if(empty($error_firstname) && empty($error_lastname) && empty($error_email) && empty($error_passwd) && empty($error_cpasswd)){
       $update=true;
       $UM=new UserManager();
       
      /* if($email!=$_SESSION["email"]){
           $existuser=$UM->getUserByEmail($email);
           if(is_null($existuser)==false){
               $formerror="User Email already in use, unable to update email";
               $update=false;
           }
       }*/
     
       if($update){
           $existuser=$UM->getUserById($_GET["id"]);
           $existuser->firstname=$firstname;
           $existuser->lastname=$lastname;
           $existuser->email=$email;
           $options = ['cost' => 11,];
           $passwordFromPost = $_POST['password'];
           $hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options); 
           $existuser->password=$hash;
           $UM->saveUser($existuser);
           $_SESSION["donemessage"]="User profile updated";
           header("Location:./updatedone.php");
       }
  }else{
      $formerror="Please provide required values";
  }
}
?>

<div class="container-fluid" style="padding:0; background-image: url('../../img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10"  style="padding-top:50px">        
            <form  name="myForm" method="post" style="background-color:white; padding: 20px; border-radius: 10px">
                <h1 style="text-align:center; color: #FF6600">Update User Profile</h1>
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
                <label for="exampleInputPassword2">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" value="<?=$password?>" id="exampleInputPassword2" placeholder="Password (6 or more characters)">
                </div>
                </div>
                </div>
                <p class="error"><?php echo $error_passwd?></p>
                <p class="error"><?php echo $error_cpasswd?></p>
               
                <button type="submit" name="submitted" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Submit</button>
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>

<!-- 

<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<h1>Update Profile</h1>
<div><?=$formerror?></div>
<table width="800">
  <tr>
    <td>First Name</td>
    <td><input type="text" name="firstname" value="<?=$firstname?>" size="50"></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" name="lastname" value="<?=$lastname?>" size="50"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email" value="<?=$email?>" size="50"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" value="<?=$password?>" size="20"></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input type="password" name="cpassword" value="<?=$cpassword?>" size="20"></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    <input type="reset" name="reset" value="Reset" class="pure-button pure-button-primary"></td>
    </td>
  </tr>
</table>
</form>

 -->


<?php
include '../../includes/footer.php';
?>