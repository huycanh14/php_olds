<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
require('connect.php');
include('header.php');
$message = 'Không có gì';

$masv = $_GET['masv'];

$sql = "SELECT * FROM sinhvien WHERE masv='{$masv}'";
$query = $db->query($sql);
$sinhvien = $query->fetch_assoc();

if ($sinhvien ==  NULL) {
	$message = 'Sinh viên này không tồn tại!';
	$_SESSION['flash_msg'] = $message;
	header('location: sinhvien.php');
	exit;
}

$sql= "DELETE FROM sinhvien WHERE masv='{$masv}'";
$query = $db->query($sql);
if ($query) {
	$message = "Xóa sinh viên {$masv} thành công!";
} else {
	$message = "Lỗi! Không xóa được sinh viên {$masv}!";
}

$_SESSION['flash_msg'] = $message;
header('Location: sinhvien.php');
?>
