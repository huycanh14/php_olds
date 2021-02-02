<?php  
session_start();
require('connect.php');
error_reporting(1); //Tắt báo lỗi
// WHERE product_category_id = '{$product_category_id}'
$sql = "SELECT * FROM products";
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
	<title>Sản phẩm</title>
</head>
<body>
	<div id="container">
		<h1>Các sản phẩm</h1>
		<?php 
		if (isset($_SESSION['products'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['products'];?></p>
		<?php
			unset($_SESSION['products']);
		endif;
		?>
		</div>
		<a href="product_add.php">Thêm sản phẩm</a>
		<br>
		<table>
			<thead>
				<tr>
					<th>Mã thư mục sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Size</th>
					<th>Giá sản phẩm</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					if (count($result) > 0) :
						foreach ($result as $products) :
					?>
				<tr>
					<td><?php echo $products['product_category_id'] ;?></td>
					<td><?php echo $products['name'] ;?></td>
					<td><?php echo $products['sizes'] ;?></td>
					<td><?php echo $products['price'] ;?></td>
					<td><a href="product_edit.php?id=<?php echo $products['id'];?>">Edit</a></td>
					<td><a onclick="return checkDelete();" href="product_delete.php?id=<?php echo $products['id'];?>">Delete</a></td>
				</tr>
				<?php  
					endforeach;
				endif;
				?>
			</tbody >
		</table>
	</div>
</body>
</html>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa product này?')) {
			return false;
		}
	}
</script>