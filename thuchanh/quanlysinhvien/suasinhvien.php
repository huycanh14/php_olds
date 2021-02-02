<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$title = "Sửa sinh viên";
include("header.php");
$error = [];
$sql = "SELECT * FROM lop";
$lop = mysqli_query($conn, $sql);
$masvcu = $_GET['masv'];
$sql = "SELECT * FROM sinhvien WHERE MaSinhVien = '{$masvcu}' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$sv = mysqli_fetch_assoc($result);
}
if(isset($_POST['submit'])){
	$masv = trim($_POST['MaSV']);
	$tensv = trim($_POST['TenSV']);
	$lopid = trim($_POST['LopID']);
	//echo $lopid; return;
	if($masv == "" || $tensv == ""){
		$error[] = "Thông tin đang bỏ trống";
	}
	if(count($error) == 0){
		$sql = "UPDATE sinhvien SET MaSinhVien = '{$masv}', TenSinhVien = '{$tensv}', LopID = '{$lopid}' WHERE MaSinhVien = '{$masvcu}'";
		//echo $sql; return;
		if (mysqli_query($conn, $sql)) {
			header('Location: dssinhvien.php?status=update_success');
		} else {
			header('Location: dssinhvien.php?status=update_fail');
		}
	}
}
?>

<div class="content" style="padding-top: 20px;">
	<div class="container">
		<form action="" method="post">
			<?php if (count($error) > 0) :?>
				<?php for ($i = 0; $i < count($error); $i++) :?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Error: </strong><?php echo $error[$i];?></p>					
					</div>
				<?php endfor;?>
			<?php endif ;?>
			<div class="form-group">
				<label for="">Mã sinh viên</label>
				<input type="text" class="form-control" placeholder="Mã sinh viên" name="MaSV" value="<?php if (isset($_POST['MaSV'])) echo $_POST['MaSV']; else echo $sv['MaSinhVien'] ;?>">
			</div>
			<div class="form-group">
				<label for="">Tên sinh viên</label>
				<input type="text" class="form-control" placeholder="Tên sinh viên" name="TenSV" value="<?php if (isset($_POST['TenSV'])) echo $_POST['TenSV']; else echo $sv['TenSinhVien'] ;?>">
			</div>
			<div class="form-group">
				<label for="">Tên lớp</label>
				<select class="form-control" name="LopID">
					<?php if (mysqli_num_rows($lop) > 0): ?>
						<?php foreach ($lop as $item) :?>
							<option value="<?php echo $item['LopID'] ;?>"
								<?php if ( (isset($_POST["LopID"])) && $_POST["LopID"] == $item["LopID"] || $sv["LopID"] == $item["LopID"]) echo 'selected = "selected" ' ;?>
								><?php echo $item['TenLop']; ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Sửa">&nbsp;<input type="button" class="btn btn-primary" name="btnCancel" value="Bỏ" onclick="history.back(1)">
		</form>
	</div>
</div>

<?php 
	include("footer.php");
?>