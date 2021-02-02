<?php
session_start();
require('connect.php');
include("header.php");

$errors = [];

if (isset($_POST['submit'])) {
	if (isset($_POST['username']) && $_POST['username'] == '') {
		$errors[] = 'Vui long nhap tai khoan';
	}

	if (isset($_POST['password']) && $_POST['password'] == '') {
		$errors[] = 'Vui long nhap mat khau';
	}

	if (count($errors) == 0) {

		$sql = "SELECT * FROM admins WHERE username='" . trim($_POST['username']) . "' LIMIT 1";
		$query = $db->query($sql);
		$admin = $query->fetch_assoc();
		if ($admin == NULL) {
			$errors[] = 'Tai khoan nay khong ton tai';
		} else {

			//Kiem tra status == 0, thong bao bao tai khoan bi vo hieu

			if ($admin['password'] == trim($_POST['password'])) {
				$_SESSION['user'] = $admin;
				$_SESSION['is_admin'] = 1;
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
			<input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" placeholder="Tai khoan">
			<input type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" placeholder="Mật khẩu">
			<input type="submit" name="submit" value="Đăng nhập">
		</form>
	</div>
</section>
<?php
include('footer.php');
?>