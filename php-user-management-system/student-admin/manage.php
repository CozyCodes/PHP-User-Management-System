<?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['user1']))
{
	header("Location: ../index.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user1']);
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
    background-color: black;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px 4px 0 0;
}

ul#menu li a:hover {
    background-color: orange;
}
</style>
</head>
<body>

<div id="header">
	<div id="left">
    <label>STUDENT ADMIN PAGE</label>
    </div>
    <div id="right">
    	<div id="content">
        		hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="student-admin-logout.php?logout">Sign Out</a>
        </div>
				    <div style="position:relative;right:800px;top:70px">  <ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="edit-profile.php">Edit Profile</a></li>
   <li><a href="change_password.php">Change Password</a></li>
<!--   <li><a href="student.php">Student Page</a></li>  -->

</ul>
    </div>
    </div>
</div>
<br><br><br><br>
<center><h1>Welcome Student Admin</h1></center>

	<table class="table table-bordered table-hover">
    	<tr>
            <th>Student ID</th>
            <th>Student Username</th>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Password</th>
            <th>Adress</th>
            <th>Phone No.</th>
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
            <td align="center"> <a href="edit-user.php?txtid=<?php echo $tr[0];?>">Edit</a> </td>    
        </tr>
        <?php
			}
		?>
		
    </table>
</body>
</html>