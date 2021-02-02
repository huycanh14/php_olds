<?php
	$error = [];
	$hsg = $kc = 0;
	if (isset($_POST['submit'])) {
		$x1 = (float)$_POST['x1'];
		$y1 = (float)$_POST['y1'];
		$x2 = (float)$_POST['x2'];
		$y2 = (float)$_POST['y2'];
		if ($x1 == '' || $y1 == '' || $x2 == '' || $y2 == '') {
			$error[] = 'Nhập đầy đủ chính xác các tọa độ để tính!';
		} elseif ($x2 == $x1) {
			$hsg = 1;
			$kc = sqrt(($y2-$y1)*($y2-$y1));
		} else {
			$hsg = ($y2-$y1)/($x2-$x1);
			$kc = sqrt(($y2-$y1)*($y2-$y1) + ($x2-$x1)*($x2-$x1));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bài 3: 2 điểm trong mặt phẳng</title>
	<style type="text/css">
		.thongbao{color: red;}
	</style>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 3: Tính hệ số góc và khoảng cách giữa 2 điểm trong 1 mặt phẳng</h2>
		Tọa độ điểm 1: 
		<input type="text" name="x1" placeholder=" x1 (m)" size="5">
		<input type="text" name="y1" placeholder=" y1 (m)" size="5"><br><br>
		Tọa độ điểm 2:
		<input type="text" name="x2" placeholder=" x2 (m)" size="5">
		<input type="text" name="y2" placeholder=" y2 (m)" size="5">
		<input type="submit" name="submit" value="Tính Ngay">
		<?php if (count($error) > 0) :?>
			<span class="thongbao"><?php echo $error[0]; ?></span>
		<?php endif; ?>
		<div><br>
			Hệ số góc: <?php echo $hsg; ?><br>
			Khoảng cách: <?php echo $kc; ?> (m)
		</div>
	</form>

</body>
</html>