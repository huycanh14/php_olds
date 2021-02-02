<?php
	$con = mysqli_connect("localhost","root","","chuyende1");
	$tbl = "food";
	$sql_createtbl = "create table if not exists $tbl(id int(11) primary key, name varchar(100), img text, address varchar(250), lat float(10,6), lon float(10,6), type varchar(30), descr text)";
	if (mysqli_query($con, $sql_createtbl)) {
		echo "Tạo thành công";
	}else{
		echo mysqli_error($con);
	}
?>