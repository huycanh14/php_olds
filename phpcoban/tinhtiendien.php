<?php
$errors = "";
$money = 0;
if (isset($_POST['submit'])) {
	$number = $_POST['number'];
	if ($number == "" || $number < 0) {
		$errors = "Không được để trống và phải nhập số dương";
	} else {
		$op_1 = 2500;
		$op_2 = 3500;
		$op_3 = 4500;
		$op_4 = 11500;
		switch ($number) {
		case (0 <= $number && $number <= 100):
			$money = $number * $op_1;
			break;
		case (101 <= $number && $number <= 200):
			$money = 100 * $op_1 + ($number - 100 * $op_2);
			break;
		case (201 <= $number && $number <= 500):
			$money = $money = 100 * $op_1 + 100 * $op_2 + ($number - 200 * $op_3);
			break;
		default:
			$money = $money = 100 * $op_1 + 100 * $op_2 + 100 * $op_3 + ($number - 300 * $op_4);
			break;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tính tiền điện</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="message">
			<!-- Thông báo lỗi  -->
		<?php if ($errors != ""): ?>
		<p class="errors" style="color: red;"><?php echo $errors; ?></p>
		<?php
endif;
?>
	</div>
	<table border="1px">
		<thead>
			<tr>
				<th colspan="2" align="center">Tính tiền điện</th>
			</tr>
		</thead>
		<tbody>
			<form action="" method="post">
				<tr>
					<td>Nhập số KW điện:</td>
					<td><input type="number" name="number"></td>
				</tr>
				<tr>
					<td>0KW - 100KW</td>
					<td>2.500đ/KW</td>
				</tr>
				<tr>
					<td>101KW - 200KW</td>
					<td>100KW giá 2.500đ/KW <br>còn lại giá: 3.500đ</td>
				</tr>
				<tr>
					<td>201KW - 500KW</td>
					<td>100KW giá 2.500đ/KW <br>100KW giá 3.500đ/KW <br>còn lại giá: 5.500đ</td>
				</tr>
				<tr>
					<td>Trên 500KW</td>
					<td>100KW giá 2.500đ/KW <br>100KW giá 3.500đ/KW <br> 100KW giá 5.500đ/KW <br>còn lại giá: 11000đ</td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Tính toán"></td>
					<td><input type="text" readonly value="<?php echo $money; ?>"></td>
				</tr>
			</form>
		</tbody>
	</table>
</body>
</html>