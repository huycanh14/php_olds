<?php 
//kiểm tra phải đăng nhập mới có thể upload ảnh 
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
}

//khi đã đăng nhập
$allowedExtention = ['png', 'gif', 'pdf', 'doc', 'jpg', 'txt'];
$targetDir = "uploads/";
$error = [];
$flagSize = [];
$chuyen ="";
if (isset($_POST["submit"])) {
    $targetFile = $targetDir . $_FILES["file"]["name"];
    $imageFileType = @end(explode('.', $_FILES["file"]["name"]));

    if (!in_array($imageFileType, $allowedExtention)) {
        $error[] = 'File này không được phép tải lên.';
    }


    //file có kích thước tối thiểu là 100Kb và kích thước tối đa là 5Mb
    function checkSize($size, $min, $max){
 		$flag = false;
 		if($size >= $min && $size <= $max) $flag = true;
 		return $flag;
 	}

    if($flagSize = !checkSize($_FILES["file"]['size'], 100 * 1024, 5 * 1024 * 1024)){
    	$error[] = 'File này phải có kích thước tối thiểu là 100Kb và kích thước tối đa là 5Mb';
    }

    //thực hiện upload nếu không có lỗi
    if (count($error) == 0) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
           // echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        	$chuyen = "<a href='baitap.php?image=".$targetFile."'>Lam bai thi</a>";
        	// header('Location: baitap.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#content{
			padding-left: 420px;
			padding-right: 420px;
			padding-top: 160px;
		}
	</style>
	<title>Upload ảnh</title>
</head>
<body>
	<div id="content">
		<marquee behavior="alternate">
			<h1>Upload ảnh</h1>
		</marquee>
		<?php echo $chuyen ?>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="file">
			<input type="submit" name="submit" value="Up Load">
			<a href="logout.php">Log out</a>		
		</form>	
	</div>
</body>
</html>