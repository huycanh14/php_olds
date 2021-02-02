<?php  
/*
	* Input:	Nhập số n
	* Process:	$n = (float)$_POST['n']
				if($n >= 2){
					for($i =2; $i <= $n - 1; $i++){
						$nt = $n % $i
						if($nt == 0){
							$messages = $n . 'không là số nguyên tố';
							break;
						}else{
							$messages = $n . 'là số nguyên tố';
						}
					}
				}
				if($n <= 1){
					$messages = $n . 'không là số nguyên tố';
				}
	* Output:	In $messages
*/
$error = [];
$n = $nt = $messages =null;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || empty($_POST['n'])){
		$error[] = 'Vui lòng nhập n';
	}else{
		if(!is_numeric($_POST['n'])){
			$error[] = 'n phải là số';
		}
	}

	if(count($error) == 0){
		$n = (float)$_POST['n'];
		if($n >= 2){
			for($i = 2; $i <= $n - 1; $i++){
				$nt = $n % $i;
				if($nt == 0){
					$messages = $n . ' không là số nguyên tố';
					break;
				}else{
					$messages = $n . ' là số nguyên tố';
				}
			}
		}
		if($n == 2){
			$messages = $n . ' là số nguyên tố';
		}
		if($n <= 1){
			$messages = $n . ' không là số nguyên tố';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 13</title>
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
		<input type="text" name="n" placeholder="Nhập số n">
		<input type="submit" name="submit" value="Kiểm tra">
		<?php echo $messages ;?>
	</form>
</body>
</html>