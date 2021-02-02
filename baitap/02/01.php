<?php  
$thang = 1;
switch ($thang) {
	case '1':
	case '3':
	case '5':
	case '7':
	case '8':
	case '10':
	case '12':
	echo 'Có 31 ngày';
	break;
	case '1':
	case '6':
	case '9':
	case '11':
	echo 'Có 30 ngày';
	break;

	case '2':
	echo 'Có 28 hoặc 29 ngày';
	break;
	default:
	echo 'Số tháng sai';
	break;
}
?>