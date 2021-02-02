<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$title = "Thêm sinh viên";
include("header.php");
$error = [];
$sql = "SELECT * FROM lop";
$lop = mysqli_query($conn, $sql);
if(isset($_POST['submit'])){
	$masv = trim($_POST['MaSV']);
	$tensv = trim($_POST['TenSV']);
	$lopid = trim($_POST['LopID']);
	//echo $lopid; return;
	if($masv == "" || $tensv == ""){
		$error[] = "Thông tin đang bỏ trống";
	}
	if(count($error) == 0){
		$sql = "INSERT INTO sinhvien(MaSinhVien, TenSinhVien, LopID) VALUES ('{$masv}', '{$tensv}', {$lopid})";
		//echo $sql; return;
		if (mysqli_query($conn, $sql)) {
			header('Location: dssinhvien.php?status=add_success');
		} else {
			header('Location: dssinhvien.php?status=add_fail');
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
				<input type="text" class="form-control" placeholder="Mã sinh viên" name="MaSV">
			</div>
			<div class="form-group">
				<label for="">Tên sinh viên</label>
				<input type="text" class="form-control" placeholder="Tên sinh viên" name="TenSV">
			</div>
			<div class="form-group">
				<label for="">Tên lớp</label>
				<select class="form-control" name="LopID">
					<?php if (mysqli_num_rows($lop) > 0): ?>
						<?php foreach ($lop as $item) :?>
							<option value="<?php echo $item['LopID'] ?>"><?php echo $item['TenLop']; ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Thêm">&nbsp;<input type="button" class="btn btn-primary" name="btnCancel" value="Bỏ" onclick="history.back(1)">
		</form>
	</div>
</div>

<?php 
	include("footer.php");
?>