<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="" method="post">
		Username
		<input type="text" name="user">
		Password
		<input type="Password" name="pass">
		<input type="submit" name="submit">
	</form>
	<?php 
	session_start();
	$user  = 'trang';
	$pass = '123';
	if (isset($_POST['submit'])) {
		if ($user == $_POST['user']&& $pass == $_POST['pass']) {
		$_SESSION['user'] = ['user' => $user, 'pass' => $pass];
		header("Location:demo.php");
		} else {
			echo "dang nhap that bai";
		}
	}
	


	 ?>

</body>
</html>