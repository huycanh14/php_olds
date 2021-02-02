<?php  
/*
	* Input:	Nhập số 1 <= n <=9
	* Process:	switch ($n){
					case'0':
						$number = 'Không';
						break;
					......
					case'9':
						$number = 'chín';
						break;
	}
	* Output: In $number
*/	
$error = [];
$number = $n = null;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || empty($_POST['n'])){
		$error[] = 'Vui lòng nhập số';
	}else{
		if(!is_numeric($_POST['n'])){
			$error[] = 'n phải là số';
		}
	}

	if(count($error) == 0){
		$n = (float)$_POST['n'];
		if($n > 9 || $n < 0){
			$error[] = 'Nhập vào một số từ 0 đến 9';
		}else{
			switch ($n) {
			case '0':
				$number = 'Không';
				break;

			case '1':
				$number = 'Một';
				break;

			case '2':
				$number = 'Hai';
				break;

			case '3':
				$number = 'Ba';
				break;

			case '4':
				$number = 'Bốn';
				break;

			case '5':
				$number = 'Năm';
				break;

			case '6':
				$number = 'Sáu';
				break;

			case '7':
				$number = 'Bảy';
				break;

			case '8':
				$number = 'Tám';
				break;
			
			default:
				$number = 'Chín';
				break;
		}
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
		<input type="text" name="n" placeholder="Nhập số n">
		<input type="submit" name="submit" value="Tìm">
		<p>
			<?php echo $number ;?>
		</p>
	</form>
</body>
</html>