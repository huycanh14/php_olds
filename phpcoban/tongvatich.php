<?php
$errors = "";
$sum = "";
$mul = "";
if (isset($_POST['submit'])) {
	$number = $_POST['number'];
	if ($number == "" || $number < 0) {
		$errors = "Không được để trống";
	} else {
		$n = $number;
		$sum = 0;
		$mul = 1;
		if ($number % 2 != 0) {
			$n = $number - 1;
		}

		for ($i = 1; $i <= $number; $i++) {
			if ($i % 2 == 0) {
				$mul *= $i;
			} else {
				$sum += $i;
			}

		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tính tổng và tích</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="message" align="center">
			<!-- Thông báo lỗi  -->
		<?php if ($errors != ""): ?>
		<p class="errors" style="color: red;"><?php echo $errors; ?></p>
		<?php
endif;
?>
	</div>
	<form action="" method="post">
	<table align="center" border="1px">
		<tr>
			<td colspan="2" align="center"> Tổng và tích</td>
		</tr>
		<tr>
			<td>nhập 1 số dương (m>=0)</td>
			<td><input type="number" name="number" value="<?php if (isset($_POST['number'])) {
	echo $_POST['number'];
}
?>">
			</td>
		</tr>
		<tr>
			<td>P=1+3+5+...+m/(m-1)<br>+m nếu m lẻ<br>+(m-1) nếu m chẵn</td>
			<td>
				<input type="number" readonly value="<?php echo $sum; ?>">
			</td>
		</tr>
		<tr>
			<td> S=2*4*6*...*m/(m-1)<br>* m nếu m chẵn<br>*(m-1)nếu m lẻ</td>
			<td>
				<input type="number" readonly value="<?php echo $mul; ?>">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" ><input type="submit" name="submit" value="Tính toán"></td>
		</tr>

	</table>
	</form>
</body>
</html>
