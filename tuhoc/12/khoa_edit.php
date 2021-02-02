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

$makhoa = $_GET['makhoa'];
$sql = "SELECT * FROM khoa WHERE makhoa='{$makhoa}' LIMIT 1";
$query = $db -> query($sql);
$khoa = $query -> fetch_all(MYSQLI_ASSOC);

if (count($khoa)==0) {
	header('location: khoa.php');
}

if (isset($_POST['submit'])) {
	$makhoa1 = trim($_POST['makhoa']);
	$ten_khoa = trim($_POST['ten_khoa']);
	if ($ten_khoa == '') {
		$error[] = 'Vui lòng nhập tên khoa mới.';
	} else {
		$sql = "SELECT * FROM khoa WHERE makhoa = '{makhoa1}' AND makhoa <> '{$makhoa}'";
		$query = $db->query($sql);
		$result = $query->fetch_all();
		if (count($result)!=0) {
			$error[]='Mã Khoa đã bị trùng';
		} else {
			$sql = "UPDATE khoa SET ten_khoa='{$ten_khoa}' WHERE makhoa='{$makhoa1}'";
			$query = $db->query($sql);
			if ($query) {
				$isCreated = 1;
			} else {
				$error[] = 'Lỗi rồi, không thực hiện được';
			}
		}
	}
}
?>

<section>
	<div class="container themmoi">
		<h2 class="title">Sửa Khoa</h2>
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
				<p style="color:blue;">Sửa thành công!</p>
			<?php endif; ?>
		</div>
		<form action="" method="POST">
			<table>
					<tr>
						<td class="chuoi"><input type="text" name="makhoa" readonly placeholder="mã khoa" value="<?php if(isset($_POST['makhoa'])) {echo $_POST['makhoa'];} else {echo $khoa[0]['makhoa'];} ?>"></td>
						<td class="chuoi"><input type="text" name="ten_khoa" readonly placeholder="tên khoa" value="<?php echo $khoa[0]['ten_khoa'];?>"></td>
					</tr>
					<tr>
						<td>Nhập tên khoa mới</td>
						<td class="chuoi"><input type="text" name="ten_khoa" placeholder="tên khoa mới" value="<?php if(isset($_POST['ten_khoa'])) {echo $_POST['ten_khoa'];}?>"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2"><input type="submit" name="submit" value="Cập nhật Chỉnh sửa" class="submit"></td></tr>
					</table>
				</form>
			</div>
		</section>



		<?php 
		include('footer.php'); 
		?>