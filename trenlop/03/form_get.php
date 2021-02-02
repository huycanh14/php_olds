<?php
$error = [];
if (isset($_GET['submit'])) {
	if (!isset($_GET['username']) || $_GET['username'] == '') {
		$error[] = 'Vui long nhap tai khoan cua ban';
	}

	if (!isset($_GET['password']) || $_GET['password'] == '') {
		$error[] = 'Vui long nhap mat khau cua ban';
	}

	if (count($error) == 0) {
		echo 'Xin chao, ' . $_GET['username'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<?php if (count($error) > 0) :?>
	<div class="messages">
		<?php for ($i = 0; $i < count($error); $i++) :?>
		<p><?php echo $error[$i];?></p>
		<?php endfor;?>
	</div>
	<?php endif;?>

	<?php if (count($error)) { ?>
	<div class="messages">
		<?php for ($i = 0; $i < count($error); $i++) {?>
		<p><?php echo $error[$i];?></p>
		<?php }?>
	</div>
	<?php } ?>

	<form action="" method="get">
		<input type="text" name="username" placeholder="Tài khoản">
		<input type="password" name="password" placeholder="Mật khẩu">
		<input type="submit" name="submit" value="Dang nhap">
	</form>
</body>
</html>