<?php  
session_start();
require('connect.php');

$message = 'Không có gì';

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_book WHERE ID = '{$id}' LIMIT 1";
$query = $db->query($sql);
$book = $query->fetch_assoc();

if (is_null($book)) {
	$message = 'Sách này không tồn tại!';
	$_SESSION['flash_msg'] = $message;
	header('location: index.php');
	exit;
}

$sql = "DELETE FROM tbl_book WHERE ID = '{$id}' LIMIT 1";
$query = $db->query($sql);
if ($query){
	// $message = "Xóa sách {$id} thành công";
	$message = "Xóa sách " . $book['Title'] . " thành công";
	header('Location: index.php');
}

$_SESSION['flash_msg'] = $message;

?>