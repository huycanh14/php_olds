<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$page_id = $_GET['id'];
$sql = "SELECT * FROM pages WHERE id = '{$page_id}' LIMIT 1";
$query = $db->query($sql);
$page = $query->fetch_assoc();
if (is_null($page)){
	$message = 'page không tồn tại';
	$_SESSION['pages'] = $message;
	header('location: pages.php');
	exit;
}
$sql = "DELETE FROM pages WHERE id = '{$page_id}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa page {$page_id} thành công";
	header('Location: pages.php');
}else {
	$message = 'Lỗi! Không xóa được page này';
}
$_SESSION['pages'] = $message;
?>