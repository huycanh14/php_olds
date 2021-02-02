<?php

//input: độ dài cạnh a, b, c của tam giác
//process:
	//là tam giác khi tổng 2 cạnh bất kỳ phải lớn hơn cạnh còn lại.
	//chu vi cv = a+b+c, diện tích dt = sqrt(p*(p-a)*(p-b)*(p-c)) trong đó p = 0,5cv
//output: chu vi cv, diện tích dt, thông báo

$error = [];
$dt = $cv = 0;
if (isset($_GET['submit'])) {
	$a = (float)$_GET['canh_a'];
	$b = (float)$_GET['canh_b'];
	$c = (float)$_GET['canh_c'];

	if ($a == '' || $b == '' || $c == '') {
		$error[] = 'Vui lòng nhập đầy đủ 3 cạnh';
	} elseif ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
		$error[] = '3 cạnh vừa nhập không phải của 1 tam giác';
	}

	if (count($error) == 0) {
		$cv = $a+$b+$c;
		$p = $cv/2;
		$dt = sqrt($p*($p-$a)*($p-$b)*($p-$c));
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Bài 2: Chu vi, diện tích tam giác</title>
	<style type="text/css">
		.thongbao{color: red;}
	</style>
</head>
<body>
	<form action="" method="GET">
		<h2>Bài 2: Tính chu vi, diện tích tam giác:</h2>
		<input type="text" name="canh_a" placeholder=" độ dài cạnh a">
		<input type="text" name="canh_b" placeholder=" độ dài cạnh b">
		<input type="text" name="canh_c" placeholder=" độ dài cạnh c">
		<input type="submit" name="submit" value="Tính CV,DT">
		<div>
			<?php if (count($error) > 0) :?>
				<?php for ($i=0; $i < count($error); $i++) :?>
					<p class="thongbao"><?php echo $error[$i]; ?></p>
				<?php endfor; ?>
			<?php endif; ?>
			Chu vi: <?php echo $cv; ?> (m)<br>
			Diện tích: <?php echo $dt; ?> (m<sup>2</sup>)
		</div>
	</form>
</body>
</html>