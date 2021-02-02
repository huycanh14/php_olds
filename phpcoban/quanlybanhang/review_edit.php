<?php  
require('connect.php');
$errors = [];
$review_id = $_GET['id'];
$sql = "SELECT * FROM reviews WHERE id = '{$review_id}' LIMIT 1";
$query = $db->query($sql);
$review = $query->fetch_assoc();
if (is_null ($review)){
	header ('location: reviews.php');
}
// _____________________
$sql ="SELECT * FROM products";
$query = $db->query($sql);
$products = $query->fetch_all(MYSQLI_ASSOC);
// _____________________
$sql ="SELECT * FROM customers";
$query = $db->query($sql);
$customers = $query->fetch_all(MYSQLI_ASSOC);
// ________________________
?>
<!DOCTYPE html>
<html>
<head>
	<title>Review Edit</title>
</head>
<body>
	<h3>Review Edit</h3>
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
				<td>Id</td>
				<td>
					<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $review['id']; ?>">
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
							<?php if ((isset($_POST["product_id"])) && $_POST["product_id"] == $item["id"] || $review['product_id'] == $item['id']) echo 'selected = "selected" ' ;?>
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
				<td>Content</td>
				<td>
					<input type="text" name="content" value="<?php if (isset($_POST['content'])) echo $_POST['content']; else echo $review['content'];  ?>">
				</td>
			</tr>
			<tr>
				<td>Rate</td>
				<td>
					<input type="text" name="rate" value="<?php if (isset($_POST['rate'])) echo $_POST['rate'];  else echo $review['rate'];  ?>">
				</td>
			</tr>
			<tr>
				<td>Customer Id</td>
				<td>
					<select name="customer_id">
						<option>---Chọn---</option>
						<?php  
						if (!is_null($customers) && count($customers)):
							foreach ($customers as $item):
						?>
						<option value="<?php echo $item['id']; ?>" 
							<?php if ((isset($_POST["customer_id"])) && $_POST["customer_id"] == $item["id"] || $review['customer_id'] == $item['id']) echo 'selected = "selected" ' ;?>
						>
							<?php echo $item['fullname'] . " - " . $item["id"];?>
						</option>
						<?php  
							endforeach;
						endif;
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Created At</td>
				<td>
					<input type="date" name="created_at" value="<?php if (isset($_POST['created_at'])) echo $_POST['created_at']; else echo $review['created_at'];  ?>">
				</td>
			</tr>
			<tr>
				<td>Updated At</td>
				<td>
					<input type="date" name="updated_ad" value="<?php if (isset($_POST['updated_ad'])) echo $_POST['updated_ad']; else echo $review['updated_ad'];  ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Review Edit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>