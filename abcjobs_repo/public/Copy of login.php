<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
$formerror="";

$forgetpass='';
$email="";
$password="";
$error_captcha="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();

if(isset($_POST["submitted"])){
    
    
    $email=$_POST["email"];
    $password=$_POST["password"];
	if($validate->check_password($password, $error_passwd))
	{
		$UM=new UserManager();
		
		$existuser=$UM->getUserByEmail($email);
		if(isset($existuser)){
		    $hashedPasswordFromDB = $existuser->password;
		    $passwordFromPost = $_POST['password'];
		    if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {			
			$_SESSION['email']=$email;
			$_SESSION['role']=$existuser->role;
			$_SESSION['id']=$existuser->id;
			echo '<meta http-equiv="Refresh" content="1; url=logindone.php">';
		}else{
			$formerror="Invalid Password";
			$forgetpass='<br><br><a href="forgetpassword.php"><button type="button" class="btn btn-default" style="border-color: #FF9900; border-width: 2px; color: #FF9900;  width:100%">Forget Password</button></a>';
		}
		}else{
		    $formerror="Invalid Email Address";
		}
    }
}


?>

<div class="container-fluid" style="padding:0; background-image: url('./img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
        
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px">
            
            <form name="myForm" method="post" style="background-color:white; padding: 20px; border-radius: 10px">
                <h1 style="text-align:center; color: #FF6600">Please Sign In</h1>
                <h3 style="text-align:center; color: #FF0000"><?php echo $formerror?></h3>
                <br>
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="SignUpInputEmail1" name="email" value="<?=$email?>" placeholder="Email" required>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="SignUpInputPassword1" name="password" value="<?=$password?>" placeholder="Password">
                <p class="error"><?php echo $error_passwd?></p>
                </div>
                
                <br>
                <button type="submit" name="submitted" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Sign In</button>
                <?php echo $forgetpass?>
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
        

 
<?php
include 'includes/footer.php';
?>