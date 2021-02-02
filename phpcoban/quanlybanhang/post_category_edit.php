<?php  
require('connect.php');
$errors = [];
$post_category_id = $_GET['id'];
$sql = "SELECT * FROM post_categories WHERE id = '{$post_category_id}' LIMIT 1";
$query = $db->query($sql);
$post_category = $query->fetch_assoc();
if (is_null ($post_category)){
	header ('location: post_categories.php');
}
if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = 'Bạn đang để trống Name';
	}
	if (!isset($_POST['slug']) || empty($_POST['slug'])){
		$errors[] = 'Bạn đang để trống Slug';
	}
	if (count($errors) == 0){
		$id = trim ($_POST['id']);
		$name = trim ($_POST['name']);
		$slug = trim ($_POST['slug']);
		$image = trim ($_POST['image']);
		$description = trim ($_POST['description']);
		$content = trim ($_POST['content']);
		$created_at = trim ($_POST['created_at']);
		$updated_at = trim ($_POST['updated_at']);
		$meta_title = trim ($_POST['meta_title']);
		$meta_keyword = trim ($_POST['meta_keyword']);
		$meta_description = trim ($_POST['meta_description']);
		// _________________________________
		$sql = "SELECT * FROM post_categories WHERE id = '{$id}' AND id <> '{$post_category['id']}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Id trùng';
		} else {
			$sql = "UPDATE post_categories SET name = '{$name}', slug = '{$slug}', image = '{$image}', description = '{$description}', content = '{$content}', created_at = '{$created_at}', updated_at = '{$updated_at}', meta_title = '{$meta_title}', meta_keyword = '{$meta_keyword}', meta_description = '{$meta_description}') WHERE id = '{$id}'";
			$query = $db->query($sql);
			if ($query){
				header('location: post_categories.php');
			} else{
				$errors[] = 'Không thể sửa';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Category Edit</title>
</head>
<body>
	<h3>Post Category Edit</h3>
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
					<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $post_category['id']; ?>">
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $post_category['name']; ?>">
				</td>
			</tr>
			<tr>
				<td>Slug</td>
				<td>
					<input type="text" name="slug" value="<?php if (isset($_POST['slug'])) echo $_POST['slug']; else echo $post_category['slug']; ?>">
				</td>
			</tr>
			<tr>
				<td>Image</td>
				<td>
					<input type="text" name="image" value="<?php if (isset($_POST['image'])) echo $_POST['image'];  else echo $post_category['image'];?>">
				</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>
					<input type="text" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; else echo $post_category['description']; ?>">
				</td>
			</tr>
			<tr>
				<td>Content</td>
				<td>
					<input type="text" name="content" value="<?php if (isset($_POST['content'])) echo $_POST['content']; else echo $post_category['content']; ?>">
				</td>
			</tr>
			<tr>
				<td>Created At</td>
				<td>
					<input type="date" name="created_at" value="<?php if (isset($_POST['created_at'])) echo $_POST['created_at']; else echo $post_category['created_at']; ?>">
				</td>
			</tr>
			<tr>
				<td>Updated At</td>
				<td>
					<input type="date" name="updated_at" value="<?php if (isset($_POST['updated_at'])) echo $_POST['updated_at']; else echo $post_category['updated_at']; ?>">
				</td>
			</tr>
			<tr>
				<td>Meta Title</td>
				<td>
					<input type="text" name="meta_title" value="<?php if (isset($_POST['meta_title'])) echo $_POST['meta_title']; else echo $post_category['meta_title']; ?>">
				</td>
			</tr>
			<tr>
				<td>Meta Keyword</td>
				<td>
					<input type="text" name="meta_keyword" value="<?php if (isset($_POST['meta_keyword'])) echo $_POST['meta_keyword']; else echo $post_category['meta_keyword']; ?>">
				</td>
			</tr>
			<tr>
				<td>Meta Description</td>
				<td>
					<input type="text" name="meta_description" value="<?php if (isset($_POST['meta_description'])) echo $_POST['meta_description']; else echo $post_category['meta_description']; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Post Category Edit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>