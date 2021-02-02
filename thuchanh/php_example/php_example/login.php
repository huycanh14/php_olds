<?php
	$status = isset($_GET["status"]) ? $_GET["status"] : "";
	$txtUser = isset($_GET["txtUser"]) ? $_GET["txtUser"] : "";	
?>	

<!DOCTYPE HTML>
<html>  
<body>

<h1>Welcome to Facebook</h1>

<form action="login_process.php" method="post">
<table border="0">
<tr>
	<td>Email/Phone: </td>
	<td><input type="text" name="txtUser" value="<?php echo $txtUser; ?>"></td>
</tr>
<tr>
	<td align="right">Password: </td>
	<td><input type="password" name="txtPwd"></td>
</tr>
<tr>
	<td></td>	
	<td><input type="submit" name="btnSubmit" value="Login"></td>
</tr>
<tr height="50px">
	<td colspan="2">No account? Click <a href="register.php">here</a> to register!</td>
</tr>
<tr height="50px">
	<td colspan="2">
	<?php
		if ($status == "fail") {
			echo '<font color="red">Dang nhap that bai!</font>';
		} else if ($status == "empty") {			
			echo '<font color="red">Username va Password khong duoc de trong!</font>';
		}
	?>		
	</td>
</tr>
</form>




</body>
</html>