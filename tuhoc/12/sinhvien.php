<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
require('connect.php');
include("header.php");
$sql = "SELECT * FROM sinhvien WHERE 1=1";

if (isset($_GET['masv']) && $_GET['masv'] != '') {
	$sql .= " AND masv  LIKE '%" . trim($_GET['masv']) . "%'";
}

if (isset($_GET['hoten']) && $_GET['hoten'] != '') {
	$sql .= " AND hoten  LIKE '%" . trim($_GET['hoten']) . "%'";
}

if (isset($_GET['email']) && $_GET['email'] != '') {
	$sql .= " AND email  LIKE '%" . trim($_GET['email']) . "%'";
}

$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);
?>
<section>
	<div class="container danhsach">
		<h2 class="title">Danh sách sinh viên</h2>
		<div class="menu-small">
			<a href="sinhvien_create.php">Thêm sinh viên</a>
		</div>
		<div class="menu-small clearfix cach-top">
			<a href="sinhvien.php?cot=masv&xep=tang">Mã SV tăng</a>
			<a href="sinhvien.php?cot=masv&xep=giam">Mã SV giảm</a>
			<a href="sinhvien.php?cot=hoten&xep=tang">Tên SV tăng</a>
			<a href="sinhvien.php?cot=hoten&xep=giam">Tên SV giảm</a>
			<a href="sinhvien.php?cot=ngaysinh&xep=tang">Ngày sinh tăng</a>
			<a href="sinhvien.php?cot=ngaysinh&xep=giam">Ngày sinh giảm</a>
			<a href="sinhvien.php?cot=makhoa&xep=tang">Mã khoa tăng</a>
			<a href="sinhvien.php?cot=makhoa&xep=giam">Mã khoa giảm</a>
		</div>
		<div class="timkiem clearfix">
				<form action="" method="get">
					Tìm kiếm: 
					<input type="text" name="masv" class="tukhoa" placeholder="mã sinh viên" value="<?php if (isset($_GET['masv'])) echo $_GET['masv']; ?>">
					<input type="text" name="hoten" class="tukhoa" placeholder="tên sinh viên" value="<?php if (isset($_GET['hoten'])) echo $_GET['hoten']; ?>">
					<input type="text" name="ngaysinh" class="tukhoa" placeholder="Ngày sinh">
					<input type="text" name="email" class="tukhoa" placeholder="email">
					<input type="radio" name="gioitinh" class="radio" value='1'>Nam
					<input type="radio" name="gioitinh" class="radio" value='0'>Nữ
					<input type="submit" name="timkiem" class="submit" value="Tìm kiếm">
				</form>
			</div>
		<div class="message">
			<?php 
			if (isset($_SESSION['flash_msg'])) :
			?>
				<p style="color:green;margin-left:30%;"><?php echo $_SESSION['flash_msg'];?></p>
			<?php
				unset($_SESSION['flash_msg']);
			endif;
			?>

		</div>
		<table>
			<thead>
				<tr>
					<th>STT</th>
					<th>Mã sinh viên</th>
					<th>Tên sinh viên</th>
					<th>Giới tính</th>
					<th>Ngày sinh</th>
					<th>Địa chỉ</th>
					<th>Email</th>
					<th>Mã khoa</th>
					<th colspan="3">Tác vụ</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$stt=0;
				if (count($result) > 0) :
					foreach ($result as $sv) :
						?>
						<tr>
							<td class="center"><?php echo ++$stt;?></td>
							<td class="center"><?php echo $sv['masv'];?></td>
							<td><?php echo $sv['hoten'];?></td>
							<td class="center"><?php if ($sv['gioitinh']=="1") echo "nam"; else echo "nữ";?></td>
							<td><?php echo $sv['ngaysinh'];?></td>
							<td><?php echo $sv['diachi'];?></td>
							<td><?php echo $sv['email']; ?></td>
							<td><?php echo $sv['makhoa'];?></td>
							<td class="tacvu"><a href="ketqua_update.php?sv&masv=<?php echo $sv['masv'];?>">Thêm Điểm</a></td>
							<td class="tacvu"><a href="sinhvien_edit.php?masv=<?php echo $sv['masv'];?>">sửa</a></td>
							<td class="tacvu"><a onclick="return checkDelete();" href="sinhvien_del.php?masv=<?php echo $sv['masv'];?>">xóa</a></td>
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

<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa SV này?')) {
			return false;
		}
	}
</script>