<?php
session_start();

$con = mysqli_connect('127.0.0.1:3306', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysqli_error());
}

if(isset($_SESSION['not']))
{
  //echo "You are not logged in!";
   $_SESSION['not']=0;
}

mysqli_select_db($con, 'login');

if(isset($_POST) && !empty($_POST))
{
  $name = $_POST['uname'];
  $pass = $_POST['psw'];
  $_SESSION['username']= $_POST['uname'];

  $q = "select * from user where username = '".$name."' and password = '".$pass."' limit 1 ";
  $res = mysqli_query($con, $q);
  $num = mysqli_num_rows($res);

  if($num==1)
  {
    header('location:manager_index.php');
  } 
  else
  {
$_SESSION['status']=
    header('location:login.php');
    echo "Login failed!";
  }
}
?>


<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <link rel="stylesheet" href= "css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href= "css/style.css">
  </head>

  <body>
    <h2 align="center">LOGIN FORM</h2>

    <div class="imgcontainer">
      <img src="images\img_new.png" alt="Avatar" class="avatar" >
    </div>

    <form action="login.php" method="post">
      <div class="container">
        <label for="uname"><b>Username</t>  </b></label>
        <input  type="text" placeholder="Enter Username" name="uname" required>
      </div>

      <div class="container">
        <label for="psw"><b>Password</t>  </b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
      </div>

      <div class="container">   
        <button type="submit">Login</button>
      </div>

      <div class="container">
        <label>
          <input type="checkbox"  name="remember"> Remember me
          <a href="index.php">Forgot password?</a>
        </label>
      </div>

      <div class="container" style="background-color: #154360">
        <a href="registration.php"> <button type="button" class="cancelbtn">Register HERE!</button></a>
      </div>
    </form>

  </body>
</html>
