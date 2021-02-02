<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm hàng hóa</title>
	<link rel="stylesheet" href="">
</head>
<body>

CREATE TABLE `hang` (
  `MaHang` varchar(10) NOT NULL,
  `TenHang` varchar(50) NOT NULL,
  `HangSX` varchar(50) NOT NULL,
  `MieuTa` varchar(100) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

	<h3>Form thêm hàng</h3>
	<div>
		Mã hàng: <input type="text" name="MaHang" required>
	</div>
	<div>
		Tên hàng: <input type="text" name="TenHang" required>
	</div>
	<div>
		Hãng Sản xuất: <input type="text" name="HangSX" required>
	</div>
	<div>
		Miêu tả: <input type="text" name="MieuTa" required>
	</div>
	<div>
		Giá: <input type="text" name="Gia" required>
	</div>
	<div>
		Số lương: <input type="text" name="SoLuong" required>
	</div>
	<div>
		<input type="submit" value="Thêm dữ liệu">
	</div>

</body>
</html>