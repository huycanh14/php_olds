<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM customer_groups";
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
	<title>Nhóm Khách hàng</title>
</head>
<body>
	<div id="container">
		<h3>Nhóm Khách hàng</h3>
		<div class="message">
			<?php 
			if (isset($_SESSION['customer_groups'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['customer_groups'];?></p>
			<?php
				unset($_SESSION['customer_groups']);
			endif;
			?>
		</div>
		<a href="customer_group_add.php">Thêm nhóm khách hàng</a>
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Type</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if (count ($result) > 0):
						foreach ($result as $customer_groups):
				?>
				<tr>
					<td><?php echo $customer_groups['id'] ;?></td>
					<td><?php echo $customer_groups['name'] ;?></td>
					<td><?php echo $customer_groups['type'] ;?></td>
					<td><?php echo $customer_groups['amount'] ;?></td>
					<td><a href="customer_group_edit.php?id=<?php echo $customer_groups['id'];?>">Edit</a></td>
					<td><a onclick="return checkDelete();" href="customer_group_delete.php?id=<?php echo $customer_groups['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa Nhóm Khách hàng này?')) {
			return false;
		}
	}
</script>