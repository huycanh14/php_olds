<?php 
/**
 * Cứ mỗi người dùng khi làm việc với website đều được web server tạo ra một phiên làm việc riêng của người đó.
 * Session là một cách lưu trữ thông tin trên web server để có thể chia sẻ chúng cho tất cả các trang trong cùng ứng dụng.
 * Thông tin lưu trữ trong biến $_SESSION là tạm thời, nó sẽ bị hủy khi người truy cập không còn làm việc với website (đóng cửa sổ trình duyệt, truy cập một website khác, hoặc timeout).
 * Session được dùng để quản lý thông tin về mỗi người dùng người dùng riêng biệt.
 */

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