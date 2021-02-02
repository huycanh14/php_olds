<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM pages";
$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pages</title>
</head>
<body>
	<h3>Pages</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['pages'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['pages'];?></p>
		<?php
			unset($_SESSION['pages']);
		endif;
		?>
	</div>
	<a href="page_add.php">Page Add</a>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Image</th>
				<th>Description</th>
				<th>Content</th>

			</tr>
		</thead>
		<tbody>
			<?php  
				if (count ($result) > 0):
					foreach ($result as $pages):
			?>
			<tr>
				<td><?php echo $pages['id'] ;?></td>
				<td><?php echo $pages['name'] ;?></td>
				<td><?php echo $pages['slug'] ;?></td>
				<td><?php echo $pages['image'] ;?></td>
				<td><?php echo $pages['description'] ;?></td>
				<td><?php echo $pages['content'] ;?></td>
				<td><a href="page_edit.php?id=<?php echo $pages['id'];?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="page_delete.php?id=<?php echo $pages['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa page này?')) {
			return false;
		}
	}
</script>