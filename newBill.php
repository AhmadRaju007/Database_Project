<?php

session_start();

$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

$result= mysqli_query($con,"SELECT MAX(bill_no) AS maximum FROM bill_info");
$row = mysqli_fetch_assoc($result);
$maximum = $row['maximum']+1;

if(!isset($_SESSION['username']))
{

    $_SESSION['not']=1;
    // header('location:login.php');

}
if(!empty($_POST)) {
    //session_start();
    $con = mysqli_connect('127.0.0.1:3306', 'root', '', 'login');
    // echo "$uid";
    //echo "This section worked!";
    $cId = $_POST['customerid'];
    $cName = $_POST['customername'];

    if(isset($_POST['bm_total_price'])) {
        $bmNo = $_POST['bm_piece'];
        $bmMeter = $_POST['bm_meter'];
        $bmGauge = $_POST['bm_gauge'];
        $bmPrice = $_POST['bm_price'];
        $bmTotalPrice = $_POST['bm_total_price'];
        $sql = "INSERT INTO bmw(b_no, amount_sold,price, total_price) VALUES ('$maximum',$bmGauge,'$bmPrice','$bmTotalPrice')";
        $q = mysqli_query($con,$sql);
    }
    if(isset($_POST['lx_total_price'])) {
        $lxNo = $_POST['lx_piece'];
        $lxMeter = $_POST['lx_meter'];
        $lxGauge = $_POST['lx_gauge'];
        $lxPrice = $_POST['lx_price'];
        $lxTotalPrice = $_POST['lx_total_price'];
        $sql = "INSERT INTO lx(b_no, amount_sold,price, total_price) VALUES ('$maximum',$lxGauge,'$lxPrice','$lxTotalPrice')";
        $q = mysqli_query($con,$sql);
    }
    if(isset($_POST['diamond_total_price'])) {

        $diamondNo = $_POST['diamond_piece'];
        $diamondMeter = $_POST['diamond_meter'];
        $diamondGauge = $_POST['diamond_gauge'];
        $diamondPrice = $_POST['diamond_price'];
        $diamondTotalPrice = $_POST['diamond_total_price'];
        $sql = "INSERT INTO diamond(b_no, amount_sold,price, total_price) VALUES ('$maximum',$diamondGauge,'$diamondPrice','$diamondTotalPrice')";
        $q = mysqli_query($con,$sql);
    }
    if(isset($_POST['cherry_total_price'])) {

        $cherryNo = $_POST['cherry_piece'];
        $cherryMeter = $_POST['cherry_meter'];
        $cherryGauge = $_POST['cherry_gauge'];
        $cherryPrice = $_POST['cherry_price'];
        $cherryTotalPrice = $_POST['cherry_total_price'];
        $sql = "INSERT INTO cherry(b_no, amount_sold,price, total_price) VALUES ('$maximum',$cherryGauge,'$cherryPrice','$cherryTotalPrice')";
        $q = mysqli_query($con,$sql);

    }
    if(isset($_POST['jorjet_total_price'])) {
    $jorjetNo = $_POST['jorjet_piece'];
    $jorjetMeter = $_POST['jorjet_meter'];
    $jorjetGauge = $_POST['jorjet_gauge'];
    $jorjetPrice = $_POST['jorjet_price'];
    $jorjetTotalPrice = $_POST['jorjet_total_price'];
    $sql = "INSERT INTO jorjet(b_no, amount_sold,price, total_price) VALUES ('$maximum',$jorjetGauge,'$jorjetPrice','$jorjetTotalPrice')";
    $q = mysqli_query($con,$sql);

    }

    $grossPrice = $_POST['gross_price'];

    if($_POST['gross_price'])
    {
        if($_POST['is_paid']==false)
        {
            $dueAmount=0;
            $stts=1;
        }
        else {
            $dueAmount = $_POST[due_amount];
            $stts=0;
        }
         $sql = "INSERT INTO bill_info(bill_no, gross_total_price, paid_status, due_amount, customer_name) VALUES ('$maximum','$grossPrice','$stts','$dueAmount','$cName')";
        $q = mysqli_query($con,$sql);
    }


    if ($q) {
        echo "Successfully Inserted!";
        header('location:newBill.php');
    } else {
        echo " Unsuccessful! Try Again";
    }
}




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
    <!--script src="js/bootstrap-select.js"></script-->
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
                                                                <label <b>বিল নংঃ </b></label>
                                                                <?php
                                                               // session_start();
                                                                $con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

                                                                $result= mysqli_query($con,"SELECT MAX(bill_no) AS maximum FROM bill_info");

                                                                $row = mysqli_fetch_assoc($result);

                                                                $maximum = $row['maximum']+1;

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

                                                                    <input class="form-control" maxlength="255" name="bm_piece" placeholder="টি" type="text" />
                                                                    <label for="bm_meter" ><b> থান </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="bm_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_meter" id="bm_meter" placeholder="0" type="text" onblur= "getbmgauge()" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_gauge" id= "bm_gauge" placeholder="0" type="text" onblur= "getbmmeter()" size="25" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_price" ><b>দর</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_price" id="bm_price" placeholder="দর" type="text" onblur= "getbmtotalprice();gettotalbill();" size="30" />
                                                                </li>
                                                                <li>
                                                                    <label for="bm_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" maxlength="255" name="bm_total_price" placeholder="0" type="text" id="bm_total_price" size="40"  />
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
                                                                  <input class="form-control" maxlength="255" name="lx_piece" placeholder="টি" type="text" />
                                                                    <label for="lx_meter" ><b> থান </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="lx_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control" name="lx_meter" id="lx_meter" onblur= "getlxgauge()" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="lx_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control" name="lx_gauge" id="lx_gauge" onblur= "getlxmeter()" placeholder="0" type="text" size="25" />
                                                                </li>
                                                                <li>
                                                                    <label for="lx_price" ><b>দর</b></label>
                                                                    <input class="form-control" name="lx_price" id="lx_price" placeholder="দর" type="text" onblur= "getlxtotalprice();gettotalbill();" size="30"/>
                                                                </li>
                                                                <li>
                                                                    <label for="lx_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="lx_total_price" placeholder="0" type="text" id="lx_total_price" size="40" />
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
                                                                    <input class="form-control" maxlength="255" name="diamond_piece" placeholder="টি" type="text" />
                                                                    <label for="diamond_meter" ><b> থান </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="diamond_meter" id="diamond_meter" onblur= "getdiamondgauge()" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="diamond_gauge" id="diamond_gauge" onblur= "getdiamondmeter()" placeholder="0" type="text" size="25" />
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="diamond_price" id="diamond_price" placeholder="দর" type="text" onblur= "getdiamondtotalprice();gettotalbill();" size="30"/>
                                                                </li>
                                                                <li>
                                                                    <label for="diamond_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="diamond_total_price" placeholder="0" type="text" id="diamond_total_price" size="40" />
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
                                                                    <input class="form-control" maxlength="255" name="cherry_piece" placeholder="টি" type="text" />
                                                                    <label for="cherry_meter" ><b> থান </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="cherry_meter" id="cherry_meter" onblur= "getcherrygauge()" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="cherry_gauge" id="cherry_gauge" onblur= "getcherrymeter()" placeholder="0" type="text" size="25" />
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="cherry_price" id="cherry_price" placeholder="দর" type="text" onblur= "getcherrytotalprice();gettotalbill();" size="30"/>
                                                                </li>
                                                                <li>
                                                                    <label for="cherry_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="cherry_total_price" placeholder="0" type="text" id="cherry_total_price" size="40" />
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
                                                                    <input class="form-control" maxlength="255" name="jorjet_piece" placeholder="টি" type="text" />
                                                                    <label for="jorjet_meter" ><b> থান </b></label>
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_meter" ><b>মিটার</b></label>
                                                                    <input class="form-control"  name="jorjet_meter" id="jorjet_meter" onblur= "getjorjetgauge()" placeholder="0" type="text" />
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_gauge" ><b>গজ</b></label>
                                                                    <input class="form-control"  name="jorjet_gauge" id="jorjet_gauge" onblur= "getjorjetmeter()" placeholder="0" type="text" size="25"/>
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_price" ><b>দর</b></label>
                                                                    <input class="form-control"  name="jorjet_price" placeholder="দর" type="text" id="jorjet_price" onblur= "getjorjettotalprice();gettotalbill();" size="30" />
                                                                </li>
                                                                <li>
                                                                    <label for="jorjet_total_price" ><b>টাকা</b></label>
                                                                    <input class="form-control" name="jorjet_total_price" placeholder="0" type="text" id="jorjet_total_price" size="40" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <ul>
                                                <li>
                                                    <label for="total_bill" class="required"><b>মোট বিল</b></label>
                                                    <input class="form-control" maxlength="255" name="total_bill" id="total_bill" placeholder="মোট বিল " type="c_text" value="" required size="40"/>
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
	function gettotalbill(){
		var bm_total_price = document.getElementById("bm_total_price").value;
		if(bm_total_price=="")
			bm_total_price=0;
		var lx_total_price = document.getElementById("lx_total_price").value;
		if(lx_total_price=="")
			lx_total_price=0;
		var diamond_total_price = document.getElementById("diamond_total_price").value;
		if(diamond_total_price=="")
			diamond_total_price=0;
		
		var cherry_total_price = document.getElementById("cherry_total_price").value;
		if(cherry_total_price=="")
			cherry_total_price=0;
		
		var jorjet_total_price = document.getElementById("jorjet_total_price").value;
		if(jorjet_total_price=="")
			jorjet_total_price=0;

		document.getElementById("total_bill").value= +bm_total_price + +lx_total_price + +diamond_total_price + +cherry_total_price + +jorjet_total_price;
	}
	function getbmgauge(){
		var bm_meter = document.getElementById("bm_meter").value;
		if(bm_meter!=null){
			document.getElementById("bm_gauge").value= bm_meter*1.0936;
		}
	}
	function getbmmeter(){
		var bm_gauge = document.getElementById("bm_gauge").value;
		if(bm_gauge!=null){
			document.getElementById("bm_meter").value= bm_gauge/1.0936;
		}
	}
	function getbmtotalprice(){
		var bm_price = document.getElementById("bm_price").value;
		var bm_gauge = document.getElementById("bm_gauge").value;
		document.getElementById("bm_total_price").value= bm_price*bm_gauge;
	}
	function getlxgauge(){
		var lx_meter = document.getElementById("lx_meter").value;
		if(lx_meter!=null){
			document.getElementById("lx_gauge").value= lx_meter*1.0936;
		}
	}
	function getlxmeter(){
		var lx_gauge = document.getElementById("lx_gauge").value;
		if(lx_gauge!=null){
			document.getElementById("lx_meter").value= lx_gauge/1.0936;
		}
	}
	function getlxtotalprice(){
		var lx_price = document.getElementById("lx_price").value;
		var lx_gauge = document.getElementById("lx_gauge").value;
		document.getElementById("lx_total_price").value= lx_price*lx_gauge;
	}
	function getdiamondgauge(){
		var diamond_meter = document.getElementById("diamond_meter").value;
		if(diamond_meter!=null){
			document.getElementById("diamond_gauge").value= diamond_meter*1.0936;
		}
	}
	function getdiamondmeter(){
		var diamond_gauge = document.getElementById("diamond_gauge").value;
		if(diamond_gauge!=null){
			document.getElementById("diamond_meter").value= diamond_gauge/1.0936;
		}
	}
	function getdiamondtotalprice(){
		var diamond_price = document.getElementById("diamond_price").value;
		var diamond_gauge = document.getElementById("diamond_gauge").value;
		document.getElementById("diamond_total_price").value= diamond_price*diamond_gauge;
	}
	function getcherrygauge(){
		var cherry_meter = document.getElementById("cherry_meter").value;
		if(cherry_meter!=null){
			document.getElementById("cherry_gauge").value= cherry_meter*1.0936;
		}
	}
	function getcherrymeter(){
		var cherry_gauge = document.getElementById("cherry_gauge").value;
		if(cherry_gauge!=null){
			document.getElementById("cherry_meter").value= cherry_gauge/1.0936;
		}
	}
	function getcherrytotalprice(){
		var cherry_price = document.getElementById("cherry_price").value;
		var cherry_gauge = document.getElementById("cherry_gauge").value;
		document.getElementById("cherry_total_price").value= cherry_price*cherry_gauge;
	}
	function getjorjetgauge(){
		var jorjet_meter = document.getElementById("jorjet_meter").value;
		if(jorjet_meter!=null){
			document.getElementById("jorjet_gauge").value= jorjet_meter*1.0936;
		}
	}
	function getjorjetmeter(){
		var jorjet_gauge = document.getElementById("jorjet_gauge").value;
		if(jorjet_gauge!=null){
			document.getElementById("jorjet_meter").value= jorjet_gauge/1.0936;
		}
	}
	function getjorjettotalprice(){
		var jorjet_price = document.getElementById("jorjet_price").value;
		var jorjet_gauge = document.getElementById("jorjet_gauge").value;
		document.getElementById("jorjet_total_price").value= jorjet_price*jorjet_gauge;
	}
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