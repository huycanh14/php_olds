<?php  
require('connect.php');
$errors = [];
$customer_group_id = $_GET['id'];
// ___________________________
$sql = "SELECT * FROM customer_groups WHERE id = '{$customer_group_id}' LIMIT 1";
$query = $db->query($sql);
$customer_group = $query->fetch_assoc();
if (is_null ($customer_group)){
	header ('location: customer_groups.php');
}
// _____________________________
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
		$id = trim ($_POST['id']);
		$name = trim ($_POST['name']);
		$type = trim ($_POST['type']);
		$amount = trim ($_POST['amount']);
		// ________________________________
		$sql = "SELECT * FROM customer_groups WHERE id = '{$id}' AND id <> '{$customer_group['id']}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null ($result)){
			$errors[] = 'Id bị trùng';
		} else {
			$sql = "UPDATE customer_groups SET name = '{$name}', type = '{$type}', amount = '{$amount}'";
			$query = $db->query($sql);
			if ($query){
				header('location: customer_groups.php');
			} else{
				$errors[] = "không cập nhật được nhóm khách hàng";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa nhóm khác hàng</title>
</head>
<body>
	<h3>Sửa nhóm khác hàng</h3>
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
				<td>ID</td>
				<td>
					<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $customer_group['id'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $customer_group['id'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<input type="text" name="type" value="<?php if (isset($_POST['type'])) echo $_POST['type']; else echo $customer_group['id'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Amount</td>
				<td>
					<input type="text" name="amount" value="<?php if (isset($_POST['amount'])) echo $_POST['amount']; else echo $customer_group['id'] ;?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Sửa nhóm khác hàng">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>