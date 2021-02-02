<?php  
require('connect.php');
include('header.php');
?>
<?php
$errors = [];

$mamonhoc = $_GET["mamonhoc"];
$sql = "SELECT * FROM mon_hoc WHERE mamonhoc = '{$mamonhoc}' LIMIT 1";
$query = $db->query($sql);
$monhoc = $query->fetch_assoc();

if (is_null($monhoc)){
	header('Location: monhoc.php');
}


if (isset($_POST['submit'])){
	// Errors
	if (!isset($_POST["mamonhoc"]) || empty($_POST["mamonhoc"])){
		$errors[] = "Mã môn học chưa có nhập";
	}

	if (!isset($_POST["tenmonhoc"]) || empty($_POST["tenmonhoc"])){
		$errors[] = "Tên môn học chưa có nhập";
	}

	// No Errors
	if (count($errors) == 0){
		$mamonhoc_new = trim( $_POST['mamonhoc']); 
		$tenmonhoc = trim( $_POST['tenmonhoc']);

	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Xóa Môn Học</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section>
		<div id="noidung" align="center">
			<h1>Xóa Môn Học</h1><br>

			<div class="message"><!-- message -->
				<!-- Errors Message -->
				<?php if (count($errors) > 0) :?>
					<?php for ($i = 0; $i < count($errors); $i++) :?>
						<p class="errors" style="color: red;"> <?php echo $errors[$i];?> </p>
					<?php endfor;?>
				<?php endif ;?><!-- end errors -->

			</div>

			<!-- From thêm môn học -->
			<form action="" method="post">
				<div>
					Mã môn học <span style="color: red;">(*)</span>: 
					<input type="text" name="mamonhoc" readonly="readonly" value="<?php if (isset($_POST["mamonhoc"])) echo $_POST["mamonhoc"]; else echo $monhoc['mamonhoc'] ;?>">
				</div><br>
				<div>
					Tên môn học <span style="color: red;">(*)</span>: 
					<input type="text" name="tenmonhoc" value="<?php if (isset($_POST["tenmonhoc"])) echo $_POST["tenmonhoc"]; else echo $monhoc['tenmonhoc'] ;?>">
				</div><br>
				<div>
					<input type="submit" name="submit" value="Delete">
				</div>
			</form><!-- Complete the form -->
		</div>
	</section>

</body>
</html>