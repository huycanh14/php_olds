<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$comment_id = $_GET['id'];
$sql = "SELECT * FROM comments WHERE id = '{$comment_id}' LIMIT 1";
$query = $db->query($sql);
$comment = $query->fetch_assoc();
if (is_null($comment)){
	$message = 'comment không tồn tại';
	$_SESSION['comments'] = $message;
	header('location: comments.php');
	exit;
}
$sql = "DELETE FROM comments WHERE id = '{$comment_id}'";
$query = $db->query($sql);
if ($query){
	$message = "Xóa comment {$comment_id} thành công";
	header('Location: comments.php');
}else {
	$message = 'Lỗi! Không xóa được comment này';
}
$_SESSION['comments'] = $message;
?>