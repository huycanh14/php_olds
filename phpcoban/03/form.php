<?php
	$error = []; 
	if (isset($_POST['submit'])){
		if (!isset($_POST['username']) || $_POST['username'] == ''){
			$error [] = 'Vui long nhap tai khoan cua ban ';
		}

		if (!isset($_POST['password']) || $_POST['password'] == ''){
			$error [] = 'Vui long nhap mat khau cua ban ';
		}
	} 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<?php if
	<div class="message">
		
	</div>
	<?php endif;?>



	<form action="" method="post">
		<input type="text" name="username" placeholder="Tài khoản">
		<input type="password" name="password" placeholder="Mật khẩu">
		<input type="submit" name="submit" value="Dang Nhap">
	</form>
</body>
</html>