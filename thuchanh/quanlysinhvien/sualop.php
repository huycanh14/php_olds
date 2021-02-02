<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$title = "Sửa";
include("header.php");
$error = [];
$malopcu = $_GET['malop'];
$sql = "SELECT * FROM lop WHERE MaLop = '{$malopcu}' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$lop = mysqli_fetch_assoc($result);
}
if(isset($_POST['submit'])){
	$malop = trim($_POST['MaLop']);
	$tenlop = trim($_POST['TenLop']);
	if($malop == "" || $tenlop == ""){
		$error[] = "Thông tin đang bỏ trống";
	}
	if(count($error) == 0){
		$sql = "UPDATE lop SET MaLop = '{$malop}', TenLop = '{$tenlop}' WHERE Malop = '{$malopcu}'";
		if (mysqli_query($conn, $sql)) {
			header('Location: dslop.php?status=update_success');
		} else {
			header('Location: dslop.php?status=update_fail');
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
				<label for="">Mã lớp</label>
				<input type="text" class="form-control" placeholder="Mã lớp" name="MaLop" value="<?php if (isset($_POST['Malop'])) echo $_POST['MaLop']; else echo $lop['MaLop'] ;?>">
			</div>
			<div class="form-group">
				<label for="">Tên lớp</label>
				<input type="text" class="form-control" placeholder="Tên lớp" name="TenLop" value="<?php if (isset($_POST['TenLop'])) echo $_POST['TenLop']; else echo $lop['TenLop'] ;?>">
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Sửa">&nbsp;<input type="button" class="btn btn-primary" name="btnCancel" value="Bỏ" onclick="history.back(1)">
		</form>
	</div>
</div>

<?php 
	include("footer.php");
?>