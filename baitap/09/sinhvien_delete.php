<?php
session_start();

require('connect.php');
include('header.php');

$message = '';

// Bước 1: Lấy thông tin sinh viên theo mã sinh viên được truyền lên thanh địa chỉ
$masv = $_GET["masv"];
$sql = "SELECT * FROM sinhvien WHERE masv = '{$masv}' LIMIT 1";
$query = $db->query($sql);
$sinhvien = $query->fetch_assoc();
// Nếu bản ghi null - không tồn tại => chuyển về trang danh sách
if (/*is_null($sinhvien)*/ $sinhvien == NULL){
	$message = 'Sinh viên này không tồn tại';
	$_SESSION['flash_msg'] = $message;
	header('Location: sinhvien.php');
	exit;
}
$sql = "DELETE FROM ketqua WHERE masv = '{$masv}'";
$query = $db->query($sql);

if ($query){
	$sql = "DELETE FROM sinhvien WHERE masv = '{$masv}'";
	$query = $db->query($sql);

	if ($query){
		$message = 'Xóa sinh viên {$masv} thành công';
	}
} else {
	$message = 'Lỗi! Không xóa được được của sinh viên này';
}
$_SESSION['flash_msg'] = $message;
?>
