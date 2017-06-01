<?php
session_start();
// include_once 'dbconnect.php';
include_once 'connect.php';

if(!isset($_SESSION['user2']))
{
	header("Location: ../index.php");
}
// $res=mysql_query("SELECT * FROM admin WHERE admin_id=".$_SESSION['user2']);
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user2']);
$userRow=mysql_fetch_array($res);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin - <?php echo $userRow['user_name']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
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
    <label>Admin Page</label>
    </div>
    <div id="right">
    	<div id="content">
        		hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="admin-logout.php?logout">Sign Out</a>
        </div>
		    <div style="position:relative;right:800px;top:70px">  <ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="edit-profile.php">Edit Profile</a></li>
   <li><a href="change_password.php">Change Password</a></li>

</ul>
    </div>
    </div>
</div>
<br><br><br><br>
<center><h1>Welcome Admin</h1></center>

	<table class="table table-bordered table-hover">
    	<tr>
            <th>StuID</th>
            <th>StuName</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Subject</th>
            <th>Registered Date</th>
            <th>Option</th>
    	</tr>
        <?php
			include "connect.php";
			$i = "select * from student";
			$h = mysql_query($i);
			while($tr=mysql_fetch_array($h))
			{
		?>
        <tr>
        	<td><?php echo $tr[0]; ?></td>
            <td><?php echo $tr[1]; ?></td>
            <td><?php echo $tr[2]; ?></td>
            <td><?php echo $tr[3]; ?></td>
            <td><?php echo $tr[4]; ?></td>
            <td><?php echo $tr[5]; ?></td>
            <td><?php echo $tr[6]; ?></td>
            <td align="center"> <a href="reset-student-pass.php?txtid=<?php echo $tr[0];?>&txtname=<?php echo $tr[1];?>">Reset Password</a> </td>    
        </tr>
        <?php
			}
		?>
		
    </table>
</body>
</html>