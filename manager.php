<?php

require('../../static/db/DataTableServerSideCustom.php');
include "session.php";
include_once "logGenerator.php";
$receive_data = $_REQUEST;
makeLogRequest($receive_data,'admins');
//print_r($_REQUEST); exit;
// DB table to use


$table = "eAdmin";

// Table's primary key
$primaryKey = 'eAdmin.id';
$condition = "";
$columns = array(
    array('db' => 'eAdmin.user_id', 'dt'=> 'User ID'),
    array('db' => 'eAdmin.user_group', 'dt'=> 'User group'),
    array('db' => 'eAdmin.full_name', 'dt'=> 'Name'),
    array('db' => 'eAdmin.mobile', 'dt'=> 'Mobile'),
    array('db' => 'eAdmin.email', 'dt'=> 'Email'),
    array('db' => 'eAdmin.created_at', 'dt'=> 'Created at'),
    array('db' => 'eAdmin.is_active', 'dt' => 'Status',
        'formatter' => function ($d, $row) {
            if ($d == 1) {
            return '<a class="btn btn-success btn-xs" href="javascript:void(0);">Active</a>';
        } else {
                return '<a class="btn btn-danger btn-xs"href="javascript:void(0);">Inactive</a>';
            }

        }),
    array('db' => 'eAdmin.id', 'dt' => 'Action',
        'formatter' => function ($d, $row) {
            $is_active = '';
            $is_active_text = '';
            if(($row['is_active'] ==  1)){
                $is_active = 0;
                $is_active_text = '<a class="btn btn-danger btn-xs"href="javascript:void(0);" onclick="deleteAdmin(\'' . $d . '\',\'' . $is_active . '\'); return false">Make Inactive</a>';
            } else {
                $is_active = 1;
                $is_active_text = '<a class="btn btn-success btn-xs" href="javascript:void(0);" onclick="deleteAdmin(\'' . $d . '\',\'' . $is_active . '\'); return false">Make Active</a>';
            }

            return '<a class="btn btn-info btn-xs marginright10" onclick="editAdmin(\'' . $d . '\'); return false" href="javascript:void(0);">Edit</a>'.$is_active_text;
        })
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */


$input_data = isset($_REQUEST) ? $_REQUEST : exit;
// print_r($input_data) ;
$dataTableServer = new DataTableServer();
echo json_encode(
    $dataTableServer->simplePagination($input_data, $table, $columns, $condition)
);
