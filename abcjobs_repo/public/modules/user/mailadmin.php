<?php
session_start();
require_once '../../includes/autoload.php';
require_once "phpmailer/PHPMailerAutoload.php";

use classes\business\UserManager;
use classes\entity\User;
use classes\util\DBUtil;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();

if(isset($users)){
$connection = DBUtil::getConnection();

$results="";
$maillist="";
$mailcontent="";
$formerror="";
$link="";

if(isset($_POST["submitted"])){
    $maillist=mysqli_query($connection,"SELECT * FROM tb_user WHERE wants_news LIKE '1'") or die("no mail list");
    
    if (mysqli_num_rows($maillist) > 0) {
        
    
    while ($row = mysqli_fetch_array($maillist)) {    
        $userid = $row['id'];
        $SECRET_STRING = "xxx";
        $idhash = md5($row['id'].$SECRET_STRING);
        $link = "http://localhost/abcjobs/public/unsubscribe.php?id=$userid&validation_hash=$idhash";
        $mailcontent=$_POST["mailcontent"];
        $mail = new PHPMailer;
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
        $mail->From = "admin@gmail.com";
        $mail->FromName = "admin";
        $mail->addAddress($row['email'], $row['firstname']);
        $mail->isHTML(TRUE);
        $mail->Subject = "News Letter";
        $mail->Body = "<p>$mailcontent</p><br><br><a href=$link >Unsubscribe</a>";
        $mail->AltBody = "This is the plain text version of the email content";
        if(!$mail->send()){        
            echo "Invalid email user";
            }
        else
            {
                
            }
        }
        $formerror="Email send";
    }       
}

?>

<div class="container-fluid" style="padding:0; background-image: url('../../img/Signin_bg.jpg') ;  height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
		
		<div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
            
			<form action="" method="post">			
  			<div class="form-group">
            <label for="mailcontent">Write your message here</label>
            <textarea class="form-control" name="mailcontent" rows="4"></textarea>
            <h4 class="error"><?php echo $formerror?></h4>
          	</div>
  			<div class="">
    			<button class="btn btn-primary" type="submit" name="submitted" style="background-color: #ff9900; border-color: #ff9900; width:100%">Send</button>
    			<button class="btn btn-default" type="Reset" name="Clear" style="border-color: #FF9900; border-width: 2px; color: #FF9900;  width:100%; margin-top:10px">Clear</button>
  			</div>
			
			</form>			
			
			
			</div>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
	</div>
		
		<div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
            
			<form action="" method="post">			
  			
  			<div class="">
    			<button class="btn btn-primary" type="submit" name="button" style="background-color: #ff9900; border-color: #ff9900; width:100%">Show Mailing List</button>
  			</div>
			
			</form>			
			<?php if(isset($_POST['button'])){    //trigger button click
 
                $results=mysqli_query($connection,"SELECT * FROM tb_user WHERE wants_news LIKE '1'") or die("Could not search!");

                if (mysqli_num_rows($results) > 0) {
                echo '
                	   <h3 style="color: #FF6600; padding-bottom:10px">Result:<br></h3>  
                    <table class="table table-striped">
                    <tr>
                    <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
            	        
                    </thead>
                    </tr>';
    
                while ($row = mysqli_fetch_array($results)) {
                    
                    echo '<tr>
                        <td>'.$row['firstname'].'</td>
                        <td>'.$row['lastname'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['role'].'</td>
                        
                    </tr>';
                } 
              }
              else{
                  echo "<h4 class='error'>No user Found</h4 >";
              }
              
            }?>
			</table>
			
			</div>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
	</div>

    
	
<?php 
}
?>


<?php
include '../../includes/footer.php';
?>