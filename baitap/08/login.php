<?php
	session_start();
	$username = 'admin';
	$password = '123456';
	if(isset($_POST['submit'])){
		if($username == $_POST['username'] && $password == $_POST['password']){
			$_SESSION['user'] = ['username' => $username, 'password' => $password];
			header('Location: upload.php');
		} else{
			echo 'Đăng nhập thất bại';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#content{
			padding-left: 420px;
			padding-right: 420px;
			padding-top: 160px;
		}
	</style>
	<title>Đăng nhập</title>
</head>
<body>
	<div id="content">
		<marquee behavior="alternate">
			<h1>Đăng nhập</h1>
		</marquee>
		<form action="" method="post" accept-charset="utf-8" style="text-align: center">
			<input type="text" name="username" value="">
			<input type="password" name="password" value="">
			<input type="submit" name="submit" value="Log in">
		</form>
	</div>
</body>
</html>
