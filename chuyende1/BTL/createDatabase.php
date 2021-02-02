<?php
	$con = mysqli_connect("localhost","root","");
	$sql_create = "create database chuyende1";
	if(mysqli_query($con,$sql_create)){
		echo "Tạo thành công";
	}else{
		echo mysqli_error($con);
	}

?>