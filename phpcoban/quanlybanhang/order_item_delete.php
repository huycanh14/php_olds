<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$order_item_id = $_GET['id'];
$sql = "SELECT * FROM order_items WHERE id = '{$order_item_id}' LIMIT 1";
$query = $db->query($sql);
$order_item = $query->fetch_assoc();
if (is_null($order_item)){
	$message = 'order_item không tồn tại';
	$_SESSION['order_items'] = $message;
	header('location: order_items.php');
	exit;
}
$sql = "DELETE FROM order_items WHERE id = '{$order_item_id}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa order_item {$order_item_id} thành công";
	header('Location: order_items.php');
}else {
	$message = 'Lỗi! Không xóa được order_item này';
}
$_SESSION['order_items'] = $message;
?>