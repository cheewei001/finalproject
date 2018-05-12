<?php
use classes\entity\Feedback;
use classes\business\FeedbackManager;
use classes\business\Validation;
use classes\business\UserManager;
use classes\entity\User;


require_once 'includes/autoload.php';
$formerror="";

$email="";
$firstname="";
$lastname="";
$comments="";
$error_firstname="";
$error_lastname="";
$error_passwd="";
$error_email="";
$error_comments="";
$validate=new Validation();


if(isset($_SESSION["email"]))
    {
    $UM=new UserManager();
    $existuser=$UM->getUserByEmail($_SESSION["email"]);
    $firstname=$existuser->firstname;
    $lastname=$existuser->lastname;
    $email=$existuser->email;
    }
if(isset($_POST["submitted"])){
    $email=strip_tags($_POST["email"]);
    $lastname=strip_tags($_POST["lastname"]);
    $firstname=strip_tags($_POST["firstname"]);
    $comments=strip_tags($_POST["comments"]);
    
    $validate->check_name($firstname, $error_firstname);
    $validate->check_name($lastname, $error_lastname);
    $validate->check_comments($comments, $error_comments);
    $validate->check_email($email, $error_email);
    
    if(empty($error_firstname) && empty($error_lastname) && empty($error_email) && empty($error_comments))
    {
        $feedback=new Feedback();
        $feedback->firstname=$firstname;
        $feedback->lastname=$lastname;
        $feedback->email=$email;
        $feedback->comments=$comments;
        $FM=new FeedbackManager();
        $FM->insertFeedback($feedback);
        $formerror="* Your feedback submitted successfully!";
        $name = $firstname . " " . $lastname;
        //header("Location: ./fbthankyou.php?name=$name");
        echo '<meta http-equiv="Refresh" content="1; url=./fbthankyou.php?name='.$name.'">';
    }
}
?>
		<div class="row" style="margin-top: 20px">
			<div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="margin-bottom:100px">
            <form  name="myForm" method="post" style="background-color:white; padding: 20px; border-radius: 10px">
                <h1 style="text-align:center; color: #FF6600">Feedback Form</h1>
                <h3 style="text-align:center; color: #FF0000"><?php echo $formerror?></h3>
                
                <div class="form-group">
                <label for="exampleFirstName">First name</label>
                <input type="FirstName" class="form-control" name="firstname" value="<?=$firstname?>" id="exampleFirstName" placeholder="First name" required>
                <p class="error"><?php echo $error_firstname?></p>
                </div>
                
                <div class="form-group">
                <label for="exampleLastName">Last name</label>
                <input type="LastName" class="form-control" name="lastname" value="<?=$lastname?>" id="exampleLastName" placeholder="Last name" required>
                <p class="error"><?php echo $error_lastname?></p>
                </div>
                
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="<?=$email?>" id="exampleInputEmail1" placeholder="Email" required>
                <p class="error"><?php echo $error_email?></p>
                </div>
                
                <div class="form-group">
                <label for="textarea1">Comments</label>
                <textarea type="text" class="form-control" name="comments" value="<?=$comments?>" id="textarea1" placeholder="Comments" rows = "7" cols = "50" required></textarea>
                <p class="error"><?=$error_comments?></p>
                </div>
               
                <button type="submit" name="submitted" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Submit</button>
                <p style="margin-top: 5px"></p>
                <button type="reset" name="reset" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Reset</button>
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
	</div>
<!-- 

<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<h1>Feedback Form</h1>
<div><?=$formerror?></div>
<table width="800">
  <tr>
    <td>First Name</td>
    <td><input type="text" name="firstname" value="<?=$firstname?>" size="50"></td>
	<td><?=$error_firstname?></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" name="lastname" value="<?=$lastname?>" size="50"></td>
	<td><?=$error_lastname?></td>
  </tr>
  <tr>    
    <td>Email</td>
    <td><input type="text" name="email" value="<?=$email?>" size="50"></td>
    <td><?=$error_email?></td>
  </tr>
  <tr>    
    <td>Comments</td>
	<td><textarea name="comments" value="<?=$comments?>" rows = "7" cols = "50"></textarea></td>
	<td><?=$error_comments?></td>
  </tr>   
  <tr><td></td>
   <td><br> 
       <input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
       <input type="reset" name="reset" value="Reset" class="pure-button pure-button-primary">
    </td>
  </tr>
</table>
</form>

 -->