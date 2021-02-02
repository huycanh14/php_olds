<?php  
/**
	* Input:	Nhập số nguyên n
	* Process:	while ($n > 0){
					$s = $s + $n % 10
					$n = (int)$n /10
				}
	* Output:	Tổng của các chữ số: $s = $s + $n % 10
				n chia hết cho 3 ($s % 3 == 0)
				n  không chia hết cho 3 ($s%3 != 0)
*/
$error = [];
$messages = null;
$t = $n = null;
$s = 0;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || $_POST['n'] == ''){
		$error[] = 'Vui lòng nhập số nguyên n';
	}
	if(count($error) == 0){
		$n = (float)$_POST['n'];
		while ($n > 0) {
			$t = $n % 10;
			$s = $s + (int)$t;
			$n = (int)$n /10;
		}
		if($s%3 == 0){
			$messages = 'Số ' . (float)$_POST['n'] . ' chia hết cho 3';
		}else{
			$messages = 'Số ' . (float)$_POST['n'] . ' không chia hết cho 3';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 07</title>
</head>
<body>
	<?php if(count($error) > 0 ) :?>
		<?php for($i = 0; $i < count($error); $i++) :?>
			<?php echo $error[$i] ;?>
		<?php endfor ;?>
	<?php endif ;?>
	<form action="" method="post">
		<p>
			<input type="text" name="n" placeholder="Nhập số nguyên n">
		</p>
		<p>
			<input type="submit" name="submit" value="Tính">
		</p>
		<p>Tổng các chữ số là:  <?php echo $s ;?></p>
		<p><?php echo $messages ;?></p>
	</form>
</body>
</html>