<?php 
	/*$a = 7;
	$b = 8;

	if ($a > $b){
		echo 'So a > So b';
	}

	if ($a < $b){
		echo 'So a < So b';
	}
	if ($a == $b){
		echo 'So a = So b';
	}
	echo '<br>';*/
	//cách 2
	/*if ($a > $b) {
		echo 'So a > So b';
	} elseif ($a < $b) {
		echo 'So a < So b';
	} else{
		echo 'So a = So b';
	}
	echo '<br>';*/


	//Switch case
	/*$day = 0;
	switch ($day) {
		case '0':
			# code...
			echo 'CN';
			break;
		case '1':
			# code...
			echo 'T2';
			break;
		case '2':
			# code...
			echo 'T3';
			break;
		case '3':
			# code...
			echo 'T4';
			break;
		case '4':
			# code...
			echo 'T5';
			break;
		case '5':
			# code...
			echo 'T6';
			break;

		default: 
			# code...
			echo "T7";
			break;
	}
	echo '<br>';*/

	/*------------Vòng lặp-----------------*/

	//For
	/*$n = 10;
	for($i = 0; $i <= $n; $i++) {
		echo $i;
	}

	//While
	$i = 0;
	while ($i < 100) {
		$i++;
		echo '<br>' . $i;
	}

	$t = 1;
	while($t <= 100){
		echo '<br>' . $t;
		$t++;
	}*/

	/*Vòng lặp vô hạn
	while (true){
		echo rand (1000, 3);
	}*/

	//in ra dãy số từ 1 đến 1000, tính tổng các số chẵn, số lẻ

	$d = 1;
	/*while ($d < 1000){
		$d++;
		echo '<br>' . $d;
	}*/
	/*$e = 1000;
	$tongchan = 0;
	$tongle = 0;
	for ($d; $d <= $e; $d++){
		if( $d%2 == 0){
			$tongchan = $tongchan + $d;
		} else{
			$tongle = $tongle + $d;
		}
	}
	echo 'Tong chan = ' . $tongchan;
	echo '<br>';
	echo 'Tong le = ' . $tongle;
	echo '<br>';


	$mang = ['1, 3, 5, 6, 5, 4, 9, 5'];
	$vtri = 0;
	for($i = 0; $i <= count($mang); $i++){

	}*/

	//Foreach
	$sinhvien = [
		['fullname' => 'Tran Van Cam', 'age' =>20],
		['fullname' => 'Tran Van Cam2', 'age' =>21],
	];
	foreach ($sinhvien as $sv) {
		echo $sv ['fullname'];
	}
	echo '<br>';


	//Function

	function message($msg = '')
	{
		echo 'Xin chao';
	}
	message('Cam');
	echo '<br>';


	$c = 10;
	function tinhTong ($a, $b)
	{

		return $a + $b;
	}

	echo tinhTong (5, 5) .'<br>';


	
	
 ?>