<?php
	$error = [];
	$giaithua = 1;
	if (isset($_POST['submit'])) {
		$n = (int)$_POST['n'];
		if ($n == '' || $n <= 0) {
			$error[] = 'Vui lòng nhập vào 1 số lớn hơn 0!';
		} else {
			for ($i=1; $i <= $n; $i++) { 
				$giaithua *= $i;
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 12: Tính giai thừa</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 12: Tính giai thừa</h2>
		Nhập số N: 
		<input type="number" name="n" placeholder=" N">
		<input type="submit" name="submit" value="Tính giai thừa">
		<?php if (count($error) > 0) :?>
			<span style="color:red"><?php echo $error[0]; ?></span>
		<?php endif; ?>
		<div><br>
			<?php
			if (isset($_POST['submit']) && count($error) == 0) {
			 	echo "Giai thừa $n bằng: $giaithua";
			 } ?>
		</div>
	</form>

</body>
</html>