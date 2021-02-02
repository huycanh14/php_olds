<?php
	$error = [];
	$uocso = [];
	if (isset($_POST['submit'])) {
		$number = (int)$_POST['number'];
		if ($number == '') {
			$error[] = 'vui lòng nhập vào 1 số';
		} else {
			for ($i=1; $i <= ($number/2); $i++) { 
				if ($number % $i == 0) {
					$uocso[] = $i;
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 11: Tìm ước</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 11: Tìm ước của số nguyên</h2>
		Nhập số: <input type="number" name="number">
		<input type="submit" name="submit" value="Tính">
		<?php if (count($error) > 0) :?>
			<span style="color:red"><?php echo $error[0]; ?></span>
		<?php endif; ?>
		<div><br>
			Các ước số: <?php for ($i=0; $i < count($uocso); $i++) { 
				echo $uocso[$i] . ', ';
			}?>
		</div>
	</form>
</body>
</html>