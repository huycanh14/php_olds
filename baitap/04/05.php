<?php 
/**
	* Input: Nhập điểm Toán, Lý, Hóa
	* Process: Tb = (Toán + Lý + Hóa)/3
			   In 2 số lẻ thập phân: echo round(Tb, 2)
	*Output: Điểm trung bình TB
*/
$error = [];
$math = $physical = $chemistry = $Tb =  null;

if(isset($_POST['submit'])){

	//Báo lỗi
	if(!isset($_POST['math']) || empty($_POST['math'])){
		$error[] = 'Vui lòng nhập điểm môn Toán';
	}else{
		if(!is_numeric($_POST['math'])){
			$error[] = 'Điểm môn Toán phải là số';
		}
	}

	if(!isset($_POST['physical']) || empty($_POST['physical'])){
		$error[] = 'Vui lòng nhập điểm môn Lý';
	}else{
		if(!is_numeric($_POST['physical'])){
			$error[] = 'Điểm môn Vật lý phải là số';
		}
	}

	if(!isset($_POST['chemistry']) || empty($_POST['chemistry'])){
		$error[] = 'Vui lòng nhập điểm môn Hóa';
	}else{
		if(!is_numeric($_POST['chemistry'])){
			$error[] = 'Điểm môn Hóa phải là số';
		}
	}

	//Thực hiện phép tính
	if(count($error) == 0){
		$Tb = (float)$_POST['math'] + (float)$_POST['physical'] + (float)$_POST['chemistry'];
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 05</title>

</head>
<body>
		<!--In lỗi-->
	<?php if(count($error) > 0) :?>
		<?php for($i = 0; $i < count($error); $i++ ) :?>
			<p><?php echo $error[$i] ;?></p>
		<?php endfor ;?>
	<?php endif ;?>
	
	<!--Thực hiên-->
	<form action="" method="post">
		<p>
			Toán: <input type="text" name="math" placeholder="Điểm môn Toán">
		</p>
		<p>
			Lý:&emsp;<input type="text" name="physical" placeholder="Điểm môn Lý">
		</p>
		<p>
			Hóa:&ensp;<input type="text" name="chemistry" placeholder="Điểm môn Hóa">
		</p>
		<p>
			<input type="submit" name="submit" value="Điểm trung bình">
		</p>
		<p>Điểm trung bình cộng: <?php echo round($Tb, 2) ;?></p>

	</form>
		<!--In lỗi-->
	
</body>
</html>