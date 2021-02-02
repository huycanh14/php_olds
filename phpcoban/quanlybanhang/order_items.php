<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM order_items";
$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table, th, td {
		    border:1px solid black;
		}
	</style>
	<title>Order Items</title>
</head>
<body>
	<div id="container">
		<h3>Order Items</h3>
		<div class="message">
		<?php 
		if (isset($_SESSION['order_items'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['order_items'];?></p>
		<?php
			unset($_SESSION['order_items']);
		endif;
		?>
		</div>
		<a href="order_item_add.php">Order Items Add</a>
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Order Id</th>
					<th>Product Id</th>
					<th>Price</th>
					<th>Qty</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if (count ($result) > 0):
						foreach ($result as $order_items):
				?>
				<tr>
					<td><?php echo $order_items['id'] ;?></td>
					<td><?php echo $order_items['order_id'] ;?></td>
					<td><?php echo $order_items['product_id'] ;?></td>
					<td><?php echo $order_items['price'] ;?></td>
					<td><?php echo $order_items['qty'] ;?></td>
					<td><a href="order_item_edit.php?id=<?php echo $order_items['id'];?>">Edit</a></td>
					<td><a onclick="return checkDelete();" href="order_item_delete.php?id=<?php echo $order_items['id'];?>">Delete</a></td>
				</tr>
				<?php  
						endforeach;
					endif;
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa order Item này?')) {
			return false;
		}
	}
</script>