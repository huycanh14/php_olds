<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}
require('connect.php');
include('header.php');

$error = [];
$isCreated = 0;

$masv = $_GET['masv'];
// kiểm tra sự tồn tại của sv và lấy tất sv
$sql = "SELECT * FROM sinhvien WHERE masv = '{$masv}'";
$query = $db -> query($sql);
$sinhvien = $query -> fetch_all(MYSQLI_ASSOC);

if (!$masv || count($sinhvien) == 0) {
	header("location: sinhvien.php");
}
// lấy điểm của sinh viên
$sql = "SELECT * FROM ketqua WHERE masv = '{$masv}'";
$query = $db -> query($sql);
$diem = $query -> fetch_all(MYSQLI_ASSOC);
// lấy môn
$sql = "SELECT * FROM mon_hoc";
$query = $db->query($sql);
$monhoc = $query->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
	if ($_POST['masv']=='' || !isset($_POST['masv'])) {
		$error[] = "Vui lòng chọn sinh viên";
	}

	if (count($error) == 0) {
		$masv1 = trim($_POST['masv']);
		
		$sql = "SELECT * FROM sinhvien WHERE masv = '{$masv1}' AND masv <> '{$masv}'";
		$query = $db -> query($sql);
		$result = $query -> fetch_assoc();
		if (!is_null($result)) {
			$error[]='Sinh viên bị trùng.';
		} else {
			for ($i=0; $i < count($monhoc); $i++) { 
				$mamonhoc = $monhoc[$i]['mamonhoc'];
				$diem = round($_POST[$mamonhoc],2);
				if ($diem<0 || $diem>10) {
					$error[]='Điểm môn '.$mamonhoc.' là một số trong khoảng 0-10';
				}
				$sql = "SELECT * FROM ketqua WHERE masv='{$masv1}' AND mamonhoc='{$mamonhoc}'";
				$query = $db->query($sql);
				$result = $query->fetch_assoc();
				if (!is_null($result)) {
					$sql = "UPDATE ketqua SET diem='{$diem}' WHERE masv='{$masv1}' AND mamonhoc='{$mamonhoc}'";
				} else {
					$sql = "INSERT INTO ketqua(diem,masv,mamonhoc) VALUES ('{$diem}','{$masv1}','{$mamonhoc}')";
				}
				$query1 = $db -> query($sql);
			}
			if ($query1) {
				$isCreated = 1;
			} else {
				$error[]="Lỗi rồi, không thể thực hiện";
			}
		}
	}
}
?>
<section>
	<div class="container themmoi">
		<h2 class="title">Cập nhật điểm</h2>
		<div class="message">
			<?php
			if (count($error) > 0) :
				for ($i=0; $i < count($error); $i++) :
					?>
					<p style="color:red;"><?php echo $error[$i]?></p>
					<?php 
				endfor;
			endif;
			?>
			<?php if($isCreated == 1) :?>
				<p style="color:blue;">Cập nhật thành công!</p>
			<?php endif; ?>
		</div>

		<form action="" method="POST">
			<table>
				<tr>
					<td class="nganhon">
						<input type="text" name="masv" placeholder="mã sinh viên" readonly value="<?php echo $sinhvien[0]['masv'];?>">
					</td>
					<td class="chuoi"><input type="text" name="tensv" placeholder="tên sinh viên" readonly value="<?php echo $sinhvien[0]['hoten'];?>"></td>
					</tr>
					<tr>
						<th>Môn học</th>
						<th colspan="2">Nhập điểm</th>
					</tr>
					<?php 
					foreach ($monhoc as $rs) :
						$mamon = $rs['mamonhoc'];
						?>
						<tr>
							<td class="daihon"><?php echo $rs['tenmonhoc'].' - '.$mamon;?>:</td>
							<td class="nganhon center" colspan="2"><input type="text" name="<?php echo $mamon;?>" placeholder="điểm" value="<?php if(isset($_POST[$mamon]) && $_POST[$mamon] != '') {echo $_POST[$mamon];} else {foreach($diem as $di){if ($di['mamonhoc']==$mamon) {echo $di['diem'];}}} ?>"></td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<td></td>
						<td colspan="2"><input type="submit" name="submit" value="Cập nhật điểm" class="submit"></td></tr>
					</table>
				</form>
			</div>
		</section>



		<?php 
		include('footer.php'); 
		?>