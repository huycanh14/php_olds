<?php

	/*
		Yêu cầu:
			+ Chỉ cho phép upload có file có kích thước tối thiểu là 100Kb và kích thước tối đa là 5Mb
			+ Chỉ cho phép upload các tập tin có phần mở rộng là jpg, png, zip, mp3
	*/
	/*function randomString($length = 5){
		
		$arrCharacter = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
		$arrCharacter = implode($arrCharacter, '');
		$arrCharacter = str_shuffle($arrCharacter);

		$result = substr($arrCharacter, 0, $length);
		return $result;
	}

	$fileUpload = $_FILES['file-upload'];

	if($fileUpload['name'] != null){
		$filename = $fileUpload['tmp_name']; 
		$random = randomString(6);
		$destination = './files/' . $random . $fileUpload['name'] ; 
		if(copy($filename, $destination)){ 
			echo 'Success';
		};
	}*/

require_once 'functions.php';

$fileUpload = $_FILES['file-upload'];
/*echo '<pre>';
print_r($fileUpload);
echo "</pre>";*/

/*echo*/ $flagSize = checkSize($fileUpload['size'], 100 * 1024, 5 * 1024 * 1024);
/*echo*/ $flagExtension = checkExtension($fileUpload['name'], array('jpg', 'png', 'mp3', 'zip'));

if($flagSize == true && $flagExtension == true){
	move_uploaded_file($fileUpload['tmp_name'], './files/' . $fileUpload['name']);
}