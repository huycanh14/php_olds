<?php  
/*
	* Input:	Nhập chuỗi kí tự
	* Process:	$so = strlen($_POST['n'])
	* Output:	Số ký tự = $n
*/
$so = null;
if(isset($_POST['submit'])){
	$so = strlen($_POST['n']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 20</title>
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
		<input type="text" name="n" placeholder="Nhập chuỗi ký tự">
		<input type="submit" name="submit" value="Đếm">
		<p>
			<?php echo 'Chuỗi trên có số ký tự là: ' . $so ;?>
		</p>
	</form>
</body>
</html>