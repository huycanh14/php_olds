<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 15: Tính dân số</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 15: tính dân số sau 10 năm</h2>
		Dân số: <input type="number" name="danso" value="6000000">
		Tỉ lệ tăng hằng năm: <input type="number" name="tile" value="1.8">
		<input type="submit" name="submit" value="Tính">
		<?php
		if (isset($_POST['submit'])) {
			$danso = $_POST['danso'];
			for ($i=0; $i < 10; $i++) { 
				$danso += $danso*1.8/100;
			}
		echo "Dân số sau 10 năm: $danso";
		}
		?>
	</form>
</body>
</html>