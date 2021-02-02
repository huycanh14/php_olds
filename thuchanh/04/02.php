<!-- Tính điểm trung bình cộng của 3 môn Toán, Lý, Hóa -->
<?php 
/*
	* Input: 	Điểm môn Toán, Lý, Hóa
	* Process:	tính trung bình 3 môn
	* Output:	Trung bình Tb = (Toán + Lý + Hóa)/3
*/
$error = [];
$math = $physical = $chemistry = $tb = null;
if(isset($_POST['submit'])){

	// Kiểm tra lỗi

	if(!isset($_POST['math']) || $_POST['math'] == ''){
		$error[] = 'Bạn chưa nhập điểm môn Toán';
	}

	if(!isset($_POST['physical']) || $_POST['physical'] == ''){
		$error[] = 'Bạn chưa nhập điểm môn Lý';
	}

	if(!isset($_POST['chemistry']) || $_POST['chemistry'] == ''){
		$error[] = 'Bạn chưa nhập điểm môn Hóa';
	}

	// Thực hiện phép tính

	if(count($error) == 0){
		$math = (float)$_POST['math'];
		$physical = (float)$_POST['physical'];
		$chemistry = (float)$_POST['chemistry'];
		$tb = ($math + $physical + $chemistry)/3;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Điểm trung bình</title>
</head>
<body>
	<?php if(count($error) > 0) : ?>
		<?php for($i = 0; $i < count($error); $i++): ?>
			<p><?php echo $error[$i] ;?></p>
		<?php endfor ;?>
	<?php endif ;?>
	<form action="" method="post">
		<p>
			Toán: <input type="text" name="math" placeholder="Điểm môn Toán">
		</p>
		<p>
			Lý: <input type="text" name="physical" placeholder="Điểm môn Lý">
		</p>
		<p>
			Hóa: <input type="text" name="chemistry" placeholder="Điểm môn Hóa">
		</p>
		<p>
			<input type="submit" name="submit" value="Điểm trung bình">
		</p>
		<p>
			Điểm trung bình cộng: <?php echo round($tb, 2) ;?>
		</p>
	</form>
</body>
</html>