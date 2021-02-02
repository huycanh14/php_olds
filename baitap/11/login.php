<?php  
session_start();
require('connect.php');
include('header.php');
?>
<?php  
$errors = [];
$masv = $password = $user = '';
$user_ad = $password_ad = 'admin';
if (isset($_POST['submit'])){
	if (!isset($_POST['masv']) || empty($_POST['masv'])){
		$errors[] = 'Bạn chưa nhập tên đăng nhập';
	}

	if (!isset($_POST['password']) || empty($_POST['password'])){
		$errors[] = 'Bạn chưa nhập mật khẩu';
	}

	if (count($errors) == 0){
		if ($user_ad == trim($_POST['masv']) && $password_ad == trim($_POST['password'])){
			$_SESSION['admin'] = ['username' => $user_ad, 'password' => $password_ad];
			header('location: trangchu.php');
		} else {
			$masv = trim($_POST['masv']);
			$sql = "SELECT * FROM sinhvien WHERE masv = '{$masv}' LIMIT 1";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();

			if (is_null($result)){
				$errors[] = "Bạn nhập sai tên đăng nhập. Bạn vui lòng nhập lại";
			} else{
				for ($i = 0; $i < count($result); $i++) {
					$user = $result['masv'];
					$password = $result['password'];
				}
				if ($password != trim($_POST['password'])){
					$errors[] = "Mật khẩu bạn nhập chưa có đúng. Vui lòng nhập lại!";
				} else{
					$_SESSION['user'] = ['username' => $user, 'password' => $password];
					header('location: user/trangchu.php');
				}
			}
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
		<div class="logout" style="text-align: right;">
			<a href="logout.php">Đăng xuất</a>
		</div>
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
				&emsp;&ensp;User:
				<input type="text" name="masv" value="<?php if (isset($_POST['masv'])) echo $_POST['masv'] ;?>">
			</div><br>
			<div>
				Password:
				<input type="password" name="password" >
			</div><br>
			<div>
				<input type="submit" name="submit" value="Đăng nhập">
			</div>
		</form>
	</div>
</body>
</html>