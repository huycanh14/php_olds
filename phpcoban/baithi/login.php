<?php  
session_start();
require('connect.php');
$errors = [];
$Username = $Password = '';
if (isset($_POST['reset'])) {
	header('location: login.php');
}
if (isset($_POST['submit'])) {
	if (!isset($_POST['username']) || $_POST['username'] == '') {
		$errors[] = 'Bạn chưa điền Username';
	}

	if (!isset($_POST['password']) || $_POST['password'] == '') {
		$errors[] = 'Bạn chưa điền Password';
	}

	if (count($errors) == 0) {
		$username = trim($_POST['username']);

		$sql = "SELECT * FROM tbl_account WHERE Username = '{$username}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if (is_null($result)){
			$errors[] = "Username chưa đúng hoặc chưa tồn tại";
		} else {
			for ($i = 0; $i < count($result); $i++) {
					$username = $result['Username'];
					$password = $result['Password'];
				}
				if ($password != trim($_POST['password'])){
					$errors[] = "Mật khẩu bạn nhập chưa có đúng. Vui lòng nhập lại!";
				} else{
					$_SESSION['user'] = ['username' => $username, 'password' => $password];
					header('location: index.php');
				}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<table>
		<div class="message"><!-- message -->
			<!-- Errors Message -->
			<?php if (count($errors) > 0) :?>
				<?php for ($i = 0; $i < count($errors); $i++) :?>
					<p class="errors" style="color: red;"> <?php echo $errors[$i];?> </p>
				<?php endfor;?>
			<?php endif ;?><!-- end errors -->
		</div>
		<form action="" method="post">
			<tr>
				<td colspan="2" align="center">
					<h3>Login</h3>
				</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td>
					<input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					<input type="password" name="password">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Login">
					<input type="submit" name="reset" value="Reset">
				</td>
				
			</tr>
		</form>
	</table>
	<br><br><br>
	<a href="logout.php">Logout</a>
</body>
</html>