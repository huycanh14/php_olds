<?php 
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
// Gọi file kết nối CSDL
require('connect.php');

include('header.php');
?>

	<section class="content clearfix">
		<div class="container danhsach">
			<h2 class="title">Tổng quan</h2>
			<table>
				<thead>
					<tr class="tieude">
						<th><a href="khoa.php">Tổng khoa</a></th>
						<th><a href="monhoc.php">Tổng môn học</a></th>
						<th><a href="sinhvien.php">Tổng sinh viên</a></th>
						<th><a href="ketqua_diem.php">Bảng điểm</a></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center"><?php
						// Đếm số khoa
						$sql = "SELECT COUNT(*) FROM khoa";
						$query = $db->query($sql);
						$result = $query->fetch_row();
						echo $result[0];
						?></td>
						<td class="center"><?php
						// Đếm số môn học
						$sql = "SELECT COUNT(*) FROM mon_hoc";
						$query = $db->query($sql);
						$result = $query->fetch_row();
						echo $result[0];
						?></td>
						<td class="center"><?php
						// Đếm số sinh viên
						$sql = "SELECT COUNT(*) FROM sinhvien";
						$query = $db->query($sql);
						$result = $query->fetch_row();
						echo $result[0];
						?></td>
						<td class="center"><?php
						// Đếm số điểm
						$sql = "SELECT COUNT(*) FROM ketqua";
						$query = $db->query($sql);
						$result = $query->fetch_row();
						echo $result[0];
						?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>

<?php
 include('footer.php');
?>

