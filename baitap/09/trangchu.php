<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	<?php 
	include('header.php');
	?>
	<?php 
	require('connect.php');
	?>


	<div id="noidung" align="center">
		<table>
			<thead>
				<tr>
					<th>Tổng số khoa</th>
					<th>Tổng số sinh viên</th>
					<th>Tổng số môn</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php  
							$sql = "SELECT COUNT(*) FROM khoa";
							$query = $db->query($sql);
							$result = $query->fetch_row();
							echo $result[0];
						?>
					</td>
					<td>
						<?php  
							$sql = "SELECT COUNT(*) FROM sinhvien";
							$query = $db->query($sql);
							$result = $query->fetch_row();
							echo $result[0];
						?>
					</td>
					<td>
						<?php  
							$sql = "SELECT COUNT(*) FROM mon_hoc";
							$query = $db->query($sql);
							$result = $query->fetch_row();
							echo $result[0];
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>