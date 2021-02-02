<?php
session_start();
require('connect.php');
include("header.php");

$errors = [];

if (isset($_POST['submit'])) {
	if (isset($_POST['masv']) && $_POST['masv'] == '') {
		$errors[] = 'Vui long nhap ma sinh vien';
	}

	if (isset($_POST['matkhau']) && $_POST['matkhau'] == '') {
		$errors[] = 'Vui long nhap mat khau';
	}

	//Kiem tra do dai: strlen(trim($_POST['matkhau']))
	
	//

	if (count($errors) == 0) {



		//$sql = sprintf("SELECT * FROM sinhvien WHERE masv=%s LIMIT 1", trim($_POST['masv']));
		$sql = "SELECT * FROM sinhvien WHERE masv='" . trim($_POST['masv']) . "' LIMIT 1";
		$query = $db->query($sql);
		$sinhvien = $query->fetch_assoc();
		if ($sinhvien == NULL) {
			$errors[] = 'Sinh vien nay khong ton tai';
		} else {

			//Kiem tra trangthai == 0, thong bao bao tai khoan bi vo hieu

			if ($sinhvien['password'] == trim($_POST['matkhau'])) {
				$_SESSION['user'] = $sinhvien;
				//$_SESSION['user']['masv']
				$_SESSION['flash_msg'] = 'Dang nhap thanh cong!';
				header('Location: index.php');
				exit;
			} else {
				$errors[] = 'Mat khau khong chinh xac';
			}
		}
	}


}

?>
<section>
	<div class="container danhsach">
		<div class="message">
			<?php
			if (count($errors) > 0) :
				for ($i=0; $i < count($errors); $i++) :
					?>
					<p style="color:red;"><?php echo $errors[$i]?></p>
					<?php 
				endfor;
			endif;
			?>
		</div>
		<form action="" method="POST">
			<input type="text" name="masv" value="<?php if (isset($_POST['masv'])) echo $_POST['masv']; ?>" placeholder="Mã sinh viên">
			<input type="password" name="matkhau" value="<?php if (isset($_POST['matkhau'])) echo $_POST['matkhau']; ?>" placeholder="Mật khẩu">
			<input type="submit" name="submit" value="Đăng nhập">
		</form>
	</div>
</section>
<?php
include('footer.php');
?>