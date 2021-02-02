<?php
	
	$error = [];
	$max = $min = 0;
	if (isset($_POST['submit'])) {
		$sothu1 = (float)$_POST['sothu1'];
		$sothu2 = (float)$_POST['sothu2'];
		$sothu3 = (float)$_POST['sothu3'];
		$sothu4 = (float)$_POST['sothu4'];
		$sothu5 = (float)$_POST['sothu5'];
		if ($sothu1 == '' || $sothu2 == '' || $sothu3 == '' || $sothu4 == '' || $sothu5 == '') {
			$error[] = 'Nhập đầy đủ, chính xác 5 số!';
		} else {
			$number = [$sothu1, $sothu2, $sothu3, $sothu4, $sothu5];
			$max = $sothu1;
			$min = $sothu1;
			for ($i=0; $i < count($number); $i++) { 
				if ($number[$i] > $max) {$max = $number[$i];};
				if ($number[$i] < $min) {$min = $number[$i];};
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 6: Max, Min</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 6: Max, Min trong 5 số</h2>
		Nhập 5 số:
		<input type="text" name="sothu1" placeholder="số thứ 1" size="10">
		<input type="text" name="sothu2" placeholder="số thứ 2" size="10">
		<input type="text" name="sothu3" placeholder="số thứ 3" size="10">
		<input type="text" name="sothu4" placeholder="số thứ 4" size="10">
		<input type="text" name="sothu5" placeholder="số thứ 5" size="10">
		<input type="submit" name="submit" value="Tìm Max/Min">
			<?php if (count($error) > 0) :?>
				<?php for ($i=0; $i < count($error); $i++) :?>
				<p style="color:red"><?php echo $error[$i]; ?></p>
				<?php endfor; ?>
			<?php endif; ?>
		<div>
			Max: <?php echo $max; ?>
		</div>
		<div>
			Min: <?php echo $min; ?>
		</div>
	</form>
</body>
</html>