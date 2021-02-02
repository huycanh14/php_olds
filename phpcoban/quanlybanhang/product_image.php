<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM product_image";
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
	<title>Product Image</title>
</head>
<body>
	<h3>Product Image</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['product_image'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['product_image'];?></p>
		<?php
			unset($_SESSION['product_image']);
		endif;
		?>
	</div>
	<a href="product_image_add.php">Product Image Add</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Product Id</th>
				<th>Image</th>
				<th>Is Featured</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($result) > 0):
				foreach ($result as $product_image):
			?>
			<tr>
				<td><?php echo $product_image['id']; ?></td>
				<td><?php echo $product_image['product_id']; ?></td>
				<td><?php echo $product_image['image']; ?></td>
				<td><?php echo $product_image['is_featured']; ?></td>
				<td><a href="product_image_edit.php?id=<?php echo $product_image['id'];?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="product_image_delete.php?id=<?php echo $product_image['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa product image này?')) {
			return false;
		}
	}
</script>