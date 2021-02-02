<?php   
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
if (isset($_SESSION['user'])){
	header('location: user/khoa.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Khoa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	<?php 
	require('connect.php');
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
			$sql .= " AND makhoa LIKE '%" . trim($_GET['makhoa']) . "%'";
		}

		if (isset($_GET['ten_khoa']) && $_GET['ten_khoa'] != ''){
			$sql .= " AND ten_khoa LIKE '%" . trim($_GET['ten_khoa']) . "%'";
		}
	}

	if (isset($_POST['reset'])){
		header('Location: khoa.php');
	}
	if (isset($_POST['makhoatang'])){
		$sql .= " ORDER BY makhoa ASC";
	}
	if (isset($_POST['makhoagiam'])){
		$sql .= " ORDER BY makhoa DESC";
	}
	if (isset($_POST['tenkhoatang'])){
		$sql .= " ORDER BY ten_khoa ASC";
	}
	if (isset($_POST['tenkhoagiam'])){
		$sql .= " ORDER BY ten_khoa DESC";
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
			<input type="submit" name="makhoatang" value="Mã khoa tăng dần">
			<input type="submit" name="makhoagiam" value="Mã khoa giảm dần">
			<input type="submit" name="tenkhoatang" value="Tên khoa tăng dần">
			<input type="submit" name="tenkhoagiam" value="Tên khoa giảm dần">
		</form>
	</div>
	<br>
	<div id="support" align="right" style="padding-right: 20px;">

		<div class="message" align="center">
			<?php 
			if (isset($_SESSION['khoa'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['khoa'];?></p>
			<?php
				unset($_SESSION['khoa']);
			endif;
			?>
		</div>

		<form action="" method="get">
			Mã Khoa : 
			<input type="text" name="makhoa" placeholder="Mã Khoa" value="<?php if (isset($_GET['makhoa'])) echo $_GET['makhoa'] ;?>">
			Tên Khoa:
			<input type="text" name="ten_khoa" placeholder="Tên Khoa" value="<?php if (isset($_GET['ten_khoa'])) echo $_GET['ten_khoa'] ;?>">
			<input type="submit" name="submit" value="Tìm kiếm">

		</form>
	</div>
	<div id="noidung" align="center">
		
		<h1>Danh sách khoa</h1>
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
					<td><a href="khoa_edit.php?makhoa=<?php echo $khoa['makhoa'] ;?>">Sửa</a></td>
					<td><a onclick="return checkDelete();" href="khoa_delete.php?makhoa=<?php echo $khoa['makhoa'] ; ?>">Xóa</a></td>
					<?php $stt++; ?>
				</tr>
				<?php
					endforeach;
				endif; 
				?>
			</tbody>
		</table>
		<br>
		<form action="" method="post">
			<button type="button"><a href="khoa_add.php" style="text-decoration: none;text-transform: uppercase; color: #000;">Thêm mới</a></button>
			<input type="submit" name="reset" value="Reset trang">
		</form>
	</div>

</body>
</html>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa khoa này?')) {
			return false;
		}
	}
</script>