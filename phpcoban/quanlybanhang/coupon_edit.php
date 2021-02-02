<?php  
require('connect.php');
$code_edit = $_GET['code'];
$errors = [];
// ________________________
$sql = "SELECT * FROM coupons WHERE code = '{$code_edit}' LIMIT 1";
$query = $db->query($sql);
$coupon = $query->fetch_assoc();
if (is_null($coupon)){
	header('location: coupons.php');
}
// _____________________________
if (isset($_POST['submit'])){
	if (!isset($_POST['code']) || empty($_POST['code'])){
		$errors[] = 'Bạn chưa nhập Code';
	}
	if (!isset($_POST['start_day']) || empty($_POST['start_day'])){
		$errors[] = 'Bạn chưa nhập Start Day';
	}
	if (!isset($_POST['end_day']) || empty($_POST['end_day'])){
		$errors[] = 'Bạn chưa nhập End Day';
	}
	if (!isset($_POST['amount']) || empty($_POST['amount'])){
		$errors[] = 'Bạn chưa nhập Amount';
	}
	if (!isset($_POST['type']) || empty($_POST['type'])){
		$errors[] = 'Bạn chưa nhập Type';
	}
	if (!isset($_POST['user_per_user']) || empty($_POST['user_per_user'])){
		$errors[] = 'Bạn chưa nhập User Per User';
	}
	if (count($errors) == 0){
		$code = trim ($_POST['code']);
		$start_day = trim ($_POST['start_day']);
		$end_day = trim ($_POST['end_day']);
		$amount = trim ($_POST['amount']);
		$type = trim ($_POST['type']);
		$user_per_user = trim ($_POST['user_per_user']);
		// ______________________________________
		$sql = "SELECT * FROM coupons WHERE code = '{$code}' AND code <> '{$code_edit}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Code bị trùng';
		} else {
			$sql = "UPDATE coupons SET code = '{$code}', start_day = '{$start_day}', end_day = '{$end_day}', amount = '{$amount}', type = '{$type}', user_per_user = '{$user_per_user}' WHERE code = '{$code}'";
			$query = $db->query($sql);
			if ($query){
				header('location: coupons.php');
			} else {
				$errors[] = 'Không sửa được';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Coupon Edit</title>
</head>
<body>
	<h3>Coupon Edit</h3>
	<div class="message">
		<?php if (count($errors) > 0) :?>
			<?php for ($i = 0; $i < count($errors); $i++) :?>
				<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
			<?php endfor;?>
		<?php endif ;?>
	<form action="" method="post">
		<table border="1" cellpadding="10">
			<tr>
				<td>CODE:</td>
				<td>
					<input type="text" name="code" readonly="readonly" value="<?php if (isset($_POST['code'])) echo $_POST['code']; else echo $coupon['code'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Start Day:</td>
				<td>
					<input type="date" name="start_day"  value="<?php if (isset($_POST['start_day'])) echo $_POST['start_day']; else echo $coupon['start_day'] ;?>">
				</td>
			</tr>
			<tr>
				<td>End Day:</td>
				<td>
					<input type="date" name="end_day"  value="<?php if (isset($_POST['end_day'])) echo $_POST['end_day']; else echo $coupon['end_day'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Amount:</td>
				<td>
					<input type="text" name="amount"  value="<?php if (isset($_POST['amount'])) echo $_POST['amount']; else echo $coupon['amount'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Type:</td>
				<td>
					<input type="text" name="type"  value="<?php if (isset($_POST['type'])) echo $_POST['type']; else echo $coupon['type'] ;?>">
				</td>
			</tr>
			<tr>
				<td>User Per User:</td>
				<td>
					<input type="text" name="user_per_user"  value="<?php if (isset($_POST['user_per_user'])) echo $_POST['user_per_user']; else echo $coupon['user_per_user'] ;?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Sửa Coupon">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
