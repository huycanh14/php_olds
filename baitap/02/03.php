<?php 	
$arrayNumber = [1, 2, 5, 6, 7, 3, 2, 5, 7, 8, 5, 10, 5, 11, 5, 3, 5, 20];
$vitri = 0;
$xuathien = 0;
$vtricuoi = 0;
for ($i=0; $i < count($arrayNumber) ; $i++) { 
		if ($arrayNumber[$i] == 5) {
			$vitri = $vitri + 1; 
			$xuathien = $xuathien + 1; 
			if($vitri == 1){
				echo 'Số 5 xuất hiện lần đầu ở vị trí: [' . $i .']';
				echo '<br>';
			}
			if($vitri ==3){
				echo 'Số 5 xuất hiện lần 3 ở vị trí: [' . $i .']';
				echo '<br>';
			}else{
				$vtricuoi = $i;
			}	
		}
	}
	echo 'Số 5 lần cuối xuất hiện ở vị trí: [' . $vtricuoi .']' . '<br>';
	echo 'Tổng giá trị dựa trên số lần số 5 xuất hiện: 5 * ' . $xuathien .  ' = ' . 5*$xuathien;


 ?>