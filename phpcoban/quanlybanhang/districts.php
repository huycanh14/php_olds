<?php  
require('connect.php');
$sql = "SELECT districts.id, districts.name, districts.province_id, provinces.name  
		FROM districts
		INNER JOIN provinces
		ON districts.province_id = provinces.id";
$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table, th, td {
		    border:1px solid black;
		}
	</style>
	<title>Huyện/Quận</title>
</head>
<body>
	<table>
		<?php 
		if (count($result) > 0) :
			foreach ($result as $districts) :
		?>
		<tr>
			<td><?php echo $districts['id'] ;?></td>
			<td><?php echo $districts['name'] ;?></td>
			<td><?php echo $districts['name'] ;?></td>
		</tr>
		<?php
			endforeach;
		endif; 
		?>
	</table>
</body>
</html>