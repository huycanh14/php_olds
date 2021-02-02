<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$post_category_id = $_GET['id'];
$sql = "SELECT * FROM post_categories WHERE id = '{$post_category_id}' LIMIT 1";
$query = $db->query($sql);
$post_categories = $query->fetch_assoc();
if (is_null($post_categories)){
	$message = 'post_categories không tồn tại';
	$_SESSION['post_categories'] = $message;
	header('location: post_categories.php');
	exit;
}
$sql = "DELETE FROM posts WHERE post_category_id = '{$post_category_id}'";
$query = $db->query($sql);
if ($query) {
	$sql = "DELETE FROM post_categories WHERE id = '{$post_category_id}'";
	$query = $db->query($sql);
	if ($query){
		$message = "Xóa post_categories {$post_category_id} thành công";
		header('Location: post_categories.php');
	}else {
		$message = 'Lỗi! Không xóa được post_categories này';
	}
} else {
	$message = 'Lỗi! Không xóa được post_categories này';
}

$_SESSION['post_categories'] = $message;
?>