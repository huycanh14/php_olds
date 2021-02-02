<!-- Quảng cáo -->
<?php 
session_start();
require('connect.php');
$sql = "SELECT * FROM banners";
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
	<title>Quảng cáo</title>
</head>
<body>
	<div id="container">
		<h3>Quảng cáo</h3>
		<div class="message">
			<?php 
			if (isset($_SESSION['banners'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['banners'];?></p>
			<?php
				unset($_SESSION['banners']);
			endif;
			?>
		</div>
		<a href="banner_add.php">Thêm quảng cáo</a>
		<br>
		<table>
			<thead>
				<tr>
					<th>Mã quảng cáo</th>
					<th>Tên quảng cáo</th>
					<th>Image</th>
					<th>Link</th>
					<th>Description</th>
					<th>Position</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if (count($result) > 0) :
						foreach ($result as $banners) :
					?>
				<tr>
					<td><?php echo $banners['id'] ;?></td>
					<td><?php echo $banners['name'] ;?></td>
					<td><?php echo $banners['image'] ;?></td>
					<td><?php echo $banners['link'] ;?></td>
					<td><?php echo $banners['description'] ;?></td>
					<td><?php echo $banners['position'] ;?></td>
					<td><a href="banner_edit.php?id=<?php echo $banners['id'];?>">Edit</a></td>
					<td><a onclick="return checkDelete();" href="banner_delete.php?id=<?php echo $banners['id'];?>">Delete</a></td>
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