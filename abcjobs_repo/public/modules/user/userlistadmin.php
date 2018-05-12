<?php
session_start();
require_once '../../includes/autoload.php';

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

$result="";
?>

<div class="container-fluid" style="padding:0; background-image: url('../../img/Signin_bg.jpg') ;  height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
		<div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
            
			<form action="" method="post">
			<div class="input-group">
  			<input class="form-control" name="search" type="search" placeholder="Search user" required>
  			<div class="input-group-btn">
    			<button class="btn btn-primary" type="submit" name="button" style="background-color: #ff9900; border-color: #ff9900; width:100%">Search</button>
  			</div>
			</div>
			</form>			
			<?php if(isset($_POST['button'])){    //trigger button click

                $search=$_POST['search'];
 
                $result=mysqli_query($connection,"SELECT * FROM tb_user WHERE id LIKE '%$search%' OR firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%'") or die("Could not search!");

                if (mysqli_num_rows($result) > 0) {
                echo '
                	   <h3 style="color: #FF6600; padding-bottom:10px">Search Result:<br></h3>  
                    <table class="table table-striped">
                    <tr>
                    <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
            	        <th>Operation</th>
                    </thead>
                    </tr>';
    
                while ($row = mysqli_fetch_array($result)) {
                    
                    echo '<tr>
                        <td>'.$row['firstname'].'</td>
                        <td>'.$row['lastname'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['role'].'</td>
                        <td>
            					<a href="deleteuser.php?id='.$row['id'].'>">Delete</a><a style="padding-left: 5px; padding-right: 5px"></a>
            					<a href="updateuserprofile.php?id='.$row['id'].'>">Update</a>
            			   </td>
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

<!-- 
 	<div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
           
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px; padding-bottom:50px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">

	<h3 style="color: #FF6600; padding-bottom:10px">Below is the list of Developers registered in community portal</h3>
    <table class="table table-striped text-center">
            <tr>
			<thead>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
               <th><b>Role</b></th>
			   <th><b>Operation</b></th>
			   </thead>
            </tr>    
    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
               <td><?=$user->firstname?></td>
               <td><?=$user->lastname?></td>
               <td><?=$user->email?></td>
               <td><?=$user->role?></td>
			   <td>
					<a href='deleteuser.php?id=<?php echo $user->id ?>'>Delete</a><a style="padding-left: 5px; padding-right: 5px"></a>
					<a href='updateuserprofile.php?id=<?php echo $user->id ?>'>Update</a>
			   </td>
            </tr>
            <?php 
        }
    }
    ?>
    </table>
    			</div>
            </div>
            
            
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
	</div>    
  -->	
	
<?php 
}
?>


<?php
include '../../includes/footer.php';
?>