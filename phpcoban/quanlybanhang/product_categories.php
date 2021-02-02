<?php 
session_start();
require('connect.php');
$sql = "SELECT * FROM product_categories";
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
	<title>Thư mục sản phẩm</title>
</head>
<body>
	<div id="container">
		<h1>Danh mục sản phẩm</h1>
		<div class="message">
			<?php 
			if (isset($_SESSION['product_categories'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['product_categories'];?></p>
			<?php
				unset($_SESSION['product_categories']);
			endif;
			?>
		</div>
		<a href="product_category_add.php">Poduct Category Add</a>
		<table>
			<thead>
				<tr>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($result) > 0) :
					foreach ($result as $product_categories) :
				?>
				<tr>
					<td><?php echo $product_categories['id'] ;?></td>
					<td><?php echo $product_categories['name'] ;?></td>
					<td><a href="product_category_edit.php?id=<?php echo $product_categories['id'];?>">Edit</a></td>
					<td><a onclick="return checkDelete();" href="product_category_delete.php?id=<?php echo $product_categories['id'];?>">Delete</a></td>
				</tr>
				<?php  
					endforeach;
				endif;
				?>
			</tbody>
		</table>
		<a href="product_category_add.php">Thêm thư mục</a>
	</div>
</body>
</html>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa Poduct Category này?')) {
			return false;
		}
	}
</script>