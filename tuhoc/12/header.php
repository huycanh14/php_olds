<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My School</title>
	<link href="https://www.google.com/images/branding/product/ico/googleg_lodp.ico" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="img/logo.png"></a>
			</div>
			<div class="sitename">
				<h1>My School HVKTQS</h1>
			</div>
			<div class="menu clearfix">
				<ul>
					<li><a href="index.php">Trang Chủ</a></li>
					<li><a href="khoa.php">Khoa</a></li>
					<li><a href="monhoc.php">Môn Học</a></li>
					<li><a href="sinhvien.php">Sinh Viên</a></li>
					<li><a href="ketqua_diem.php">Bảng Điểm</a></li>
					<?php if (isset($_SESSION['user'])) :?>
					<li><a href="logout.php">Thoát</a></li>
					<?php else:?>
						<li><a href="login.php">Đăng nhập</a></li>
					<?php endif;?>
				</ul>
			</div>
		</div>
	</header>