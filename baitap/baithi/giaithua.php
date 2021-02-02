<?php  
error_reporting(1); //Tắt báo lỗi
$errors = [];
$ketqua = null;
if (isset($_POST['submit'])){
	if (!isset($_POST['giaithua']) || empty($_POST['giaithua'])){
		$errors[] = 'Bạn chưa nhập giai thừa';
	}else {
		$giaithua = trim($_POST['giaithua']);
		if (!is_numeric($giaithua)){
			$errors[] = " n phải là số";
		} else{
			$ketqua = 1;
			for($i = 1; $i <= $giaithua; $i++){
			$ketqua = $ketqua * $i;
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tính gia thừa</title>
</head>
<body>
	<div class="content">
		<h2>Tính giai thừa n</h2>

		<div class="message">
			<!-- Thông báo lỗi  -->
			<?php 
				if (count($errors) > 0) :
					for ($i = 0; $i < count($errors); $i++) :
			?>
				<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
				<?php 
					endfor;
				endif ;
			?><!-- end errors -->
		</div>

		<form action="" method="post">
			<p>
				Nhập n:
				<input type="text" name="giaithua" placeholder="n" value="<?php if (isset($_POST['giaithua'])) echo $_POST['giaithua'] ;?>">
			</p>
			<p>
				Kết quả:
				<input type="text" name="ketqua" readonly="readonly" readonly="readonly" value="<?php echo $ketqua ;?>">
			</p>
			<input type="submit" name="submit" value="Tính">
		</form>
	</div>
</body>
</html>