<?php   
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
if (isset($_SESSION['user'])){
	header('location: user/sinhvien.php');
	exit;
}
?>
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

	$sql = "SELECT sinhvien.hoten, sinhvien.masv, sinhvien.ngaysinh, sinhvien.gioitinh ,khoa.ten_khoa, khoa.makhoa
			FROM sinhvien
			INNER JOIN khoa
			ON sinhvien.makhoa = khoa.makhoa";
	$query = $db->query($sql);
	//MYSQLI_ASSOC đưa về dạng mảng kết hợp: Associative Array
	$result = $query->fetch_all(MYSQLI_ASSOC);
	$stt = 1;
	?>

	<?php  
	if (isset($_GET['submit'])){
		$sql = "SELECT sinhvien.hoten, sinhvien.masv, sinhvien.ngaysinh, sinhvien.gioitinh ,khoa.ten_khoa, khoa.makhoa
				FROM sinhvien
				INNER JOIN khoa
				ON sinhvien.makhoa = khoa.makhoa 
				WHERE 1=1";
		if (isset($_GET['masv']) && $_GET['masv'] != ''){
			$sql .= " AND masv LIKE '%" . trim($_GET['masv']) . "%'";
		}
		if (isset($_GET['hoten']) && $_GET['hoten'] != ''){
			$sql .= " AND hoten LIKE '%" . trim($_GET['hoten']) . "%'";
		}
		if (isset($_GET['email']) && $_GET['email'] != ''){
			$ql .= " AND email LIKE '%" . trim($_GET['email']) . "%'";
		}
		if (isset($_GET['gioitinh']) && $_GET['gioitinh'] != ''){
			$sql .= " AND gioitinh = " . trim($_GET['gioitinh']);
		}
	}
	if (isset($_POST['reset'])){
		header('Location: sinhvien.php');
	}
	if (isset($_POST['masvtang'])){
		$sql .= " ORDER BY masv ASC";
	}
	if (isset($_POST['masvgiam'])){
		$sql .= " ORDER BY masv DESC";
	}

	if (isset($_POST['tentang'])){
		$sql .= " ORDER BY hoten ASC";
	}
	if (isset($_POST['tengiam'])){
		$sql .= " ORDER BY hoten DESC";
	}

	if (isset($_POST['ngaytang'])){
		$sql .= " ORDER BY ngaysinh ASC";
	}
	if (isset($_POST['ngaygiam'])){
		$sql .= " ORDER BY ngaysinh DESC";
	}

	if (isset($_POST['makhoatang'])){
		$sql .= " ORDER BY makhoa ASC";
	}
	if (isset($_POST['makhoagiam'])){
		$sql .= " ORDER BY makhoa DESC";
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
			<input type="submit" name="masvtang" value="Mã Sinh Viên tăng">
			<input type="submit" name="masvgiam" value="Mã Sinh Viên giảm ">

			<input type="submit" name="tentang" value=" Tên Sinh Viên tăng">
			<input type="submit" name="tengiam" value=" Tên Sinh Viên giảm ">

			<input type="submit" name="ngaytang" value=" Ngày Sinh tăng">
			<input type="submit" name="ngaygiam" value=" Ngày Sinh giảm">

			<input type="submit" name="makhoatang" value="Mã Khoa tăng">
			<input type="submit" name="makhoagiam" value="Mã Khoa giảm">
		</form>
	</div><br>

	<div id="support">
		<form action="" method="get">
			Mã Sinh Viên:
			<input type="text" name="masv" placeholder="Mã sinh viên" value="<?php if (isset($_GET['masv'])) echo $_GET['masv'] ;?>">

			Tên Sinh Viên:
			<input type="text" name="hoten" placeholder="Tên sinh viên" value="<?php if (isset($_GET['hoten'])) echo $_GET['hoten'] ;?>">

			Email:
			<input type="text" name="email" placeholder="abc@xyz.com" value="<?php if (isset($_GET['email'])) echo $_GET['email'] ;?>">

			<input type="radio" name="gioitinh" value="1" <?php if (isset($_GET['gioitinh']) && $_GET['gioitinh'] == 1) echo "checked = 'checked' " ;?>> Nam
			<input type="radio" name="gioitinh" value="0" <?php if (isset($_GET['gioitinh']) && $_GET['gioitinh'] == 0) echo "checked = 'checked' " ;?>> Nữ

			<input type="submit" name="submit" value="Tìm Kiếm">
		</form>
	</div>

	<div id="noidung" align="center">
		<h1>Danh sách sinh viên</h1>

		<div class="message">
			<?php 
			if (isset($_SESSION['flash_msg'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['flash_msg'];?></p>
			<?php
				unset($_SESSION['flash_msg']);
			endif;
			?>
		</div>

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
					<td><a href="sinhvien_edit.php?masv=<?php echo $sv['masv'] ;?>">Sửa</a></td>
					<td><a onclick="return checkDelete();" href="sinhvien_delete.php?masv=<?php echo $sv['masv'];?>">Xóa</a></td>
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
				<button type="button"><a href="sinhvien_add.php" style="text-decoration: none;text-transform: uppercase; color: #000;">Thêm mới</a></button>
			<button type="button"><a href="diem_add.php" style="text-decoration: none;text-transform: uppercase; color: #000;">Thêm điểm</a></button>
			<button type="button"><a href="sinhvien_diem.php" style="text-decoration: none;text-transform: uppercase; color: #000;">Danh sách điểm</a></button>
			<input type="submit" name="reset" value="Reset trang">
		</form>
	</div>

</body>
</html>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa SV này?')) {
			return false;
		}
	}
</script>