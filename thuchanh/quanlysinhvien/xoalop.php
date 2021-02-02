<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$title = "Xóa lớp";

$malop = $_GET['malop'];

$sql = "DELETE FROM lop WHERE malop = '" . $malop . "'";
if (mysqli_query($conn, $sql)) {
	header('Location: dslop.php?status=del_success');
} else {
	header('Location: dslop.php?status=del_fail');
}
?>