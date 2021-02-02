<?php 
	$a = 1;
	$b = 2;
	$c = 5;
	echo 'Phương trình bậc 2:' .'<br>';
	echo $a . '. x<sup>2</sup> + ' . $b . '.x + ' . $c . ' = 0';
	echo '<br>';
	$delta = $b * $b - 4*$a*$c;
	echo 'delta = ' . $delta;
	echo '<br>';

	if ($delta > 0){
		echo 'Phương trình có 2 nghiệm phân biệt: ' .'<br>';
		echo 'X<sub>1</sub> = ' . (-$b + sqrt($delta))/(2*$a) . '<br>';
		echo 'X<sub>2</sub> = ' . (-$b - sqrt($delta))/(2*$a) . '<br>';
	} elseif($delta == 0){
		echo 'Phương trình có nghiệm kép: ';
		echo 'X = ' . -$b/(2*$a);
	} else{
		echo 'Phương trình vô nghiệm.';
	}
 ?>