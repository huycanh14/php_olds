<?php  
$day = 0.1;
for($i = 1; $i <= 10000; $i++){
	$day = $day * 2;
	if($day == 1000){
		echo 'Số lần gấp đôi tờ giấy là: ' . $i;
	}
}
?>