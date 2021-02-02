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
	if ($_POST['mamonhoc']=='' || !isset($_POST['mamonhoc'])) {
		$error[] = "Vui lòng nhập mã môn học";
	}

	if (!isset($_POST['tenmonhoc']) || $_POST['tenmonhoc']=='') {
		$error[] = "Vui lòng nhập tên môn học";
	}
	if (count($error) == 0) {
		$mamonhoc = trim($_POST['mamonhoc']);
		$tenmonhoc = trim($_POST['tenmonhoc']);
		
		$sql = "SELECT * FROM mon_hoc WHERE mamonhoc='". $mamonhoc ."' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)) {
			$error[] = 'Mã môn đã tồn tại. Vui lòng nhập lại';
		} else {
			$sql = "INSERT INTO mon_hoc (mamonhoc, tenmonhoc) VALUES ('".$mamonhoc."', '".$tenmonhoc."')";
			$query = $db->query($sql);
			if ($query) {
				$isCreated = 1;
			} else {
				$error[] = "Có lỗi, không thể thêm môn!";
			}
		}
	}
}
?>


<section>
	<div class="container themvao">
		<h2 class="title">Thêm môn học mới</h2>
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
				<p style="color:blue;">Thêm môn thành công!</p>
			<?php endif; ?>
		</div>
		
		<form action="" method="POST">
			Mã môn học: 
			<input class="nhap" type="text" name="mamonhoc" placeholder="mã môn học" value="<?php if(isset($_POST['submit']) && $_POST['mamonhoc'] != '') echo $_POST['mamonhoc'];?>">
			Tên môn học: 
			<input class="nhap" type="text" name="tenmonhoc" placeholder="tên môn học" value="<?php if(isset($_POST['submit']) && $_POST['tenmonhoc'] != '') echo $_POST['tenmonhoc'];?>">
			<input type="submit" name="submit" value="Thêm Môn" class="submit">
		</form>
	</div>
</section>



<?php
include('footer.php');
?>