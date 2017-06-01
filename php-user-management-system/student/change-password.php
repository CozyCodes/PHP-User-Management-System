<?php
session_start();
error_reporting(0);
if(isset($_SESSION['user'])!="")
{
	//header("Location: home.php");
}
include_once 'connect.php';
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

if(isset($_POST['btn-signup']))
{	
	
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$confirmpass = md5(mysql_real_escape_string($_POST['confirmpass']));

	$upass = trim($upass);

        $query = "SELECT user_name FROM user WHERE user_name='$uname'";
	// $query = "SELECT user_pass FROM user WHERE user_id='". $_SESSION["user2"]."'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); 
	
 
	
	if($count == 0 && $upass == $confirmpass ){

		// if(mysql_query("INSERT INTO admin(admin_pass) VALUES('$upass')"))
			if(mysql_query("UPDATE user set user_pass='".$upass ."' WHERE user_id='". $_SESSION["user"]. "'"))
			// if(mysql_query("UPDATE admin SET admin_pass=.$upass "))
		{
		//	mysql_query("UPDATE user SET user_pass=.$upass ");
			mysql_query("UPDATE student set stud_pass='". $upass."' WHERE stud_username='".$_SESSION["name"]."'");
			?>
			<script>alert('Password Changed Successfully ');</script>			
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
		 <script>alert('Sorry Email ID already taken ...');</script>  
		 <?php
	}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CHANGE PASSWORD</title>
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
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">

<tr>
<?php
// echo $_SESSION["user"];
?>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><input type="password" name="confirmpass" placeholder="Repeat Password" required /></td>
</tr>

<tr>
<td><button type="submit" name="btn-signup">CHANGE PASSWORD</button></td>
</tr>

</table>
</form>
</div>
</center>
</body>
</html>