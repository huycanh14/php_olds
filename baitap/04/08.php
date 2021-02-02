<?php  
/**
	* Input:	Nhập số tự nhiên n, x
	* Process:	$n = (float)$_POST['n']
				$x = (float)$_POST['x']
				for($i=0; $i< $n; $i++){
					a) $a += pow($x, $i)
					b) $b += pow(-1, $i) * pow($x, $i)
					c) $c1 = $c1* $x;
					   $c2 = $c2 * $i;
					   $c += $c1/$c2;
				}
	* Output:	a) S = $a += pow($x, $i)
				b) S = $b += pow(-1, $i) * pow($x, $i)
				c) S = $c += $c1/$c2;
*/
$error = [];
$n = $x = $b = $c = null;
$a = 0;;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || empty($_POST['n'])){
		$error[] = ' Vui lòng nhập n';
	}else{
		if(!is_numeric($_POST['n'])){
			$error[] = 'n phải là số';
		}
	}

	if(!isset($_POST['x']) || empty($_POST['x'])){
		$error[] = ' Vui lòng nhập x';
	}else{
		if(!is_numeric($_POST['x'])){
			$error[] = 'x phải là số';
		}
	}

	if((float)$_POST['n'] <= 0){
		$error[] = 'n phải là số nguyên dương';
	}

	if(count($error) == 0){
		$a1 = $b1 = $c = 0;
		$c1 = $c2 = 1;
		$n = (float)$_POST['n'];
		$x = (float)$_POST['x'];
		for($i = 0; $i <= $n; $i++){
			//Câu a
			$a1 = pow($x, $i);
			$a = $a + $a1;

			//Câu b
			$b1 = pow(-1, $i) * pow($x, $i);
			$b = $b + $b1;

			//Câu c
			$c1 = $c1* $x;
			$c2 = $c2 * $i;
			$c = $c + $c1/$c2;
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bai 08</title>
</head>
<body>
	<?php if(count($error) > 0 ) :?>
		<?php for($i = 0; $i < count($error); $i++) :?>
			<p><?php echo $error[$i] ;?></p>
		<?php endfor ;?>
	<?php endif ;?>

	<form action="" method="post">
		<p>
			<input type="text" name="n" placeholder="Nhập n">
		</p>
		<p>
			<input type="text" name="x" placeholder="Nhập x">
		</p>
		<p>
			<input type="submit" name="submit" value="Tính">
		</p>
		<p>
			Với x = <?php echo $x ;?> và n = <?php echo $n ;?>
		</p>
		<p>
			a) S = 1 + x + x<sup>2</sup> + x<sup>3</sup> + ... + x<sup>n</sup> = <?php echo $a ;?>
		</p>
		<p>
			b) S = 1 - x + x<sup>2</sup> - x<sup>3</sup> + ... + (-1)<sup>n</sup>x<sup>n</sup> = <?php echo $b ;?>
		</p>
		<p>
			c) S = 1 + x/1! + x<sup>2</sup>/2! + x<sup>3</sup>/3! + ... + x<sup>n</sup>/n! = <?php echo $c ;?>
		</p>
	</form>
</body>
</html>