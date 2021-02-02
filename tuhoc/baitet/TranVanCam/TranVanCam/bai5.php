<?php

	$error = [];
	$dtb = 0;
	if (isset($_POST['submit'])) {
		$toan = (float)$_POST['toan'];
		$ly = (float)$_POST['ly'];
		$hoa = (float)$_POST['hoa'];
	
		if ($toan == '' || $ly == '' || $hoa == '' || $toan > 10 || $toan < 0 || $ly > 10 || $ly < 0 || $hoa > 10 || $hoa < 0) {
			$error[] = 'Vui lòng nhập đầy đủ, chính xác điểm 3 môn!';
		} else {
			$dtb = ($toan+$ly+$hoa)/3;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 5: Điểm trung bình 3 môn</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 5: Tính điểm trung bình 3 môn toán lý hóa vs 2 số lẻ thập phân</h2>
		Nhập điểm 3 môn: 
		<input type="text" name="toan" placeholder=" toán (đ)" size="5">
		<input type="text" name="ly" placeholder=" lý (đ)" size="5">
		<input type="text" name="hoa" placeholder=" hóa (đ)" size="5">
		<input type="submit" name="submit" value="Tính điểm TB">
		<?php if (count($error) > 0) :?>
			<?php for ($i=0; $i < count($error); $i++) :?>
				<p style="color:red"><?php echo $error[$i]; ?></p>
			<?php endfor; ?>
		<?php endif; ?>

		<div>
		Điểm trung bình: 
			<script type="text/javascript">
			document.write((<?php echo $dtb ?>).toFixed(2));
			</script>
		</div>
	</form>

</body>
</html>