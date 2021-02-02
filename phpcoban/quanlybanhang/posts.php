<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM posts";
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
	<title>Posts</title>
</head>
<body>
	<h3>Posts</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['posts'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['posts'];?></p>
		<?php
			unset($_SESSION['posts']);
		endif;
		?>
	</div>
	<a href="post_add.php">Post Add</a>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Image</th>
				<th>Description</th>
				<th>Content</th>
				<th>Post Category Id</th>

			</tr>
		</thead>
		<tbody>
			<?php  
				if (count ($result) > 0):
					foreach ($result as $posts):
			?>
			<tr>
				<td><?php echo $posts['id'] ;?></td>
				<td><?php echo $posts['name'] ;?></td>
				<td><?php echo $posts['slug'] ;?></td>
				<td><?php echo $posts['image'] ;?></td>
				<td><?php echo $posts['description'] ;?></td>
				<td><?php echo $posts['content'] ;?></td>
				<td><?php echo $posts['post_category_id'] ;?></td>
				<td><a href="post_edit.php?id=<?php echo $posts['id'];?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="post_delete.php?id=<?php echo $posts['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa post này?')) {
			return false;
		}
	}
</script>