<?php

session_start();

$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

if(!isset($_SESSION['username']))
{

  $_SESSION['not']=1;
  header('location:login.php');

}
?>



<html>
    <head>
        <title > manager index page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href= "css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href= "css/style_manager_index_showUser.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-select.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    </head>

    <body >
        <div class="bgnd" >
            <header>
                <div class="container_nav" style = "width:100%; ">
                    <nav>
                        <ul>
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
                                    <a href="#" onclick="showUserInfo()">Password</a>

                                    <a href="#">Language</a>
                                </div>
                            </li>
                            <li class="item">
                                <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <section>
                <div class="form-group custom-input-space has-feedback"  style="color: #006400">
                    <div class="page-heading">
                        <h3 class="post-title"> Server Side Processing DataTable</h3>
                    </div>
                    <div class="page-body clearfix">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Post Details List: </div>
                                    <table id="t01" width="100%" >

                                        <thead>

                                        <th><div class= "col-xs-3 col-md-3 "> Id</div></th>
                                        <th><div class= "col-xs-3 col-md-2 "> Username</div></th>
                                        <th> <div class= "col-xs-2 col-md-2 ">Password</div></th>
                                        <th> <div class= "col-xs-2 col-md-2 ">Active Status</div></th>
                                        </thead>
                                        <?php


                                        $con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

                                        if(!isset($_SESSION['username']))
                                        {

                                            //  $_SESSION['not']=1;
                                            echo "User id not found";
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

                                        }
                                        else{
                                            echo "0 result";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
        </div>
    </body>
</html>