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

	$sql = "SELECT mamonhoc, tenmonhoc FROM mon_hoc";
	$query = $db->query($sql);
	//MYSQLI_ASSOC đưa về dạng mảng kết hợp: Associative Array
	$result = $query->fetch_all(MYSQLI_ASSOC);
	?>

	<div id="noidung" align="center">
		<table>
			<thead>
				<tr>
					<th>Mã Môn Học</th>
					<th>Tên Môn Học</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($result) > 0) :
					foreach ($result as $monhoc) :
				?>
				<tr>
					<td><?php echo $monhoc['mamonhoc'];?></td>
					<td><?php echo $monhoc['tenmonhoc'];?></td>
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