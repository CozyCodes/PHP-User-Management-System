<?php
error_reporting(0);
session_start();
session_cache_expire(1);
// include_once 'dbconnect.php';
include_once 'connect.php';

if(isset($_SESSION['type'])=="Student")
{
	header("Location: student/index.php");
}
else if(isset($_SESSION['type1'])=="Student Admin")
{
	 header("Location: student-admin/index.php");
	
}
else if(isset($_SESSION['type2'])=="Admin")
{
	header("Location: admin/index.php");
	
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$uname = mysql_real_escape_string($_POST['uname']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	$uname = trim($uname);
	
	// $res=mysql_query("SELECT user_id, user_name, user_pass, user_type FROM users WHERE user_email='$email'");
	$res=mysql_query("SELECT user_id, user_name, user_pass, user_type, user_status FROM user WHERE user_name='$uname'");
	$row=mysql_fetch_array($res);	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	$res1=mysql_query("SELECT user_id, user_name, user_pass, user_type, user_status FROM user WHERE user_name='$uname'");
	$row1=mysql_fetch_array($res1);	
	$count1 = mysql_num_rows($res1); 
	
	// $res2=mysql_query("SELECT admin_id, admin_lname, admin_pass, admin_status, admin_utype FROM admin WHERE admin_email='$email'");
//	$res2=mysql_query("SELECT admin_id, admin_username, admin_pass, admin_type FROM admin WHERE admin_username='$uname'");
	$res2=mysql_query("SELECT user_id, user_name, user_pass, user_type, user_status FROM user WHERE user_name='$uname'");
	$row2=mysql_fetch_array($res2);	
	$count2 = mysql_num_rows($res2);
	
	
	if($count == 1 && $row['user_pass']==md5($upass) && $row['user_type']== 'Student' && $row['user_status']== 'active')
		// if($count == 1 && $row['user_pass']==md5($upass) && $row['user_type']== 'Student' )
		// if($count == 1 && $row['po_pass']==$upass && $row['po_utype']== 'Seller' )
	{
		$_SESSION['user'] = $row['user_id'];
		$_SESSION['type'] = $row['user_type'];
		$_SESSION['name'] = $row['user_name'];
		header("Location: student/index.php");
	}
	else if($count1 == 1 && $row1['user_pass']==md5($upass) && $row1['user_type']== 'Student Admin' && $row1['user_status']== 'active' )
	{
		$_SESSION['user1'] = $row1['user_id'];
		$_SESSION['type1'] = $row1['user_type'];
		$_SESSION['name1'] = $row1['user_name'];
		header("Location: student-admin/index.php");
	}
	// else if($count2 == 1 && $row2['admin_pass']==md5($upass) && $row2['admin_type']== 'Admin' )
		else if($count2 == 1 && $row2['user_pass']==md5($upass) && $row2['user_type']== 'Admin' )
	{
		// $_SESSION['user2'] = $row1['admin_id'];
		// $_SESSION['type2'] = $row1['admin_utype'];
		   // $_SESSION['user2'] = $row2['admin_id'];
		   // $_SESSION['type2'] = $row2['Admin'];
		    $_SESSION['user2'] = $row2['user_id'];
		   $_SESSION['type2'] = $row2['user_type'];
		   $_SESSION['name2'] = $row2['user_name'];
		   
		header("Location: admin/index.php");
	}
	
	else if($row['stud_pass']!=md5($upass) || $row2['user_pass']!=md5($upass))
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}
	
}

if(isset($_POST['login_button']))
{
	$email = mysql_real_escape_string($_POST['mail']);
	$upass = mysql_real_escape_string($_POST['password']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT r_id, r_lname, r_pass, r_utype FROM renter WHERE r_email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	if($count == 1 && $row['r_pass']==md5($upass) && $row['r_utype']== 'Renter' )
	{
		$_SESSION['user'] = $row['r_id'];
		header("Location: home1.php");
	}
	// else if($count == 1 && $row['user_pass']==md5($upass) && $row['user_type']== 'Seller' )
	// {
		// $_SESSION['user'] = $row['user_id'];
		// header("Location: home.php");
	// }
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>USER MANAGEMENT</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body><BR><BR>
<center><h3>USER MANAGEMENT</h3></center>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="Your Username" required /></td>
</tr>
<!--<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>  -->
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Register</a></td>
</tr>
</table>
</form>
</div><BR><BR>
<!--
<h3>CUSTOMER LOGIN</h3>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>

<td><input type="text" name="mail" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="login_button">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Register</a></td>
</tr>
</table>
</form>
</div>
-->
</center>
</body>
</html>