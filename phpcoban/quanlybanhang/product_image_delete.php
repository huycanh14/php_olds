<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$product_image_id = $_GET['id'];
$sql = "SELECT * FROM product_image WHERE id = '{$product_image_id}' LIMIT 1";
$query = $db->query($sql);
$product_image = $query->fetch_assoc();
if (is_null($product_image)){
	$message = 'product image không tồn tại';
	$_SESSION['product image'] = $message;
	header('location: product_image.php');
	exit;
}
$sql = "DELETE FROM product_image WHERE id = '{$product_image_id}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa product image {$product_image_id} thành công";
	header('Location: product_image.php');
}else {
	$message = 'Lỗi! Không xóa được product image này';
}
$_SESSION['product_image'] = $message;
?>