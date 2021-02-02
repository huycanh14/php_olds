<?php
session_start();
$username = 'admin';
$password = '123456';
if (isset($_POST['submit'])) {
	if ($username == $_POST['username'] && $password == $_POST['password']) {
		$_SESSION['user'] = ['username' => $username, 'password' => $password];
		header('Location: session2.php');
	} else {
		echo 'Dang nhap that bai';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dang nhap</title>
</head>
<body>
<form action="" method="POST" accept-charset="utf-8">
<input type="text" name="username" value="">
<input type="password" name="password" value="">
<input type="submit" name="submit" value="Dang nhap">
</form>
</body>
</html>