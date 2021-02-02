<?php
require('connect.php');
include('header.php');
session_start();
if(!isset($_SESSION['admin'])){
	header('Location: sinhvien.php');
}

//Bước 1: Lấy danh sách khoa
$sql = "SELECT * FROM khoa";
$query = $db->query($sql);
$khoa = $query->fetch_all(MYSQLI_ASSOC);

?>
<?php 
$errors = [];
$makhoa = $ngaysinh = null;
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
	if (!isset($_POST['date'] ) || $_POST["date"] == "nonDate" ){
		$errors[] = 'Chưa nhập ngày' ;
	}
	if (!isset($_POST['month'] ) || $_POST["month"] == "nonMonth" ){
		$errors[] = 'Chưa nhập tháng ' ;
	}
	if (!isset($_POST['year'] ) || $_POST["year"] == "nonYear" ){
		$errors[] = 'Chưa nhập năm ' ;
	}

	// Thực hiện thêm sinh viên
	if (count($errors) == 0){
		$masv = trim($_POST["masv"]);
		$hoten = trim($_POST["hoten"]);
		$date = trim($_POST["date"]);
		$month = trim($_POST["month"]);
		$year = trim($_POST["year"]);
		$diachi = trim($_POST["diachi"]);
		$email = trim($_POST["email"]);
		$makhoa = trim($_POST["makhoa"]);
		$gioitinh = trim($_POST["gioitinh"]);

		if ($month == 2){
			if ($date == 30 || $date == 31){
				$errors[] = "Bạn nhập ngày sai, vui lòng nhập lại ngày";
			}
		}

		if ($month == 4 || $month == 6 || $month == 9 || $month == 11){
			if ($date == 31){
				$errors[] = "Bạn nhập ngày sai, vui lòng nhập lại ngày";
			}
		}

		// Năm nhuận 2016 (Chia hết cho 4 là năm nhuận), năm ko chia hết cho 4 là năm thường
		if ($year % 4 != 0){
			if ($date == 29){
				$errors = "Bạn nhập ngày sai, vui lòng nhập lại ngày";
			}
		}

		$ngaysinh = $year . "-" . $month . "-" . $date;

		// Kiểm tra MSV nhập vào đã tồn tại hay chưa
		$sql = "SELECT * FROM sinhvien WHERE masv = '".$masv."' LIMIT 1 ";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = "Mã sinh viên này đã tồn tại. Vui lòng nhập mã sinh viên khác!";
		} else{
			// Thêm dữ liệu vào CSDL

			$sql = "INSERT INTO sinhvien (masv, hoten, ngaysinh, gioitinh, diachi, email, makhoa) VALUES 
			('".$masv."', '".$hoten."', '".$ngaysinh."', '".$gioitinh."', '".$diachi."', '".$email."', '".$makhoa."')";
			$query = $db->query($sql);
			if ($query){
				$success = 1;
			} else{
				$errors[] = " Không thể thêm khoa!";
			}
		}
	}
}
?>
<head>
	<title>Thêm Sinh Viên</title>
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
		<h1>Thêm sinh viên</h1>
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

		<!-- From thêm sinh viên -->
		<form action="" method="post">
			<div>
				&emsp;&emsp;&emsp;
				Mã SV: 
				<input type="text" name="masv" value="<?php if (isset($_POST["masv"])) echo $_POST["masv"] ;?>">
			</div><br>

			<div>
				&ensp;
				Tên sinh viên: 
				<input type="text" name="hoten" value="<?php if (isset($_POST["hoten"])) echo $_POST["hoten"] ;?>">
			</div><br>

			<div>
				&emsp;&emsp;
				Ngày sinh: 
				<!-- <input type="date" name="ngaysinh" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST["ngaysinh"] ;?>"> -->

				<!-- Ngày -->
				<select name="date">
					<option value="nonDate">Ngày</option>
					<?php for ($i = 1; $i <= 31; $i++) :?>
						<option value="<?php echo $i ;?>" 
							<?php  
								if (isset($_POST["submit"])){
									if (isset($_POST["date"]) && $_POST["date"] == $i){
										echo "selected = 'selected' " ;
									}
								}
							?>
						>

							<?php echo $i ;?>
						</option>
					<?php endfor ;?>
				</select>

				<!-- Tháng -->
				<select name="month">
					<option value="nonMonth"> Tháng</option>
					<?php for ($i = 1; $i <= 12; $i++) :?>
						<option value="<?php echo $i ;?>"
							<?php  
								if (isset($_POST["submit"])){
									if (isset($_POST["month"]) && $_POST["month"] == $i){
										echo "selected = 'selected' " ;
									}
								}
							?>
						>
							<?php echo $i ;?>
						</option>
					<?php endfor ;?>
				</select>

				<!-- Năm -->
				<select name="year">
					<option value="nonYear">Năm</option>
					<?php for ($i = date("Y"); $i >= 1905; $i--) :?>
						<option value="<?php echo $i ?>"
							<?php  
								if (isset($_POST["submit"])){
									if (isset($_POST["year"]) && $_POST["year"] == $i){
										echo "selected = 'selected' " ;
									}
								}
							?>
						>
							<?php echo $i ;?>
						</option>
					<?php endfor ;?>
				</select>

			</div><br>

			<div>
				Giới tính:&emsp;
							<input type="radio" name="gioitinh" value="1"
							<?php 
								if (isset($_POST['submit'])){
									if (isset($_POST["gioitinh"]) && $_POST["gioitinh"] == 1){
										echo "checked = 'checked' ";
									}
								}
							?>
							> Nam
				&emsp;&emsp;
							<input type="radio" name="gioitinh" value="0"
							<?php 
								if (isset($_POST['submit'])){
									if (isset($_POST["gioitinh"]) && $_POST["gioitinh"] == 0){
										echo "checked = 'checked' ";
									}
								}
							?>
							> Nữ
			</div><br>
				
			<div>
				&emsp;&emsp;&emsp;
				Địa chỉ: 
				<input type="text" name="diachi" value="<?php if (isset($_POST["diachi"])) echo $_POST["diachi"] ;?>">
			</div><br>

			<div>
				&emsp;&emsp;&emsp;&ensp;
				Email: 
				<input type="text" name="email" value="<?php if (isset($_POST["email"])) echo $_POST["masv"] ;?>">
			</div><br>

			<div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				Khoa: 
				<select name="makhoa">
					<option value="nonSelect">---Chọn---</option>
					<?php 
					if (!is_null($khoa) && count($khoa) > 0):
						foreach ($khoa as $item):
					?>
					<option value="<?php echo $item['makhoa']; ?>" 
						<?php if ((isset($_POST["makhoa"])) && $_POST["makhoa"] == $item["makhoa"]) echo 'selected = "selected" ' ;?>
						> 
						<?php echo $item['ten_khoa'] . " - " . $item["makhoa"];?>
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