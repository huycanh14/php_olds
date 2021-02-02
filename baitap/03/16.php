<?php  
echo ' Số a, b, c, d khác nhau  trong khoảng từ 0 đến 10 thỏa mãn a * d * d = b * c * c * c là: ' . '<br>';
$a = $b =$c = $d = null;
for($a = 1; $a <= 10; $a++)
for($b = 1; $b <= 10; $b++)		
for($c = 1; $c <= 10; $c++)
for($d = 1; $d <= 10; $d++)
if($a * $d * $d == $b * $c * $c * $c){
	if($a == $b){
		continue;
	}elseif ($a == $c) {
		continue;
	}elseif ($a == $d) {
		continue;
	}elseif ($b == $c) {
		continue;
	}elseif ($b == $d) {
		continue;
	}elseif ($c == $d) {
		continue;
	}else{
		echo 'a = ' . $a .' ; ';
		echo 'b = ' . $b .' ; ';
		echo 'c = ' . $c .' ; ';
		echo 'd = ' . $d .' ; ';
		echo '<hr>';	
	}
}
?>
