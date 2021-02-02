<?php 
/**
 * Input: Nhap vao r (ban kinh cua duong tron), So PI: 3.14
 * Process: Tinh chu vi: CV=2*PI*r, Tinh dien tich: S = PI*r*r
 * Output: Chu vi (CV=2*PI*r), Dien tich: S = PI*r*r
 */
$error = [];
$p = $s = null;
$pi= 3.14;
if(isset($_POST['submit'])){
	if (!isset($_POST['bankinh']) || empty($_POST['bankinh'])) {
		$error[] = 'Vui long nhap R';
	}else{
		if(!is_numeric($_POST['bankinh'])){
			$error[] = 'Bán kính phải nhập bằng số';
		}else{
			$r = (float) $_POST['bankinh'];
		}
	}
	if (count($error) == 0) {
		$p = 2 * $pi * $r;
		$s = $pi * $r * $r;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bai 1</title>
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
		<input type="text" name="bankinh" placeholder="Nhập vào R" value="<?php if(isset($_POST['bankinh'])) echo $_POST['bankinh'];?>">
		<input type="submit" name="submit" value="Tính P và S">
		<br>
		Chu vi: <span><?php echo $p;?></span>
		<br>
		Diện tích: <span><?php echo $s;?></span>
	</form>
</body>
</html>