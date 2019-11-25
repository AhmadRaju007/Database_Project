<?php
	session_start();

	$con = mysqli_connect('127.0.0.1:3306', 'root', '');

	if (!$con) {
	    die('Could not connect: ' . mysqli_error());
	}

	if(isset($_SESSION['not']))
	{
	 // echo "You are not logged in!";
	   $_SESSION['not']=0;
	}

	mysqli_select_db($con, 'login');
	$query = "";
	$flag = true;
	$dbDetails = array(
		'host' => '127.0.0.1:3306',
		'user' => 'root',
		'pass' => '',
		'db' => 'login',
	);
	$table = 'user';

	$primaryKey = 'id';

	$columns = array(
//		array( 'db' => 'id', 'dt' => 0),
		array( 'db' => 'id', 'dt' => 1),
		array( 'db' => 'username', 'dt' => 2),
		array( 'db' => 'password', 'dt' => 3),
		array( 'db' => 'is_active', 'dt' => 4),
		array('db' => 'id', 'dt' => 0,
        'formatter' => function ($d, $row) {

            $is_active = '';
            $is_active_text = '';
            if(($row['is_active'] ==  1)){
               //$is_active = 0;
                $is_active_text = '<a  href="javascript:void(0);"><button class="bttn bttn1">Make Active</button></a><a  href="showUser.php?id='.$d.'";><button class="bttn bttn2">User Info</button></a><a   href="userForm.php?id='.$d.'"><button class="bttn bttn3">Edit</button></a>';
            } else {
               // $is_active = 1;
                $is_active_text = '<a  href="javascript:void(0);"><button class="bttn bttn1">Make Inactive</button></a><a  href="showUser.php?id='.$d.'";><button class="bttn bttn2">User Info</button></a><a  href="userForm.php?id='.$d.'";><button class="bttn bttn3">Edit</button></a>';
            }

            return $is_active_text;
            
        })
		

	);

	require('ssp.class.php');

	echo json_encode(
		SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
	);
?>