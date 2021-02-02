<?php  
session_start();
if(!isset($_SESSION['admin'])){
	header('Location: monhoc.php');
	exit;
}
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

		// Kiểm tra Mã Môn Học có bị trùng hay không
		$sql = "SELECT * FROM mon_hoc WHERE mamonhoc = '{$mamonhoc_new}' AND mamonhoc <> '{$mamonhoc}' LIMIT 1 ";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if (!is_null($result)){
			$errors[] = 'Mã môn học bị trùng';
		} else{
			// Sửa CSDL
			$sql = "UPDATE mon_hoc SET tenmonhoc = '{$tenmonhoc}' WHERE mamonhoc = '{$mamonhoc}' ";
			$query = $db->query($sql);
			if ($query){
				header('Location: monhoc.php');
			} else{
				$errors[] = "Không cập nhật được môn học";
			}
		}

	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa Môn Học</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section>
		<div id="user">
		Tên đăng nhập:
		<?php 
		if (isset($_SESSION['admin'])){
			echo $_SESSION['admin']['username'];
		}
		if (isset($_SESSION['user'])){
			echo $_SESSION['user']['username'];
		}
		?>
		<div class="logout" style="text-align: right;">
			<a href="logout.php">Đăng xuất</a>
		</div>
	</div>
	
		<div id="noidung" align="center">
			<h1>Sửa Môn Học</h1><br>

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
					<input type="submit" name="submit" value="Submit">
				</div>
			</form><!-- Complete the form -->
		</div>
	</section>

</body>
</html>