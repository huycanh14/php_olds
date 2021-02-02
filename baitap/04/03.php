<?php 
/**
	* Input: Nhập tọa độ hai điểm (x1, y1) và (x2, y2)
	* Process: k = (y2 - y1)/ (x2 - x1)
			   d = sqrt(pow( y2 - y1 , 2) + pow( x2 - x1, 2))
	* Output: 
			Hệ số góc k = (y2 - y1)/ (x2 - x1)
			Khoảng cách d = sqrt(pow( y2 - y1 , 2) + pow( x2 - x1, 2))
*/
$error = [];
$k = $d = $x1 = $x2 = $y1 = $y2 +null;
if(isset($_POST['submit'])){

	//báo lỗi
	if(!isset($_POST['x1']) || empty($_POST['x1'])){
		$error[] = 'Vui lòng nhập hoành độ x1'; 
	}else{
		if(!is_numeric($_POST['x1'])){
			$error[] = 'Hoành độ x1 phải là số';
		}else{
			$x1 = (float)$_POST['x1'];
		}
	}

	if(!isset($_POST['y1']) || empty($_POST['y1'])){
		$error[] = 'Vui lòng nhập tung độ y1'; 
	}else{
		if(!is_numeric($_POST['y1'])){
			$error[] = 'Tung độ y1 phải là số';
		}else{
			$y1 = (float)$_POST['y1'];
		}
	}

	if(!isset($_POST['x2']) || empty($_POST['x2'])){
		$error[] = 'Vui lòng nhập hoành độ x2'; 
	}else{
		if(!is_numeric($_POST['x2'])){
			$error[] = 'Hoành độ x2 phải là số';
		}else{
			$x2 = (float)$_POST['x2'];
		}
	}

	if(!isset($_POST['y2']) || empty($_POST['y2'])){
		$error[] = 'Vui lòng nhập tung độ y2'; 
	}else{
		if(!is_numeric($_POST['y2'])){
			$error[] = 'Tung độ y2 phải là số';
		}else{
			$y2 = (float)$_POST['y2'];
		}
	}

	//không có lỗi --> Thực hiện phép tính
	if(count($error) == 0){
		$k = ($y2 - $y1)/ ($x2 - $x1);
		$d = sqrt(pow( $y2 - $y1 , 2) + pow( $x2 - $x1, 2));
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bai 3</title>
</head>
<body>

	<!--In lỗi -->
	<?php if(count($error) > 0):?>
		<div class="messages">
			<?php for($i = 0; $i < count($error); $i++) :?>
			<p><?php echo $error[$i] ;?></p>
			<?php endfor ;?>
		</div>
	<?php endif ;?>
	<!--FORM-->
	<form action="" method="post">
		<p>Tọa độ điểm thứ nhất:</p>
		<input type="text" name="x1" placeholder="Hoành độ x1" value="<?php if(isset($_POST['x1'])) echo $_POST['x1'];?>">
		<input type="text" name="y1" placeholder="Tung độ y1" value="<?php if(isset($_POST['y1'])) echo $_POST['y1'];?>">
		<p>Tọa độ điểm thứ hai:</p>
		<input type="text" name="x2" placeholder="Hoành độ x2" value="<?php if(isset($_POST['x2'])) echo $_POST['x2'];?>">
		<input type="text" name="y2" placeholder="Tung độ y2" value="<?php if(isset($_POST['y2'])) echo $_POST['y2'];?>">
		<p>Hệ số góc: k = <?php echo $k ;?></p>
		<p>Khoảng cách: d = <?php echo $d ;?></p>
		<p>
			<input type="submit" name="submit" value="Tính">
		</p>
	</form>
</body>
</html>