<?php 

// Hàm tính giá trị của phần tử thứ $n của dãy Fibonacci
function Fibonacci($n)
{
    if ($n <= 2){
        return 1;
    }
    else {
        return (Fibonacci($n - 2) + Fibonacci($n - 1));
    }
}
echo Fibonacci(15);

//Cách 2
/*$a = 15;
$i = 1;
$j = 1;
if($a>=3){
	for ($k =1; $k<=$a-2; $k++){
		$i = $i + $j;
		$j = $i - $j;
	}
}elseif ($a == 1 || $a == 2) {
	$i = 1;
}
echo $i;*/
?>