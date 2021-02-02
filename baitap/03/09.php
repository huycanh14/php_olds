<?php  
/*
	*Input:		Nhập số tự nhiên n
	*Process:	$n = (float)$_POST['n']
				if($n == 1 || $n == 2){
					$Feb = 1;
				}
				if($n > = 3){
					for ($k =1; $k<=$n-2; $k++){
						$Feb = $Feb + $j;
						$j = $Feb - $j;
					}
				}
	* Output:	In $Feb
*/
$error = [];
$n = $Feb = null;
$j = 1;
if(isset($_POST['submit'])){
	if(!isset($_POST['n']) || $_POST['n'] == ''){
		$error[] = 'Vui lòng nhập n';
	}

	if(count($error) == 0){
		$n = (float)$_POST['n'];
		if($n == 1 || $n == 2){
			$Feb = 1;
		}

		$Feb = 1;
		if($n >= 3){
			for ($k = 1; $k <= $n-2; $k++){
				$Feb = $Feb + $j;
				$j = $Feb - $j;
			}
		}
		/*
			Cách 2
		function Fibonacci($n)
		{
		    if ($n <= 2){
		        return 1;
		    }
		    else {
		        return (Fibonacci($n - 2) + Fibonacci($n - 1));
		    }
		}
		echo Fibonacci($n);
		*/
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 09</title>
</head>
<body>
	<?php if(count($error) > 0 ) :?>
		<?php for($i = 0; $i < count($error); $i++) :?>
			<p><?php echo $error[$i] ;?></p>
		<?php endfor ;?>
	<?php endif ;?>
	<form action="" method="post">
		<p>
			<input type="text" name="n" placeholder="Nhập n">
		</p>
		<p>
			<input type="submit" name="submit" value="Tính Fibonacci">
		</p>
		Với n = <?php echo $n ;?>
		<p>
			Dãy Fibonacci = <?php echo $Feb ;?>
		</p>
	</form>
</body>
</html>