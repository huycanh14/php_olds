<?php
	$a = 7;
	$b = 6;

	if ($a > $b) {
		echo 'So a > so b';
	}

	if ($a < $b) {
		echo 'So a < so b';
	}

	if ($a == $b) {
		echo 'So a = so b';
	}

	//Cach 2
	if ($a > $b) {
		echo 'So a > so b';
	} elseif ($a < $b) {
		echo 'So a < so b';
	} else {
		echo 'So a = so b';
	}

	// Switch case
	$day = 5;
	switch ($day) {
		case 0:
			echo 'CN';
			break;

		case 1:
			echo 'T2';
			break;

		case 2:
			echo 'T3';
			break;

		case 3:
			echo 'T4';
			break;

		case 4:
			echo 'T5';
			break;

		case 5:
			echo 'T6';
			break;

		default:
			echo 'T7';
			break;
	}

	/*----Vong lap----*/
	// FOR
	$n = 10;
	for ($i = 0; $i <= $n; $i++) {
		echo $i;
	}

	//While
	$i = 0;
	while ($i < 100) {
		$i++;
		echo '<br>' . $i;
	}

	$t = 1;
	while ($t <= 100) {
		echo '<br>' . $t;
		$t++;
	}
	//Vong lap vo han
	/*while (true) {
		echo rand(1000, 3);
	}*/

	$sinhvien = [
		['fullname' => 'Tran Van Cam', 'age' => 20],
		['fullname' => 'Tran Van Cam 2', 'age' => 21],
	];

	foreach ($sinhvien as $sv) {
		echo $sv['fullname'];
	}

	//Function
	
	function message()
	{
		echo '<br> Xin chao Cam';
	}

	message('Cam');

	echo '<br>';

	function message2($name = '')
	{
		echo '<br> Xin chao, ' . $name;
	}

	message2('Cam');
	echo '<br>';

	$c = 10;

	function tinhTong($a1, $b1)
	{
		global $c;

		return $a1 + $b1 + $c;
	}

	echo tinhTong(5, 5);
	echo '<br>';

?>