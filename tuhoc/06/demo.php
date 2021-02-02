

	<?php
//png, gif, jpg
//Chi cho phep upload file co kich thuoc toi da 5mb
$allowedExtention = ['png', 'gif', 'pdf', 'doc', 'jpg', 'txt'];
$targetDir = "uploads/";
$targetFile ="";
$error = [];
if (isset($_POST["submit"])) {
    $targetFile = $targetDir . $_FILES["file"]["name"];
    $imageFileType = @end(explode('.', $_FILES["file"]["name"]));

    if (!in_array($imageFileType, $allowedExtention)) {
        $error[] = 'File này không được phép tải lên.';
    }


    if (count($error) == 0) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    echo "<br>";
    echo "<a href='tracnghiem.php?image=".$targetFile."'>Lam bai thi</a>";
   
    

}
?>
<!DOCTYPE html>
<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload Image" name="submit">
    


   
    
</form>
</body>
</html>
