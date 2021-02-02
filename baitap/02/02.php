<?php 
 $a = 1; 
 for($a; $a<=10; $a++){
 	$table = '<table border = "1">';
 	$table .= '<tr>';
 	for ($b=1; $b<=10; $b++){
 		$tich = $a * $b;
 		$table .= '<td>' . $a . ' x ' . $b . ' = ' .$tich . '</td>';
 	}
 	 		echo '<br>';
 	$table .= '</tr>';
 	$table .= '</table>';
	echo $table;
 }
 ?>