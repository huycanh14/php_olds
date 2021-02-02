<?php

	//input: bán kính hình tròn r
	//process: chu vi 2*pi*r, diện tích pi*r*r
	//output: chu vi, diện tích, thông báo nếu không nhập r

	$error = [];
	$cv = $dt = 0;
	$pi = 3.14;
	if (isset($_POST['submit'])) {
		if (!isset($_POST['r']) || $_POST['r'] == '') {
			$error[] = 'Nhập bán kính R để tính!!!';
		}
		if (count($error) == 0) {
			$cv = 2 * $pi * (float) $_POST['r'];
			$dt = $pi * (float) $_POST['r']*(float) $_POST['r'];
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 1: Chu vi, diện tích hình tròn</title>
	<style type="text/css">
		.thongbao{color: red;}
	</style>
</head>
<body>

	<form action="" method="POST">
		<h2>Bài 1: Tính chu vi, diện tích hình tròn:</h2>
		<input type="text" name="r" placeholder=" nhập bán kính R">
		<input type="submit" name="submit" value="Tinh CV/DT">
	</form>

	<?php if (count($error) > 0) :?>
	<?php for ($i=0; $i < count($error); $i++) :?>
		<p class="thongbao"><?php echo $error[$i]; ?></p>
	<?php endfor ;?>
	<?php endif ;?>

	Chu vi: <?php echo $cv . ' (m)' . '<br>'; ?>
	Diện tích: <?php echo $dt . " (m<sup>2</sup>)"; ?>
	
</body>
</html>