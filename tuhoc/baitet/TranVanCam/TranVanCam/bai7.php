<?php
	function TongChuSo($number = 0){
		if ($number < 0) {
			$number *= -1;
		}
		$tong = 0;
		for ($i=0; $i < strlen($number); $i++) { 
			$tong += substr($number, $i, 1);
		}
		return $tong;
	}
	$error = [];
	$ketqua = [];
	if (isset($_GET['submit'])) {
		$number = $_GET['number'];
		if ((int)$number == '') {
			$error[] = "Nhập vào 1 số nguyên!";
		} elseif (TongChuSo($number) % 3 == 0) {
			$ketqua[] = "số $number CHIA HẾT cho 3.";
		} else {
			$ketqua[] = "số $number KHÔNG chia hết cho 3.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 7: Số nguyên chia hết 3</title>
</head>
<body>
	<form action="" method="GET">
		<h2>Bài 7: Số nguyên - tổng các chữ số, chia hết cho 3</h2>
		Nhập số nguyên: <input type="number" name="number">
		<input type="submit" name="submit" value="Phân tích">
		<?php if (count($error) > 0) :?>
			<span style="color:red"><?php echo $error[0]; ?></span>
		<?php endif; ?>
		
		<?php if (count($ketqua) > 0) :?>
		<?php echo $ketqua[0]; ?>
		<?php endif; ?>
		
	</form>
</body>
</html>