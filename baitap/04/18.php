<?php  
/*
	* input:	Nhập 1 trong 3 số (305, 6, 28)
	* process:	$n = (float)$_POST['n']
				switch ($n) {
					case '305':
						$thong_bao = 'ba trăm lẻ năm';
						break;

					case '6':
						$thong_bao = 'sáu';
						break;
					
					case '28':
						$thong_bao = 'hai mươi tám';
						break;
					
					
					default:
						$thong_bao = 'Chọn một số trong (305, 6, 28)';
						break;
				}
	* output:	echo $thong_bao
*/
$error = [];
$thong_bao = $n =  null;
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
		switch ($n) {
			case '305':
				$thong_bao = 'ba trăm lẻ năm';
				break;

			case '6':
				$thong_bao = 'sáu';
				break;
			
			case '28':
				$thong_bao = 'hai mươi tám';
				break;
			
			
			default:
				$thong_bao = 'Chọn một số trong (305, 6, 28)';
				break;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 18</title>
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
		Nhập: <input type="text" name="n" placeholder="Nhập 305, 6, 28">
		<p>
			<input type="submit" name="submit" value="Mô tả">
		</p>
		<?php echo $thong_bao ;?>
	</form>
</body>
</html>
