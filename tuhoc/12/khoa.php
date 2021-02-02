<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
require('connect.php');
include("header.php");

$sql = "SELECT * FROM khoa";

@$sapxep = $_GET['xep'];
@$xepcot = $_GET['cot'];
if ($sapxep=='tang') {
	$sql = "SELECT * FROM khoa ORDER BY $xepcot ASC";
}
if ($sapxep=='giam') {
	$sql = "SELECT * FROM khoa ORDER BY $xepcot DESC";
}

$nokey = 0;
if (isset($_GET['timkiem'])) {
	if (trim($_GET['makhoa']) == '' && trim($_GET['ten_khoa']) == '') {
		$nokey = 1;
	} else {
		$makhoa = trim($_GET['makhoa']);
		$ten_khoa = trim($_GET['ten_khoa']);
		$sql = "SELECT * FROM khoa WHERE makhoa LIKE '%{$makhoa}%' AND ten_khoa LIKE '%{$ten_khoa}%'";
	}
}

$query = $db->query($sql);
//MYSQLI_ASSOC đưa về dạng mảng kết hợp: Associative Array
$result = $query->fetch_all(MYSQLI_ASSOC);

$isCreated = 0;
if (isset($_GET['del'])) {
	@$sql = "SELECT * FROM khoa WHERE makhoa='{$_GET['del']}'";
	$query = $db->query($sql);
	$khoa = $query->fetch_all();
	if (count($khoa)==0) {
		$isCreated = 1;
	}
}

?>
<section>
	<div class="container danhsach">
		<h2 class="title">Danh sách khoa</h2>
		<div class="menu-small">
			<a href="khoa_create.php">Thêm khoa</a>
		</div>
		<div class="menu-small clearfix cach-top">
			<a href="khoa.php?cot=makhoa&xep=tang">Mã khoa tăng dần</a>
			<a href="khoa.php?cot=makhoa&xep=giam">Mã khoa giảm dần</a>
			<a href="khoa.php?cot=ten_khoa&xep=tang">Tên khoa tăng dần</a>
			<a href="khoa.php?cot=ten_khoa&xep=giam">Tên khoa giảm dần</a>
		</div>
			<div class="timkiem">
				<form action="" method="get">
					Tìm kiếm: 
					<input type="text" name="makhoa" class="tukhoa <?php if($nokey==1) {echo 'nokey';}?>" placeholder="mã khoa">
					<input type="text" name="ten_khoa" class="tukhoa <?php if($nokey==1) {echo 'nokey';}?>" placeholder="tên khoa">
					<input type="submit" name="timkiem" class="submit <?php if($nokey==1) {echo 'nokey';}?>" value="Tìm kiếm">
				</form>
			</div>
		<div class="message">
			<?php if($isCreated == 1) :?>
				<p style="color:green;margin-left:30%;">Xóa thành công!</p>
			<?php endif; ?>
		</div>
		<table>
			<thead>
				<tr>
					<th>STT</th>
					<th>Mã khoa</th>
					<th>Tên khoa</th>
					<th colspan="2">Tác vụ</th>
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
							<td class="center"><?php echo $sv['makhoa'];?></td>
							<td><?php echo $sv['ten_khoa'];?></td>
							<td class="tacvu"><a href="khoa_edit.php?makhoa=<?php echo $sv['makhoa'];?>">sửa</a></td>
							<td class="tacvu"><a href="khoa_del.php?makhoa=<?php echo $sv['makhoa'];?>">xóa</a></td>
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