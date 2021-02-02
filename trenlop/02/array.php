<?php 

$sinhVien = ['Cam Van', 'Thao My', 'Bau Banh', 'Dac Long', 'The Cuong', 'Ba Giap', 'Van Trong', 'Huy Canh', 'Van Thanh', 'Ngoc Truy'];

$table = '<table border="1">';
for ($i = 0;$i < count($sinhVien); $i++) {
	$table .= '<tr>';
	$table .= '<td>' . $sinhVien[$i] . '</td>';
	$table .= '</tr>';
}
$table .= '</table>';
echo $table;
echo '<br>';

$sinhVien2 = [
	['fullname' => 'Tran Van Cam', 'age' => 20],
	['fullname' => 'Tran Van Cam 2', 'age' => 21],
];

foreach ($sinhVien2 as $sv) {
	echo $sv['fullname'] . '-' . $sv['age'];
}
echo '<br>';
for ($i = 0; $i < count($sinhVien2); $i++) {
	echo $sinhVien2[$i]['fullname'] . '-' . $sinhVien2[$i]['age']; 
}