<?php
session_start();
if(!isset($_SESSION['admin'])){
header('Location: khoa.php');
exit;
}
require('connect.php');
include('header.php');
?>
<?php 
$errors = [];
$isCreated = 0;
if ( isset($_POST['submit']) ){
	if (!isset($_POST['makhoa'] ) || empty ($_POST['makhoa']) ){
		$errors[] = ' Chưa nhập mã khoa';
	}

	if (!isset($_POST['ten_khoa'] ) || empty ($_POST['ten_khoa']) ){
		$errors[] = 'Chưa nhập tên khoa' ;
	}

	if (count($errors) == 0){
		// Xử lý thêm vào CSDL
		$makhoa = trim( $_POST['makhoa']); //trim: cắt những khoảng trắng đầu, cuối nến người viết ghi vào
		$tenkhoa = trim( $_POST['ten_khoa']);

		// Kiểm tra xem mã khoa nhập vào đã tồn tại hay chưa (lấy 1 bản ghi)
		$sql = "SELECT * FROM khoa WHERE makhoa = '".$makhoa."' LIMIT 1";  /*Chú ý dấu nháy kép, nháy đơn, viết liền nhau*/
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		// var_dump($result);\

		if ( !is_null($result) ) {
			$errors[] = 'Mã khoa này đã tồn tại. Vui lòng nhập mã khác!';
		} else { //Khi mã không trùng lặp
			// INSERT INTO khoa (makhoa, ten_khoa) VALUES ('k09', 'Khoa 09');
			//Thêm vào CSDL
			$sql = "INSERT INTO khoa (makhoa, ten_khoa) VALUES ('".$makhoa."', '".$tenkhoa."')";
			$query = $db->query($sql);

			if ($query) {
				$isCreated = 1;
			}else {
				$errors[] = " Không thể thêm khoa!";
			}

		}

	}
}
?>
<head>
	<title>Thêm khoa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
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
		<h1>Thêm khoa</h1>

		<div class="message">
			<!-- Thông báo lỗi  -->
			<?php 
				if (count($errors) > 0) :
					for ($i = 0; $i < count($errors); $i++) :
			?>
				<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
				<?php 
					endfor;
				endif ;
			?><!-- end errors -->

			<!-- success -->
			<?php if ($isCreated == 1) : ?>
			<p style="color: green"> Thêm thành công! </p>
			<?php endif ;?> <!-- end success -->
		</div>

		<!-- From điền thông tin -->

		<form action="" method="post">
			<div>
				Mã Khoa &nbsp; <span style="color: red;">(*)</span>: 
				<input type="text" name="makhoa" value="<?php if (isset($_POST['makhoa']) ) echo $_POST['makhoa'] ?>">
			</div> <br>
			<div>
				Tên Khoa <span style="color: red;">(*)</span>: 
				<input type="text" name="ten_khoa" value="<?php if (isset($_POST['ten_khoa']) ) echo $_POST['ten_khoa'] ?>">
			</div><br>
			<div>
				<input type="submit" name="submit" value="Submit">
			</div>
		</form><!-- Complete the form  -->
	</div>
</section>