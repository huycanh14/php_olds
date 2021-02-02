<?php 
/*
	* Input:	Nhập số áo trong của hàng: n 
	* Process:	$n = (float)$_POST['n']
				$da_ban = $n * 1/6
				$con_lai = $n - $da_ban
	* Output:	Số áo còn lại $con_lai
*/ 
$error = [];
$n = $da_ban = $con_lai = null;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || empty($_POST['n'])){
		$error[] = 'Nhập số áo trong cửa hàng';
	}else{
		if(!is_numeric($_POST['n'])){
			$error[] = 'n phải là số';
		}
	}

	if(count($error) == 0){
		$n = (float)$_POST['n'];
		$da_ban = $n * 1/6;
		$con_lai = $n - $da_ban;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 21</title>
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
		<input type="text" name="n" placeholder="Nhập số áo">
		<input type="submit" name="submit" value="Tính">
		<?php echo $con_lai ;?>
	</form>
</body>
</html>