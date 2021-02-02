<?php  
/*
	* Input: 	Nhập số tự nhiên n
	* Process:	$$n = (float)$_POST['n'];
				for($i = 1; $i <= $n; $i++){
					if($n % $i == 0){
						$uc = $i;
					}
				}
	* Output:	In $uc;
*/
$error = [];
$n = $uc = null;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || $_POST['n'] == ''){
		$error[] = 'Vui lòng nhập n';
	}

	if(count($error) == 0){
		$n = (float)$_POST['n'];
		for($i = 1; $i <= $n; $i++){
			if($n % $i == 0){
				$uc = $i;
				echo $uc .' ';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 11</title>
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
			<input type="text" name="n" placeholder="Nhập số nguyên dương n">
		</p>
		<p>
			<input type="submit" name="submit" value="Tìm ước số">
		</p>
	</form>
</body>
</html>