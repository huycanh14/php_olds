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

	$sql = "SELECT sinhvien.hoten, sinhvien.masv, khoa.ten_khoa
			FROM sinhvien
			INNER JOIN khoa
			ON sinhvien.makhoa = khoa.makhoa";
	$query = $db->query($sql);
	//MYSQLI_ASSOC đưa về dạng mảng kết hợp: Associative Array
	$result = $query->fetch_all(MYSQLI_ASSOC);
	?>

	<div id="noidung" align="center">
		<table>
			<thead>
				<tr>
					<th>Tên Sinh Viên</th>
					<th>Mã Sinh Viên</th>
					<th>Tên Khoa</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($result) > 0) :
					foreach ($result as $sv) :
				?>
				<tr>
					<td><?php echo $sv['hoten'];?></td>
					<td><?php echo $sv['masv'];?></td>
					<td><?php echo $sv['ten_khoa'];?></td>
					
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