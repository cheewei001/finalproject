<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

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
$deleteflag=false;

if(isset($_POST["submitted"])){
  if(isset($_GET["id"])){
       $UM=new UserManager();
       $existuser=$UM->deleteAccount($_GET["id"]);
        $formerror="User deleted successfully.";
		$deleteflag=true;
		$_SESSION["donemessage"]="User profile deleted";
		header("Location:./updatedone.php");
		
	}
}else if(isset($_POST["cancelled"])){
	header("Location:./userlistadmin.php");
}else{
	if(isset($_GET["id"]))
	{
	  $UM=new UserManager();
	  $existuser=$UM->getUserById($_GET["id"]);
	  $firstname=$existuser->firstname;
	  $lastname=$existuser->lastname;
	  $email=$existuser->email;
	  $password=$existuser->password;
	}
}
?>

<div class="container-fluid" style="padding:0; background-image: url('../../img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10"  style="padding-top:50px"> 
            <form name="deleteUser" method="post" style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <img src="/abcjobs/public/img/Alert.png">
                <br><br>
                <h1>Delete User<br></h1>
                <h3><?=$formerror?><br></h3>
                <?php
                if (!$deleteflag)
                {
                ?>             
                <h4>Are you sure that you want to delete the following record?</h4><br>
                <h2><?=$email?></h2>
                <br>
                <button type="submit" name="submitted" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Delete</button>
                <p style="margin-top: 5px"></p>
                <button type="submit" name="cancelled" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Cancel</button>
            		<?php
                }
                ?>
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>

<!-- 
<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<form name="deleteUser" method="post" class="pure-form pure-form-stacked">
<h1>Delete User</h1>
<div><?=$formerror?></div>
<?php
if (!$deleteflag)
{
?>
<table width="800">
  <tr>
    <td>Are you sure that you want to delete the following record?</td>
  </tr>
   <tr>
    <td><?=$email?></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="submit" name="submitted" value="Delete" class="pure-button pure-button-primary">
    <input type="submit" name="cancelled" value="Cancel" class="pure-button pure-button-primary"></td>
    </td>
  </tr>
</table>
<?php
}
?>
</form>
 -->

<?php
include '../../includes/footer.php';
?>