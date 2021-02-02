<?php  
require('../connect.php');
include('../header.php');
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
	header('Location:../login.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

	<?php  
	if (isset($_GET['submit'])){
		$sql = "SELECT sinhvien.masv, sinhvien.hoten, mon_hoc.mamonhoc, mon_hoc.tenmonhoc
				FROM ketqua
				INNER JOIN sinhvien
				on ketqua.masv = sinhvien.masv
				INNER JOIN mon_hoc
				on ketqua.mamonhoc = mon_hoc.mamonhoc 
				WHERE 1=1";
		if (isset($_GET['hoten']) && $_GET['hoten'] != ''){
			$sql .= " AND sinhvien.hoten LIKE '%" . trim($_GET['hoten']) . "%'";
		}
		if (isset($_GET['masv']) && $_GET['masv'] != ''){
			$sql .= " AND sinhvien.masv LIKE '%" . trim($_GET['masv']) . "%'";
		}
		if (isset($_GET['monhoc']) && $_GET['monhoc'] != ''){
			$sql .= " AND mon_hoc.tenmonhoc LIKE '%" . trim($_GET['monhoc']) . "%'";
		}
		if (isset($_GET['mamonhoc']) && $_GET['mamonhoc'] != ''){
			$sql .= " AND mon_hoc.mamonhoc LIKE '%" . trim($_GET['mamonhoc']) . "%'";
		}
		if (empty($_GET['hoten'])  && empty($_GET['masv'])  && empty($_GET['monhoc'])  && empty($_GET['mamonhoc'])){
			header('Location: trangchu.php');
		}
		$query = $db->query($sql);
		$search = $query->fetch_all(MYSQLI_ASSOC);
	}
	error_reporting(0);
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

	<form action="" method="get">
		Tên sinh viên:
		<input type="text" name="hoten" placeholder="Tên Sinh Viên" value="<?php if (isset($_GET['hoten'])) echo $_GET['hoten'] ;?>">

		Mã sinh viên:
		<input type="text" name="masv" placeholder="Mã Sinh Viên" value="<?php if (isset($_GET['masv'])) echo $_GET['masv'] ;?>">

		Tên môn học:
		<input type="text" name="monhoc" placeholder="Tên Môn Học" value="<?php if (isset($_GET['monhoc'])) echo $_GET['monhoc'] ;?>">

		Mã môn học:
		<input type="text" name="mamonhoc" placeholder="Mã Môn Học" value="<?php if (isset($_GET['mamonhoc'])) echo $_GET['mamonhoc'] ;?>">

		<input type="submit" name="submit" value="Tìm kiếm">
	</form><br>

	<div class="message">
		
		<?php
		if (count($search) > 0):
			foreach ($search as $item):  
		?>
		<table>
			<tr>
				<td><?php echo $item['masv'] ;?></td>
				<td><?php echo $item['hoten'] ;?></td>
				<td><?php echo $item['mamonhoc'] ;?></td>
				<td><?php echo $item['tenmonhoc'] ;?></td>
			</tr>
		</table>
		<?php  
			endforeach;
		endif;
		?>
	</div>

	<div id="noidung" align="center">
		<h1>Trang chủ</h1>
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