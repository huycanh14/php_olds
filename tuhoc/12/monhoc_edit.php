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

$mamonhoc = $_GET['mamonhoc'];
$sql = "SELECT * FROM mon_hoc WHERE mamonhoc='{$mamonhoc}' LIMIT 1";
$query = $db -> query($sql);
$monhoc = $query -> fetch_all(MYSQLI_ASSOC);

if (count($monhoc)==0) {
	header('location: monhoc.php');
}

if (isset($_POST['submit'])) {
	$mamonhoc1 = trim($_POST['mamonhoc']);
	$tenmonhoc = trim($_POST['tenmonhoc']);
	if ($tenmonhoc == '') {
		$error[] = 'Vui lòng nhập tên môn học mới.';
	} else {
		$sql = "SELECT * FROM mon_hoc WHERE mamonhoc = '{mamonhoc1}' AND mamonhoc <> '{$mamonhoc}'";
		$query = $db->query($sql);
		$result = $query->fetch_all();
		if (count($result)!=0) {
			$error[]='Mã môn học đã bị trùng';
		} else {
			$sql = "UPDATE mon_hoc SET tenmonhoc='{$tenmonhoc}' WHERE mamonhoc='{$mamonhoc1}'";
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
		<h2 class="title">Sửa môn học</h2>
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
						<td class="chuoi"><input type="text" name="mamonhoc" readonly placeholder="mã môn học" value="<?php if(isset($_POST['mamonhoc'])) {echo $_POST['mamonhoc'];} else {echo $monhoc[0]['mamonhoc'];} ?>"></td>
						<td class="chuoi"><input type="text" name="tenmonhoc" readonly placeholder="tên môn học" value="<?php echo $monhoc[0]['tenmonhoc'];?>"></td>
					</tr>
					<tr>
						<td>Nhập tên môn học mới</td>
						<td class="chuoi"><input type="text" name="tenmonhoc" placeholder="tên môn học mới" value="<?php if(isset($_POST['tenmonhoc'])) {echo $_POST['tenmonhoc'];}?>"></td>
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