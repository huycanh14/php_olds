<?php 
/**
	* Input: Nhập giá trị 3 biến trở R1, R2, R3
	* Process: R = R1 + R2 + R3
	* Output: Tổng điện trở R = R1 + R2 +R3
*/
$error = [];
$R = null;
if(isset($_POST['submit'])){

	//Báo lỗi
	if(!isset($_POST['R1']) || empty($_POST['R1'])){
		$error[] = 'Vui lòng nhập điện trở R1';
	}else{
		if(!is_numeric($_POST['R1'])){
			$error[] = 'Điện trở R1 phải là số';
		}
	}

	if(!isset($_POST['R2']) || empty($_POST['R2'])){
		$error[] = 'Vui lòng nhập điện trở R2';
	}else{
		if(!is_numeric($_POST['R2'])){
			$error[] = 'Điện trở R2 phải là số';
		}
	}

	if(!isset($_POST['R3']) || empty($_POST['R3'])){
		$error[] = 'Vui lòng nhập điện trở R3';
	}else{
		if(!is_numeric($_POST['R3'])){
			$error[] = 'Điện trở R3 phải là số';
		}
	}

	//không có lỗi --> thực hiện phép tính
	if(count($error) == 0){
		$R = (float)$_POST['R1'] + (float)$_POST['R2'] + (float)$_POST['R3'];
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 4</title>
</head>
<body>
	<!--In lỗi -->
	<?php if(count($error) > 0 ) :?>
		<div class="messages">
			<?php for($i = 0; $i < count($error); $i++) :?>
				<p><?php echo $error[$i] ;?></p>
			<?php endfor ;?>
		</div>
	<?php endif ;?>
	<form action="" method="post">
		<p>
			<input type="text" name="R1" placeholder="Nhập điện trở R1">
		</p>
		<p>
			<input type="text" name="R2" placeholder="Nhập điện trở R2">
		</p>
		<p>
			<input type="text" name="R3" placeholder="Nhập điện trở R3">
		</p>
		<p>
			<input type="submit" name="submit" value="Tính tổng">
		</p>
		Tổng điện trở R = <span><?php echo $R ;?> </span>
	</form>
</body>
</html>