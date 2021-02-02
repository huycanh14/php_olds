<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 17: Gấp giấy</title>
</head>
<body>
	<form action="" method="POST">
		<h2>Bài 17: Gấp đôi giấy dày 0.1mm bao nhiêu lần để dày 1m</h2>
		<?php
		$doday = 0.1;
		$langap = 0;
		while ($doday <= 1000) {
			$doday *= 2;
			++$langap;
		}
		echo "gấp đôi $langap lần";		
		?>
	</form>
</body>
</html>