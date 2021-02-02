<?php  
require('connect.php');
$errors = [];
$product_category_slug = null;
// ___________________________
if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = 'Bạn chưa nhập tên thư mục!';
	}
	if (!isset($_POST['slug']) || empty($_POST['slug'])){
		$errors[] = 'Bạn chưa nhập slug!';
	}
	if (!isset($_POST['parent_id']) || empty($_POST['parent_id'])){
		$errors[] = 'Bạn chưa nhập parent_id!';
	}
	if (!isset($_POST['meta_title']) || empty($_POST['meta_title'])){
		$errors[] = 'Bạn chưa nhập meta_title!';
	}
	if (!isset($_POST['meta_keyword']) || empty($_POST['meta_keyword'])){
		$errors[] = 'Bạn chưa nhập meta_keyword!';
	}
	if (!isset($_POST['meta_description']) || empty($_POST['meta_description'])){
		$errors[] = 'Bạn chưa nhập meta_description!';
	} else {
		$name = trim($_POST['name']);
		$slug = trim($_POST['slug']);
		$parent_id = trim($_POST['parent_id']);
		$meta_title = trim($_POST['meta_title']);
		$meta_keyword = trim($_POST['meta_keyword']);
		$meta_description = trim($_POST['meta_description']);

		//_______________Kiểm tra tên thư mục đã tồn tại hay chưa_______________
		$sql = "SELECT * FROM product_categories WHERE name = '{$name}' LIMIT 1 ";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Tên thư mục đã tồn tại, vui lòng chọn tên thư mục khác!';
		} else {
			$sql = "SELECT * FROM product_categories WHERE slug = '{$slug}' LIMIT 1 ";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if (!is_null($result)){
				$errors[] = 'Slug này đã tồn tại, vui lòng chọn slug khác!';
			} else{
				$sql = "INSERT INTO product_categories (name, slug, parent_id, meta_title, meta_keyword, meta_description) VALUES ('{$name}', '{$slug}', '{$parent_id}', '{$meta_title}', '{$meta_keyword}', '{$meta_description}')";
				$query = $db->query($sql);
				if ($query){
					echo 'Thành công';
				} else{
					$errors[] = " Không thể thêm khoa!";
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm thư mục</title>
</head>
<body>
	<div id="container">
		<h1>Thêm thư mục</h1>

		<div class="message">
			<?php 
			if (count($errors) > 0):
				for ($i = 0; $i < count($errors); $i++):
			?>
				<p style="color: red;"><?php echo $errors[$i] ;?></p>
			<?php  
				endfor;
			endif;
			?>
		</div>

		<form action="" method="post">
			
			<p>	Tên thư mục:
				<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name'] ;?>">
			</p>

			<p>
				Slug:
				<input type="text" name="slug" value="<?php if (isset($_POST['slug'])) echo $_POST['slug'] ;?>">
			</p>

			<p>
				Parent_id:
				<input type="text" name="parent_id" value="<?php if (isset($_POST['parent_id'])) echo $_POST['parent_id'] ;?>">
			</p>
			
			<p>
				Meta_title:
				<input type="text" name="meta_title" value="<?php if (isset($_POST['meta_title'])) echo $_POST['meta_title'] ;?>">
			</p>
			
			<p>
				Meta_keyword:
				<input type="text" name="meta_keyword" value="<?php if (isset($_POST['meta_keyword'])) echo $_POST['meta_keyword'] ;?>">
			</p>
			
			<p>
				Meta_description:
				<input type="text" name="meta_description" value="<?php if (isset($_POST['meta_description'])) echo $_POST['meta_description'] ;?>">
			</p>
			

			<input type="submit" name="submit" value="Thêm thư mục">

		</form>
	</div>
</body>
</html>