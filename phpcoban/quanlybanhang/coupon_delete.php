<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$coupon_code = $_GET['code'];
$sql = "SELECT * FROM coupons WHERE code = '{$coupon_code}' LIMIT 1";
$query = $db->query($sql);
$coupon = $query->fetch_assoc();
if (is_null($coupon)){
	$message = 'coupon không tồn tại';
	$_SESSION['coupons'] = $message;
	header('location: coupons.php');
	exit;
}
$sql = "DELETE FROM coupons WHERE code = '{$coupon_code}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa coupon {$coupon_id} thành công";
	header('Location: coupons.php');
}else {
	$message = 'Lỗi! Không xóa được coupon này';
}
$_SESSION['coupons'] = $message;
?>