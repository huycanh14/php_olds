<?php  
require('connect.php');
$errors = [];
$product_relate_id = $_GET['id'];
$sql = "SELECT * FROM product_image WHERE id = '{$product_relate_id}' LIMIT 1";
$query = $db->query($sql);
$product_relate = $query->fetch_assoc();
if (is_null ($product_relate)){
	header ('location: product_relates.php');
}
// _____________________
$sql ="SELECT * FROM products";
$query = $db->query($sql);
$products = $query->fetch_all(MYSQLI_ASSOC);
// ________________________
if (isset($_POST['submit'])){
	if (!isset($_POST['product_id']) || $_POST['product_id'] = ''){
		$errors[] = "Bạn đang để trống Product Id";
	}
	if (!isset($_POST['is_featured']) || $_POST['is_featured'] = ''){
		$errors[] = "Bạn đang để trống Product Relate Id";
	}
	if (count($errors) == 0){
		$id = $_POST['id'];
		$product_id = $_POST['product_id'];
		$product_relate_id = $_POST['product_relate_id'];
		$sql = "SELECT * FROM product_relates WHERE id = '{$id}' AND id <> '{$product_relate['id']}' LIMIT 1 ";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Id trùng';
		} else{
			$sql = "UPDATE product_relates SET product_id = '{$product_id}', product_relate_id = '{$product_relate_id}' WHERE id = '{$id}'";
			$query = $db->query($sql);
			if ($query){
				header('location: product_relates.php');
			} else {
				$errors[] = 'Không thể sửa';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Relate Edit</title>
</head>
<body>
	<h3>Product Relate Edit</h3>
	<div class="message">
		<?php if (count($errors) > 0) :?>
			<?php for ($i = 0; $i < count($errors); $i++) :?>
				<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
			<?php endfor;?>
	<?php endif ;?>
	</div>
	<form action="" method="post">
		<table border="1" cellpadding="10">
			<tr>
				<td>ID</td>
				<td>
					<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $product_relate['id']; ?>">
				</td>
			</tr>
			<tr>
				<td>Product Id</td>
				<td>
					<select name="product_id">
						<option>---Chọn---</option>
						<?php  
						if (!is_null($products) && count($products)):
							foreach ($products as $item):
						?>
						<option value="<?php echo $item['id']; ?>" 
							<?php if ((isset($_POST["product_id"])) && $_POST["product_id"] == $item["id"] || $product_relate['product_id'] == $item['id']) echo 'selected = "selected" ' ;?>
						>
							<?php echo $item['name'] . " - " . $item["id"];?>
						</option>
						<?php  
							endforeach;
						endif;
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Product Relate Id</td>
				<td>
					<input type="text" name="product_relate_id" value="<?php if (isset($_POST['product_relate_id'])) echo $_POST['product_relate_id']; else echo $product_relate['product_relate_id']; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Product Relate Edit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>