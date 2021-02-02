<?php  
require('connect.php');
$errors = [];
// _____________________
$sql ="SELECT * FROM products";
$query = $db->query($sql);
$products = $query->fetch_all(MYSQLI_ASSOC);
// _____________________________
if (isset($_POST['submit'])){
	if (!isset($_POST['product_id']) || $_POST['product_id'] = ''){
		$errors[] = "Bạn đang để trống Product Id";
	}
	if (!isset($_POST['product_relate_id']) || $_POST['product_relate_id'] = ''){
		$errors[] = "Bạn đang để trống Product Relate Id";
	}
	if (count($errors) == 0){
		$product_id = $_POST['product_id'];
		$product_relate_id = $_POST['product_relate_id'];
		$sql = "INSERT INTO product_image (product_id, product_relate_id) VALUES ('{$product_id}', '{$product_relate_id}',)";
		$query = $db->query($sql);
		if ($query){
			echo 'Thành công';
		} else{
			$errors[] = " Không thể thêm Product Image!";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Relate Add</title>
</head>
<body>
	<h3>Product Relate Add</h3>
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
				<td>Product Id</td>
				<td>
					<select name="product_id">
						<option>---Chọn---</option>
						<?php  
						if (!is_null($products) && count($products)):
							foreach ($products as $item):
						?>
						<option value="<?php echo $item['id']; ?>" 
							<?php if ((isset($_POST["product_id"])) && $_POST["product_id"] == $item["id"]) echo 'selected = "selected" ' ;?>
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
					<input type="text" name="product_relate_id" value="<?php if (isset($_POST['product_relate_id'])) echo $_POST['product_relate_id']; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Product Relates Add">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>