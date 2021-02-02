<?php
if (isset($_GET["rdPhepTinh"]))
{
	$so1 = $_GET["txtSo1"];
	$so2 = $_GET["txtSo2"];
	$pt = $_GET["rdPhepTinh"];

	if ($pt == "cong")
	{
		$kq = $so1 + $so2;
	}
	else if ($pt == "tru")
	{
		$kq = $so1 - $so2;
	}
	else if ($pt == "nhan")
	{
		$kq = $so1 * $so2;
	}
	else if ($pt == "chia")
	{
		$kq = $so1 / $so2;
	}
}
else
{
	$kq = "";
	$pt = "Chưa chọn phép tính";
	$so1 = "";
	$so2 = "";
}

?>

<html>
<head>
  <title>Bai 05</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="bai05.css" rel="stylesheet">
</head>
<body>
<form action="bai05_kq.php">
<fieldset>
  <legend>Phép tính trên 2 số</legend>
  <table>
  <tr>
    <td align="right" width="150px" class="textleft">Phép tính: </td>
	<td><?php echo $pt; ?></td>
  </tr>
  <tr>
    <td align="right">Số thứ nhất: </td>
	<td><input type="text" name="txtSo1" value="<?php echo $so1; ?>"  style="color:red; text-align=center;"></td>
  </tr>
  <tr>
    <td align="right">Số thứ hai: </td>
	<td><input type="text" name="txtSo2" value="<?php echo $so2; ?>" class="textinput"></td>
  </tr>
  <tr>
    <td align="right">Kết quả: </td>
	<td><input type="text" name="txtKq" value="<?php echo $kq; ?>" class="ketqua"></td>
  </tr>
  <tr>
    <td align="right"></td>
	<td><a href="javascript:window.history.go(-1);">Quay lại trang trước</a></td>
  </tr>
  </table>
</fieldset>
</form>
<?php

?>
</body>
</html>