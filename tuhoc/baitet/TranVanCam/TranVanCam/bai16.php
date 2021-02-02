<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 16: Tìm a,b,c,d</title>
	<style type="text/css">
		td{border:1px black solid; padding:10px;text-align:center;}
	</style>
</head>
<body>
	<form action="" method="POST">
		<h2>Tìm a,b,c,d khác nhau thỏa mãn a.d<sup>2</sup>=b.c<sup>3</sup></h2>
		<table>
			<tr><td>a</td><td>b</td><td>c</td><td>d</td><td>a*d*d=b*c*c*c</td></tr>
		<?php
		for ($i=1; $i <= 10; $i++) { 
			$d = $i;
		for ($j=0; $j <= 10; $j++) { 
			$c = $j;
		for ($y=0; $y <= 10; $y++) { 
			$b = $y;
			$a = $b*$c*$c*$c/($d*$d);
			if (is_int($a) && $a>=0 && $a<=10 && $a!=$b && $a!=$c && $a!=$d && $b!=$c && $b!=$d && $c!=$d) {
				echo "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$a.$d.$d = $b.$c.$c.$c</td></tr>";
			}
		}
		}
		}
		?>
		</table>
	</form>
</body>
</html>