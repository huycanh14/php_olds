<?php 
/*
	* Input:	dân số hiện nay: $n = 6000000
				tỷ lệ tăng hàng năm: 1,8%
				số năm: 10 năm
	* Process:	for($i = 1; $i<= 9; $i++){
					$tang = $n * 1,8/100
					$n += $tang;
				}
	* Output:	dân số sau 10 năm: $n
*/
$n = 6000000;
$tang = null;
for($i = 1; $i<= 9; $i++){
	$tang = $n * 1.8 /100;
	$n += $tang;
}
echo $n;
?>