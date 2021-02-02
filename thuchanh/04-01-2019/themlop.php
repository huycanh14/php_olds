<html>
<head>
	<title>Them lop</title>
</head>
<body>
<form method="post" action="themlop_processing.php">
<table border="0" width="100%" align="center"> 
<tr>
	<td align="center">Thêm lớp</td>
</tr>
<tr>
	<td>
	  <table border="0" width="50%" align="center">
		<tr>
		  <td width="100">Mã lớp: </td>
		  <td><input type="text" name="txtMaLop" value=""></td>
		</tr>
		<tr>
		  <td>Tên lớp: </td>
		  <td><input type="text" name="txtTenLop" value=""></td>
		</tr>
		<tr>
		  <td align="center" colspan="2"><input type="submit" name="btnAdd" value="Thêm">&nbsp;<input type="button" name="btnCancel" value="Bỏ" onclick="history.back(1)"></td>
		</tr>
	  </table>
	</td>
</tr>
</table>
</form>
</body>
</html>