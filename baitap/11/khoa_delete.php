<?php  
session_start();
if(!isset($_SESSION['admin'])){
	$message = "Bạn không có quyền xóa khoa này";
	$_SESSION['khoa'] = $message;
	header('Location: khoa.php');
	exit;
}
require('connect.php');
include('header.php');
$message = 'Không có gì';

$makhoa = $_GET['makhoa'];

$sql = "SELECT * FROM khoa WHERE makhoa = '{$makhoa}'";
$query = $db->query($sql);
$khoa = $query->fetch_assoc();

if ($makhoa == NULL){
	$message = "Mã khoa này không tồn tại!";
	$_SESSION['khoa'] = $message;
	header('location: khoa.php');
	exit;
}else{
	$sql = "DELETE FROM ketqua WHERE masv IN (SELECT masv FROM sinhvien WHERE makhoa = '{$makhoa}')";
	$query = $db->query($sql);

	if ($query){
		$sql = "DELETE FROM sinhvien WHERE makhoa = '{$makhoa}'";
		$query = $db->query($sql);

		if ($query){
			$sql = "DELETE FROM khoa WHERE makhoa = '{$makhoa}'";
			$query = $db->query($sql);

			if ($query){
				$message = "Xóa khoa {$makhoa} thành công!";
				header('location: khoa.php');
			}
		} else{
			$message = 'Lỗi! Không xóa được được khoa này';
		}
	} else{
		$message = 'Lỗi! Không xóa được được khoa này';
	}
}
$_SESSION['khoa'] = $message;
?>