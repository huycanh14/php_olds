<?php  
/*
	* filesize($fileName): trả về dung lượng của $filename (đơn vị bytes)
	* is_readable($fileName) kiểm tra $filename có được quyền đọc hay khôn
	* is_writeabl($fileName) Kiểm tra $filename có được quyền ghi hay không
	* is_executable($fileName) kiểm tra $filenam có quyền thực thi hay không
*/
	//$filename = "files/abc.txt";
	$filename = "files/Bai_8_Van_de_15.mp4";
	

	$size = filesize($filename);
	// echo $size;

	/*function convertSize($size){
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
		$length = count($units);
		for($i = 0; $i < $length; $i++){
			if($size > 1024){
				$size = $size / 1024;
			} else{
				$units = $units[$i];
				break;
			}
		}
		return $size . ' ' . $units;
	}

	echo convertSize($size);
	*/
	// echo convertSize($size, 2,  );

	function convertSize($size, $totalDigit = 2, $ditance = ' '){ //$totalDigit lấy sau dấu thập phân mấy chữ số, $ditance khoảng cách chữ và số
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
		$length = count($units);
		for($i = 0; $i < $length; $i++){
			if($size > 1024){
				$size = $size / 1024;
			} else{
				$units = $units[$i];
				break;
			}
		}

		$result = round($size, $totalDigit) . $ditance . $units;
		return $result;
	}

	echo convertSize($size);

?>
<!-- 
	Mối liên hệ giữa các đơn vị:
		1KB = 1024 B
		1MB = 1024 KB
		1GB = 1024 MB
		1TB = 1024 GB
 -->