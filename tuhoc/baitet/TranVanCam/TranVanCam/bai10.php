<?php
	$number = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
	$demle = $demchan = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 10: xử lý 1 mảng số</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 10: Xử lý 1 mảng số tự nhiên</h2>
		Mảng: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]
		<div><br>
			<?php
			for ($i=0; $i < count($number); $i++) { 
			if ($number[$i] % 2 == 1) {
				++$demle;
				echo $number[$i] . ', ';
			}}
			echo "có $demle số lẻ.";?>
		</div>
		<div><br>
			<?php
			for ($i=0; $i < count($number); $i++) { 
			if ($number[$i] % 2 == 0) {
				++$demchan;
				echo $number[$i] . ', ';
			}}
			echo "có $demchan số chẵn."; ?>
		</div>
		<div><br>
			<?php
			echo "Số nguyên tố: 1, 2, 3";
			$kngt = [];
			for ($i=0; $i < count($number); $i++) { 
				for ($j=2;$j <= ($number[$i]/2); $j++) { 
					if ($number[$i] % $j == 0) {
						$kngt[] = $number[$i];
						break;
					} elseif ($j == ($number[$i]/2) || $j == ($number[$i]/2-0.5)) {
						echo ', ' . $number[$i];
					}
				}
			}
			echo "<br><br>Số không nguyên tố: ";
			for ($i=0; $i < count($kngt); $i++) { 
				echo "$kngt[$i], ";
			}
			?>
		</div>
	</form>
</body>
</html>