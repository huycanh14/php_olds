<?php  
require('connect.php');
$errors = [];
if (isset($_POST['submit'])){
	if (!isset($_POST['order_id']) || empty($_POST['order_id'])){
		$errors[] = 'Bạn đang để trống Order Id';
	}
	if (!isset($_POST['product_id']) || empty($_POST['product_id'])){
		$errors[] = 'Bạn đang để trống Product Id';
	}
	if (!isset($_POST['price']) || empty($_POST['price'])){
		$errors[] = 'Bạn đang để trống Price';
	}
	if (!isset($_POST['qty']) || empty($_POST['qty'])){
		$errors[] = 'Bạn đang để trống Qty';
	}
	if (count($errors) == 0){
		$order_id = trim ($_POST['order_id']);
		$product_id = trim ($_POST['product_id']);
		$price = trim ($_POST['price']);
		$qty = trim ($_POST['qty']);
		// _____________________________
		$sql = "SELECT * FROM orders WHERE id = '{$order_id}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (is_null($result)){
			$errors[] = 'Order Id chưa tồn tại';
		} else {
			$sql = "SELECT * FROM products WHERE id = '{$product_id}' LIMIT 1";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if (is_null($result)){
				$errors[] = 'Product Id chưa tồn tại';
			} else{
				$sql = "INSERT INTO order_items (order_id, product_id, price, qty) VALUES ('{$order_id}', '{$product_id}', '{$price}', '{$qty}')";
				$query = $db->query($sql);
				if ($query){
					echo 'Thành công';
				} else{
					$errors[] = " Không thể thêm !";
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Item Add</title>
</head>
<body>
	<h3>Order Item Add</h3>
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
				<td>Order Id</td>
				<td>
					<input type="text" name="order_id" value="<?php if (isset($_POSt['order_id'])) echo $_POST['order_id']; ?>">
				</td>
			</tr>
			<tr>
				<td>Product Id</td>
				<td>
					<input type="text" name="product_id" value="<?php if (isset($_POSt['product_id'])) echo $_POST['product_id']; ?>">
				</td>
			</tr>
			<tr>
				<td>Price</td>
				<td>
					<input type="text" name="price" value="<?php if (isset($_POSt['price'])) echo $_POST['price']; ?>">
				</td>
			</tr>
			<tr>
				<td>Qty</td>
				<td>
					<input type="text" name="qty" value="<?php if (isset($_POSt['qty'])) echo $_POST['qty']; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Order Item Add">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>