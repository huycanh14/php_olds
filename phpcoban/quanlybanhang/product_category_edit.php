<?php 
session_start();
require('connect.php');
// ____________Lấy thông tin trên thanh địa chỉ_____________
$product_category_id = $_GET["id"];
$sql = "SELECT * FROM product_categories WHERE id = '{$product_category_id}' LIMIT 1";
$query = $db->query($sql);
$product_category = $query->fetch_assoc();

if (is_null($product_category)){
	header('location: product_categories.php');
}
// ++++++++++++++++++
$errors = [];
if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = 'Bạn chưa nhập tên thư mục';
	}
	if (!isset($_POST['slug']) || empty($_POST['slug'])){
		$errors[] = 'Bạn chưa nhập Slug';
	}
	if (!isset($_POST['parent_id']) || empty($_POST['parent_id'])){
		$errors[] = 'Bạn chưa nhập Parent Id';
	}
	if (!isset($_POST['meta_title']) || empty($_POST['meta_title'])){
		$errors[] = 'Bạn chưa nhập Meta Title';
	}
	if (!isset($_POST['meta_keyword']) || empty($_POST['meta_keyword'])){
		$errors[] = 'Bạn chưa nhập Meta Keyword';
	}
	if (!isset($_POST['meta_description']) || empty($_POST['meta_description'])){
		$errors[] = 'Bạn chưa nhập Meta Description';
	} else {
		$id = trim ($_POST['id']);
		$name = trim ($_POST['name']);
		$slug = trim ($_POST['slug']);
		$image = trim ($_POST['image']);
		$description = trim ($_POST['description']);
		$parent_id = trim ($_POST['parent_id']);
		$meta_title = trim ($_POST['meta_title']);
		$meta_keyword = trim ($_POST['meta_keyword']);
		$meta_description = trim ($_POST['meta_description']);

		// ++++++++++++++++++++++++
		$sql = "SELECT * FROM product_categories WHERE id = '{$id}' AND id <> '".trim($product_category['id'])."' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)) {
			$errors[] = 'Id bị trùng';
		} else {
			$sql = "SELECT * FROM product_categories WHERE slug = '{$slug}' AND slug <> '".trim($product_category['slug'])."' LIMIT 1";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if (!is_null($result)) {
				$errors[] = 'Slug bị trùng';
			} else {
				$sql = "UPDATE product_categories SET name = '{$name}', image = '{$image}', description = '{$description}', parent_id = '{$parent_id}', meta_title = '{$meta_title}', meta_keyword = '{$meta_keyword}', meta_description = '{$meta_description}' WHERE id = '{$id}'";
				$query = $db->query($sql);
				if ($query){
					header('Location: product_categories.php');
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
	<title>Sửa thư mục sản phẩm</title>
</head>
<body>
	<div id="container">
		<h3>Edit Product Category</h3>

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
						<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $product_category['id'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td>
						<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $product_category['name'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Slug:</td>
					<td>
						<input type="text" name="slug" readonly="readonly" value="<?php if (isset($_POST['slug'])) echo $_POST['slug']; else echo $product_category['slug'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Image:</td>
					<td>
						<input type="text" name="image" value="<?php if (isset($_POST['image'])) echo $_POST['image']; else echo $product_category['image'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Description:</td>
					<td>
						<textarea cols="22" rows="5" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; else echo $product_category['description'] ;?>"></textarea>
					</td>
				</tr>
				<tr>
					<td>Status:</td>
					<td>
						<input type="text" name="status" readonly="readonly" value="<?php if (isset($_POST['status'])) echo $_POST['status']; else echo $product_category['status'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Parent Id:</td>
					<td>
						<input type="text" name="parent_id" value="<?php if (isset($_POST['parent_id'])) echo $_POST['parent_id']; else echo $product_category['parent_id'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Meta Title:</td>
					<td>
						<input type="text" name="meta_title" value="<?php if (isset($_POST['meta_title'])) echo $_POST['meta_title']; else echo $product_category['meta_title'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Meta Keyword:</td>
					<td>
						<input type="text" name="meta_keyword" value="<?php if (isset($_POST['meta_keyword'])) echo $_POST['meta_keyword']; else echo $product_category['meta_keyword'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Meta Description:</td>
					<td>
						<input type="text" name="meta_description" value="<?php if (isset($_POST['meta_description'])) echo $_POST['meta_description']; else echo $product_category['meta_description'] ;?>">
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