<?php
require('connect.php');
include('header.php');

// Bước 1: Lấy thông tin sinh viên theo mã sinh viên được truyền lên thanh địa chỉ
$masv = $_GET["masv"];
$sql = "SELECT * FROM sinhvien WHERE masv = '{$masv}' LIMIT 1";
$query = $db->query($sql);
$sinhvien = $query->fetch_assoc();
// Nếu bản ghi null - không tồn tại => chuyển về trang danh sách
if (is_null($sinhvien)){
	header('Location: sinhvien.php');
}
//Lấy danh sách khoa
$sql = "SELECT * FROM khoa";
$query = $db->query($sql);
$khoa = $query->fetch_all(MYSQLI_ASSOC);

$errors = [];
if (isset($_POST["submit"])){
	if (count($errors) == 0){
		$masv1 = trim($_POST['masv']);
		$hoten = trim($_POST['hoten']);
		$ngaysinh = trim($_POST['ngaysinh']);
		$gioitinh = trim($_POST['gioitinh']);
		$email = trim($_POST['email']);
		$diachi = trim($_POST['diachi']);

		//Kiểm tra mã sinh viên có bị trùng hay không

		$sql = "SELECT * FROM sinhvien WHERE masv = '{$masv1}' AND masv <> '{$masv}' LIMIT 1"; /*<>: khác*/
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if (!is_null($result)) {
			$errors[]  = "Mã sinh viên bị trùng";
		} else{
			$sql = "UPDATE sinhvien SET hoten = '{$hoten}', diachi = '{$diachi}' WHERE masv = '{$masv}' ";
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
	<title>Sửa thông tin sinh viên</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<section>

	<div class="container">

		<form action="" method="post">
			<div>
				Mã SV: 
				<input type="text" name="masv" readonly="readonly" value="<?php if (isset($_POST["masv"])) echo $_POST["masv"]; else echo $sinhvien["masv"] ;?>">
			</div>
			<div>
				Tên sinh viên:: <input type="text" name="hoten" value="<?php if (isset($_POST["hoten"])) echo $_POST["hoten"]; else echo $sinhvien["hoten"];?>">
			</div>
			<div>
				Ngày sinh: <input type="text" name="ngaysinh" placeholder="yyy/mmm/ddd" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST["ngaysinh"]; else echo $sinhvien["ngaysinh"] ;?>" >
			</div>
			<div>
				Giới tính: <input type="radio" name="gioitinh" value="1"
							<?php if ( (isset($_POST['gioitinh'])) && $_POST['gioitinh'] == 1 || $sinhvien['gioitinh'] == 1 ) echo 'checked = "checked" ' ;?>
							>Nam
							<input type="radio" name="gioitinh" value="0"
							<?php if ( (isset($_POST['gioitinh'])) && $_POST['gioitinh'] == 0 || $sinhvien['gioitinh'] == 0 ) echo 'checked = "checked" ' ;?>
							>Nữ
			</div>
			<div>
				Địa chỉ: <input type="text" name="diachi" value="<?php if (isset($_POST["diachi"])) echo $_POST["diachi"]; else echo $sinhvien["diachi"];?>"">
			</div>
			<div>
				Email: <input type="text" name="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; else echo $sinhvien["email"];?>">
			</div>
			<div>
				Khoa: 
				<select name="makhoa">
					<option value="">---Chọn---</option>
					<?php 
					if (!is_null($khoa) && count($khoa) > 0):
						foreach ($khoa as $item):
					?>
					<option value="<?php echo $item['makhoa']; ?>"
						<?php if (
									(isset($_POST["makhoa"])) && $_POST["makhoa"] == $item["makhoa"] 
									|| $sinhvien["makhoa"] == $item["makhoa"]) 
									echo 'selected = "selected" ' ;?>
					> 
						<?php echo $item['ten_khoa']  . " - " . $item["makhoa"];?>
					</option>
					<?php  
						endforeach;
					endif;
					?>
				</select>
				
			</div>
			<div>
				Mật khẩu cũ:
				<input type="password" name="password" value="">
			</div>
			<div>
				<input type="submit" name="submit" value="Submit">
			</div>
		</form>
	</div>
</section>
