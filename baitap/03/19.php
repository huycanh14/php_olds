<?php 
/*
	* Input:	Nhập chuỗi kí tự
	* Process:	$n = explode(' ', $_POST['n'])   //Hàm explode() dùng để tách chuỗi ra thành một mảng.
				for($i = 0; $i < count($n); $i++)
	* Output:	In chuỗi echo $n[$i]
*/
$error = [];
$n = null;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || $_POST['n'] == ''){
		$error[] = 'Vui lòng nhập một chuỗi bất kỳ';
	}
	if(count($error) == 0){
		$n = explode(' ', $_POST['n']); // để ý explode('có khoảng cách')
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 19</title>
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
		<input type="text" name="n" placeholder="Nhập một chuỗi">
		<input type="submit" name="submit" value="In ra màn hình">
		<p>
			<?php for($i = 0; $i < count($n); $i++) :?>
				<?php echo $n[$i] . '<br>' ;?>
			<?php endfor ;?>
		</p>
	</form>
</body>
</html>