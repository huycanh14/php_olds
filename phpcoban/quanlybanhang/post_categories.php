<?php 
session_start(); 
require('connect.php');
$sql = "SELECT * FROM post_categories";
$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Categories</title>
</head>
<body>
	<h3>Post Categories</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['post_categories'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['post_categories'];?></p>
		<?php
			unset($_SESSION['post_categories']);
		endif;
		?>
	</div>
	<a href="post_category_add.php">Post Category Add</a>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Image</th>
				<th>Description</th>
				<th>Parent Id</th>

			</tr>
		</thead>
		<tbody>
			<?php  
				if (count ($result) > 0):
					foreach ($result as $post_categories):
			?>
			<tr>
				<td><?php echo $post_categories['id'] ;?></td>
				<td><?php echo $post_categories['name'] ;?></td>
				<td><?php echo $post_categories['slug'] ;?></td>
				<td><?php echo $post_categories['image'] ;?></td>
				<td><?php echo $post_categories['description'] ;?></td>
				<td><?php echo $post_categories['parent_id'] ;?></td>
				<td><a href="post_category_edit.php?id=<?php echo $post_categories['id'];?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="post_category_delete.php?id=<?php echo $post_categories['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa post categories này?')) {
			return false;
		}
	}
</script>