<?php  
session_start();
require('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinh viên và các môn học</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php include('header.php'); ?>
</head>
<body>
	<?php  
	$sql = "SELECT sinhvien.masv, sinhvien.hoten, ketqua.diem, mon_hoc.mamonhoc, mon_hoc.tenmonhoc
			FROM ketqua
			INNER JOIN sinhvien
			ON ketqua.masv = sinhvien.masv
			INNER JOIN mon_hoc
			ON ketqua.mamonhoc = mon_hoc.mamonhoc";
	$query = $db->query($sql);
	$result = $query->fetch_all(MYSQLI_ASSOC);
	$stt = 1;
	?>
	<?php  
	if (isset($_POST['reset'])){
		header('Location: sinhvien_diem.php');
	}
	$sql = "SELECT sinhvien.masv, sinhvien.hoten, ketqua.diem, mon_hoc.mamonhoc, mon_hoc.tenmonhoc
			FROM ketqua
			INNER JOIN sinhvien
			ON ketqua.masv = sinhvien.masv
			INNER JOIN mon_hoc
			ON ketqua.mamonhoc = mon_hoc.mamonhoc
			WHERE 1=1";
	// Điểm
	if (isset($_POST['diemtang'])){
		$sql .= " ORDER BY ketqua.diem ASC";
	}
	if (isset($_POST['diemgiam'])){
		$sql .= " ORDER BY ketqua.diem DESC";
	}
	// Tên
	if (isset($_POST['tentang'])){
		$sql .= " ORDER BY sinhvien.hoten ASC";
	}
	if (isset($_POST['tengiam'])){
		$sql .= " ORDER BY sinhvien.hoten DESC";
	}
	// Mã sinh viên
	if (isset($_POST['masvtang'])){
		$sql .= " ORDER BY sinhvien.masv ASC";
	}
	if (isset($_POST['masvgiam'])){
		$sql .= " ORDER BY sinhvien.masv DESC";
	}
	// Môn học
	if (isset($_POST['monhoctang'])){
		$sql .= " ORDER BY mon_hoc.tenmonhoc ASC";
	}
	if (isset($_POST['monhocgiam'])){
		$sql .= " ORDER BY mon_hoc.tenmonhoc DESC";
	}
	// Mã môn học
	if (isset($_POST['mamonhoctang'])){
		$sql .= " ORDER BY mon_hoc.mamonhoc ASC";
	}
	if (isset($_POST['mamonhocgiam'])){
		$sql .= " ORDER BY mon_hoc.mamonhoc DESC";
	}

	$query = $db->query($sql);
	$result = $query->fetch_all(MYSQLI_ASSOC);
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
			<a href="logout.php">Đăng xuất</a>
		</div>
	</div>
	<div id="sort">
		<form action="" method="post">
			<input type="submit" name="diemtang" value="Điểm tăng dần">
			<input type="submit" name="diemgiam" value="Điểm giảm dần">

			<input type="submit" name="tentang" value="Tên tăng dần">
			<input type="submit" name="tengiam" value="Tên giảm dần">

			<input type="submit" name="masvtang" value="Mã sinh viên tăng dần">
			<input type="submit" name="masvgiam" value="Mã sinh viên giảm dần">

			<input type="submit" name="monhoctang" value="Tên môn học tăng dần">
			<input type="submit" name="monhocgiam" value="Tên môn học giảm dần">

			<input type="submit" name="mamonhoctang" value="Mã môn học tăng dần">
			<input type="submit" name="mamonhocgiam" value="Mã môn học giảm dần">
		</form>
	</div>
	<div id="noidung" align="center">
		<h1>Danh sách điểm</h1>
		<table>
			<thead>
				<tr>
					<td>STT</td>
					<td>Mã sinh viên</td>
					<td>Tên</td>
					<td>Điểm</td>
					<td>Mã môn học</td>
					<td>Tên môn học</td>
				</tr>
			</thead>
			<tbody>
				<?php  
				if (count($result) > 0):
					foreach ($result as $diem):
				?>
				<tr>
					<td><?php echo $stt ;?></td>
					<td><?php echo $diem['masv'] ;?></td>
					<td> <?php echo $diem["hoten"] ;?></td>
					<td> <?php echo $diem["diem"] ;?></td>
					<td><?php echo $diem['mamonhoc'] ;?></td>
					<td> <?php echo $diem["tenmonhoc"] ;?></td>
					<?php $stt ++ ;?>
				</tr>
				<?php  
					endforeach;
				endif;
				?>
			</tbody>
		</table><br>
		<form action="" method="post">
			<input type="submit" name="submit" value="Reset trang">
		</form>
	</div>
</body>
</html>