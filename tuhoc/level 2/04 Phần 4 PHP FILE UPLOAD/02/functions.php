<?php 
 	//Check file size
 	function checkSize($size, $min, $max){
 		$flag = false;
 		if($size >= $min && $size <= $max) $flag = true;
 		return $flag;
 	}


 	// Check file extensions
 	function checkExtension($fileName, $arrExtension){
 		//echo $fileName;
 		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
 		/*echo "<pre>";
 		print_r($arrExtension);
 		echo "</pre>";*/
 		$flag = false;
 		if(in_array(strtolower($ext), $arrExtension) == true) $flag = true;
 		return $flag;
 	}