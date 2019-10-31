<?php

session_start();

$con = mysqli_connect('127.0.0.1:3306', 'root', '');

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
			<h1 style="text-align:center; font-size: 50px; color:#003366">Welcome to your Website BOSS!</h1>
		</div>

		
		<div class="container" style="background-color: #154360">   
        	<a href="login.php"><button type="submit">Login</button>
      	</div>
		
      	<div class="container" style="background-color: #154360">
        	<a href="registration.php"> <button type="button" class="cancelbtn">Register HERE!</button></a>
      	</div>

      	<div class="center">	
			<a href="logout.php"> <h2>LOGOUT</h2></a>
		</div>


		
	</body>
</html>

