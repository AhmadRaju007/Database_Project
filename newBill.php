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
    $cId = $_POST['customerid'];
    $cName = $_POST['customername'];

    $bmNo = $_POST['bm_piece'];
    $bmMeter = $_POST['bm_meter'];
    $bmGauge = $_POST['bm_gauge'];
    $bmPrice = $_POST['bm_price'];
    $bmTotalPrice = $_POST['bm_total_price'];

    $lxNo = $_POST['lx_piece'];
    $lxMeter = $_POST['lx_meter'];
    $lxGauge = $_POST['lx_gauge'];
    $lxPrice = $_POST['lx_price'];
    $lxTotalPrice = $_POST['lx_total_price'];

    $diamondNo = $_POST['diamond_piece'];
    $diamondMeter = $_POST['diamond_meter'];
    $diamondGauge = $_POST['diamond_gauge'];
    $diamondPrice = $_POST['diamond_price'];
    $diamondTotalPrice = $_POST['diamond_total_price'];

    $cherryNo = $_POST['cherry_piece'];
    $cherryMeter = $_POST['cherry_meter'];
    $cherryGauge = $_POST['cherry_gauge'];
    $cherryPrice = $_POST['cherry_price'];
    $cherryTotalPrice = $_POST['cherry_total_price'];

    $jorjetNo = $_POST['jorjet_piece'];
    $jorjetMeter = $_POST['jorjet_meter'];
    $jorjetGauge = $_POST['jorjet_gauge'];
    $jorjetPrice = $_POST['jorjet_price'];
    $jorjetTotalPrice = $_POST['jorjet_total_price'];

    $grossPrice = $_POST['gross_price'];

//    echo $Uname;
  //  echo $Pass;
//    echo $Active;
    if($_POST('is_paid'))
    {
        $dueAmount=0;
        $sql = "INSERT INTO bill_info(gross_total_price,paid_status,due_amount,customer_name) VALUES ('$grossPrice',1,'$dueAmount','$cName')";
    }
    else
    {
        $dueAmount=$_POST[due_amount];
        $sql = "INSERT INTO bill_info(gross_total_price,paid_status,due_amount,customer_name) VALUES ('$grossPrice',1,'$dueAmount','$cName')";
    }
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
                                                                <label <b>বিল নং</b></label>
                                                                <?php
                                                               // session_start();
                                                                $con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

                                                                $result= mysqli_query($con,"SELECT MAX(bill_no) AS maximum FROM bill_info");

                                                                $row = mysqli_fetch_assoc($result);

                                                                $maximum = $row['maximum'];

                                                                echo (" $maximum");
                                                                ?>
                                                            </li>
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

                                                                    <input class="form-control" maxlength="255" name="bm_piece" placeholder="নাম্বার" type="text" />
                                                                    <label for="bm_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="bm_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_meter" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_gauge" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_price" ><b>দর</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_price" placeholder="দর" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_total_price" placeholder="0" type="text" />
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
                                                                  <input class="form-control" maxlength="255" name="lx_piece" placeholder="নাম্বার" type="text" />
                                                                    <label for="lx_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="lx_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control" name="lx_meter" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="lx_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control" name="lx_gauge" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="lx_price" ><b>দর</b></label>
                                                                    <input class="form-control" name="lx_price" placeholder="দর" type="text"/>
                                                                </li>
                                                                <li>
                                                                    <label for="lx_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="lx_total_price" placeholder="0" type="text" />
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
                                                                    <input class="form-control" maxlength="255" name="diamond_piece" placeholder="নাম্বার" type="text" />
                                                                    <label for="diamond_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="diamond_meter" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="diamond_gauge" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="diamond_price" placeholder="দর" type="text"/>
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="diamond_total_price" placeholder="0" type="text" />
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
                                                                    <input class="form-control" maxlength="255" name="cherry_piece" placeholder="নাম্বার" type="text" />
                                                                    <label for="cherry_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="cherry_meter" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="cherry_gauge" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="cherry_price" placeholder="দর" type="text"/>
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="cherry_total_price" placeholder="0" type="text" />
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
                                                                    <input class="form-control" maxlength="255" name="jorjet_piece" placeholder="নাম্বার" type="text" />
                                                                    <label for="jorjet_meter" ><b> টি </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="jorjet_meter" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="jorjet_gauge" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="jorjet_price" placeholder="দর" type="text"/>
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="jorjet_total_price" placeholder="0" type="text" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <ul>
                                                <li>
                                                    <label for="gross_price" class="required"><b>মোট বিল</b></label>
                                                    <input class="form-control" maxlength="255" name="gross_price" placeholder="মোট বিল " type="c_text" value="" required/>
                                                </li>
                                                <li>
                                                    <label for="is_paid" class="vCheckboxLabel">বাকি আছে?</label>
                                                    <input id="is_paid" name="is_paid" onclick="dueInput()" type="checkbox"/>
                                                </li>
                                                <li id="dues" style="display:none">
                                                    <label for="due_amount" ><b> বাকি </b></label>
                                                    <input class="form-control" maxlength="255" name="due_amount" placeholder="বাকির পরিমাণ" type="dues_text" />

                                                </li>

                                            </ul>

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
<script>
    function dueInput() {
        var checkBox = document.getElementById("is_paid");
        var dues = document.getElementById("dues");
        if (checkBox.checked == true){
            dues.style.display = "block";
        } else {
            dues.style.display = "none";
        }
    }
</script>