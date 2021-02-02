<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="header">Quản lý sinh viên</div>
		<?php if(isset($_SESSION['user'])): ?>
			<a href="logout.php" style="text-decoration: none; float: right; padding: 10px;"><i class="fas fa-sign-out-alt"></i>Log out</a>
		<?php endif; ?>
	</header>
	
