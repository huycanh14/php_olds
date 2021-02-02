<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post" name="frmNhapDL" onsubmit="return checkInput();">
		<tr>
			<td>
				<input type="text" name="so1" class="so1" readonly="readonly">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="so2" class="so2">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="submit" value="submit">
			</td>
		</tr>
	</form>
	<script>
		function checkInput() {
			var so1 = document.frmNhapDL.so1.value;
			var so2 = document.frmNhapDL.so2.value;
			if (so1 == '')
			{
				alert('Hãy nhập số thứ nhất');
				return false;
			}
			if(so2 == '')
			{
				alert('Hãy nhập số thứ hai');
				return false;
			}
		}
	</script>
</body>
</html>