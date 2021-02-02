<?php

	$error = [];
	$sum1 = $sum2 = $sum3 = $giaithua = 1;
	if (isset($_POST['submit'])) {
		$n = (int)$_POST['n'];
		$x = (float)$_POST['x'];
		if ($n == '' || $n <= 0 || $x == '') {
			$error[] = 'Vui lòng nhập n nguyên dương và nhập số x bất kỳ!';
		} else {
			echo "n = $n, x = $x <br>";
			for ($i=1; $i <= $n; $i++) { 
				$sum1 += pow($x, $i);
				$sum2 += pow(-1, $i)*pow($x, $i);
				$giaithua *= $i;
				$sum3 += pow($x, $i)/($giaithua);
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 8: Tính các tổng dãy số</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 8: Tính các tổng dãy số</h2>
		Nhập n nguyên dương và x: 
		<input type="number" name="n" placeholder=" n" id="n">
		<input type="text" name="x" placeholder=" x" id="x">
		<input type="submit" name="submit" value="Tính Luôn">
		<?php if (count($error) > 0) :?>
			<?php for ($i=0; $i < count($error); $i++) :?>
			<span style="color:red"><?php echo $error[0]; ?></span>
			<?php endfor; ?>
		<?php endif; ?>
		<div><br>
		S = 1 + x + x<sup>2</sup> + x<sup>3</sup> + ... + x<sup>n</sup> = 
		<span style="color:blue"><?php echo $sum1; ?></span>
		</div>
		<div><br>
		S = 1 - x + x<sup>2</sup> - x<sup>3</sup> + ... + (-1)<sup>n</sup>x<sup>n</sup> = <span style="color:blue"><?php echo $sum2; ?></span>
		</div>
		<div><br>
		S = 1 + x/1! + x<sup>2</sup>/2! + x<sup>3</sup>/3! + ... + x<sup>n</sup>/n! = <span style="color:blue"><?php echo $sum3; ?></span>
		</div>
	</form>
</body>
</html>