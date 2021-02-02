<?php 
	//câu lệnh in ra màn hình
	echo 'Hello, PHP111E';
	print "Chao, Cam Van";

	//khai báo biến
	$name = 'Canh'; //kiểu: string. dữ liệu nàm trong dấu ngoặc kép
	$nam_sinh = '1998';

	//Nối chuỗi
	echo "Hello, " . $name . "." . " Sinh năm " . $nam_sinh;

	//hằng
	define('SO_PI', 3.14); //name: tên, viết hoa hết. value: giá trị
	echo SO_PI; //in hằng ra màn hình

	/*---------Kiểu dữ liệu----------*/
	echo "<br>";
	//Chuỗi
	$welcome = 'Chao lop PHP';
	var_dump($welcome);
	echo "<br>";

	//Số nguyên
	$age = 20;
	var_dump($age);

	//Số thực - float - double
	$totalAmoust = 5000.55;
	var_dump($totalAmoust);

	//Logic - Boolean - đúng sai
	$check = true;
	var_dump($check);

	//NULL
	$post = NULL; //viết là NULL hoặc là null đều đk
	var_dump($post);

	$users = '';
	var_dump($users);

	//Mảng - array
	//$sinhvien = new array(); ko đk dùng
	$sinhvien =['Cam Van', 'Thao My', 'Bau Banh', 'Dac Long', 'The Cuong', 'Ba Giap', 'Van Trong', 'Huy Canh', 'Vang Thanh', 'Ngoc Truy'];  //mảng tuần tự    
	//$sinhvien = array() ít dùng hơn, dùng đời cao hơn
	var_dump($sinhvien);
	
	//Đối tượng - object
	$user = new stdClass();
	$user->name = 'Tuan Anh';
	$user->age = 19;
	var_dump($user);

	print_r($sinhvien); //print_r chuyên in mảng và object
	print_r($user);


	$so_a = 8;
	echo "Số a = " . $so_a;
	echo "<br>";

	$so_b = 4;
	echo "So b = " . $so_b;
	echo "<br>";

	$tich = $so_a * $so_b;
	echo "Tích 2 số là = " .$tich;
	echo 'Tong 2 so a và b là: ' . ($so_a + $so_b);
	echo "<br>";

	$thuong = $so_a / $so_b;
	echo  "Thương 2 số là = " .$thuong;
	echo "<br>";

	$tong = $so_a + $so_b;
	echo "Tổng hai số a và b = " . $tong;
	echo "<br>";

	$hieu = $so_a * $so_b;
	echo "Hiệu 2 số a và b = " . $hieu;
	echo "<br>";

	$phan_du = $so_a % $so_b;
	echo  "Phần dư 2 số a và b = " . $phan_du;
	echo "<br>"; //cách xuống dòng 

	//toán tử quan hệ: <, >, ==, <=, >= ,!=, === toán tử đồng nhất: đồng nhất về kiểu dữ liệu và giá trị
	$soa = '6';
	$sob = 6;

	if($soa == $sob){
		echo 'so a = so b';
	}
	else{
		echo 'So a != so b';
	}
	echo "<br>";
	if($soa === $sob){
		echo 'so a = so b';
	}
	else{
		echo 'So a != so b';
	}
 ?>