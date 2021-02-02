<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
require('connect.php');
include('header.php');

$error = [];
$isCreated = 0;

$makhoa = $_GET['makhoa'];
$sql = "SELECT * FROM khoa WHERE makhoa='{$makhoa}'";
$query = $db->query($sql);
$khoa = $query->fetch_all(MYSQLI_ASSOC);
if (count($khoa)==0) {
	header('location: khoa.php');
}
// lấy danh sách mã sinh viên trong khoa
$sql = "SELECT masv FROM sinhvien WHERE makhoa='{$makhoa}'";
$query = $db->query($sql);
$sinhvien = $query->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
	for ($i=0; $i < count($sinhvien); $i++) { 
		$masv = $sinhvien[$i]['masv'];
		$sql= "DELETE FROM ketqua WHERE masv='{$masv}'";
		$query = $db->query($sql);
		$sql= "DELETE FROM sinhvien WHERE masv='{$masv}'";
		$query = $db->query($sql);
	}
	$sql= "DELETE FROM khoa WHERE makhoa='{$makhoa}'";
	$query = $db->query($sql);
	if (!is_null($query)) {
		$isCreated = 1;
		header("location: khoa.php?del=$makhoa");
	} else {
		$error[] = 'Lỗi rồi, không thực hiện được.';
	}
}

?>

<section>
	<div class="container danhsach full-center">
		<h2 class="title">Bạn có chắc chắn muốn xóa không?</h2>
		<div class="message">
			<?php
			if (count($error) > 0) :
				for ($i=0; $i < count($error); $i++) :
					?>
					<p style="color:red;"><?php echo $error[$i]?></p>
					<?php 
				endfor;
			endif;
			?>
			<?php if($isCreated == 1) :?>
				<p style="color:blue;">Xóa thành công!</p>
			<?php endif; ?>
		</div>
		<form action="" method="POST">
			<div class="xoa clearfix">
				<input type="submit" name="submit" value="Xóa">
				<a href="khoa.php">Hủy</a>
			</div>
		</form>
	</div>
</section>



<?php include('footer.php');