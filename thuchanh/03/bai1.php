<?php 
/**
* Input: Nhap vao r (ban kinh cua duong tron), so PI = 3.14
* Process: Tính chi vi, Tính dien tich
* Ouput: Chu vi (Cv = 2*PI*r), Dien tich (S = PI*r*r)
*/
$error = []; 
$cv = $dt = null; 
$pi = 3.14;
if (isset($_POST['submit'])){
	if (!isset($_POST['r']) || $_POST['r'] == ''){
		$error [] = 'Vui long nhap R ';
	}
	if (count($error) == 0){
		$cv = 2 * $pi * (float)$_POST['r']; 
		$dt =  $pi * (float)$_POST['r'] * (float)$_POST['r']; 
	}

} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 1</title>
</head>
<body>
	<?php if (count($error) > 0 ) : ?>
	<div class="messages">
		<?php for ($i = 0; $i < count($error); $i++) :?>
			<p><?php echo $error[$i] ;?></p>
		<?php endfor ?>

	</div>
	<?php endif;?>

	<form action="" method="post">
		<input type="text" name="r" placeholder="Nhap vao r">
		<input type="submit" name="submit" value="Tinh CV & DT">
		CV: <?php echo $cv ;?>
		DT: <?php echo $dt ;?>
	</form>
</body>
</html>