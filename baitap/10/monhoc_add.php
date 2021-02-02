<?php  
session_start();
if(!isset($_SESSION['admin'])){
	header('Location: monhoc.php');
	exit;
}
require('connect.php');
include('header.php');
$errors = [];
$success = 0;
if (isset($_POST["submit"])){
	// Errors
	if (!isset($_POST["mamonhoc"]) || empty($_POST["mamonhoc"])){
		$errors[] = "Mã môn học chưa có nhập";
	}

	if (!isset($_POST["tenmonhoc"]) || empty($_POST["tenmonhoc"])){
		$errors[] = "Tên môn học chưa có nhập";
	}

	// No Errors
	if (count($errors) == 0){
		// Xử lý thêm vào CSDL
		$mamonhoc = trim( $_POST['mamonhoc']); //trim: cắt những khoảng trắng đầu, cuối nến người viết ghi vào
		$tenmonhoc = trim( $_POST['tenmonhoc']);

		// Kiểm tra xem mã khoa nhập vào đã tồn tại hay chưa (lấy 1 bản ghi)
		$sql = "SELECT * FROM mon_hoc WHERE mamonhoc = '".$mamonhoc."' LIMIT 1";  /*Chú ý dấu nháy kép, nháy đơn, viết liền nhau*/
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if ( !is_null($result) ) {
			$errors[] = 'Mã môn học này đã tồn tại. Vui lòng nhập mã khác!';
		} else { //Khi mã không trùng lặp
			
			//Thêm vào CSDL
			$sql = "INSERT INTO mon_hoc (mamonhoc, tenmonhoc) VALUES ('".$mamonhoc."', '".$tenmonhoc."')";
			$query = $db->query($sql);

			if ($query) {
				// echo " Thêm Khoa thành công! ";
				$success = 1;
			}else {
				$errors[] = " Không thể thêm môn học!";
			}

		}

	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm môn học</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
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
			<h1>Thêm môn học</h1>

			<div class="message"><!-- message -->
				<!-- Errors Message -->
				<?php if (count($errors) > 0) :?>
					<?php for ($i = 0; $i < count($errors); $i++) :?>
						<p class="errors" style="color: red;"> <?php echo $errors[$i];?> </p>
					<?php endfor;?>
				<?php endif ;?><!-- end errors -->

				<!-- success -->
				<?php if ($success == 1) : ?>
				<p style="color: green"> Thêm thành công! </p>
				<?php endif ;?> <!-- end success -->
			</div>

			<!-- From thêm môn học -->
			<form action="" method="post">
				<div>
					Mã môn học <span style="color: red;">(*)</span>: 
					<input type="text" name="mamonhoc" value="<?php if (isset($_POST["mamonhoc"])) echo $_POST["mamonhoc"] ;?>">
				</div><br>
				<div>
					Tên môn học <span style="color: red;">(*)</span>: 
					<input type="text" name="tenmonhoc" value="<?php if (isset($_POST["tenmonhoc"])) echo $_POST["tenmonhoc"] ;?>">
				</div><br>
				<div>
					<input type="submit" name="submit" value="Submit">
				</div>
			</form><!-- Complete the form -->
		</div>
	</section>

</body>
</html>