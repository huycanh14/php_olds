<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM reviews";
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
	<title>Reviews</title>
</head>
<body>
	<h3>Reviews</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['reviews'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['reviews'];?></p>
		<?php
			unset($_SESSION['reviews']);
		endif;
		?>
	</div>
	<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Product Id</th>
					<th>Content</th>
					<th>Rate</th>
					<th>Customer Id</th>
					<th>Created Ad</th>
					<th>Updated Ad</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if (count ($result) > 0):
						foreach ($result as $reviews):
				?>
				<tr>
					<td><?php echo $reviews['id'] ;?></td>
					<td><?php echo $reviews['product_id'] ;?></td>
					<td><?php echo $reviews['content'] ;?></td>
					<td><?php echo $reviews['rate'] ;?></td>
					<td><?php echo $reviews['customer_id'] ;?></td>
					<td><?php echo $reviews['created_at'] ;?></td>
					<td><?php echo $reviews['updated_ad'] ;?></td>
					<td><a href="review_edit.php?id=<?php echo $reviews['id'];?>">Edit</a></td>
					<td><a onclick="return checkDelete();" href="review_delete.php?id=<?php echo $reviews['id'];?>">Delete</a></td>
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
		if (!confirm('Bạn chắc chắn muốn xóa banner này?')) {
			return false;
		}
	}
</script>