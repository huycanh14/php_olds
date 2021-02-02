<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$banner_id = $_GET['id'];
$sql = "SELECT * FROM banners WHERE id = '{$banner_id}' LIMIT 1";
$query = $db->query($sql);
$banner = $query->fetch_assoc();
if (is_null($banner)){
	$message = 'Banner không tồn tại';
	$_SESSION['banners'] = $message;
	header('location: banners.php');
	exit;
}
$sql = "DELETE FROM banners WHERE id = '{$banner_id}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa banner {$banner_id} thành công";
	header('Location: banners.php');
}else {
	$message = 'Lỗi! Không xóa được banner này';
}
$_SESSION['banners'] = $message;
?>