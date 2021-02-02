<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 14: Nhập số ra chữ</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 14: Nhập số ra chữ</h2>
		Nhập số: 
		<input type="number" name="so">
		<input type="submit" name="submit" value="In">
		<?php
		if (isset($_POST['submit'])) {
			$so = (int)$_POST['so'];
			if ($so == '') {
				echo "Vui lòng nhập vào 1 số";
			} else {
				switch ($so) {
					case 0:
						echo "không";
						break;
					case 1:
						echo "một";
						break;
					case 2:
						echo "hai";
						break;
					case 3:
						echo "ba";
						break;
					case 4:
						echo "bốn";
						break;
					case 5:
						echo "năm";
						break;
					case 6:
						echo "sáu";
						break;
					case 7:
						echo "bẩy";
						break;
					case 8:
						echo "tám";
						break;
					case 9:
						echo "chín";
						break;
					default:
						echo "Vui lòng nhập số từ 0 => 9";
						break;
				}
			}
		}
		?>
	</form>
</body>
</html>