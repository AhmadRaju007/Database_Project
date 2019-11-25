
<?php
session_start();

$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

if(!isset($_SESSION['username']))
{

    $_SESSION['not']=1;
    header('location:login.php');

}
if(!isset($_GET['id'])){
    header( "Location: showUser.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT id, username, password, is_active FROM user WHERE id=$id";
$result = $con-> query($sql);
if($result->num_rows >0 )
{
    while( $row= $result -> fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td><td>".$row["is_active"]."</td></tr>";
    }
    echo "</table>";
}
else{
    echo "0 result";
}


?>
