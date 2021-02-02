<?php 
	$sinhvien =['Cam Van', 'Thao My', 'Bau Banh', 'Dac Long', 'The Cuong', 'Ba Giap', 'Van Trong', 'Huy Canh', 'Vang Thanh', 'Ngoc Truy']; 
	$table = '<table border = "1">';
	for($i=0; $i< count($sinhvien); $i++){//count dùng để đếm số phần tử của mảng
		$table .= '<tr>';
		$table .= '<td>' . $sinhvien[$i] . '</td>';
		$table .= '</tr>';
	}
	$table .= '</table>';
	echo $table;

	$sinhvien2 = [
		['fullname' => 'Tran Van Cam', 'age' =>20],
		['fullname' => 'Tran Van Cam2', 'age' =>21],
	];
 ?>