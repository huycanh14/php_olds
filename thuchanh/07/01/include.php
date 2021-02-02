<?php  
include('function.php')
?>
<main>
	<?php 
	$job = 0;
	while ($job < 10) {
		$job++;
		$a = $job + $c;
		echo displayjob($a) . '<br>';
	}
	?>
</main>