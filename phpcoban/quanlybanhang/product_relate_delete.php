<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$product_relate_id = $_GET['id'];
$sql = "SELECT * FROM product_relates WHERE id = '{$product_relate_id}' LIMIT 1";
$query = $db->query($sql);
$product_relate = $query->fetch_assoc();
if (is_null($product_relate)){
	$message = 'product relate không tồn tại';
	$_SESSION['product relates'] = $message;
	header('location: product_relates.php');
	exit;
}
$sql = "DELETE FROM product relates WHERE id = '{$product_relate_id}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa product relate {$product_relate_id} thành công";
	header('Location: product_relates.php');
}else {
	$message = 'Lỗi! Không xóa được product relate này';
}
$_SESSION['product_relates'] = $message;
?>