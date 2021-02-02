<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Document</title>
	<link rel="shortcut icon" href="#">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/angular-material.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
</head>
<body ng-app="myApp" >
	<header id="header" ng-controller="Header">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 text-xl-left">
					<div class="Logo">
						<span class="chuto">Q</span><span class="chubinhthuong">uanlybanhang.vn</span>
					</div>
				</div>
				<div class="col-xl-6 text-xl-right">
					<div class="info">
						<a href=""><i class="fab fa-facebook fa-2x"></i></a>
						<a href=""><i class="fab fa-google-plus-square fa-2x"></i></a>
						<a href=""><i class="fab fa-instagram fa-2x"></i></a>
						<span id="" ng-click="showSetting()"><i class="fas fa-users fa-2x"></i></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-10"></div>
				<div class="col-md-2">
					<ul class="list-group luachon " ng-show="!searchShow">
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<a href=""><i class="fas fa-cogs"></i> <span>Setting</span></a>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<a href=""><i class="fas fa-sign-out-alt"></i> <span>Log out</span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header><!-- /header -->
	<div id="content">
		<div class="container">
			<div class="row">
				<div class="col-xl-3">
					<ul class="list-group">
						<li class="list-group-item active">Menu</li>
						<a href="#" class="list-group-item list-group-item-action">Quản lý nhóm</a>
						<a href="#" class="list-group-item list-group-item-action">Quản lý khách hàng</a>
					</ul>
				</div>
				<div class="col-xl-9" ng-controller="nhomKhachHangController as ctrl">
					<div class="jumbotron">
						<h1 class="display-4">Danh sách nhóm khách hàng</h1>
						<div class="card-header">
							<b class="float-xl-right"><i class="fas fa-plus-square" ng-click="ctrl.submit()"></i></b>
							Tên nhóm
						</div>
						<div class="card-block">
							<input type="text" name="TenNhom" class="form-control" ng-model="ctrl.TenNhom"> <br>
						</div>
						<hr class="m-y-md">

						<ul style="list-style: none;">
							<li ng-repeat="nhomkhachhang in ctrl.nhomkhachhangs" >
								<div class="card">
									<div class="card-header" ng-show="!nhomkhachhang.hienra">
										<b class="float-xl-right"><i class="fas fa-pencil-alt" ng-click="showNhomKhachHang(nhomkhachhang)"></i>&nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt" ng-click="ctrl.remove(nhomkhachhang)"></i></b>
										Tên nhóm: {{nhomkhachhang.TenNhom}}
									</div>
								</div>
								<!-- sửa -->
								<div class="card" ng-show="nhomkhachhang.hienra">
									<div class="card-header">
										<input type="hidden" name="ID" class="form-control" ng-model="nhomkhachhang.ID">
										Tên nhóm: <input type="text" name="TenNhom" class="form-control" ng-model="nhomkhachhang.TenNhom">
										<b class="float-xl-right btn btn-outline-danger btn-block" ng-click="ctrl.update(nhomkhachhang)">Lưu</b>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/angular-animate.min.js"></script>
	<script src="js/angular-aria.min.js"></script>
	<script src="js/angular-messages.min.js"></script>
	<script src="js/angular-material.min.js"></script>
	<script src="js/app.js"></script>
	<script src="js/nhomKhachHangService.js"></script>
	<script src="js/nhomKhachHangController.js"></script>
	
</body>
</html>