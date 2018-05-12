<!-- Navigation Bar -->
<!DOCTYPE html>
<html>
<head>
	<title>ABC Jobs</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/abcjobs/public/bs/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/abcjobs/public/bs/js/bootstrap.min.js"></script>
</head>

<style>
body, html{
    height: 100%;
    margin: 0;
}


.btn-link {
  font-weight: normal;
  color: lightgrey;
  border-radius: 0;
}

.btn-link:hover,
.btn-link:focus {
  color: orange;
  text-decoration: underline;
  background-color: transparent;
}

.error{
color: red;
}

th{
text-align:center;
}

</style>

<body>

<?php
require_once 'includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;


    $formerror="";
    
//     $deleteflag=false;
    
    if(isset($_POST["submitted"])){
        $SECRET_STRING = "xxx";
        $expected = md5( $_GET["id"] . $SECRET_STRING );
        
        if( $_GET['validation_hash'] = $expected ){
            $UM=new UserManager();
            $existuser=$UM->unsubscribenews($_GET["id"]);
            $formerror="unsubscribe successfully.";
//             $deleteflag=true;
            echo '<meta http-equiv="Refresh" content="1; url=home.php">';           
        } else {
            echo '<meta http-equiv="Refresh" content="1; url=home.php">';
        }
   
}

?>

<div class="container-fluid" style="padding:0; background-image: url('img/Sign_up.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10"  style="padding-top:50px"> 
            <form name="deleteUser" method="post" style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <img src="/abcjobs/public/img/Alert.png">
                <br><br>
                <h1>unsubscribe<br></h1>
                <h3><?=$formerror?><br></h3>
                           
                <br>
                <button type="submit" name="submitted" class="btn btn-primary" style="background-color: #ff9900; border-color: #ff9900; width:100%">Confirm</button>
            		
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>

            
            
<?php
include 'includes/footer.php';
?>