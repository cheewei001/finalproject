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
   if(isset($_SESSION["email"]))
   {
       if($_SESSION["role"]=="admin")
       {
?>

    <nav class=" container-fluid navbar navbar-default"  id="top" style="background-color: white; border: 1px; border-color: white; border-radius: 0px; margin-bottom: 0px">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/abcjobs/public/home.php" style="padding: 10px"><img src="/abcjobs/public/img/ABClogo_header.png" alt="ABC Jobs" style="height: 30px; padding: 0px"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/abcjobs/public/home.php">Home</a></li>
                    <li><a href="/abcjobs/public/aboutus.php">About Us</a></li>
                    <li><a href="/abcjobs/public/modules/user/updateprofile.php">Update Profile</a></li>
                    <li><a href="/abcjobs/public/modules/user/userlistadmin.php">View Users (admin)</a></li>
                    <li><a href="/abcjobs/public/modules/user/mailadmin.php">Send Mail (admin)</a></li>
                    <li><a href="/abcjobs/public/contactus.php">Contact Us</a></li>
                    
                </ul>                
                <ul class="nav navbar-nav navbar-right">
                    
                        <a href="/abcjobs/public/logout.php"><button class="btn btn-default" type="button" style="border-color: #FF9900; border-width: 2px; color: #FF9900; border-radius: 10px; margin-top: 7px">
                            Sign Out
                            <span class="glyphicon glyphicon-user" style="padding-left: 7px"></span>
                        </button></a>
                  
                </ul>
            </div>
        </div>
    </nav>

<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src="http://localhost/abcjobs/public/images/logo.png" align="left" style="width:55px; height:35px">
  <a href="/abcjobs/public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="/abcjobs/public/modules/user/updateprofile.php" class="w3-bar-item w3-button w3-mobile">Update Profile</a>
  <a href="/abcjobs/public/modules/user/userlistadmin.php" class="w3-bar-item w3-button w3-mobile">Administration Users</a>
  <a href="/abcjobs/public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="/abcjobs/public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
</div> -->
<?php 
   } else
   {
?>

    <nav class=" container-fluid navbar navbar-default"  id="top" style="background-color: white; border: 1px; border-color: white; border-radius: 0px; margin-bottom: 0px">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/abcjobs/public/home.php" style="padding: 10px"><img src="/abcjobs/public/img/ABClogo_header.png" alt="ABC Jobs" style="height: 30px; padding: 0px"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/abcjobs/public/home.php">Home</a></li>
                    <li><a href="/abcjobs/public/aboutus.php">About Us</a></li>
                    <li><a href="/abcjobs/public/modules/user/updateprofile.php">Update Profile</a></li>
                    <li><a href="/abcjobs/public/modules/user/userlist.php">View Users</a></li>
                    <li><a href="/abcjobs/public/contactus.php">Contact Us</a></li>
                    
                </ul>                
                <ul class="nav navbar-nav navbar-right">
                    
                        <a href="/abcjobs/public/logout.php"><button class="btn btn-default" type="button" style="border-color: #FF9900; border-width: 2px; color: #FF9900; border-radius: 10px; margin-top: 7px">
                            Sign Out
                            <span class="glyphicon glyphicon-user" style="padding-left: 7px"></span>
                        </button></a>
                  
                </ul>
            </div>
        </div>
    </nav>
<!-- 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src="http://localhost/abcjobs/public/images/logo.png" align="left" style="width:55px; height:35px">
  <a href="/abcjobs/public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="/abcjobs/public/modules/user/updateprofile.php" class="w3-bar-item w3-button w3-mobile">Update Profile</a>
  <a href="/abcjobs/public/modules/user/userlist.php" class="w3-bar-item w3-button w3-mobile">View Users</a>
  <a href="/abcjobs/public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="/abcjobs/public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
</div> -->
<?php }
   } else {
?>


    <nav class=" container-fluid navbar navbar-default"  id="top" style="background-color: white; border: 1px; border-color: white; border-radius: 0px; margin-bottom: 0px">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/abcjobs/public/home.php" style="padding: 10px"><img src="/abcjobs/public/img/ABClogo_header.png" alt="ABC Jobs" style="height: 30px; padding: 0px"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/abcjobs/public/home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/abcjobs/public/aboutus.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/abcjobs/public/contactus.php">Contact Us</a></li>
                    
                </ul>                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border-color: #FF9900; border-width: 2px; color: #FF9900; border-radius: 10px; margin-top: 7px">
                            Sign in / Sign up
                            <span class="glyphicon glyphicon-user" style="padding-left: 7px"></span>
                        </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/abcjobs/public/login.php">Sign in</a></li>
                            <li><a href="/abcjobs/public/modules/user/signup.php">Sign up</a></li>
                            </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!--   

<li class="active"><a href="./home.php">Home<span class="sr-only">(current)</span></a></li>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src="http://localhost/abcjobs/public/images/logo.png" align="left" style="width:55px; height:35px">
  <a href="/abcjobs/public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="/abcjobs/public/aboutus.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>About Us</a>
  <a href="/abcjobs/public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="/abcjobs/public/login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Login</a>
</div> -->
<?php 
   } 
?>