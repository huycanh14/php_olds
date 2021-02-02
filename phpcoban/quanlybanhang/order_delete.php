<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$order_id = $_GET['id'];
$sql = "SELECT * FROM orders WHERE id = '{$order_id}' LIMIT 1";
$query = $db->query($sql);
$order = $query->fetch_assoc();
if (is_null($order)){
	$message = 'order không tồn tại';
	$_SESSION['orders'] = $message;
	header('location: orders.php');
	exit;
}
$sql = "DELETE FROM order_items WHERE order_id = '{$order_id}'";
$query = $db->query($sql);
if ($query){
	$sql = "DELETE FROM orders WHERE id = '{$order_id}'";
	$query = $db->query($sql);
	if ($query){
		$message = "Xóa order {$order_id} thành công";
		header('Location: orders.php');
	}else {
		$message = 'Lỗi! Không xóa được order này';
	}
} else {
	$message = 'Lỗi! Không xóa được order này';
}

$_SESSION['orders'] = $message;
?>