<!-- Tính điểm trung bình cộng của 3 môn Toán, Lý, Hóa -->
<?php 
/*
	* Input:	toan, ly, hoa (float)
	* Process:	(toan + ly + hoa)/3, làm tròn đến số lẻ thập phân
	* Output:	(float)$tb
*/
$error = [];
$toan = $ly = $hoa = $tb = null;
if(isset($_POST['submit'])){
	/*if(!isset($_POST['toan']) || !isset($_POST['ly']) || !isset($_POST['hoa'])){
		echo 1;
	}
	*/
	if(!isset($_POST['toan']) || empty($_POST['toan'])){
		$error[] = 'Nhập điểm Toán';
	}else{
		if(is_string($_POST['toan'])){
			$error[] = 'Nhập điểm Toán bằng số';
		}else{
			$toan = (float)$_POST['toan'];
		}
	}

	if(!isset($_POST['ly']) || empty($_POST['ly'])){
		$error[] = 'Nhập điểm Lý';
	}else{
		$ly = (float)$_POST['ly'];
	}

	if(!isset($_POST['hoa']) || empty($_POST['hoa'])){
		$error[] = 'Nhập điểm Hóa';
	}else{
		$hoa = (float)$_POST['hoa'];
	}

	if(count($error) == 0){
		$tb = number_format(($toan + $ly + $hoa)/3, 2);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Điểm trung bình</title>
</head>
<body>
	<?php if (count($error) > 0) :?>
		<div class="messages">
			<?php for ($i = 0; $i < count($error); $i++) :?>
				<p><?php echo $error[$i];?></p>
			<?php endfor;?>
		</div>
	<?php endif;?>
	
	<form action="" method="post">
		<p>
			Toán: <input type="text" name="toan" value="<?php if(isset($_POST['toan'])) echo $_POST['toan'];?>">
		</p>
		<p>
			Lý: <input type="text" name="ly" value="<?php if(isset($_POST['ly'])) echo $_POST['ly'];?>">
		</p>
		<p>
			Hóa: <input type="text" name="hoa" value="<?php if(isset($_POST['hoa'])) echo $_POST['hoa'];?>">
		</p>
		<p>
			<input type="submit" name="submit" value="Điểm trung bình">
		</p>
		<h3>
			Điểm trung bình: <?php echo $tb ;?>
		</h3>
	</form>
</body>
</html>