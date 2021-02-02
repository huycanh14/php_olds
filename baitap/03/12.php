<?php  
/*
	* Input:	Nhập số tự nhiên n
	* Process:	$n = (float)$_POST['n']
				for($i= 1; $i <= $n; $i++){
					$gt = $gt*$i;
				}
	* Output:	Giai thừa: $gt;
*/
$error = [];
$gt = $n = null;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || $_POST['n'] ==''){
		$error[] = 'Vui lòng nhập n';
	}

	if(count($error) == 0){
		$gt = 1;
		$n = (float)$_POST['n'];
		for($i = 1; $i <= $n; $i++){
			$gt *= $i;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 12</title>
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
		<input type="text" name="n" placeholder="Nhập n">
		<input type="submit" name="submit" value="Tính giai thừa">
		<?php echo $gt ;?>
	</form>
</body>
</html>