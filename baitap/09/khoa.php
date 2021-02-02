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
	$stt = 1;

	?>
	<?php  
	if (isset($_GET['submit'])){
		$sql = "SELECT makhoa, ten_khoa FROM khoa WHERE 1=1";

		if (isset($_GET['makhoa']) && $_GET['makhoa'] != ''){
			$sql .= " AND makhoa LIKE '%" . trim($_GET['makhoa']) .  "%'";
		}

		if (isset($_GET['tenkhoa']) && $_GET['tenkhoa'] != ''){
			$sql .= " AND ten_khoa LIKE '%" . trim($_GET['tenkhoa']) .  "%'";
		}
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		var_dump($result);
		exit;
	}
	?>
	<form action="" method="get">
		<div class="timkiem">
			Tìm kiếm:
			<input type="text" name="makhoa" placeholder="Mã Khoa" value="<?php if (isset($_POST['makhoa'])) echo $_POST['makhoa'] ;?>">
			<input type="text" name="tenkhoa" placeholder="Tên Khoa" value="<?php if (isset($_POST['tenkhoa'])) echo $_POST['tenkhoa'] ;?>">
			<input type="submit" name="submit" value="Tìm kiếm">
		</div>
	</form>

	<div id="noidung" align="center">
		<a href="khoa_ad.php">Thêm mới</a>
		<table>
			<thead>
				<tr>
					<th>STT</th>
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
					<td> <?php echo $stt; ?>  </td>
					<td><?php echo $khoa['makhoa'];?></td>
					<td><?php echo $khoa['ten_khoa'];?></td>
					<?php $stt++; ?>
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