<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 20: Bao nhiêu từ</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 20: Chuỗi có bao nhiêu từ</h2>
		Nhập một đoạn văn: 
		<input type="text" name="doan" placeholder=" Chuỗi ký tự" value="tôi là Trần Văn Cam. sinh năm 1996, giới tính nam, 22 tuổi">
		<input type="submit" name="submit" value="Đếm từ">
		<?php
		if (isset($_POST['submit'])) {
			if ($_POST['doan'] == '') {
				echo "Vui lòng nhập 1 chuỗi ký tự";
			}
			$chuoi = explode(' ', $_POST['doan']);
			echo '<br>' . $_POST['doan'] . '<br>';
			echo 'có ' . count($chuoi) . ' từ.';
		}
		?>
	</form>
</body>
</html>