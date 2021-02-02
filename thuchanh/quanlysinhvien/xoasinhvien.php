<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$title = "Xóa sinh viên";

$masv = $_GET['masv'];

$sql = "DELETE FROM sinhvien WHERE MaSinhVien = '" . $masv . "'";
if (mysqli_query($conn, $sql)) {
	header('Location: dssinhvien.php?status=del_success');
} else {
	header('Location: dssinhvien.php?status=del_fail');
}
?>