<?php 
//session_start();
$cookie_name = 'user';
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dang nhap thanh cong</title>
</head>
<body>
<?php if (isset($_SESSION['user'])) : ?>
Hello, <?php echo $_SESSION['user']['username'];?>
<a href="logout.php">Logout</a>
<?php else :?>
	<a href="session.php">Dang nhap</a>
<?php endif;?>
</body>
</html>

