<?php
session_start();
if(!isset($_SESSION['admin'])){
	header('Location: sinhvien.php');
	exit;
}
require('connect.php');
include('header.php');

//Lấy thông tin sinh viên theo mã sinh viên được truyền lên thanh địa chỉ
$masv = $_GET["masv"];
$sql = "SELECT * FROM sinhvien WHERE masv = '{$masv}' LIMIT 1";
$query = $db->query($sql);
$sinhvien = $query->fetch_assoc();

if (is_null($sinhvien)){
	header('Location: sinhvien.php');
}


$sql = "SELECT * FROM khoa";
$query = $db->query($sql);
$khoa = $query->fetch_all(MYSQLI_ASSOC);

?>
<?php 
$errors = [];
$gioitinh = $makhoa = $ngaysinh = null;
$success = 0;


if ( isset($_POST['submit']) ){

	// Thông báo khi có lỗi
	if (!isset($_POST['masv'] ) || empty ($_POST['masv']) ){
		$errors[] = ' Chưa nhập mã sinh viên';
	}

	if (!isset($_POST['hoten'] ) || empty ($_POST['hoten']) ){
		$errors[] = 'Chưa nhập tên' ;
	}

	/*if (!isset($_POST['ngaysinh'] ) || empty ($_POST['ngaysinh']) ){
		$errors[] = 'Chưa nhập ngày sinh' ;
	}*/
	if (!isset($_POST['gioitinh'] ) || $_POST["gioitinh"] != 1 && $_POST["gioitinh"] != 0 ){
		$errors[] = 'Chưa nhập giới tính' ;
	}
	if (!isset($_POST['diachi'] ) || empty ($_POST['diachi']) ){
		$errors[] = 'Chưa nhập địa chỉ' ;
	}
	if (!isset($_POST['email'] ) || empty ($_POST['email']) ){
		$errors[] = 'Chưa nhập email' ;
	}
	if (!isset($_POST['makhoa'] ) || $_POST["makhoa"] == "nonSelect" ){
		$errors[] = 'Chưa nhập khoa' ;
	}
	
	// Thực hiện thêm sinh viên
	if (count($errors) == 0){
		$masv_new = trim($_POST["masv"]);
		$hoten = trim($_POST["hoten"]);
		$ngaysinh = trim($_POST["ngaysinh"]);
		$diachi = trim($_POST["diachi"]);
		$email = trim($_POST["email"]);
		$makhoa = trim($_POST["makhoa"]); 
		$gioitinh = trim($_POST['gioitinh']);

		//Kiểm tra mã sinh viên có bị trùng hay không

		$sql = "SELECT * FROM sinhvien WHERE masv = '{$masv_new}' AND masv <> '{$masv}' LIMIT 1"; /*<>: khác*/
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if (!is_null($result)) {
			$errors[]  = "Mã sinh viên bị trùng";
		} else{
			//Sửa và nhập vào CSDL
			$sql = "UPDATE sinhvien SET hoten = '{$hoten}', ngaysinh = '{$ngaysinh}', gioitinh = '{$gioitinh}', diachi = '{$diachi}', email = '{$email}', makhoa = '{$makhoa}' WHERE masv = '{$masv}' ";
			$query = $db->query($sql);
			if ($query){
				header('Location: sinhvien.php');
			} else{
				$errors[] = "không cập nhật được sinh viên";
			}
		}
	}
}
?>
<head>
	<title>Sửa Thông Tin Sinh Viên</title>
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
		<h1>Sửa thông tin sinh viên</h1><br>
		<?php if (count($errors) > 0) :?>
			<div class="message">
				<!-- Errors -->
				<?php for ($i = 0; $i < count($errors); $i++) :?>
					<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
				<?php endfor;?>

			</div>
		<?php endif ;?>

		<!-- From thêm sinh viên -->
		<form action="" method="post">
			<div>
				&emsp;&emsp;&emsp;
				Mã SV <span style="color: red;">(*)</span>:  
				<input type="text" name="masv" readonly="readonly" value="<?php if (isset($_POST["masv"])) echo $_POST["masv"]; else echo $sinhvien['masv'] ;?>">
			</div><br>

			<div>
				&ensp;
				Tên sinh viên <span style="color: red;">(*)</span>: 
				<input type="text" name="hoten" value="<?php if (isset($_POST["hoten"])) echo $_POST["hoten"]; else echo $sinhvien['hoten'] ;?>">
			</div><br>

			<div>
				&emsp;&emsp;
				Ngày sinh <span style="color: red;">(*)</span>: 
				<input type="ngaysinh" placeholder="yyy-mmm-ddd" name="ngaysinh" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST["ngaysinh"]; else echo $sinhvien['ngaysinh'] ;?>">

			</div><br>

			<div>&ensp;
				Giới tính <span style="color: red;">(*)</span>: &emsp;
						<input type="radio" name="gioitinh" value="1"
						<?php 
						if ((isset($_POST["gioitinh"]) && $_POST["gioitinh"] == 1) || $sinhvien['gioitinh'] ==	1){
							echo "checked = 'checked' ";
						}
						?>
						> Nam
			&emsp;&emsp;
						<input type="radio" name="gioitinh" value="0"
						<?php 
						if ((isset($_POST["gioitinh"]) && $_POST["gioitinh"] == 0) || $sinhvien['gioitinh'] ==	0){
							echo "checked = 'checked' ";
						}
						?>
						> Nữ
			</div><br>

			<div>
				&emsp;&emsp;&emsp;
				Địa chỉ <span style="color: red;">(*)</span>: 
				<input type="text" name="diachi" value="<?php if (isset($_POST["diachi"])) echo $_POST["diachi"]; else echo $sinhvien['diachi'] ;?>">
			</div><br>

			<div>
				&emsp;&emsp;&emsp;&ensp; 
				Email <span style="color: red;">(*)</span>: 
				<input type="text" name="email" placeholder="abc@xyz.com" value="<?php if (isset($_POST["email"])) echo $_POST["masv"]; else echo $sinhvien['email'] ;?>">
			</div><br>

			<div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				Khoa <span style="color: red;">(*)</span>: 
				<select name="makhoa">
					<option value="">---Chọn---</option>
					<?php 
					if (!is_null($khoa) && count($khoa) > 0):
						foreach ($khoa as $item):
					?>
					<option value="<?php echo $item['makhoa']; ?>"
						<?php if ( (isset($_POST["makhoa"])) && $_POST["makhoa"] == $item["makhoa"] || $sinhvien["makhoa"] == $item["makhoa"]) echo 'selected = "selected" ' ;?>
					> 
						<?php echo $item['ten_khoa']  . " - " . $item["makhoa"];?>
					</option>
					<?php  
						endforeach;
					endif;
					?>
				</select>
				
			</div><br>

			<div>
				<input type="submit" name="submit" value="Submit">
			</div>
		</form><!-- Complete the from -->
		
	</div>
</section>