<?php

$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

if(!isset($_GET['id'])){
    header( "Location: userForm.php");
    exit();
}

$uid = $_GET['id'];
$sql = "SELECT id, username, password, is_active FROM user WHERE id=$uid";
$result = $con-> query($sql);
if($result->num_rows >0 )
{
    while( $row= $result -> fetch_assoc()){
        echo $row['username']."|".$row['password']."|".$row['is_active'];
    }

}

?>