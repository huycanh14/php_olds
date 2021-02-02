<?php  
session_start();
$error = $dung = null;
$username = 'admin';
$password = 'admin';
if (isset($_POST['submit'])){
	if ($_POST['username'] == $username && $_POST['password'] == $password && $_POST['remember'] == 'remember'){
		$dung = 'Xin chào, admin ';
		$cookie_name = $username;
		$cookie_password = $password;
		setcookie($cookie_name, $cookie_password, time() + (7200), "/");
		$_SESSION['dangnhap'] = ['username' => $cookie_name, 'password' => $cookie_password];
	} else{
		$error = 'Tài khoản hoặc mật khẩu không chính xác';
	}
}
if (isset($_POST['reset'])){
	header('location: dangnhap.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
	</style>
	<title>Đăng nhập</title>
</head>
<body>
	<div id="container">
		<table>
			<thead>
				<p>Thông tin đăng nhập của khách hàng</p>
				<div class="mesage">
					<h3><i><?php echo $dung ;?></i></h3>
					<p><i><?php echo $error ;?></i></p>
				</div>
			</thead>
			<tbody>
				<tr>
					<td>
						<img src="img/logo.png">
					</td>
					<td>
						<form action="" method="post">
							<p>
								Tài khoản:
								<input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ;?>">
							</p>
							<p>
								Mật khẩu:
								<input type="password" name="password" id="password">
							</p>
							<p>
								<input type="checkbox" name="remember" value="remember" 
								<?php if (isset($_POST['remember']) && $_POST['remember'] == "remember"){
									echo "checked = 'checked' ";
								} 
								?>
								> Ghi nhớ
							</p>
							<input type="submit" name="submit" onclick="dang_nhap();" value="Đăng nhập">
							<input type="submit" name="reset" value="Nhập lại">
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>
<script type="text/javascript">
	function dang_nhap()
	{
		var username = document.getElementById("username").value ;
			if(username == ""){
				alert("Bạn chưa nhập tài khoản");
				document.getElementById("username").select();
				return false;
			}
		var password = document.getElementById("password").value ;
			if(password == ""){
				alert("Bạn chưa nhập mật khẩu");
				document.getElementById("password").select();
				return false;
			}
	}
</script>