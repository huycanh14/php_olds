<!DOCTYPE html>
<html>
<head>
	<title>Sinh viên</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	<?php 
	session_start();
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
		<div class="message">
			<?php if (isset($_SESSION['flash_msg'])) :
			?>
		</div>
		<table>
			<thead>
				<tr>
					<th>Chọn</th>
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
					<td>
						<input type="checkbox" name="delete">
					</td>
					<td><?php echo $sv['hoten'];?></td>
					<td><?php echo $sv['masv'];?></td>
					<td><?php echo $sv['ten_khoa'];?></td>
					<td>
						<!-- Hiển thị và tìm kiếm dùng GET -->
						<a href="sinhvien_edit.php?masv=<?php echo $sv['masv'];?> ">Sửa</a>|
						<a onclick="checkDelete()" >Xóa</a>
					</td>
					
				</tr>
				<?php
					endforeach;
				endif; 
				?>
			</tbody>
			<tfoot>
				<tr>
					<td>
						<input type="submit" name="submi" value="Delete">
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
<script type="text/javascript">
	function checkDelete()
</script>

</body>
</html>