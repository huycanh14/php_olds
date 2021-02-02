<?php  
session_start();
	require('connection.php');
	$title = "Login";
	include("header.php");
	$error = [];
	if(isset($_POST['submit']))
	{
		
		$taikhoan = trim($_POST['TaiKhoan']);
		$matkhau = trim($_POST['MatKhau']);
		$sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '".$taikhoan."' AND MatKhau = '". $matkhau ."' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user'] = $row;
			header('Location: index.php');
		}
		else
		{
			$error[] = "Đăng nhập thất bại";
		}
	}
	if(isset($_SESSION['user'])){
	header('Location: index.php');
	exit;
}
?>
<div class="container">
	<center>
		<div class="tilte"><h2>Login</h2></div>
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
				<label for="">Tên đăng nhập</label>
				<input type="text" name="TaiKhoan" class="form-control"  placeholder="Tên đăng nhập" value="<?php if (isset($_POST['TaiKhoan']) ) echo $_POST['TaiKhoan'] ?>">
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="MatKhau" class="form-control" placeholder="Mật khẩu">
			</div>
			<input name="submit" type="submit" class="btn btn-primary" value="Login"></input>
		</form>
	</center>
</div>
<?php 
	include("footer.php");
?>