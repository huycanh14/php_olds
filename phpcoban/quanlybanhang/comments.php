<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM comments";
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
	<title>Bình luận</title>
</head>
<body>
	<div id="container">
		<h3>Bình luận</h3>
		<div class="message">
			<?php 
			if (isset($_SESSION['comments'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['comments'];?></p>
			<?php
				unset($_SESSION['comments']);
			endif;
			?>
		</div>
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Post Id</th>
					<th>Customer Id</th>
					<th>Fullname:</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Content</th>
					<th>Created At</th>
					<th>Update At</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if (count ($result) > 0):
						foreach ($result as $comments):
				?>
				<tr>
					<td><?php echo $comments['id']; ?></td>
					<td><?php echo $comments['post_id']; ?></td>
					<td><?php echo $comments['Customer_id']; ?></td>
					<td><?php echo $comments['fullname']; ?></td>
					<td><?php echo $comments['email']; ?></td>
					<td><?php echo $comments['phone']; ?></td>
					<td><?php echo $comments['content']; ?></td>
					<td><?php echo $comments['created_at']; ?></td>
					<td><?php echo $comments['updated_at']; ?></td>
					<td><a href="comment_edit.php?id=<?php echo $comments['id'];?>">Edit</a></td>
					<td><a onclick="return checkDelete();" href="comment_delete.php?id=<?php echo $comments['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa Comment này?')) {
			return false;
		}
	}
</script>