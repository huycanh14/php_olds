<html>
<head>
  <title>Bai 05</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="bai05.css" rel="stylesheet">
  <script type="text/javascript">
    function checkInput()
	{
		if (document.frmNhapDL.txtSo1.value == '')
		{
			alert('Hãy nhập số thứ nhất');
			document.frmNhapDL.txtSo1.focus();
			return false;
		}

		if (document.frmNhapDL.txtSo2.value == '')
		{
			alert('Hãy nhập số thứ hai');
			document.frmNhapDL.txtSo2.focus();
			return false;
		}

		return true;
	}
  </script>
</head>
<body>
<form action="bai05_kq.php" name="frmNhapDL" onsubmit="return checkInput();">
<fieldset>
  <legend>Phép tính trên 2 số</legend>
  <table>
  <tr>
    <td align="right" width="150px" class="textleft">Chọn phép tính: </td>
	<td>
	  <input type="radio" name="rdPhepTinh" value="cong">Cộng 
	  <input type="radio" name="rdPhepTinh" value="tru">Trừ
	  <input type="radio" name="rdPhepTinh" value="nhan">Nhân
	  <input type="radio" name="rdPhepTinh" value="chia">Chia
	</td>
  </tr>
  <tr>
    <td align="right">Số thứ nhất: </td>
	<td><input type="text" name="txtSo1"></td>
  </tr>
  <tr>
    <td align="right">Số thứ hai: </td>
	<td><input type="text" name="txtSo2"></td>
  </tr>
  <tr>
    <td align="right"></td>
	<td><input type="submit" name="cmdTinh" value="Tính"></td>
  </tr>
  </table>
</fieldset>
</form>
</body>
</html>