<?php  
require('connect.php');
$errors = [];
$product_image_id = $_GET['id'];
$sql = "SELECT * FROM product_image WHERE id = '{$product_image_id}' LIMIT 1";
$query = $db->query($sql);
$product_image = $query->fetch_assoc();
if (is_null ($product_image)){
	header ('location: product_image.php');
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
		$errors[] = "Bạn đang để trống Is Featured";
	}
	if (count($errors) == 0){
		$id = $_POST['id'];
		$product_id = $_POST['product_id'];
		$image = $_POST['image'];
		$is_featured = $_POST['is_featured'];
		$sql = "SELECT * FROM product_image WHERE id = '{$id}' AND id <> '{$product_image['id']}' LIMIT 1 ";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Id trùng';
		} else{
			$sql = "UPDATE product_image SET product_id = '{$product_id}', image = '{$image}', is_featured = '{$is_featured}' WHERE id = '{$id}'";
			$query = $db->query($sql);
			if ($query){
				header('location: product_image.php');
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
	<title>Product Image Edit</title>
</head>
<body>
	<h3>Product Image Edit</h3>
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
					<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $product_image['id']; ?>">
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
							<?php if ((isset($_POST["product_id"])) && $_POST["product_id"] == $item["id"] || $product_image['product_id'] == $item['id']) echo 'selected = "selected" ' ;?>
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
				<td>Image</td>
				<td>
					<input type="text" name="image" value="<?php if (isset($_POST['image'])) echo $_POST['image']; else echo $product_image['image']; ?>">
				</td>
			</tr>
			<tr>
				<td>Is Featured</td>
				<td>
					<input type="text" name="is_featured" value="<?php if (isset($_POST['is_featured'])) echo $_POST['is_featured']; else echo $product_image['is_featured']; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Product Image Edit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>