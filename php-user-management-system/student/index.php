<?php
session_start();
include_once 'connect.php';

// if(!isset($_SESSION['user']))
	// if(isset($_SESSION['user'])!= $userRow['user_name'] || ($_SESSION['type'])!="Student" )
		if(isset($_SESSION['type'])!= "Student" )
{
	header("Location: ../index.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>STUDENT - <?php echo $userRow['user_name']; ?></title>
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
    <label>STUDENT PAGE</label>
    </div>
    <div id="right">
    	<div id="content">
        		hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="student-logout.php?logout">Sign Out</a>
        </div>
				    <div style="position:relative;right:800px;top:70px">  <ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="edit-profile.php">Edit Profile</a></li>
<li><a href="change-password.php">Change Password</a></li>

</ul>
    </div>
    </div>
</div>

<div id="body">
	
	<a href="change-password.php" class="btn btn-info" role="button">CHANGE PASSWORD</a>
	
</div>
<div id="body">
	
	<a href="edit-profile.php" class="btn btn-info" role="button">EDIT PROFILE</a>
	
</div>


</body>
</html>