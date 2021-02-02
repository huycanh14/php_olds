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

$mamonhoc = $_GET['mamonhoc'];
$sql = "SELECT * FROM mon_hoc WHERE mamonhoc='{$mamonhoc}'";
$query = $db->query($sql);
$monhoc = $query->fetch_all(MYSQLI_ASSOC);
if (count($monhoc)==0) {
	header('location: monhoc.php');
}

if (isset($_POST['submit'])) {
	$sql= "DELETE FROM ketqua WHERE mamonhoc='{$mamonhoc}'";
	$query = $db->query($sql);
	$sql= "DELETE FROM mon_hoc WHERE mamonhoc='{$mamonhoc}'";
	$query = $db->query($sql);
	if (!is_null($query)) {
		$isCreated = 1;
		header("location: monhoc.php?del=$mamonhoc");
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
				<a href="monhoc.php">Hủy</a>
			</div>
		</form>
	</div>
</section>



<?php include('footer.php');