<?php 
/**
	* Input: Nhập độ dài 3 cạnh a, b, c của tam giác 
	* Process: CV = a + b + c
			   S = sqrt(p * (p - a) * (p - b) * (p - c))
			   p = CV/2

	* Output: Chu vi (CV = a + b + c), Diện tích (S = sqrt(p * (p - a) * (p - b) * (p - c)))
*/
$error = [];
$cv = $dt = $p = null;
if(isset($_POST['submit'])){

	//báo lỗi

	if(!isset($_POST['canh_a']) || $_POST ['canh_a'] == '' ){
		$error[] = 'Vui lòng nhập cạnh thứ nhất.';
	}

	if(!isset($_POST['canh_b']) || $_POST ['canh_b'] == '' ){
		$error[] = 'Vui lòng nhập cạnh thứ hai.';
	}

	if(!isset($_POST['canh_c']) || $_POST ['canh_c'] == '' ){
		$error[] = 'Vui lòng nhập cạnh thứ ba.';
	}

	//không có lỗi --> thực hiện phép tính
	if(count($error) == 0){
		$cv = (float) $_POST['canh_a'] + (float) $_POST['canh_b'] + (float) $_POST['canh_c'];
		$p = $cv/2;
		$dt = sqrt( $p * ($p - (float) $_POST['canh_a']) * ($p - (float) $_POST['canh_b'])  * ($p - (float) $_POST['canh_c']));
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
		<input type="text" name="canh_a" placeholder="Cạnh thứ nhất">
		<br><br>
		<input type="text" name="canh_b" placeholder="Cạnh thứ hai">
		<br><br>
		<input type="text" name="canh_c" placeholder="Cạnh thứ ba">

		<!--In kết quả--> 

		<p>Chu vi: <?php echo $cv ;?></p>
		<p>Diện tích: <?php echo $dt ;?></p>

		<input type="submit" name="submit" value="Tính">
		<br>
	</form>
</body>
</html>