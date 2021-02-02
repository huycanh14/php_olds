<?php  
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
	header('Location: ../login.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Môn học</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
	<?php 
	require('../connect.php');
	include('../header.php');
	?>
	<?php 
	/**
	 * Lấy nhiều bản ghi
	 */
	$sql = "SELECT mamonhoc, tenmonhoc FROM mon_hoc";
	$query = $db->query($sql);
	//MYSQLI_ASSOC đưa về dạng mảng kết hợp: Associative Array
	$result = $query->fetch_all(MYSQLI_ASSOC);
	$stt = 1;
	?>
	<?php  
	if (isset($_GET['submit'])){
		$sql = "SELECT mamonhoc, tenmonhoc FROM mon_hoc WHERE 1=1";

		if (isset($_GET['mamonhoc']) && $_GET['mamonhoc'] != ''){
			$sql .= " AND mamonhoc LIKE '%" . trim($_GET['mamonhoc']) . "%'";
		}

		if (isset($_GET['tenmonhoc']) && $_GET['tenmonhoc'] != ''){
			$sql .= " AND tenmonhoc LIKE '%" . trim($_GET['tenmonhoc']) . "%'";
		}
	}

	if (isset($_POST['reset'])){
		header('Location: monhoc.php');
	}
	if (isset($_POST['mamonhoctang'])){
		$sql .= " ORDER BY mamonhoc ASC";
	}
	if (isset($_POST['mamonhocgiam'])){
		$sql .= " ORDER BY mamonhoc DESC";
	}
	if (isset($_POST['tenmonhoctang'])){
		$sql .= " ORDER BY tenmonhoc ASC";
	}
	if (isset($_POST['tenmonhocgiam'])){
		$sql .= " ORDER BY tenmonhoc DESC";
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
			<input type="submit" name="mamonhoctang" value="Mã Môn Học tăng dần">
			<input type="submit" name="mamonhocgiam" value="Mã Môn Học giảm dần">
			<input type="submit" name="tenmonhoctang" value="Tên Môn Học tăng dần">
			<input type="submit" name="tenmonhocgiam" value="Tên Môn Học giảm dần">
		</form>
	</div>
	<br>

	<div id="support" align="right" style="padding-right: 20px;">
		<form action="" method="get">
			Mã Môn Học : 
		<input type="text" name="mamonhoc" placeholder="Mã Môn Học" value="<?php if (isset($_GET['mamonhoc'])) echo $_GET['mamonhoc'] ;?>">
		Tên Môn Học:
		<input type="text" name="tenmonhoc" placeholder="Tên Môn Học" value="<?php if (isset($_GET['tenmonhoc'])) echo $_GET['tenmonhoc'] ;?>">
		<input type="submit" name="submit" value="Tìm kiếm">

		</form>
	</div>

	<div id="noidung" align="center">

		<div class="message">
			<?php 
			if (isset($_SESSION['monhoc'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['monhoc'];?></p>
			<?php
				unset($_SESSION['monhoc']);
			endif;
			?>
		</div>

		<h1>Danh sách môn học</h1>
		<table>
			<thead>
				<tr>
					<th>STT</th>
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
					<td><?php echo $stt ;?></td>
					<td><?php echo $monhoc['mamonhoc'];?></td>
					<td><?php echo $monhoc['tenmonhoc'];?></td>
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
			<input type="submit" name="reset" value="Reset trang">
		</form>
	</div>

</body>
</html>


