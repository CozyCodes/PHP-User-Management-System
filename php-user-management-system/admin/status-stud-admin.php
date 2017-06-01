 <?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['user2']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user2']);
$userRow=mysql_fetch_array($res);
?>
 <?php 
error_reporting(0);	
 ?>

	<?php   
        $id = $_GET["txtid"];		
        $name = trim($_POST['txtname']);		
		$email = trim($_POST['txtemail']);
		$address = trim($_POST['txtaddress']);
		$phone = trim($_POST['txtphone']);
		$status = trim($_POST['txtstatus']);
		$uname = trim($_POST['txtuname']);				
        $type = trim($_POST['txttype']);
    			
		$po_id = $userRow['po_id'];
        if(isset($_POST['cmdadd'])){
        if(empty($uname))
        {
            echo "<center>Sorry please input data</center>";
        }
			else
		{
        include "connect.php";
	   // $i = mysql_query("update student set stud_name='".$_POST['txtname']."', stud_email='".$_POST['txtemail']."', stud_address='".trim($_POST['txtaddress'])."', stud_phone='".$_POST['txtphone']."' where stud_id=".$id);
	    $i = mysql_query("update student_admin set stud_admin_status='".$_POST['txtstatus']."' where stud_admin_id=".$id);
	    $j = mysql_query("update user set user_status='".$_POST['txtstatus']."' where user_name='$uname'");
	  
	  if($i==true && $j==true){
		  ?>
		  <script>alert('Update Successful');</script>
		  <?php
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=manage-stud-admin.php">';
        }
        //if($i==true){
        //header('Location:index.php');
        //exit;
        //mysql_close();
        //}
        }
    }
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<style>
ul#menu {
    padding: 0;
}

ul#menu li {
    display: inline;
}

ul#menu li a {
    background-color: #9c4609;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px 4px 0 0;
}

ul#menu li a:hover {
    background-color: black;
}
</style>
</head>
<body>
<div id="header">
	<div id="left">
    <label>ADMIN PAGE</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="admin-logout.php?logout">Sign Out</a>
        </div>
		    <div style="position:relative;right:800px;top:70px">  <ul id="menu">
    <li><a href="index.php">Home</a></li>
  <li><a href="edit-profile.php?txtid=<?php echo $userRow['user_name']?>;">Edit Profile</a></li>
  <li><a href="change_password.php">Change Password</a></li>
</ul>
    </div>
    </div>
	
</div><center>
      <form action="" method="post" enctype="multipart/form-data">
   		<table class="table">
		<tr>
                
                <?php
				$eid= $_GET["txtid"];
				// echo $eid;
					include ("connect.php");
					$g = mysql_query("select * from student_admin WHERE stud_admin_id = '".$eid."'");
					while($id=mysql_fetch_array($g))
					{
				?>
                <br><br><br><br><br><br>
				<center><h1 style="color:black">Activate / Deactivate Student</h3></center><br>
             <!--   	<th>Cottage ID</th>
                    <td><input type="text" name="txtid" value="<?php echo $id[0]; ?>" readonly="readonly" /></td>  -->
                </tr>
              
                <tr>
                	<th>Student Username</th>
                    <td><input type="text" name="txtuname" value="<?php echo $id[1]; ?>" readonly="true" /></td>
                </tr>
				
				
				<tr>
                	<th>Student Email</th>
                    <td><input type="text" name="txtemail" value="<?php echo $id[3]; ?>" readonly="true" /></td>
                </tr>
				
				 <tr>
        	<th>Status:</th>
        	<td>
            	<input type="text" name="txtstatu" value="<?php echo $id[9]; ?>" readonly="true" /></td>
				<select name="txtstatus">
                    		<option>Select Status</option>
                       		<option>active</option>
                            <option>inactive</option>
                       </select>                   
            </td>
        </tr>															
				  <?php
					}
				?>
  <tr>
                    <td><input type="submit" name="cmdadd" value="Update" /></td>
                </tr>
   		</table>
   	 </form>



  </div>
</body>
</html>
     


