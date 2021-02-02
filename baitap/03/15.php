<?php  
$n = 6000000;
$tang = null;
for($i = 1; $i <= 10; $i++){
	$tang = $n * 1.8/100;
	$n += $tang;
}
echo $n;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 15</title>
</head>
<body>

</body>
</html>