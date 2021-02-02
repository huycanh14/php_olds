<?php  
/*
	* filetype($fileName) trả về kiểu $filename (tập tin hoặc thư mục). Trả về 1 trong 2 giá trị
		+ file: nó là file
		+ dir: nó là 1 thư mục
	
*/
	 $filename = 'files';
	//$filename = 'file';
	//$filename = "files/abc.txt";
	// $filename = "files/abc.txt";
	$type = filetype($filename);
	echo $type;

?>
