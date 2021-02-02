<?php
require('connect.php');
include('header.php');
?>
<?php 
$error = [];
if ( isset($_POST['submit']) ){
	if (!isset($_POST['makhoa'] ) || empty ($_POST['makhoa']) ){
		$error[] = ' Chưa nhập mã khoa';
	}

	if (!isset($_POST['ten_khoa'] ) || empty ($_POST['ten_khoa']) ){
		$error[] = 'Chưa nhập tên khoa' ;
	}

	if (count($error) == 0){
		// Xử lý thêm vào CSDL
		$makhoa = trim( $_POST['makhoa']); //trim: cắt những khoảng trắng đầu, cuối nến người viết ghi vào
		$tenkhoa = trim( $_POST['ten_khoa']);

		// Kiểm tra xem mã khoa nhập vào đã tồn tại hay chưa (lấy 1 bản ghi)
		$sql = "SELECT * FROM khoa WHERE makhoa = ' " . $makhoa . " ' LIMIT 1";  /*Chú ý dấu nháy kép, nháy đơn, viết liền nhau*/
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		// var_dump($result);\

		if ( !is_null($result) ) {
			$error[] = 'Mã khoa này đã tồn tại. Vui lòng nhập mã khác!';
		} else { //Khi mã không trùng lặp
			// INSERT INTO khoa (makhoa, ten_khoa) VALUES ('k09', 'Khoa 09');
			//Thêm vào CSDL
			$sql = "INSERT INTO khoa (makhoa, ten_khoa) VALUES (' " . $makhoa . "', '" . $tenkhoa . "')";
			$query = $db->query($sql);

			if ($query) {
				echo " Thêm Khoa thành công! ";
			}else {
				$error[] = " Không thể thêm khoa!";
			}

		}

	}
}
?>
<head>
	<title>Thêm khoa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<section>

	<div class="container">
		<?php if (count($error) > 0) :?>
			<div class="mesage">
				<?php for ($i = 0; $i < count($error); $i++) :?>
					<p class="error" style="color: red;"><?php echo $error[$i];?></p>
				<?php endfor;?>
			</div>
		<?php endif ;?>

		<form action="" method="post">
			<div>
				Mã Khoa <span style="color: red;">(*)</span>: <input type="text" name="makhoa" value="<?php if (isset($_POST['makhoa']) ) echo $_POST['makhoa'] ?>">
			</div>
			<div>
				Tên Khoa <span style="color: red;">(*)</span>: <input type="text" name="ten_khoa" value="<?php if (isset($_POST['ten_khoa']) ) echo $_POST['ten_khoa'] ?>">
			</div>
			<div>
				<input type="submit" name="submit" value="Submit">
			</div>
		</form>
	</div>
</section>