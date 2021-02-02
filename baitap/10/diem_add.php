<?php
session_start();
if(!isset($_SESSION['admin'])){
header('Location: khoa.php');
exit;
}
require('connect.php');

// Lấy danh sách môn học
$sql = "SELECT * FROM mon_hoc";
$query = $db->query($sql);
$monhoc = $query->fetch_all(MYSQLI_ASSOC);
?>
<?php 
$errors = [];
$success = 0;
if (isset($_POST["submit"])){
	// Errors
	if (!isset($_POST["masv"]) || empty($_POST["masv"])){
		$errors[] = "Mã sinh viên bạn chưa nhập!";
	}
	if (!isset($_POST["mamonhoc"]) || $_POST["mamonhoc"] == "nonSelect"){
		$errors[] = "Môn học bạn chưa có chọn!";
	}
	if (!isset($_POST["diem"]) || empty($_POST["diem"])){
		$errors[] = "Điểm bạn chưa có nhập!";
	}
	if (!is_numeric($_POST["diem"])){
			$errors[] = "Điểm bạn phải nhập là số";
	}

	if (count($errors) == 0){
		$masv = trim($_POST["masv"]);
		$mamonhoc = trim($_POST["mamonhoc"]);
		$diem = trim($_POST["diem"]);

		// Kiểm tra MSV đã tồn tại hay chưa
		$sql = "SELECT * FROM sinhvien WHERE masv = '".$masv."' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if (is_null($result)){
			$errors[] = "Mã sinh viên này chưa tồn tại. Vui lòng nhập lại mã sinh viên";
		}
		// Kiểm tra môn học chọn đã có điểm hay chưa
		$sql = "SELECT diem FROM ketqua WHERE masv = '".$masv."' AND mamonhoc = '".$mamonhoc."' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if (!is_null($result)){
			$errors[] = "Môn học này đã có điểm. Vui lòng chọn môn học khác";
		} else{
			// Thêm điểm vào CSDL
			$sql = "INSERT INTO ketqua (diem, masv, mamonhoc) VALUES (".$diem.", '".$masv."', '".$mamonhoc."')";
			// $diem là số
			$query = $db->query($sql);


			if ($query){
				$success = 1;
			}else{
				$errors[] = "Không thể thêm điểm cho sinh viên!";
			}
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm điểm cho sinh viên</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include('header.php'); ?>
	<section>
		<div id="user">
			Tên đăng nhập:
			<?php 
			if (isset($_SESSION['admin'])){
				echo $_SESSION['admin']['username'];
			}
			if (isset($_SESSION['user'])){
				echo $_SESSION['user']['username'];
			}
			?>
			<div class="logout" style="text-align: right;">
				<a href="logout.php">Đăng xuất</a>
			</div>
		</div>

		<div id="noidung" align="center">
			<h1>Thêm điểm cho sinh viên</h1>

			<div class="massage"><!-- massage -->
				<!-- Errors Massage -->
				<?php if (count($errors) > 0) :?>
					<?php for ($i = 0; $i < count($errors); $i++) :?>
						<p style="color: red;"> <?php echo $errors[$i] ;?></p>
					<?php endfor ;?>
				<?php endif ;?><!-- end errors -->

				<!-- success -->
				<?php if ($success == 1) :?>
					<p style="color: green;"> <?php echo "Thêm điểm thành công!" ;?></p>
				<?php endif ;?> <!-- end success -->
			</div>

			<!-- Form thêm điểm -->
			<form action="" method="post">
				<div>
					Mã sinh viên <span style="color: red;">(*)</span>:
					<input type="text" name="masv" value="<?php if (isset($_POST["masv"])) echo $_POST["masv"] ;?>">
				</div><br>
				<div>
					Môn học &emsp; &ensp;<span style="color: red;">(*)</span>: 
					<select name="mamonhoc">
						<option value="nonSelect">---Chọn---</option>

						<!-- In các select môn học -->
						<?php if (!is_null($monhoc) && count($monhoc) > 0) :?>
							<?php foreach ($monhoc as $item) :?>

								<option value="<?php echo $item["mamonhoc"] ;?>"
									<?php 
										if (isset($_POST["submit"])){
											if (isset($_POST["mamonhoc"]) && $_POST["mamonhoc"] == $item["mamonhoc"]){
												echo "selected = 'selected' " ;
											}
										}
									?>
									>
									<?php echo $item["tenmonhoc"] ;?>
								</option>

							<?php endforeach ;?>
						<?php endif ;?>
					</select>
				</div><br>
				<div>
					Điểm &emsp; &emsp; &ensp;<span style="color: red;">(*)</span>: 
					<input type="text" name="diem" value="<?php if (isset($_POST["diem"])) echo $_POST["diem"] ;?>">
				</div><br>
				<div>
					<input type="submit" name="submit" value="Thêm điểm">
				</div>
			</form><!-- Complete the form -->
		</div>
	</section>
</body>
</html>
