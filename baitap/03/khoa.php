<!DOCTYPE html>
<html>
<head>
	<title>Sinh viên</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	<?php 
	include('header.php');
	?>
	<?php 
	// Gọi file kết nối CSDL
	require('connect.php');

	/**
	 * Lấy nhiều bản ghi
	 */

	$sql = "SELECT makhoa, ten_khoa FROM khoa";
	$query = $db->query($sql);
	//MYSQLI_ASSOC đưa về dạng mảng kết hợp: Associative Array
	$result = $query->fetch_all(MYSQLI_ASSOC);
	?>

	<div id="noidung" align="center">
		<table>
			<thead>
				<tr>
					<th>Mã Khoa</th>
					<th>Tên Khoa</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($result) > 0) :
					foreach ($result as $khoa) :
				?>
				<tr>
					<td><?php echo $khoa['makhoa'];?></td>
					<td><?php echo $khoa['ten_khoa'];?></td>
				</tr>
				<?php
					endforeach;
				endif; 
				?>
			</tbody>
		</table>
	</div>

</body>
</html>