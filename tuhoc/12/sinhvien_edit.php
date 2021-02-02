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

$sql = "SELECT * FROM sinhvien WHERE masv='{$masv}' LIMIT 1";
$query = $db -> query($sql);
$sinhvien = $query -> fetch_all(MYSQLI_ASSOC);

if (count($sinhvien)==0) {
	header('location: sinhvien.php');
}

if (isset($_POST['submit'])) {
	if ($_POST['masv']=='' || !isset($_POST['masv'])) {
		$error[] = "Vui lòng nhập mã sinh viên";
	}

	if ($_POST['hoten']=='' || !isset($_POST['hoten'])) {
		$error[] = "Vui lòng nhập họ tên sinh viên";
	}

	if (!isset($_POST['gender'])) {
		$error[] = "Vui lòng chọn giới tính";
	}

	if ($_POST['ngaysinh']=='' || !isset($_POST['ngaysinh'])) {
		$error[] = "Vui lòng nhập ngày sinh";
	}

	if ($_POST['diachi']=='' || !isset($_POST['diachi'])) {
		$error[] = "Vui lòng nhập địa chỉ";
	}

	if ($_POST['email']=='' || !isset($_POST['email'])) {
		$error[] = "Vui lòng nhập email";
	}

	if ($_POST['makhoa'] == 'nocheck' || !isset($_POST['makhoa'])) {
		$error[] = 'Vui lòng chọn khoa';
	}

	if (count($error) == 0) {
		$masv1 = trim($_POST['masv']);
		$hoten = trim($_POST['hoten']);
		$gioitinh = $_POST['gender'];
		$ngaysinh = trim($_POST['ngaysinh']);
		$diachi = trim($_POST['diachi']);
		$email = trim($_POST['email']);
		$makhoa = $_POST['makhoa'];
		// kiem tra ma sinh vien có trùng không
		$sql = "SELECT * FROM sinhvien WHERE masv='{$masv1}' AND masv <> '{$masv}' LIMIT 1";
		$query = $db -> query($sql);
		$result = $query -> fetch_assoc();

		if (!is_null($result)) {
			$error[] = "Mã sinh viên bị trùng.";
		} else {
			$sql = "UPDATE sinhvien SET hoten='{$hoten}', gioitinh='{$gioitinh}', ngaysinh='{$ngaysinh}', diachi='{$diachi}', email='{$email}', makhoa='{$makhoa}' WHERE masv='{$masv1}'";
			$query = $db -> query($sql);
			if (!is_null($query)) {
				$isCreated = 1;
			} else {
				$error[] = 'Lỗi không thực hiện được.';
			}
		}
	}
}
?>


<section>
	<div class="container themmoi">
		<h2 class="title">Sửa thông tin sinh viên</h2>
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
				<p style="color:blue;">Chỉnh sửa thành công!</p>
			<?php endif; ?>
		</div>
		<form action="" method="POST">
			<table>
				<tr>
					<td>Mã sinh viên (*):</td> 
					<td class="chuoi"><input readonly type="text" name="masv" placeholder="mã sinh viên" value="<?php if(isset($_POST['masv'])) {echo $_POST['masv'];} else {echo $sinhvien[0]['masv'];} ?>"></td>
				</tr>
				<tr>
					<td>Họ tên (*):</td> 
					<td class="chuoi"><input type="text" name="hoten" placeholder="họ tên" value="<?php if(isset($_POST['masv'])) {echo $_POST['hoten'];} else {echo $sinhvien[0]['hoten'];} ?>"></td>
				</tr>
				<tr>
					<td>Giới tính (*): </td>
					<td class="radio">
						<input type="radio" name="gender" value="1" 
						<?php 
						if((isset($_POST['gender']) && $_POST['gender']==1)||$sinhvien[0]['gioitinh']==1) {echo 'checked';} ?>
						>Nam 
						<input type="radio" name="gender" value="0" <?php if((isset($_POST['gender']) && $_POST['gender']==0)||$sinhvien[0]['gioitinh']==0) {echo 'checked';} ?>>Nữ</td>
					</tr>
					<tr>
						<td>Ngày sinh (*): </td>
						<td class="chuoi"><input type="text" name="ngaysinh" placeholder="YYYY-MM-DD" value="<?php if(isset($_POST['ngaysinh'])) {echo $_POST['ngaysinh'];} else {echo $sinhvien[0]['ngaysinh'];} ?>"></td>
					</tr>
					<tr>
						<td>Địa chỉ: </td>
						<td class="chuoi"><input type="text" name="diachi" placeholder="địa chỉ" value="<?php if(isset($_POST['diachi'])) {echo $_POST['diachi'];} else {echo $sinhvien[0]['diachi'];} ?>"></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td class="chuoi"><input type="email" name="email" placeholder="abc@example.com" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} else {echo $sinhvien[0]['email'];} ?>"></td>
					</tr>
					<tr>
						<td>Khoa: </td>
						<td>
							<?php
							$sql = "SELECT * FROM khoa";
							$query = $db->query($sql);
							$result = $query->fetch_all(MYSQLI_ASSOC);?>
							<select class="chon" name="makhoa">
								<option value="nocheck">-- chọn khoa --</option>
								<?php for ($i=0; $i < count($result); $i++) :?>
								<option value="<?php echo $result[$i]['makhoa'];?>" 
									<?php if((isset($_POST['makhoa']) && $_POST['makhoa']==$result[$i]['makhoa'])||$sinhvien[0]['makhoa']==$result[$i]['makhoa']) echo 'selected';?>>
										<?php echo $result[$i]['ten_khoa'];?>
									</option>
								<?php endfor;?>
							</select>
						</td>
					</tr>
					<tr><td colspan="2"><input type="submit" name="submit" class="submit" value="Cập nhật chỉnh sửa"></td></tr>
				</table>
			</form>
		</div>
	</section>



	<?php include('footer.php');