<?php  
require('connect.php');
$errors = [];
$brand_id = $_GET['id'];
$sql = "SELECT * FROM brands WHERE id = '{$brand_id}' LIMIT 1";
$query = $db->query($sql);
$brand = $query->fetch_assoc();
if (is_null ($brand)){
	header ('location: brands.php');
}
if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = 'Bạn đang để trống tên';
	}
	if (!isset($_POST['meta_title']) || empty($_POST['meta_title'])){
		$errors[] = 'Bạn đang để trống Meta Title';
	}
	if (!isset($_POST['meta_keyword']) || empty($_POST['meta_keyword'])){
		$errors[] = 'Bạn đang để trống Meta Keyword';
	}
	if (!isset($_POST['meta_description']) || empty($_POST['meta_description'])){
		$errors[] = 'Bạn đang để trống Meta Description';
	}
	if (count ($errors) == 0){
		$id = trim ($_POST['id']);
		$name = trim ($_POST['name']);
		$slug = trim ($_POST['slug']);
		$logo = trim ($_POST['logo']);
		$image = trim ($_POST['image']);
		$description = trim ($_POST['description']);
		$meta_title = trim ($_POST['meta_title']);
		$meta_keyword = trim ($_POST['meta_keyword']);
		$meta_description = trim ($_POST['meta_description']);

		// ___________________________________________-
		$sql = "SELECT * FROM brands WHERE id = '{$id}' AND id <> '".trim ($brand['id'])."' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null ($result)){
			$errors[] = 'Id bị trùng';
		} else {
			$sql = "SELECT * FROM brands WHERE slug = '{$slug}' AND slug <> '".trim ($brand['slug'])."' LIMIT 1";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if (!is_null ($result)){
				$errors[] = 'Slug bị trùng';
			} else {
				$sql = "UPDATE brands SET name = '{$name}', logo = '{$logo}', image = '{$image}', description = '{$description}', meta_title = '{$meta_title}', meta_keyword = '{$meta_keyword}', meta_description = '{$meta_description}' WHERE id = '{$id}'";
				$query = $db->query($sql);
				if ($query){
					header('location: brands.php');
				}else {
					$errors[] = "không cập nhật được thương hiệu";
				}
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thương hiệu</title>
</head>
<body>
	<div id="contaier">
		<h3>Sửa thư mục</h3>
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
						<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $brand['id'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Name</td>
					<td>
						<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $brand['name'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Slug</td>
					<td>
						<input type="text" name="slug" readonly="readonly" value="<?php if (isset($_POST['slug'])) echo $_POST['slug']; else echo $brand['slug'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Logo</td>
					<td>
						<input type="text" name="logo" value="<?php if (isset($_POST['logo'])) echo $_POST['logo']; else echo $brand['logo'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Image</td>
					<td>
						<input type="text" name="image" value="<?php if (isset($_POST['image'])) echo $_POST['image']; else echo $brand['image'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Description:</td>
					<td>
						<textarea cols="22" rows="5" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; else echo $brand['description'];?>"></textarea>
					</td>
				</tr>
				<tr>
					<td>Meta Title</td>
					<td>
						<input type="text" name="meta_title" value="<?php if (isset($_POST['meta_title'])) echo $_POST['meta_title']; else echo $brand['meta_title'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Meta Keyword</td>
					<td>
						<input type="text" name="meta_keyword" value="<?php if (isset($_POST['meta_keyword'])) echo $_POST['meta_keyword']; else echo $brand['meta_keyword'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Meta Description</td>
					<td>
						<input type="text" name="meta_description" value="<?php if (isset($_POST['meta_description'])) echo $_POST['meta_description']; else echo $brand['meta_description'] ;?>">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" style="padding-top: 10px;">
						<input type="submit" name="submit" value="Sửa thương hiệu">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>