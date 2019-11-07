<?php

    session_start();

    $con = mysqli_connect('127.0.0.1:3306', 'root', '','login');
    if(isset($_GET['id'])) {
        $uid = $_GET['id'];
    }

    if(!isset($_SESSION['username']))
    {

        $_SESSION['not']=1;
       // header('location:login.php');

    }
    if(!empty($_POST)) {
        //session_start();
        $con = mysqli_connect('127.0.0.1:3306', 'root', '', 'login');
        // echo "$uid";
        echo "This section worked!";
        $Uname = $_POST['username'];
        $Pass = $_POST['password'];
        if($_POST['id_is_active']== false)
            $Active = 0;

        else
        {
            $Active = 1;
        }

        echo $Uname;
        $sql = "UPDATE user SET username= '$Uname', password= '$Pass', is_active= '$Active' WHERE id= '$uid'";
        $q = mysqli_query($con,$sql);

        if ($q) {
            echo "Successfully Updated!";
            header('location:manager_index.php');
        } else {
            echo "Update Unsuccessful! Try Again";
        }
    }

   /*
  } */


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

                                <form method="post" class="form-horizontal" enctype="multipart/form-data" action="";return false;"
                                      id="admin_form">
                                    <div class="alert alert-warning">Fields in <strong>bold</strong> are required.</div>

                                    <div class="row-fluid">

                                    </div>
                                    <div class="row-fluid">
                                        <div id="content-main" class="span12">
                                            <div>


                                                <fieldset class="_module _aligned" id="fieldset-1" style="background:transparent">

                                                    <div class="fields ">




                                                        <div class="form-group  field-username">

                                                            <div>

                                                                <div class="col-sm-4">
                                                                    <label for="username" class="required"><b>User Name</b></label>
                                                                </div>
                                                                <div class="col-sm-8">

                                                                    <input class="form-control"  required id="username" maxlength="255"
                                                                           name="username" type="text" value=""/>


                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="form-group  field-passwd">

                                                            <div>

                                                                <div class="col-sm-4">
                                                                    <label for="password" class="required"><b>Password</b></label>
                                                                </div>
                                                                <div class="col-sm-8">

                                                                    <input class="form-control" id="password" maxlength="255" name="password"
                                                                           type="text" value=""/>


                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="form-group  field-is_active">

                                                            <div>

                                                                <div class="col-sm-4">
                                                                    <label for="id_is_active" class="vCheckboxLabel">Is active</label>


                                                                        <input id="id_is_active" name="id_is_active" type="checkbox"/>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">

                                        <input type="submit" value="Save" class="btn_core btn_core_sm" name="_save"/>
                                    </div>
                                </form>
                            <?php


                            ?>




                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
</body>
</html>

<script>


    $(document).ready(function(){
        $.ajax({
            url: "userFormData.php?id="+<?php echo $uid; ?>,
           // data: d,


        }).done(function(data){

            var dat = data.split('|');
            //alert(dat[6]);
            $('#admin_form [name="username"]').val(dat[0]);
            $('#admin_form [name="password"]').val(dat[1]);
            if (dat[2] == 1)
                document.getElementById("id_is_active").checked = true;
            else
                document.getElementById("id_is_active").checked = false;

        });

    });
</script>