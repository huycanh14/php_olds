<?php  
session_start();
require('connect.php');
$product_id = $_GET["id"];
$errors = [];

$sql = "SELECT * FROM products WHERE slug = '{$product_id}' LIMIT 1";
$query = $db->query($sql);
$product = $query->fetch_assoc();

if (is_null($product)){
	header('location: products.php');
}
// Lấy product_category_id
$sql = "SELECT * FROM product_categories";
$query = $db->query($sql);
$product_categories_id = $query->fetch_all(MYSQLI_ASSOC);
// Lấy product_category_id
$sql = "SELECT * FROM brands";
$query = $db->query($sql);
$brands_id = $query->fetch_all(MYSQLI_ASSOC);
// _________________________________
if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = 'Bạn chưa nhập tên sản phẩm';
	}
	if (!isset($_POST['slug']) || empty($_POST['slug'])){
		$errors[] = 'Bạn chưa nhập Slug';
	} else {
		$id = trim ($_POST['id']);
		$sku = trim ($_POST['sku']);
		$name = trim ($_POST['name']);
		$slug = trim ($_POST['slug']);
		$price = trim ($_POST['price']);
		$colors = trim ($_POST['colors']);
		$sizes = trim ($_POST['sizes']);
		$qty = trim ($_POST['qty']);
		$brand_id = trim ($_POST['brand_id']);
		$product_category_id = trim ($_POST['product_category_id']);
		$description = trim ($_POST['description']);
		$content = trim ($_POST['content']);
		$views = trim ($_POST['views']);
		$is_new = trim ($_POST['is_new']);
		$is_promo = trim ($_POST['is_promo']);
		$is_featured = trim ($_POST['is_featured']);
		$is_sale = trim ($_POST['is_sale']);
		$created_at = trim ($_POST['created_at']);
		$updated_at = trim ($_POST['updated_at']);
		// ++++++++++++++++++++++++++
		$sql = "SELECT * FROM products WHERE id = '{$id}' AND id <> '".trim($product['id'])."' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)) {
			$errors[] = 'Id bị trùng';
		} else{
			$sql = "SELECT * FROM products WHERE slug = '{$slug}' AND slug <> '".trim($product['slug'])."' LIMIT 1";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if (!is_null($result)) {
				$errors[] = 'Slug bị trùng';
			}else{
				$sql = "UPDATE products SET sku = '{$sku}', name = '{$name}', slug = '{$slug}', price = '{$price}', colors = '{$colors}', sizes = '{$sizes}', qty = '{$qty}', brand_id = '{$brand_id}', product_category_id = '{$product_category_id}', description = '{$description}', content = '{$content}', views = '{$views}', is_new = '{$is_new}', is_promo = '{$is_promo}', is_featured = '{$is_featured}', is_sale = '{$is_sale}', created_at = '{$created_at}', updated_at = '{$updated_at}' WHERE id = '{$id}'";
				$query = $db->query($sql);
				if ($query){
					header('Location: products.php');
				} else{
					$errors[] = "không cập nhật được thư mục";
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa sản phẩm</title>
</head>
<body>
	<div id="container">
		<h3>Edit Product</h3>

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
					<td>Id:</td>
					<td>
						<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $product['id'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Sku:</td>
					<td>
						<input type="text" name="sku" value="<?php if (isset($_POST['sku'])) echo $_POST['sku']; else echo $product['sku'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td>
						<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $product['name'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Slug:</td>
					<td>
						<input type="text" name="slug" readonly="readonly" value="<?php if (isset($_POST['slug'])) echo $_POST['slug']; else echo $product['slug'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Price:</td>
					<td>
						<input type="text" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price']; else echo $product['price'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Colors:</td>
					<td>
						<input type="text" name="colors" value="<?php if (isset($_POST['colors'])) echo $_POST['colors']; else echo $product['colors'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Sizes:</td>
					<td>
						<input type="text" name="sizes" value="<?php if (isset($_POST['sizes'])) echo $_POST['sizes']; else echo $product['sizes'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Qty:</td>
					<td>
						<input type="text" name="qty" value="<?php if (isset($_POST['qty'])) echo $_POST['qty']; else echo $product['qty'] ;?>">
					</td>
				</tr>
				<!--  -->
				<tr>
					<td>Brand Id:</td>
					<td>
						<select name="brand_id">
							<option value="">---Chọn---</option>
							<?php  
								if (!is_null ($brands_id) && count ($brands_id) > 0):
									foreach ($brands_id as $item):
							?>
							<option value="<?php echo $item['id'] ;?>"
								<?php if (isset($_POST['brand_id']) && $_POST['brand_id'] == $item['id'] || $product["brand_id"] == $item["id"]) echo 'selected = "selected" ' ; ?>
							>
								<?php echo $item['name']  . " - " . $item["id"];?>
							</option>
							<?php  
								endforeach;
							endif;
							?>
						</select>
					</td>
				</tr>
				<!--  -->
				<tr>
					<td>Product Category Id:</td>
					<td>
						<select name="product_category_id">
							<option value="">---Chọn---</option>
							<?php  
								if (!is_null ($product_categories_id) && count ($product_categories_id) > 0):
									foreach ($product_categories_id as $item):
							?>
							<option value="<?php echo $item['id'] ;?>"
								<?php if (isset($_POST['product_category_id']) && $_POST['product_category_id'] == $item['id'] || $product["product_category_id"] == $item["id"]) echo 'selected = "selected" ' ; ?>
							>
								<?php echo $item['name']  . " - " . $item["id"];?>
							</option>
							<?php  
								endforeach;
							endif;
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td>Description:</td>
					<td>
						<textarea cols="22" rows="5" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; else echo $product['description'] ;?>"></textarea>
					</td>
				</tr>
				<tr>
					<td>Content:</td>
					<td>
						<input type="text" name="content" value="<?php if (isset($_POST['content'])) echo $_POST['content']; else echo $product['content'] ;?>"></input>
					</td>
				</tr>
				<tr>
					<td>Views:</td>
					<td>
						<input type="text" name="views" value="<?php if (isset($_POST['views'])) echo $_POST['views']; else echo $product['views'] ;?>"></input>
					</td>
				</tr>
				<tr>
					<td>Status:</td>
					<td>
						<input type="text" name="status" readonly="readonly" value="<?php if (isset($_POST['status'])) echo $_POST['status']; else echo $product['status'] ;?>">
					</td>
				</tr>

				<tr>
					<td>Is_new:</td>
					<td>
						<input type="text" name="is_new" value="<?php if (isset($_POST['is_new'])) echo $_POST['is_new']; else echo $product['is_new'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Is_promo:</td>
					<td>
						<input type="text" name="is_promo" value="<?php if (isset($_POST['is_promo'])) echo $_POST['is_promo']; else echo $product['is_promo'] ;?>">
					</td>
				</tr>

				<tr>
					<td>Is_featured:</td>
					<td>
						<input type="text" name="is_featured" value="<?php if (isset($_POST['is_featured'])) echo $_POST['is_featured']; else echo $product['is_featured'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Is_sale:</td>
					<td>
						<input type="text" name="is_sale" value="<?php if (isset($_POST['is_sale'])) echo $_POST['is_sale']; else echo $product['is_sale'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Created At:</td>
					<td>
						<input type="date" name="created_at" value="<?php if (isset($_POST['created_at'])) echo $_POST['created_at']; else echo $product['created_at'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Updated At:</td>
					<td>
						<input type="date" name="updated_at" value="<?php if (isset($_POST['updated_at'])) echo $_POST['updated_at']; else echo $product['updated_at'] ;?>">
					</td>
				</tr>
			
				<tr>
					<td colspan="2" align="center" style="padding-top: 10px;">
						<input type="submit" name="submit" value="Thay đổi">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>