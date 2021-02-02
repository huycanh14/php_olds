<?php
	$error = [];
	$ketqua = '';
	if (isset($_POST['submit'])) {
		$number = (int)$_POST['number'];
		if ($number == '' || $number <= 0) {
			$error[] = 'Vui lòng nhập 1 số lớn hơn 0';
		} elseif ($number == 1 || $number == 2 || $number == 3) {
			$ketqua = "$number là số nguyên tố";
		} else {
			for ($i=2; $i <= $number/2; $i++) { 
				if ($number % $i == 0) {
					$ketqua = "$number Không là số nguyên tố";
					break;}
				if ($i == $number/2 || $i == ($number/2-0.5)) {
					$ketqua = "$number là số nguyên tố";
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Bài 13: số nguyên tố</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 13: kiểm tra số nguyên tố</h2>
		Nhập số: 
		<input type="number" name="number">
		<input type="submit" name="submit" value="Kiểm tra">
		<?php if (count($error) > 0) {
			echo $error[0];
		} else {
			echo $ketqua;
		}
		?>

	</form>
</body>
</html>