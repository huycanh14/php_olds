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
//Lấy thông tin sinh viên theo mã sinh viên được truyền lên thanh địa chỉ
$makhoa = $_GET["makhoa"];
$sql = "SELECT * FROM khoa WHERE makhoa = '{$makhoa}' LIMIT 1";
$query = $db->query($sql);
$khoa = $query->fetch_assoc();

if (is_null($khoa)){
	header('Location: khoa.php');
}

if ( isset($_POST['submit']) ){
	if (!isset($_POST['makhoa'] ) || empty ($_POST['makhoa']) ){
		$errors[] = ' Chưa nhập mã khoa';
	}

	if (!isset($_POST['ten_khoa'] ) || empty ($_POST['ten_khoa']) ){
		$errors[] = 'Chưa nhập tên khoa' ;
	}

	if (count($errors) == 0){
		// Xử lý thêm vào CSDL
		$makhoa_new = trim( $_POST['makhoa']);
		$tenkhoa = trim( $_POST['ten_khoa']);

		// Ktra Mã Khoa có bị trùng hay không
		$sql = "SELECT * FROM khoa WHERE makhoa = '{$makhoa_new}' AND makhoa <> '{$makhoa}' LIMIT 1 ";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if (!is_null($result)){
			$errors[] = 'Mã Khoa bị trùng';
		} else{
			// Sửa CSDL
			$sql = "UPDATE khoa SET ten_khoa = '{$tenkhoa}' WHERE makhoa = '{$makhoa}' ";
			$query = $db->query($sql);
			if ($query){
				header('Location: khoa.php');
			} else{
				$errors[] = "không cập nhật được khoa";
			}
		}
	}
}
?>
<head>
	<title>Sửa Khoa</title>
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
		<h1>Sửa khoa</h1><br>

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
		</div>

		<!-- From điền thông tin -->

		<form action="" method="post">
			<div>
				Mã Khoa &nbsp; <span style="color: red;">(*)</span>: 
				<input type="text" name="makhoa" readonly="readonly" value="<?php if (isset($_POST['makhoa'])) echo $_POST['makhoa']; else echo $khoa['makhoa'] ;?>">
			</div> <br>
			<div>
				Tên Khoa <span style="color: red;">(*)</span>: 
				<input type="text" name="ten_khoa" value="<?php if (isset($_POST['ten_khoa']) ) echo $_POST['ten_khoa']; else echo $khoa['ten_khoa'] ;?>">
			</div><br>
			<div>
				<input type="submit" name="submit" value="Submit">
			</div>
		</form><!-- Complete the form  -->
	</div>
</section>