<!-- Thương hiệu -->
<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM brands";
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
	<title>Thương hiệu</title>
</head>
<body>
	<div id="container">
		<h3>Thương hiệu</h3>
		<div class="message">
			<?php 
			if (isset($_SESSION['brands'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['brands'];?></p>
			<?php
				unset($_SESSION['brands']);
			endif;
			?>
		</div>
		<a href="brand_add.php">Thêm thương hiệu</a>
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Slug</th>
					<th>Logo</th>
					<th>Image</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if (count ($result) > 0):
						foreach ($result as $brands):
				?>
				<tr>
					<td><?php echo $brands['id'] ;?></td>
					<td><?php echo $brands['name'] ;?></td>
					<td><?php echo $brands['slug'] ;?></td>
					<td><?php echo $brands['logo'] ;?></td>
					<td><?php echo $brands['image'] ;?></td>
					<td><?php echo $brands['description'] ;?></td>
					<td><a href="brand_edit.php?id=<?php echo $brands['id'];?>">Edit</a></td>
					<td><a onclick="return checkDelete();" href="brand_delete.php?id=<?php echo $brands['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa banner này?')) {
			return false;
		}
	}
</script>