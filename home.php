<?php

session_start();

$con = mysqli_connect('127.0.0.1:3308', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, 'login');

?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=10" >
		<link rel="stylesheet" href= "css/style_home.css">
	</head>


	<body>

		<div class="center">
			<h1> Welcome to the Homepage</h1>
			<a href="logout.php"> <h2>LOGOUT</h2></a>
		</div>

		
	</body>
</html>