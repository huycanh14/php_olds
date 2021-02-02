<?php 
/**
	* Input: Nhập độ dài 3 cạnh a, b, c của tam giác 
	* Process: CV = a + b + c
			   S = sqrt(p * (p - a) * (p - b) * (p - c))
			   p = CV/2

	* Output: Chu vi (CV = a + b + c), Diện tích (S = sqrt(p * (p - a) * (p - b) * (p - c)))
*/
$error = [];
$a = $b = $c = null
$cv = $dt = $p = null;
if(isset($_POST['submit'])){

	//báo lỗi

	if(!isset($_POST['canh_a']) || empty($_POST['canh_a']) ){
		$error[] = 'Vui lòng nhập cạnh thứ nhất.';
	}else{
		if(!is_numeric($_POST['canh_a'])){
			$error[] = 'Cạnh a phải nhập là số';
		}else{
			$a = (float)$_POST['canh_a'];
		}
	}

	if(!isset($_POST['canh_b']) || empty($_POST['canh_b']) ){
		$error[] = 'Vui lòng nhập cạnh thứ hai.';
	}else{
		if(!is_numeric($_POST['canh_b'])){
			$error[] = 'Cạnh b phải nhập là số';
		}else{
			$b = (float)$_POST['canh_b'];
		}
	}

	if(!isset($_POST['canh_c']) || empty($_POST['canh_c']) ){
		$error[] = 'Vui lòng nhập cạnh thứ ba.';
	}else{
		if(!is_numeric($_POST['canh_c'])){
			$error[] = 'Cạnh c phải nhập là số';
		}else{
			$c = (float)$_POST['canh_c'];
		}
	}

	//không có lỗi --> thực hiện phép tính
	if(count($error) == 0){
		$cv = $a + $b + $c;
		$p = $cv/2;
		$dt = sqrt( $p * ($p - $a) * ($p - $b)  * ($p - $c));
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bai 2</title>
</head>
<body>

	<!--   In lỗi   -->
	<?php if(count($error) > 0 ) :?>
	<div class="messages">
		<?php for ($i = 0; $i < count($error) ; $i++) :?>
			<p><?php echo $error[$i] ;?></p>
		<?php endfor;?>
	</div>
	<?php endif;?>

	<form action="" method="post">
		<input type="text" name="canh_a" placeholder="Cạnh thứ nhất" value="<?php if(isset($_POST['canh_a'])) echo $_POST['canh_a'];?>">
		<br><br>
		<input type="text" name="canh_b" placeholder="Cạnh thứ hai" value="<?php if(isset($_POST['canh_b'])) echo $_POST['canh_b'];?>">
		<br><br>
		<input type="text" name="canh_c" placeholder="Cạnh thứ ba" value="<?php if(isset($_POST['canh_c'])) echo $_POST['canh_c'];?>">

		<!--In kết quả--> 

		<p>Chu vi: <?php echo $cv ;?></p>
		<p>Diện tích: <?php echo $dt ;?></p>

		<input type="submit" name="submit" value="Tính">
		<br>
	</form>
</body>
</html>