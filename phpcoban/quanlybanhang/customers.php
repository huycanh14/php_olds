<!-- Khách hàng -->
<?php 
session_start();
require('connect.php');
$sql = "SELECT * FROM customers";
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
	<h3>Khách hàng</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['customers'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['customers'];?></p>
		<?php
			unset($_SESSION['customers']);
		endif;
		?>
	</div>
	<a href="customer_add.php">Thêm khách hàng</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Fullname</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Sex</th>
				<th>Customer Group Id</th>
				<th>Created At</th>
				<th>Updated At</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				if (count($result) > 0):
					foreach ($result as $customers ) :
			?>
			<tr>
				<td><?php echo $customers['id']; ?></td>
				<td><?php echo $customers['fullname']; ?></td>
				<td><?php echo $customers['email']; ?></td>
				<td><?php echo $customers['phone']; ?></td>
				<td><?php echo $customers['address']; ?></td>
				<td><?php if ($customers['gender'] ==1) echo 'Name'; else echo 'Nữ' ;?></td>
				<td><?php echo $customers['customer_group_id']; ?></td>
				<td><?php echo $customers['created_at']; ?></td>
				<td><?php echo $customers['updated_at']; ?></td>
				<td><a href="customer_edit.php?id=<?php echo $customers['id'];?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="customer_delete.php?id=<?php echo $customers['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa customer này?')) {
			return false;
		}
	}
</script>