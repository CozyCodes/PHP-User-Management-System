<?php
session_start();

if(!isset($_SESSION['user1']))
{
	header("Location: ../index.php");
}
else if(isset($_SESSION['user1'])!="")
{
	header("Location: index.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user1']);
	header("Location: ../index.php");
}
?>