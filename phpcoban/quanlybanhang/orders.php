<?php 
session_start();
require('connect.php');
$sql = "SELECT * FROM orders";
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
	<title>Customers</title>
</head>
<body>
	<h3>Đơn hàng</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['orders'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['orders'];?></p>
		<?php
			unset($_SESSION['orders']);
		endif;
		?>
	</div>
	<a href="order_add.php">Thêm Đơn hàng</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Customer Id</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Province </th>
				<th>District </th>
				<th>Amount</th>
				<th>Note</th>
				<th>Created At</th>
				<th>Updated At</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				if (count($result) > 0):
					foreach ($result as $orders ) :
			?>
			<tr>
				<td><?php echo $orders['id']; ?></td>
				<td><?php echo $orders['customer_id']; ?></td>
				<td><?php echo $orders['email']; ?></td>
				<td><?php echo $orders['phone']; ?></td>
				<td><?php echo $orders['address']; ?></td>
				<!-- Tỉnh -->
				<td>
					<?php 
						$orders['province_id'];
						$sql = "SELECT name FROM provinces WHERE id = '{$orders['province_id']}'";
						$query = $db->query($sql);
						$result = $query->fetch_assoc();
						echo $result;
					?>
				</td>
				<td><!-- Huyện/Quận -->
					<?php 
						$orders['district_id'];
						$sql = "SELECT name FROM provinces WHERE id = '{$orders['district_id']}'";
						$query = $db->query($sql);
						$result = $query->fetch_assoc();
						echo $result;
					?>
				</td>
				<td><?php echo $orders['amount']; ?></td>
				<td><?php echo $orders['note']; ?></td>
				<td><?php echo $orders['created_at']; ?></td>
				<td><?php echo $orders['updated_at']; ?></td>
				<td><a href="order_edit.php?id=<?php echo $orders['id'];?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="order_delete.php?id=<?php echo $orders['id'];?>">Delete</a></td>
			</tr>
			<?php  
					endforeach;
				endif;
			?>
		</tbody>
	</table>
</body>
</html>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa order này?')) {
			return false;
		}
	}
</script>