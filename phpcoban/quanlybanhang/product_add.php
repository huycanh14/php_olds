<?php 
session_start();
require('connect.php');
$errors = [];
// Lấy product_category_id
$sql = "SELECT * FROM product_categories";
$query = $db->query($sql);
$product_categories_id = $query->fetch_all(MYSQLI_ASSOC);
// Lấy product_category_id
$sql = "SELECT * FROM brands";
$query = $db->query($sql);
$brands_id = $query->fetch_all(MYSQLI_ASSOC);

// ______________________________________
if (isset ($_POST['submit'])){
	if (!isset ($_POST['sku']) || empty ($_POST['sku'])){
		$errors[] = 'Bạn chưa nhập Sku';
	}
	if (!isset ($_POST['name']) || empty ($_POST['name'])){
		$errors[] = 'Bạn chưa nhập tên sản phẩm';
	}
	if (!isset($_POST['slug']) || empty ($_POST['slug'])){
		$errors[] = 'Bạn chưa nhập Slug';
	}
	if (!isset($_POST['brand_id']) || empty ($_POST['brand_id'])){
		$errors[] = 'Bạn chưa nhập Brand Id';
	}
	if (!isset($_POST['product_category_id']) || empty ($_POST['product_category_id'])){
		$errors[] = 'Bạn chưa nhập Product Category Id';
	}
	if (count ($errors) == 0){
		// $id = trim ($_POST['id']);
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
		// _________________Kiểm tra tên sản phẩm đã tồn tại hay chưa________________
		$sql = "SELECT * FROM products WHERE name = '{$name}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Tên sản phẩm đã tồn tại, vui lòng chọn tên sản phẩm khác!';
		} else {
			$sql = "SELECT * FROM products WHERE slug = '{$slug}' LIMIT 1 ";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if (!is_null($result)){
				$errors[] = 'Slug này đã tồn tại, vui lòng chọn slug khác!';
			} else {
				$sql = "INSERT INTO products (sku, name, slug, price, colors, sizes, qty, brand_id, product_category_id, description, content, views, is_new, is_promo, is_featured, is_sale, created_at, updated_at) VALUES ('{$sku}', '{$name}', '{$slug}', '{$price}', '{$colors}', '{$sizes}', '{$qty}', '{$brand_id}', '{$product_category_id}', '{$description}', '{$content}', '{$views}', '{$is_new}', '{$is_promo}', '{$is_featured}', '{$is_sale}', '{$created_at}', '{$updated_at}')";
				$query = $db->query($sql);
				if ($query){
					echo 'Thành công';
				} else{
					$errors[] = " Không thể thêm sản phẩm!";
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm</title>
</head>
<body>
	<div id="container">
		<h3>Add Product</h3>

		<div class="message">
			<?php if (count($errors) > 0) :?>
				<?php for ($i = 0; $i < count($errors); $i++) :?>
					<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
				<?php endfor;?>
		<?php endif ;?>
		</div>

		<form action="" method="post">
			<table border="1" cellpadding="10">
				<!-- <tr>
					<td>Id:</td>
					<td>
						<input type="text" name="id" value="<?php if (isset($_POST['id'])) echo $_POST['id'];?>">
					</td>
				</tr> -->
				<tr>
					<td>Sku:</td>
					<td>
						<input type="text" name="sku" value="<?php if (isset($_POST['sku'])) echo $_POST['sku'];?>">
					</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td>
						<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name'];?>">
					</td>
				</tr>
				<tr>
					<td>Slug:</td>
					<td>
						<input type="text" name="slug" value="<?php if (isset($_POST['slug'])) echo $_POST['slug'];?>">
					</td>
				</tr>
				<tr>
					<td>Price:</td>
					<td>
						<input type="text" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price'];?>">
					</td>
				</tr>
				<tr>
					<td>Colors:</td>
					<td>
						<input type="text" name="colors" value="<?php if (isset($_POST['colors'])) echo $_POST['colors'];?>">
					</td>
				</tr>
				<tr>
					<td>Sizes:</td>
					<td>
						<input type="text" name="sizes" value="<?php if (isset($_POST['sizes'])) echo $_POST['sizes'];?>">
					</td>
				</tr>
				<tr>
					<td>Qty:</td>
					<td>
						<input type="text" name="qty" value="<?php if (isset($_POST['qty'])) echo $_POST['qty'];?>">
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
								<?php if (isset($_POST['brand_id']) && $_POST['brand_id'] == $item['id']) echo 'selected = "selected" ' ; ?>
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
								<?php if (isset($_POST['product_category_id']) && $_POST['product_category_id'] == $item['id']) echo 'selected = "selected" ' ; ?>
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
						<textarea cols="22" rows="5" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description'];?>"></textarea>
					</td>
				</tr>
				<tr>
					<td>Content:</td>
					<td>
						<input type="text" name="content" value="<?php if (isset($_POST['content'])) echo $_POST['content'];?>"></input>
					</td>
				</tr>
				<tr>
					<td>Views:</td>
					<td>
						<input type="text" name="views" value="<?php if (isset($_POST['views'])) echo $_POST['views'];?>"></input>
					</td>
				</tr>
				<tr>
					<td>Status:</td>
					<td>
						<input type="text" name="status" value="<?php if (isset($_POST['status'])) echo $_POST['status'];?>">
					</td>
				</tr>

				<tr>
					<td>Is_new:</td>
					<td>
						<input type="text" name="is_new" value="<?php if (isset($_POST['is_new'])) echo $_POST['is_new'];?>">
					</td>
				</tr>
				<tr>
					<td>Is_promo:</td>
					<td>
						<input type="text" name="is_promo" value="<?php if (isset($_POST['is_promo'])) echo $_POST['is_promo'];?>">
					</td>
				</tr>

				<tr>
					<td>Is_featured:</td>
					<td>
						<input type="text" name="is_featured" value="<?php if (isset($_POST['is_featured'])) echo $_POST['is_featured'];?>">
					</td>
				</tr>
				<tr>
					<td>Is_sale:</td>
					<td>
						<input type="text" name="is_sale" value="<?php if (isset($_POST['is_sale'])) echo $_POST['is_sale'];?>">
					</td>
				</tr>
				<tr>
					<td>Created At:</td>
					<td>
						<input type="date" name="created_at" value="<?php if (isset($_POST['created_at'])) echo $_POST['created_at'];?>">
					</td>
				</tr>
				<tr>
					<td>Updated At:</td>
					<td>
						<input type="date" name="updated_at" value="<?php if (isset($_POST['updated_at'])) echo $_POST['updated_at'];?>">
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