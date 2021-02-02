<?php  
/*
	* file_exist($fileName) để kiểm tra sự tồn tại của tập tin, thư mục
	+ $fileName: tên (đường dẫn) tập tin, thư mục cần kiểm tra
	+ Kết quả trả về true => tồn tại
	+ kết quả trả về fale => ko tồn tai
*/
	// $filename = 'files';
	//$filename = 'file';
	//$filename = "files/abc.txt";
	$filename = "files/abc.tx";
	if(file_exists($filename)){
		echo 'Ton tai';
	} else{
		echo 'Khong ton tai';
	}

?>