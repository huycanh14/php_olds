<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
require('connect.php');
include("header.php");

$sql = "SELECT * FROM mon_hoc";

@$sapxep = $_GET['xep'];
@$xepcot = $_GET['cot'];
if ($sapxep=='tang') {
	$sql = "SELECT * FROM mon_hoc ORDER BY $xepcot ASC";
}
if ($sapxep=='giam') {
	$sql = "SELECT * FROM mon_hoc ORDER BY $xepcot DESC";
}

$nokey = 0;
if (isset($_GET['timkiem'])) {
	if (trim($_GET['mamonhoc']) == '' && trim($_GET['tenmonhoc']) == '') {
		$nokey = 1;
	} else {
		$mamonhoc = trim($_GET['mamonhoc']);
		$tenmonhoc = trim($_GET['tenmonhoc']);
		$sql = "SELECT * FROM mon_hoc WHERE mamonhoc LIKE '%{$mamonhoc}%' AND tenmonhoc LIKE '%{$tenmonhoc}%'";
	}
}

$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);

$isCreated = 0;
if (isset($_GET['del'])) {
	@$sql = "SELECT * FROM mon_hoc WHERE mamonhoc='{$_GET['del']}'";
$query = $db->query($sql);
$monhoc = $query->fetch_all();

if (count($monhoc)==0) {
	$isCreated = 1;
}
}
?>
<section>
	<div class="container danhsach">
		<h2 class="title">Danh sách môn học</h2>
		<div class="menu-small">
			<a href="monhoc_create.php">Thêm môn học</a>
		</div>
		<div class="menu-small clearfix cach-top">
			<a href="monhoc.php?cot=mamonhoc&xep=tang">Mã môn tăng dần</a>
			<a href="monhoc.php?cot=mamonhoc&xep=giam">Mã môn giảm dần</a>
			<a href="monhoc.php?cot=tenmonhoc&xep=tang">Tên môn tăng dần</a>
			<a href="monhoc.php?cot=tenmonhoc&xep=giam">Tên môn giảm dần</a>
		</div>
		<div class="timkiem">
				<form action="" method="get">
					Tìm kiếm: 
					<input type="text" name="mamonhoc" class="tukhoa <?php if($nokey==1) {echo 'nokey';}?>" placeholder="mã môn học">
					<input type="text" name="tenmonhoc" class="tukhoa <?php if($nokey==1) {echo 'nokey';}?>" placeholder="tên môn học">
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
					<th>Mã môn học</th>
					<th>Tên môn học</th>
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
							<td class="center"><?php echo $sv['mamonhoc'];?></td>
							<td><?php echo $sv['tenmonhoc'];?></td>
							<td class="tacvu"><a href="monhoc_edit.php?mamonhoc=<?php echo $sv['mamonhoc'];?>">sửa</a></td>
							<td class="tacvu"><a href="monhoc_del.php?mamonhoc=<?php echo $sv['mamonhoc'];?>">xóa</a></td>
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