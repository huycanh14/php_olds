<?php

	$error = [];
	$tong = 0;
	if (isset($_GET['submit'])) {
		$R1 = (float)$_GET['R1'];
		$R2 = (float)$_GET['R2'];
		$R3 = (float)$_GET['R3'];
		if ($R1 == '' || $R2 == '' || $R3 == '') {
			$error[] = 'Nhập đầy đủ chính xác các điện trở trước khi tính!';
		} else {
			$tong = $R1 + $R2 + $R3;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 4: Tổng điện trở</title>
	<style type="text/css">
		.thongbao{color: red;}
	</style>
</head>
<body>
	<form action="" method="GET">
		<h2>Bài 4: Tính tổng điện trở</h2>
		Nhập vào các giá trị điện trở:
		<input type="text" name="R1" placeholder=" R1 (Ω)" size="5">
		<input type="text" name="R2" placeholder=" R2 (Ω)" size="5">
		<input type="text" name="R3" placeholder=" R3 (Ω)" size="5">
		<input type="submit" name="submit" value="Tính tổng trở">
		<?php if (count($error) > 0) :?>
			<p class="thongbao"><?php echo $error[0]; ?></p>
		<?php endif; ?>
		<p>Tổng trở: <?php echo $tong; ?> (Ω)</p>
	</form>
</body>
</html>