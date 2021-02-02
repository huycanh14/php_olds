<?php
$path = '/files/abc.txt';

//Hiển thị tên tập tin (có luôn phần mở rộng)
 echo basename($path) . '<br>';

 //Hiển thị tên tập tin (ko có luôn phần mở rộng)
 echo basename($path, '.txt') . '<br>';
 //basename($path): trả về kết quả là tên của 1 đường dẫn $path

 //dirname($path): trả về tên thư mục tai đường dẫn $path
 echo dirname($path) . '<br>';

 //pathinfo($path, $options) trả về một mảng các thông tin từ đường dẫn $path
 /*
	+ dirname
	+ basename 
	+ extension 
 */

	$pathInfo = pathinfo($path);
	echo '<pre>';
	print_r($pathInfo);
	echo '<pre>';
	/*
		Array
		(
		    [dirname] => /files
		    [basename] => abc.txt
		    [extension] => txt
		    [filename] => abc
		)
	*/