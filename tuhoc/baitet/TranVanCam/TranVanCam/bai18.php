<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 18: Số ra chữ</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 18: Nhập số ra chữ</h2>
		Nhập sô: <input type="number" name="so" placeholder="305, 6, 28">
		<input type="submit" name="submit" value="mô tả">
		<?php
		if (isset($_POST['submit'])) {
		$number = $_POST['so'];
		switch ($number) {
			case 305:
				echo "$number: ba trăm lẻ năm";
				break;
			case 6:
				echo "$number: sáu";
				break;
			case 28:
				echo "$number: hai mươi tám";
				break;
			
			default:
				echo "nhập 1 trong 3 số: 305, 6, 28";
				break;
		}
		}
		?>

	</form>
</body>
</html>