<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM product_relates";
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
	<title>Product Relates</title>
</head>
<body>
	<h3>Product Relates</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['product_relates'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['product_relates'];?></p>
		<?php
			unset($_SESSION['product_relates']);
		endif;
		?>
	</div>
	<a href="product_relate_add.php">Product Relates Add</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Product Id</th>
				<th>Product Relate Id</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($result) > 0):
				foreach ($result as $product_relates):
			?>
			<tr>
				<td><?php echo $product_relates['id']; ?></td>
				<td><?php echo $product_relates['product_id']; ?></td>
				<td><?php echo $product_relates['product_relate_id']; ?></td>
				<td><a href="product_relate_edit.php?id=<?php echo $product_relates['id'];?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="product_relate_delete.php?id=<?php echo $product_relates['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa Product Relate này?')) {
			return false;
		}
	}
</script>