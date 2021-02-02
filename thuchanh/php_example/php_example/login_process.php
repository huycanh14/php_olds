<?php
$txtUser = trim($_POST["txtUser"]);
$txtPwd = trim($_POST["txtPwd"]);

if ($txtUser == "" || $txtPwd == "") {
	header('Location: login.php?status=empty');
	return;
}

if ($txtUser == "locnt@gmail.com" && $txtPwd == "conlaumoinoi") {
	$name = 'Nguyen The Loc';
	header('Location: welcome.php?txtUser='. $txtUser. '&txtName='. $name);
} else {
	header('Location: login.php?status=fail&txtUser='. $txtUser);
}

?>
