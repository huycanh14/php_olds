<?php  
require('connect.php');
$errors = [];
if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = 'Bạn chưa nhập tên';
	}
	if (!isset($_POST['slug']) || empty($_POST['slug'])){
		$errors[] = 'Bạn chưa nhập Slug';
	}
	if (!isset($_POST['meta_title']) || empty($_POST['meta_title'])){
		$errors[] = 'Bạn chưa nhập Meta Title';
	}
	if (!isset($_POST['meta_keyword']) || empty($_POST['meta_keyword'])){
		$errors[] = 'Bạn chưa nhập Meta Keyword';
	}
	if (!isset($_POST['meta_description']) || empty($_POST['meta_description'])){
		$errors[] = 'Bạn chưa nhập Meta Description';
	}
	if (count ($errors) == 0){
		$name = trim ($_POST['name']);
		$slug = trim ($_POST['slug']);
		$logo = trim ($_POST['logo']);
		$image = trim ($_POST['image']);
		$description = trim ($_POST['description']);
		$meta_title = trim ($_POST['meta_title']);
		$meta_keyword = trim ($_POST['meta_keyword']);
		$meta_description = trim ($_POST['meta_description']);
		$sql = "SELECT * FROM brands WHERE name = '{$name}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Thương hiệu này đã tồn tại. Bạn vui lòng nhập tên thương hiệu khác';
		} else {
			$sql = "SELECT * FROM brands WHERE slug = '{$slug}' LIMIT 1";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if (!is_null ($result)){
				$errors[] = 'Slug này đã tồn tại. Bạn vui lòng nhập tên Slug khác';
			} else {
				$sql = "INSERT INTO brands (name, slug, logo, image, description, meta_title, meta_keyword, meta_description) VALUES ('{$name}', '{$slug}', '{$logo}', '{$image}', '{$description}', '{$meta_title}', '{$meta_keyword}', '{$meta_description}')";
				$query = $db->query($sql);
				if ($query){
					echo 'Thành công';
				} else{
					$errors[] = " Không thể thêm thương hiệu!";
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm thương hiệu</title>
</head>
<body>
	<div id="contaier">
		<h3>Thêm thương hiệu</h3>
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
					<td>Name</td>
					<td>
						<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Slug</td>
					<td>
						<input type="text" name="slug" value="<?php if (isset($_POST['slug'])) echo $_POST['slug'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Logo</td>
					<td>
						<input type="text" name="logo" value="<?php if (isset($_POST['logo'])) echo $_POST['logo'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Image</td>
					<td>
						<input type="text" name="image" value="<?php if (isset($_POST['image'])) echo $_POST['image'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Description:</td>
					<td>
						<textarea cols="22" rows="5" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description'];?>"></textarea>
					</td>
				</tr>
				<tr>
					<td>Meta Title</td>
					<td>
						<input type="text" name="meta_title" value="<?php if (isset($_POST['meta_title'])) echo $_POST['meta_title'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Meta Keyword</td>
					<td>
						<input type="text" name="meta_keyword" value="<?php if (isset($_POST['meta_keyword'])) echo $_POST['meta_keyword'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Meta Description</td>
					<td>
						<input type="text" name="meta_description" value="<?php if (isset($_POST['meta_description'])) echo $_POST['meta_description'] ;?>">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" style="padding-top: 10px;">
						<input type="submit" name="submit" value="Thêm thương hiệu">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>