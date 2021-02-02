<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 19: Tách chuỗi</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 19: Tách chuỗi ra từ</h2>
		Nhập 1 câu: 
		<input type="text" name="cau" placeholder="Ví dụ: Lập trình c" value="Lập trình c">
		<input type="submit" name="submit" value="in ngay">
		<div>
		<?php
		if (isset($_POST['submit'])) {
			if ($_POST['cau'] == '') {
				echo "Vui lòng nhập một câu!";
			}
			$cau = explode(' ', $_POST['cau']);
			for ($i=0; $i < count($cau); $i++) { 
				echo $cau[$i] . '<br>';
			}
		}
		?>
		</div>
	</form>
</body>
</html>