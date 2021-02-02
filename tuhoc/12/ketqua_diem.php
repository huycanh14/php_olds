<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
require('connect.php');
include("header.php");

// lay nhieu ban ghi
$sql = "SELECT ketqua.diem, sinhvien.hoten, sinhvien.masv, mon_hoc.mamonhoc, mon_hoc.tenmonhoc FROM ketqua INNER JOIN sinhvien ON ketqua.masv=sinhvien.masv INNER JOIN mon_hoc ON ketqua.mamonhoc=mon_hoc.mamonhoc";

if (!isset($_SESSION['is_admin'])) {
	$sql .= " WHERE ketqua.masv = '" . $_SESSION['user']['masv'] . "'";
}


$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);

?>
<section>
	<div class="container danhsach">
		<h2 class="title">Danh sách điểm</h2>
		<div class="menu-small clearfix cach-top">
			<a href="ketqua_diem.php?cot=masv&xep=tang">Mã SV tăng</a>
			<a href="ketqua_diem.php?cot=masv&xep=giam">Mã SV giảm</a>
			<a href="ketqua_diem.php?cot=hoten&xep=tang">Tên SV tăng</a>
			<a href="ketqua_diem.php?cot=hoten&xep=giam">Tên SV giảm</a>
			<a href="ketqua_diem.php?cot=mamonhoc&xep=tang">Mã môn tăng</a>
			<a href="ketqua_diem.php?cot=mamonhoc&xep=giam">Mã môn giảm</a>
			<a href="ketqua_diem.php?cot=tenmonhoc&xep=tang">Tên môn tăng</a>
			<a href="ketqua_diem.php?cot=tenmonhoc&xep=giam">Tên môn giảm</a>
			<a href="ketqua_diem.php?cot=diem&xep=tang">Điểm tăng</a>
			<a href="ketqua_diem.php?cot=diem&xep=giam">Điểm giảm</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>Điểm</th>
					<th>Tên sinh viên</th>
					<th>Mã sinh viên</th>
					<th>Tên môn học</th>
					<th>Mã môn</th>
					<th>Tác vụ</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($result) > 0) :
					foreach ($result as $sv) :
						?>
						<tr>
							<td class="center"><?php echo $sv['diem'];?></td>
							<td><?php echo $sv['hoten'];?></td>
							<td class="center"><?php echo $sv['masv'];?></td>
							<td><?php echo $sv['tenmonhoc'];?></td>
							<td class="center"><?php echo $sv['mamonhoc'];?></td>
							<td class="tacvu"><a href="ketqua_update.php?masv=<?php echo $sv['masv'];?>">sửa điểm</a></td>
						</tr>
						<?php
					endforeach;
				endif; 
				?>
			</tbody>
		</table>
	</div>
</section>


<?php
include('footer.php');
?>