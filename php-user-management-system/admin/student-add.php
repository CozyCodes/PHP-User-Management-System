<?php
session_start();
// if(isset($_SESSION['user2'])!="")
if(!isset($_SESSION['user2']))
{
	header("Location: ../index.php");
}
// include_once 'dbconnect.php';
include_once 'connect.php';

$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user2']);
$userRow=mysql_fetch_array($res);


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
	
	$course = $_POST['course'];
	// email exist or not
	// $query = "SELECT user_email FROM users WHERE user_email='$email'";
	$query = "SELECT admin_username,admin_name,admin_email FROM admin WHERE admin_username='$uname'";
	$result = mysql_query($query);	
	$count = mysql_num_rows($result); 
	
	$query1 = "SELECT stud_username FROM student WHERE stud_username='$uname'";
	$result1 = mysql_query($query1);	
	$count1 = mysql_num_rows($result1); 
	
	$query2 = "SELECT stud_admin_uname FROM student_admin WHERE stud_admin_uname='$uname'";
	$result2 = mysql_query($query2);	
	$count2 = mysql_num_rows($result2);
	
	if($count == 0 && $upass == $confirmpass && $utype == 'Admin' )
	{
		if(mysql_query("INSERT INTO admin(admin_username,admin_email,admin_pass) VALUES('$uname','$email','$upass')"))
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
	else if ($count1 == 0 && $upass == $confirmpass && $utype == 'Student')
	{
		if(mysql_query("INSERT INTO student(stud_username,stud_email,stud_pass,course_name,stud_type) VALUES('$uname','$email','$upass','$course','Student')"))
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
			<script>alert('email already taken');</script>
			<?php
		}
	}
else if ($count2 == 0 && $upass == $confirmpass && $utype == 'Student Admin'){
		if(mysql_query("INSERT INTO student_admin(stud_admin_uname,stud_admin_email,stud_admin_pass,course_name,stud_admin_type) VALUES('$uname','$email','$upass','$course','Student Admin')"))
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
			<script>alert('email already taken');</script>
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
  <li><a href="edit-profile.php">Edit Profile</a></li>
   <li><a href="change_password.php">Change Password</a></li>

</ul>
    </div>
    </div>
</div>
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
<tr>
<td>
	<?php
                   mysql_connect('localhost', 'root', '');
                   mysql_select_db('student_enroll');
				   $sql = "SELECT * FROM course";
                   $result = mysql_query($sql); 
                   echo "<select name='course'>";
                   while ($row = mysql_fetch_array($result)) {
				   echo "<option value='" . $row['course_name'] . "'>" . $row['course_name'] . "</option>";
                  }
                   echo "</select>";				   				
                  ?> 
</td>
				  </tr>
<tr><td>
<select name="cbosearch">
    	<option>Student</option>        
		<option>Student Admin</option>
    </select>
	</td>
	</tr>
<tr>
<td><button type="submit" name="btn-signup">Add Student</button></td>
</tr>

</table>
</form>
</div>
</center>
</body>
</html>