<?php  
require('connect.php');
include('header.php');
?>
<?php
$errors = [];
$thongbao = '';

if (isset($_POST['submit'])){
	// Errors
	if (!isset($_POST['khoa_search']) || empty($_POST['khoa_search'])){
		$errors[] = 'Bạn vui lòng nhập mã khoa hoặc tên khoa để tìm kiếm';
	}
	if (count($errors) == 0){
		$khoa_search = trim($_POST['khoa_search']);

		// Tìm khoa trong CSDL
		$sql = "SELECT ten_khoa, makhoa FROM khoa WHERE makhoa = '{$khoa_search}' OR ten_khoa = '{$khoa_search}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_all(MYSQLI_ASSOC);

			if (count($result) > 0) {
				foreach ($result as $khoa) {
					$thongbao =  $khoa['ten_khoa'] . ' - ' . $khoa['makhoa'] ;
				}
			}else {
				$errors[] = 'Không có khoa bạn đang tìm kiếm';
			}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tìm kiếm khoa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="noidung" align="center">
		<h1>Tìm kiếm khoa</h1><br>

		<div class="message">
			<?php if (count($errors) > 0) :?>
				<?php for ($i= 0; $i < count($errors); $i++) :?>
					<p style="color:red"> <?php echo $errors[$i] ;?></p>
				<?php endfor ;?>
			<?php endif ;?>

		</div>	
		<div class="thongbao">
			<p  style="color:green;">
				<?php echo $thongbao ;?>
			</p>
		</div>

		<form action="" method="post">
			<div>
				<input type="text" name="khoa_search" value="<?php if (isset($_POST['khoa_search'])) echo $_POST['khoa_search'] ;?>">
			</div><br>
			
			<div>
				<input type="submit" name="submit" value="Submit">
			</div>
		</form>
	</div>

	
</body>
</html>