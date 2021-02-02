<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/Db.php';
include_once '../object/NhomKhachHang.php';

// instantiate database and nhomkhachhang object
$database = new Db();
$db = $database->getConnection();

// initialize object
$nhomkhachhang = new NhomKhachHang($db);

// query nhomkhachhang
$stmt = $nhomkhachhang->read();
$num = $stmt->rowCount();
// echo $num; die();

// check if more than 0 record found
if ($num > 0) {
    // nhomkhachhang array
    $nhomkhachhang_arr = array();

    // retrieve table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        extract($row);
        $nhomkhachhang_item = array(
            "ID" => $row['ID'],
            "TenNhom" => $row['TenNhom']
        );
        array_push($nhomkhachhang_arr, $nhomkhachhang_item);
    }
    echo json_encode($nhomkhachhang_arr);
} else {
    echo json_encode(
            array("message" => "No products found.")
    );
}
?>