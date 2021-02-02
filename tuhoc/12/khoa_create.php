<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
require('connect.php');
include("header.php");


$error=[];
$isCreated = 0;
if (isset($_POST['submit'])) {
	if ($_POST['makhoa']=='' || !isset($_POST['makhoa'])) {
		$error[] = "Vui lòng nhập mã khoa";
	}

	if (!isset($_POST['ten_khoa']) || $_POST['ten_khoa']=='') {
		$error[] = "Vui lòng nhập tên khoa";
	}
	if (count($error) == 0) {
		$makhoa = trim($_POST['makhoa']);
		$tenKhoa = trim($_POST['ten_khoa']);
		
		$sql = "SELECT * FROM khoa WHERE makhoa='". $makhoa ."' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)) {
			$error[] = 'Mã khoa đã tồn tại. Vui lòng nhập lại';
		} else {
			$sql = "INSERT INTO khoa (makhoa, ten_khoa) VALUES ('".$makhoa."', '".$tenKhoa."')";
			$query = $db->query($sql);
			if ($query) {
				$isCreated = 1;
			} else {
				$error[] = "Có lỗi, không thể thêm khoa!";
			}
		}
	}
}
?>


<section>
	<div class="container themvao">
		<h2 class="title">Thêm khoa mới</h2>
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
				<p style="color:blue;">Thêm khoa thành công!</p>
			<?php endif; ?>
		</div>
		
		<form action="" method="POST">
			Mã khoa: 
			<input class="nhap" type="text" name="makhoa" placeholder="nhập mã khoa" value="<?php if(isset($_POST['submit']) && $_POST['makhoa'] != '') echo $_POST['makhoa'];?>">
			Tên khoa: 
			<input class="nhap" type="text" name="ten_khoa" placeholder="nhập tên khoa" value="<?php if(isset($_POST['submit']) && $_POST['ten_khoa'] != '') echo $_POST['ten_khoa'];?>">
			<input type="submit" name="submit" value="Thêm Khoa" class="submit">
		</form>
	</div>
</section>



<?php
include('footer.php');
?>