<?php
	session_start();

	$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

	if(!isset($_SESSION['username']))
	{

	  $_SESSION['not']=1;
	  header('location:login.php');
	   
	}

?>