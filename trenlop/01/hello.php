<?php
	// Cau lenh in ra man hinh
	echo 'Hello, PHP1111E';
	print "Chao, Cam Van";

	// Khai bao bien
	$name = 'Tuan';

	// Noi chuoi
	echo 'Hello, ' . $name;

	//Hang
	define('SO_PI', 3.14);

	echo SO_PI;

	/*--------------Kieu du lieu--------------------*/

	//Chuoi - String
	$welcome = 'Chao lop PHP';
	var_dump($welcome);

	//So nguyen - Integer
	$age = 20;
	var_dump($age);

	//So thuc - Float - Double
	$totalAmount = 5000.55;
	var_dump($totalAmount);

	//Logic - Boolean
	$check = true;
	var_dump($check);

	//NULL
	$posts = NULL;
	var_dump($posts);

	$users = '';
	var_dump($users);

	//Mang - array
	$sinhVien = ['Cam Van', 'Thao My', 'Bau Banh', 'Dac Long', 'The Cuong', 'Ba Giap', 'Van Trong', 'Huy Canh', 'Van Thanh', 'Ngoc Truy'];
	var_dump($sinhVien);

	//Doi tuong - object
	$user = new stdClass();
	$user->name = 'Tuan Anh';
	$user->age = 19;
	var_dump($user);

	print_r($sinhVien);
	print_r($user);

	// Tong 2 so
	$a = 6;
	$b = 4;

	echo 'Tong 2 so a & b la: ' + ($a + $b);

	//Toan tu quan he: >, <, ==, >=, <=,!=, ===
	
	$soa = '6';
	$sob = 6;

	if ($soa === $sob) {
		echo 'So a = so b';
	} else {
		echo 'So a != so b';
	}
	

?>