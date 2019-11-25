<?php
session_start();

$con = mysqli_connect('127.0.0.1:3306', 'root', '');
if (!$con) 
{
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, 'login');

if(isset($_POST) && !empty($_POST))
{
  $name = mysqli_real_escape_string($con, $_POST['uname']);
  $pass = mysqli_real_escape_string($con, $_POST['psw']);

  //echo('$name');

  $q = "select * from user where username = '".$name."' limit 1 ";
  $res = mysqli_query($con, $q);
  $num = mysqli_num_rows($res);

  if($num>=1)
  {
    echo "<script>alert('Username already taken')</script>";

      //echo "Username already taken";
  } 

  else
  {
      $reg= "insert into user(password,username) values ('".$pass."' , '".$name."')";
      $res = mysqli_query($con, $reg);
      header('location:login.php');
      echo "Registration Completed!!";

  }
}

?>


<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <link rel="stylesheet" href= "css/style_reg.css">
  </head>

  <body>
    <h2>Registration FORM</h2>
    <div class="imgcontainer">
      <img src="images\image_reg.png" alt="Avatar" class="avatar" height=300>
    </div>
    <form action="registration.php" method="post">
      <div class="container">
        <label for="uname"><b>Enter the Username</t>  </b></label>
        <input  type="text" placeholder="Enter Username" name="uname" required>
      </div>

      <div class="container">
        <label for="psw"><b>Enter the Password</t>  </b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
      </div>

      <div class="container">   
        <button type="submit" name="regi" value="Register">Register</button>
        
      </div>

      <div class="container">
        <label>
          <input type="checkbox"  name="remember"> Remember me
          <a href="index.php">Forgot password?</a>
        </label>
      </div>
    </form>
  </body>
</html>
