<?php  
require('connect.php');
$errors = [];
$banner_id = $_GET['id'];
$sql = "SELECT * FROM banners WHERE id = '{$banner_id}'";
$query = $db->query($sql);
$banner = $query->fetch_assoc();
if (is_null($banner)){
	header('location: banners.php');
}

if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = "Tên bạn đang để trống";
	} else {
		$id = trim ($_POST['id']);
		$name = trim ($_POST['name']);
		$image = trim ($_POST['image']);
		$link = trim ($_POST['link']);
		$description = trim ($_POST['description']);
		$position = trim ($_POST['position']);
		$sql = "SELECT * FROM banners WHERE id = '{id}' AND id <> '".trim($banner['id'])."'LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)) {
			$errors[] = 'Id bị trùng';
		} else{
			$sql = "UPDATE banners SET name = '{$name}', image = '{$image}', link = '{$link}', description = '{$description}', position = '{$position}' WHERE id = '{$id}'";
			$query = $db->query($sql);
			if ($query){
				header('Location: banners.php');
			} else{
				$errors[] = "không cập nhật được quảng cáo";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa quảng cáo</title>
</head>
<body>
	<div id="container">
		<h3>Edit Banner</h3>

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
						<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $banner['id'] ;?>">
					</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td>
						<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $banner['name']; ?>">
					</td>
				</tr>
				<tr>
					<td>Image:</td>
					<td>
						<input type="text" name="image" value="<?php if (isset($_POST['image'])) echo $_POST['image']; else echo $banner['image'];?>">
					</td>
				</tr>
				<tr>
					<td>Link</td>
					<td>
						<input type="text" name="link" value="<?php if (isset($_POST['link'])) echo $_POST['link']; else echo $banner['link'];?>">
					</td>
				</tr>
				<tr>
					<td>Description:</td>
					<td>
						<textarea cols="22" rows="5" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; else echo $banner['description'] ;?>"></textarea>
					</td>
				</tr>
				<tr>
					<td>Position:</td>
					<td>
						<input type="text" name="position" value="<?php if (isset($_POST['position'])) echo $_POST['position']; else echo $banner['position'];?>">
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