<?php  
require('connect.php');
$errors = [];
if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = 'Bạn đang để trống Name';
	}
	if (!isset($_POST['type']) || empty($_POST['type'])){
		$errors[] = 'Bạn đang để trống Type';
	}
	if (!isset($_POST['amount']) || empty($_POST['amount'])){
		$errors[] = 'Bạn đang để trống Amount';
	}
	if (count($errors) == 0){
		$name = trim ($_POST['name']);
		$type = trim ($_POST['type']);
		$amount = trim ($_POST['amount']);
		// ________________________
		$sql = "SELECT * FROM customer_groups WHERE name = '{$name}'";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Nhóm khách hàng này đã tồn tại!';
		} else {
			$sql = "INSERT INTO customer_groups (name, type, amount) VALUES ('{$name}', '{$type}', '{$amount}')";
			$query = $db->query($sql);
			if ($query){
				echo 'Thành công';
			} else{
				$errors[] = 'Thêm nhóm thất bại';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm nhóm khác hàng</title>
</head>
<body>
	<h3>Thêm nhóm khác hàng</h3>
	<div class="message">
		<?php if (count($errors) > 0) :?>
			<?php for ($i = 0; $i < count($errors); $i++) :?>
				<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
			<?php endfor;?>
	<?php endif ;?>
	</div>
	<form action="" method="post">
		<table border="1" cellpadding="10">
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<input type="text" name="type" value="<?php if (isset($_POST['type'])) echo $_POST['type'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Amount</td>
				<td>
					<input type="text" name="amount" value="<?php if (isset($_POST['amount'])) echo $_POST['amount'] ;?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Thêm nhóm khác hàng">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>