<?php
require('connect.php');
include('header.php');

//Bước 1: Lấy danh sách khoa
$sql = "SELECT * FROM khoa";
$query = $db->query($sql);
$khoa = $query->fetch_all(MYSQLI_ASSOC);

?>
<?php 
$error = [];
if ( isset($_POST['submit']) ){
	if (!isset($_POST['masv'] ) || empty ($_POST['masv']) ){
		$error[] = ' Chưa nhập mã sinh viên';
	}

	if (!isset($_POST['hoten'] ) || empty ($_POST['hoten']) ){
		$error[] = 'Chưa nhập tên' ;
	}

	if (!isset($_POST['date'] ) || empty ($_POST['date']) ){
		$error[] = 'Chưa nhập tên' ;
	}

}
?>
<head>
	<title>Thêm sinh viên</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<section>

	<div class="container">

		<form action="" method="post">
			<div>
				Mã SV: <input type="text" name="masv" value="">
			</div>
			<div>
				Tên sinh viên:: <input type="text" name="hoten" value="">
			</div>
			<div>
				Ngày sinh: <input type="text" name="ngaysinh" placeholder="yyy/mmm/ddd" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST["ngaysinh"] ?>" >
			</div>
			<div>
				Giới tính: <input type="radio" name="gioitinh" value="">Nam
							<input type="radio" name="gioitinh">Nữ
			</div>
			<div>
				Địa chỉ: <input type="text" name="diachi" value="<?php if (isset($_POST["diachi"])) echo $_POST["diachi"] ;?>">
			</div>
			<div>
				Email: <input type="text" name="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"] ;?>">
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
						<?php if (isset($_POST["makhoa"]) && $_POST["makhoa"] == $item["makhoa"]) echo 'selected = "selected"' ;?>
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
				<input type="submit" name="submit" value="Submit">
			</div>
		</form>
	</div>
</section>