<?php 
/**
	* Input: Nhập 5 số tự nhiên
	* Process: Max = max(number_1, number_2, number_3, number_4, number_5)
				Min = min(number_1, number_2, number_3, number_4, number_5)
	* Output: In Max, Min
*/
$error = []; 
$max = $min = null;
if(isset($_POST['submit'])){
	if(!isset($_POST['number_1']) || $_POST['number_1'] == ''){ //1
		$error[] = 'Nhập số thứ nhất'; 
	}

	if(!isset($_POST['number_2']) || $_POST['number_2'] == ''){ //2
		$error[] = 'Nhập số thứ hai'; 
	}

	if(!isset($_POST['number_3']) || $_POST['number_3'] == ''){ //3
		$error[] = 'Nhập số thứ ba'; 
	}

	if(!isset($_POST['number_4']) || $_POST['number_4'] == ''){ //4
		$error[] = 'Nhập số thứ tư'; 
	}

	if(!isset($_POST['number_5']) || $_POST['number_5'] == ''){  //5
		$error[] = 'Nhập số thứ năm'; 
	} 

	///
	if(count($error) == 0){
		$max = max((float)$_POST['number_1'], (float)$_POST['number_2'], (float)$_POST['number_3'], (float)$_POST['number_4'], (float)$_POST['number_5']);

		$min = min((float)$_POST['number_1'], (float)$_POST['number_2'], (float)$_POST['number_3'], (float)$_POST['number_4'], (float)$_POST['number_5']);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 06</title>
</head>
<body>
	<?php if(count($error) > 0) :?>
		<?php for($i = 0; $i < count($error); $i++) :?>
			<p><?php echo $error[$i] ;?></p>
		<?php endfor ;?>
	<?php endif ;?>

	<form action="" method="post">
		<p>
			<input type="text" name="number_1" placeholder="Số thứ nhất">
		</p>
		<p>
			<input type="text" name="number_2" placeholder="Số thứ hai">
		</p>
		<p>
			<input type="text" name="number_3" placeholder="Số thứ ba">
		</p>
		<p>
			<input type="text" name="number_4" placeholder="Số thứ tư">
		</p>
		<p>
			<input type="text" name="number_5" placeholder="Số thứ năm">
		</p>
		<p>
			<input type="submit" name="submit" value="Tìm Max, Min">
		</p>
		<p>
			Max: <?php echo $max ;?>
		</p>
		<p>
			Min: <?php echo $min ;?>
		</p>
	</form>
</body>
</html>