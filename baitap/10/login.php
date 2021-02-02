<?php  
session_start();
?>
<?php  
$errors = [];
$tendangnhap = $password = '';
$user_ad = $password_ad = 'admin';
if (isset($_POST['submit'])){
	if (!isset($_POST['tendangnhap']) || empty($_POST['tendangnhap'])){
		$errors[] = 'Bạn chưa nhập tên đăng nhập';
	}

	if (!isset($_POST['password']) || empty($_POST['password'])){
		$errors[] = 'Bạn chưa nhập mật khẩu';
	}

	if (count($errors) == 0){
		if($tendangnhap =="admin" && $password =="admin"){
			echo "Chào Admin"
		}else{
			$errors[] = "Bạn đăng nhập chưa đúng";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="content" align="center">
		<h1>Đăng nhập</h1><br>

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
	</div>

		<div class="message"><!-- message -->
			<!-- Errors Message -->
			<?php if (count($errors) > 0) :?>
				<?php for ($i = 0; $i < count($errors); $i++) :?>
					<p class="errors" style="color: red;"> <?php echo $errors[$i];?> </p>
				<?php endfor;?>
			<?php endif ;?><!-- end errors -->
		</div>

		<form action="" method="post">
			<div>
				&emsp;&ensp;Tên đăng nhập:
				<input type="text" name="tendangnhap" >
			</div><br>
			<div>
				Mật khẩu:
				<input type="password" name="password" >
			</div><br>
			<div>
				<input type="submit" name="submit" value="Đăng nhập">
			</div>
		</form>
	</div>
</body>
</html>