<?php 
/**
 * Input: Nhap vao r (ban kinh cua duong tron), So PI: 3.14
 * Process: Tinh chu vi: CV=2*PI*r, Tinh dien tich: S = PI*r*r
 * Output: Chu vi (CV=2*PI*r), Dien tich: S = PI*r*r
 */
$error = [];
$cv = $dt = NULL;

if (isset($_POST['submit'])) {
	if (!isset($_POST['r']) || $_POST['r'] == '') {
		$error[] = 'Vui long nhap R';
	}
	
	if (count($error) == 0) {
		$cv = 2 * 3.14 * (float) $_POST['r'];
		$dt = 3.14 * (float) $_POST['r'] * (float) $_POST['r'];
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
	<form action="" method="POST">
		<input type="text" name="r" placeholder="Nhap vao R">
		<input type="submit" name="submit" value="Tinh CV & DT">
		CV: <span><?php echo $cv;?></span>
		DT: <span><?php echo $dt;?></span>
	</form>
</body>
</html>