<?php

//session_start();

$con = mysqli_connect('127.0.0.1:3308', 'root', '','login');

if(isset($_POST["insert"]))
{
	$file = addslashes( file_get_contents($_FILES["image"]["tmp_name"]));
	//echo "$file";

	$query = "INSERT INTO user(img_name) VALUES ('$file')";

	if(mysqli_query($con, $query))
	{
		echo "Image Inserted into Database";
	}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">

		<title></title>
		<link rel="stylesheet" href="css/style_new_man.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	</head>

	<body>
		<div class="middle">
			<div class="menu">
				<li class="item" id="profile">
					<a href="#profile" class="btn"><i class="far fa-user"></i>Profile</a>
					<div class="smenu">
						<a href="#">Posts</a>
						<a href="#">Pictures</a>
					</div>
				</li>

				<li class="item" id="messages">
					<a href="#messages" class="btn"><i class="far fa-envelope-open"></i>Messages</a>
					<div class="smenu">
						<a href="#">New</a>
						<a href="#">Sent</a>
						<a href="#">Spam</a>
					</div>
				</li>

				<li class="item" id="settings">
					<a href="#settings" class="btn"><i class="fas fa-cog"></i>Settings</a>
					<div class="smenu">
						<a href="#">Password</a>
						<a href="#">Language</a>
					</div>
				</li>

				<li class="item">
					<a class="btn" href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
				</li>
			</div>
		</div>
	</body>