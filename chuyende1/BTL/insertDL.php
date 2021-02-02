<!DOCTYPE html>
<html>
<head>
	<title>
		Thêm dữ liệu
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color: darkgrey">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h2>Thêm dữ liệu</h2>
				<p>Lưu ý: Các thuộc tính không được để trống</p>
				<form action="insertDL.php" method="POST">
					<div class="form-group">
						<label for="usr">Name:</label>
						<input type="text"  class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="pwd">Image link:</label>
						<input type="text" class="form-control" id="img" name="img">
					</div>
					<div class="form-group">
						<label for="pwd">Address:</label>
						<input type="text" class="form-control" id="address" name="address">
					</div>
					<div class="form-group">
						<label for="pwd">Latitude:</label>
						<input type="text" class="form-control" id="lat" name="lat">
					</div>
					<div class="form-group">
						<label for="pwd">Longtitude:</label>
						<input type="text" class="form-control" id="lon" name="lon">
					</div>
					<div class="form-group">
						<label for="pwd">Type:</label>
						<input type="text" class="form-control" id="type" name="type">
					</div>
					<div class="form-group">
						<label for="pwd">Description:</label>
						<input type="text" class="form-control" id="descr" name="descr">
					</div>
					<button type="submit" onclick="check()" class="btn btn-primary">Add</button>
					<script>
						function check(){
							var data = new Array();
							data[0] = document.getElementById('name').value;
							data[1] = document.getElementById('img').value;
							data[2] = document.getElementById('address').value;
							data[3] = document.getElementById('lat').value;
							data[4] = document.getElementById('lon').value;
							data[5] = document.getElementById('type').value;
							data[6] = document.getElementById('descr').value;
							var flag = true;
							for (var i in data) {
								if (data[i] == "") {
									alert("Bạn nhập thiếu dữ liệu!");
									flag = false;
									return;
								}	
							}
							if (flag == true) {
								alert("Bạn vừa thêm dữ liệu thành công!");
							}
						}
					</script>
					<?php 
					$con = mysqli_connect("localhost","root","","chuyende1");
					$sql1 = "SELECT * FROM food";
					$result1 = mysqli_query($con, $sql1);

					if (empty($_POST['name'] || empty($_POST['img']) || empty($_POST['address']) || empty($_POST['lat']) || empty($_POST['lon']) || empty($_POST['type']) || empty($_POST['descr']))) {

					}else{
						$id = mysqli_num_rows($result1);
						$id++;
						$img = $_POST['name'];
						$name = $_POST['img'];
						$address = $_POST['address'];
						$lat = $_POST['lat'];
						$lon = $_POST['lon'];
						$type = $_POST['type'];
						$desc = $_POST['descr'];
					}
					$sql_insert = "INSERT INTO food(id, name, img, address, lat, lon, type, descr) VALUES('$id', '$img', '$name', '$address', '$lat', '$lon','$type','$desc')";
					$result2 = mysqli_query($con, $sql_insert);
					?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>





