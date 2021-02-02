<?php 
$mang = [1,3,5,6,6,3,6,5,10];
	$vitri = 0;
	for ($i=0; $i < count($mang) ; $i++) { 
		if ($mang[$i] == 6) {
			echo $i;
		}
	}
	echo '<br>';
	for ($i = 0; $i < count($mang) ; $i++) { 
		if($mang[$i] == 6){
			$vitri++;
		}
	}
	echo '<br>';
	echo $vitri;
	echo '<br>';
	if ($vitri >= 3) {
		echo "co vi tri thu 3";
	} else {
		echo "khong  co";
	}
 ?>