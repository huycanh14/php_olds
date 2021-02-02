<?php 
$error = [];
$length = 0;
if (isset($_POST['submit'])) {
	$length = (int)$_POST['length'];
	if ($length <= 0 || $length == '') {
		$error[] = 'Vui lòng nhập đúng độ dài dãy Fibonacci';
	}
}
function Fibonacci($length = 5)
{
	$x1 = 1; $x2 = 2; $x3 = 0;
	echo "$x1, $x2";
	for ($i=2; $i < $length; $i++) { 
		$x3 = $x1 + $x2;
		$x1 = $x2;
		$x2 = $x3;
		echo ', ' . $x3;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 9: Tính dãy Fibonacci</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 9: Tính dãy Fibonacci</h2>
		Nhập độ dài dãy Fibonacci: 
		<input type="number" name="length" placeholder=" độ dài dãy Fibonacci">
		<input type="submit" name="submit" value="Fibonacci">
		<?php if (count($error) > 0) :?>
			<?php for ($i=0; $i < count($error); $i++) :?>
				<span style="color:red"><?php echo $error[$i]; ?></span>
			<?php endfor; ?>
		<?php endif; ?>
		<div>
			Dãy Fibonacci: <?php Fibonacci($length); ?>
		</div>
	</form>
</body>
</html>