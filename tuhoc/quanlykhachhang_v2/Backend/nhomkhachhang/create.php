<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/Db.php';
include_once '../object/NhomKhachHang.php';

$database = new Db();
$db = $database->getConnection();

// initialize object
$nhomkhachhang = new NhomKhachHang($db);

$nhomkhachhang->TenNhom = $_POST["TenNhom"];

// create the nhomkhachhang
if ($nhomkhachhang->create()) {
    echo 'true';
}
else {
	echo 'false';
}
