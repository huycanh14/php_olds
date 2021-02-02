<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$title = "Danh sách lớp";
include("header.php");
$error = [];
$sql = "SELECT * FROM lop";
$lop = mysqli_query($conn, $sql);
?>

<div class="content" style="padding-top: 20px;">
	<div class="container">
		<center>
			<?php $status = isset($_GET["status"]) ? $_GET["status"] : "" ; ?>
			<?php  if ($status == 'add_success'): ?>
				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Thêm thành công</strong>					
				</div>
			<?php elseif($status == 'add_fail') :?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Thêm thất bại</strong>					
				</div>
			<?php  elseif ($status == 'del_success'): ?>
				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Xóa thành công</strong>					
				</div>
			<?php elseif($status == 'del_fail') :?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Xóa thất bại</strong>					
				</div>
			<?php  elseif ($status == 'update_success'): ?>
				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Sửa thành công</strong>					
				</div>
			<?php elseif($status == 'update_fail') :?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Sửa thất bại</strong>					
				</div>
			<?php endif; ?>
			
			<table class="table" border="1px;">
				<thead class="thead-dark">
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Mã lớp</th>
						<th scope="col">Tên lớp</th>
						<th scope="col">Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="4" style="text-align: center;"><a href="themlop.php"><i class="fas fa-plus"></i>Thêm mới</a></td>
					</tr>
					<?php if (mysqli_num_rows($lop) > 0): ?>
						<?php $stt=1; ?>
						<?php foreach ($lop as $item) :?>
							<tr>
								<th scope="row"><?php echo $stt; ?></th>
								<td><?php echo $item['MaLop'] ;?></td>
								<td><?php echo $item['TenLop']; ?></td>
								<td style="text-align: center"><a href="sualop.php?malop=<?php echo $item['MaLop'] ; ?>"><i class="fas fa-edit"></i>Sửa</a>  &nbsp; <a onclick="return checkDelete();" href="xoalop.php?malop=<?php echo $item['MaLop'] ; ?>"><i class="fas fa-minus-circle"></i>Xóa</a></td>
								<?php $stt++; ?>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>

					<tr>
						<td colspan="4" style="text-align: center;"><a href="index.php"><i class="fas fa-home"></i>Trang chủ</a></td>
					</tr>
				</tbody>
			</table>
		</center>
	</div>
</div>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa lớp này?')) {
			return false;
		}
	}
</script>
<?php 
	include("footer.php");
?>