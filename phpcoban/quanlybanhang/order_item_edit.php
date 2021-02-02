<?php  
require('connect.php');
$errors = [];
$order_item_id = $_GET['id'];
$sql = "SELECT * FROM orders WHERE id = '{$order_item_id}' LIMIT 1";
$query = $db->query($sql);
$order_item = $query->fetch_assoc();
if (is_null($order_id)){
	header('location: order_items.php');
}
// ___________________________
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
		$id trim ($_POST['id']);
		$order_id = trim ($_POST['order_id']);
		$product_id = trim ($_POST['product_id']);
		$price = trim ($_POST['price']);
		$qty = trim ($_POST['qty']);
		// _____________________________
		// ______________________
		$sql = "SELECT * FROM order_items WHERE id = '{$id}' AND id <> '{$order_item['id']}' LIMIT 1";
		$query = $query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Id trùng';
		} else{
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
				}else {
					$sql = "UPDATE order_items SET order_id = '{$order_id}', product_id = '{$product_id}', price = '{$price}', qty = '{$qty}'";
					$query = $db->query($sql);
					if ($query){
						header('location: order_items.php');
					} else{
						$errors[] = 'Không sửa được!';
					}
				}
			}
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Item Edit</title>
</head>
<body>
	<h3>Order Item Edit</h3>
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
					<input type="text" readonly="readonly" name="id" value="<?php if (isset($_POSt['id'])) echo $_POST['id']; else echo $order_item['id'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Order Id</td>
				<td>
					<input type="text" name="order_id" value="<?php if (isset($_POSt['order_id'])) echo $_POST['order_id']; else echo $order_item['order_id'] ; ?>">
				</td>
			</tr>
			<tr>
				<td>Product Id</td>
				<td>
					<input type="text" name="product_id" value="<?php if (isset($_POSt['product_id'])) echo $_POST['product_id']; else echo $order_item['product_id'] ; ?>">
				</td>
			</tr>
			<tr>
				<td>Price</td>
				<td>
					<input type="text" name="price" value="<?php if (isset($_POSt['price'])) echo $_POST['price']; else echo $order_item['price'] ; ?>">
				</td>
			</tr>
			<tr>
				<td>Qty</td>
				<td>
					<input type="text" name="qty" value="<?php if (isset($_POSt['qty'])) echo $_POST['qty']; else echo $order_item['qty'] ; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Order Item Edit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>