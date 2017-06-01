<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'connect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$uname = htmlspecialchars( $uname );
	
	$email = mysql_real_escape_string($_POST['email']);
	$email = htmlspecialchars( $email );
	
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$confirmpass = md5(mysql_real_escape_string($_POST['confirmpass']));
	
	$utype = mysql_real_escape_string($_POST['cbosearch']);
	$utype = htmlspecialchars( $utype );
	
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	$utype = trim($utype);
	
	// email exist or not
	// $query = "SELECT user_email FROM users WHERE user_email='$email'";
	$query = "SELECT admin_username FROM admin WHERE admin_username='$uname'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); 
	
	$query1 = "SELECT stud_username FROM student WHERE stud_username='$uname'";
	$result1 = mysql_query($query1);	
	$count1 = mysql_num_rows($result1); 
	
	if($count == 0 && $upass == $confirmpass && $utype == 'Admin' ){
		if(mysql_query("INSERT INTO admin(admin_username,admin_email,admin_pass,admin_type) VALUES('$uname','$email','$upass','$utype')"))
		{
			mysql_query("INSERT INTO user(user_name,user_email,user_pass,user_type) VALUES('$uname','$email','$upass','$utype')");
			?>
			<script>alert('successfully registered ');</script>			
			<?php
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}	
      
	}
	else if ($count1 == 0 && $upass == $confirmpass && $utype == 'Student'){
		if(mysql_query("INSERT INTO student(stud_username,stud_email,stud_pass,stud_type,stud_status) VALUES('$uname','$email','$upass','$utype','active')"))
		{
			mysql_query("INSERT INTO user(user_name,user_email,user_pass,user_type,user_status) VALUES('$uname','$email','$upass','$utype','active')");
			?>
		<script>alert('successfully registered ');</script>
			<?php
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	}
	else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}
	}
	
	else if ($count1 == 0 && $upass == $confirmpass && $utype == 'Student Admin'){
		if(mysql_query("INSERT INTO student_admin(stud_admin_uname,stud_admin_email,stud_admin_pass,stud_admin_type,stud_admin_status) VALUES('$uname','$email','$upass','$utype','active')"))
		{
			mysql_query("INSERT INTO user(user_name,user_email,user_pass,user_type,user_status) VALUES('$uname','$email','$upass','$utype','active')");
			?>
		<script>alert('successfully registered ');</script>
			<?php
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	}
	else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}
	}
	
	
	else {
		?>
		 <script>alert('Sorry Username already taken ...');</script>  
		 <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REGISTRATION</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><input type="password" name="confirmpass" placeholder="Repeat Password" required /></td>
</tr>
<tr><td>
<select name="cbosearch">
    	<option>Admin</option>
    	<option>Student</option>        
		<option>Student Admin</option>
    </select>
	</td>
	</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>