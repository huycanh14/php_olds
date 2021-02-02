<?php   
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
	header('Location: ../login.php');
	exit;
}
if (isset($_SESSION['user'])){
	$masv = $_SESSION['user']['username'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinh viên</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
	<?php 
	include('../header.php');
	?>
	<?php 
	// Gọi file kết nối CSDL
	require('../connect.php');

	$sql = "SELECT sinhvien.hoten, sinhvien.masv, sinhvien.ngaysinh, sinhvien.gioitinh ,khoa.ten_khoa, khoa.makhoa
			FROM sinhvien
			INNER JOIN khoa
			ON sinhvien.makhoa = khoa.makhoa 
			WHERE sinhvien.masv = '{$masv}'";
	$query = $db->query($sql);
	//MYSQLI_ASSOC đưa về dạng mảng kết hợp: Associative Array
	$result = $query->fetch_all(MYSQLI_ASSOC);
	$stt = 1;
	?>

	<div id="user">
		Tên đăng nhập:
		<?php 
		if (isset($_SESSION['admin'])){
			echo $_SESSION['admin']['username'];
		}
		if (isset($_SESSION['user'])){
			echo $_SESSION['user']['username'];
		}
		?>
		<div class="logout" style="text-align: right;">
			<a href="../logout.php">Đăng xuất</a>
		</div>
	</div>

	<div id="noidung" align="center">
		<h1>Danh sách sinh viên</h1>

		<table>
			<thead>
				<tr>
					<td>STT</td>
					<th>Tên Sinh Viên</th>
					<th>Mã Sinh Viên</th>
					<th>Ngày Sinh</th>
					<th>Giới Tính</th>
					<th>Tên Khoa</th>
					<th>Mã Khoa</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($result) > 0) :
					foreach ($result as $sv) :
				?>
				<tr>
					<td><?php echo $stt; ?></td>
					<td><?php echo $sv['hoten'];?></td>
					<td><?php echo $sv['masv'];?></td>
					<td><?php echo $sv['ngaysinh'] ;?></td>
					<td><?php if ($sv['gioitinh'] == 1) echo 'Nam'; else echo 'Nữ' ;?></td>
					<td><?php echo $sv['ten_khoa'];?></td>
					<td><?php echo $sv['makhoa'] ;?></td>
					<?php $stt++ ;?>
					
				</tr>
				<?php
					endforeach;
				endif; 
				?>
			</tbody>
		</table>

		<br>
		<form action="" method="post">
			<button type="button"><a href="sinhvien_diem.php" style="text-decoration: none;text-transform: uppercase; color: #000;">Danh sách điểm</a></button>
			<input type="submit" name="reset" value="Reset trang">
		</form>
	</div>

</body>
</html>
