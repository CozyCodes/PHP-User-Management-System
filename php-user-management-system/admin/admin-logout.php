<?php
session_start();

if(!isset($_SESSION['user2']))
{
	header("Location: ../index.php");
}
else if(isset($_SESSION['user2'])!="")
{
	header("Location: index.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user2']);
	header("Location: ../index.php");
}
?>