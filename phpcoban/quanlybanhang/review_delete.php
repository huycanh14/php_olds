<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$review_id = $_GET['id'];
$sql = "SELECT * FROM reviews WHERE id = '{$review_id}' LIMIT 1";
$query = $db->query($sql);
$review = $query->fetch_assoc();
if (is_null($review)){
	$message = 'review không tồn tại';
	$_SESSION['reviews'] = $message;
	header('location: reviews.php');
	exit;
}
$sql = "DELETE FROM reviews WHERE id = '{$review_id}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa review {$review_id} thành công";
	header('Location: reviews.php');
}else {
	$message = 'Lỗi! Không xóa được review này';
}
$_SESSION['reviews'] = $message;
?>