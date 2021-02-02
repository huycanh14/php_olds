<?php
session_start();
if(!isset($_SESSION['admin'])){
	$message = "Bạn không có quyền xóa môn học này";
	$_SESSION['monhoc'] = $message;
	header('Location: monhoc.php');
	exit;
}
require('connect.php');
include('header.php');
$message = 'Không có gì';

$mamonhoc = $_GET['mamonhoc'];

$sql = "SELECT * FROM mon_hoc WHERE mamonhoc = '{$mamonhoc}'";
$query = $db->query($sql);
$monhoc = $query->fetch_all(MYSQLI_ASSOC);

if ($monhoc ==  NULL) {
	$message = 'Môn học này không tồn tại!';
	$_SESSION['monhoc'] = $message;
	header('location: monhoc.php');
	exit;
} else{

	$sql = "DELETE FROM ketqua WHERE mamonhoc = '{$mamonhoc}'";
	$query = $db->query($sql);

	if ($query){
		$sql = "DELETE FROM mon_hoc WHERE mamonhoc = '{$mamonhoc}'";
		$query = $db->query($sql);
		if ($query){
			$message = "Xóa môn học {$mamonhoc} thành công";
			header('location: monhoc.php');
		}
	} else {
		$message = 'Lỗi! Không xóa được được của sinh viên này';
	}
}

$_SESSION['monhoc'] = $message;
?>
