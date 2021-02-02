<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 21: Số áo còn lại</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 21: Số áo còn lại trong cửa hàng sau khi bán 1/6 số áo</h2>
		Tổng số áo: 
		<input type="number" name="soao" placeholder=" Tổng số áo" value="100">
		<input type="submit" name="submit" value="Còn lại">
		<?php
		if (isset($_POST['submit'])) {
			$soao = (int)$_POST['soao'];
			if ($soao == '' || $soao < 0) {
				echo "Vui lòng nhập tổng số áo";
			} else {
				echo "Số áo còn lại: " . (int)($soao*5/6);
			}
		}
		?>
	</form>
</body>
</html>