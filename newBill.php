<?php

session_start();

$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');


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
    if($_POST['id_is_active']== false) {
        $Active = 0;
    }

    else {
        $Active = 1;
    }

    echo $Uname;
    echo $Pass;
    echo $Active;
    $sql = "INSERT INTO user(username,password,is_active) VALUES  ('$Uname','$Pass','$Active')";
    $q = mysqli_query($con,$sql);

    if ($q) {
        echo "Successfully Inserted!";
        header('location:manager_index.php');
    } else {
        echo " Unsuccessful! Try Again";
    }
}

/*
} */


?>



<html>
<head>
    <title >নতুন বিল </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href= "css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href= "css/style_manager_index_new_bill.css">
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
                <h3 class="post-title"> নতুন বিল তথ্য প্রদান করুন </h3>
            </div>
            <div class="page-body clearfix">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="panel panel-default">

                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="";return false;>
                                <div class="row-fluid">
                                    <div id="content-main" class="span12">
                                        <fieldset class="_module _aligned" id="fieldset-1" style="background:transparent">
                                            <div class="fields ">
                                                <div class="form-group  field-customername">
                                                    <div class="col-sm-4">
                                                        <ul>
                                                            <li>
                                                                <label for="customerid" class="required"><b>কাস্টমার নং</b></label>
                                                                <input class="form-control" maxlength="255" name="customerid" placeholder="কাস্টমার নং" type="c_text" value="" required/>
                                                            </li>

                                                            <li>
                                                                <label for="customername" class="required"><b>কাস্টমারের নাম</b></label>
                                                                <input class="form-control" maxlength="255" name="customername" placeholder="কাস্টমারের নাম" type="c_text" value="" required/>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-8">


                                                    </div>

                                                </div>
                                            </div>
                                            <div style="margin-left: 20px">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <label for="bm_piece" ><b>BMW</b></label>
                                                        </td>
                                                        <td>
                                                            <ul type="flex">

                                                                <li>

                                                                    <input class="form-control" maxlength="255" name="bmpiece" placeholder="নাম্বার" type="text" />
                                                                    <label for="bm_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="bm_meter" class="required"><b>মিটার</b></label>
                                                                    <input class="form-control" maxlength="255" name="bmmeter" placeholder="মিটার" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control" maxlength="255" name="bmgauge" placeholder="গজ" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_price" ><b>দর</b></label>
                                                                    <input class="form-control" maxlength="255" name="bmprice" placeholder="দর" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_total_price" placeholder="টাকা" type="text" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>

                                                                <label for="lx_piece" ><b>LX</b></label>
                                                        </td>
                                                        <td>
                                                            <ul type="flex">
                                                                <li>
                                                                  <input class="form-control" maxlength="255" name="lxpiece" placeholder="নাম্বার" type="text" />
                                                                    <label for="lx_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="lx_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control" name="lxmeter" placeholder="মিটার" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="lx_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control" name="lxgauge" placeholder="গজ" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="lx_price" ><b>দর</b></label>
                                                                    <input class="form-control" name="lxprice" placeholder="দর" type="text"/>
                                                                </li>
                                                                <li>
                                                                    <label for="lx_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="lx_total_price" placeholder="টাকা" type="text" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <label for="diamond_piece" ><b> ডায়মণ্ড </b></label>
                                                        </td>
                                                        <td>
                                                            <ul type="flex">
                                                                <li>
                                                                    <input class="form-control" maxlength="255" name="diamondpiece" placeholder="নাম্বার" type="text" />
                                                                    <label for="diamond_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="diamondmeter" placeholder="মিটার" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="diamondgauge" placeholder="গজ" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="diamondprice" placeholder="দর" type="text"/>
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="diamond_total_price" placeholder="টাকা" type="text" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <label for="cherry_piece" ><b> চেরী </b></label>
                                                        </td>
                                                        <td>
                                                            <ul type="flex">
                                                                <li>
                                                                    <input class="form-control" maxlength="255" name="cherrypiece" placeholder="নাম্বার" type="text" />
                                                                    <label for="cherry_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="cherrymeter" placeholder="মিটার" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="cherrygauge" placeholder="গজ" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="cherryprice" placeholder="দর" type="text"/>
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="cherry_total_price" placeholder="টাকা" type="text" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <label for="jorjet_piece" ><b> জর্জেট  </b></label>
                                                        </td>
                                                        <td>
                                                            <ul type="flex">
                                                                <li>
                                                                    <input class="form-control" maxlength="255" name="jorjetpiece" placeholder="নাম্বার" type="text" />
                                                                    <label for="jorjet_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="jorjetmeter" placeholder="মিটার" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="jorjetgauge" placeholder="গজ" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="jorjetprice" placeholder="দর" type="text"/>
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="jorjet_total_price" placeholder="টাকা" type="text" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                                <div class="pull-right">

                                    <input type="submit" value="Save" class="btn_core btn_core_sm" name="_save"/>
                                </div>
                            </form>





                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
</body>
</html>
