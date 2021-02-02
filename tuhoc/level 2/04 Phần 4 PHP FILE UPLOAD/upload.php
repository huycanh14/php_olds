<?php
/*echo '<pre>';
print_r($_FILES);
echo "</pre>";*/



//$fileUpload = $_FILES['file-upload'];
/*echo '<pre>';
print_r($fileUpload);
echo "</pre>";*/
/*if($fileUpload['name'] != null){
	$filename = $fileUpload['tmp_name']; //tên file muốn upload
	$destination = './files/' . $fileUpload['name'] ; //đường dẫn thực hiện muốn upload
	//move_uploaded_file($filename, $destination);
	if(copy($filename, $destination)){ //upload thành công
		echo 'Success';
	};

}*/
/*
	* $_FILE['file-upload']['name']: Tên file (file-upload) upload lên sever
	* $_FILE['file-upload']['size']: kích thước của file
	* $_FILE['file-upload']['type']: kiểu file
	* $_FILE['file-upload']['tmp_name']: tên thư mục tạm trên sever để chứ file
	* $_FILE['file-upload']['error']: thông báo lỗi khi upload file
*/

	// nên suer dụng cách sau để đăng ảnh bị trùng tên vẫn có thể uopload lên được

	
	function randomString($length = 5){
		
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
	}