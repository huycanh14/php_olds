<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$post_id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = '{$post_id}' LIMIT 1";
$query = $db->query($sql);
$post = $query->fetch_assoc();
if (is_null($post)){
	$message = 'post không tồn tại';
	$_SESSION['posts'] = $message;
	header('location: posts.php');
	exit;
}
$sql = "DELETE FROM posts WHERE id = '{$post_id}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa post {$post_id} thành công";
	header('Location: posts.php');
}else {
	$message = 'Lỗi! Không xóa được post này';
}
$_SESSION['posts'] = $message;
?>