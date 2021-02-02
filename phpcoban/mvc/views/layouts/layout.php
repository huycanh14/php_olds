<!DOCTYPE html>
<html>
<head>
	<title>Base Layout</title>
</head>
<body>
	<header id="header" class="">
		This is HEADER
	</header>
	<div id="app-content">
		<?php require $content ;?>
		<?php  
			echo $totalBrand;
			print_r($brands);
		?>
	</div>
	<footer>
		This is footer
	</footer>

</body>
</html>