<?php  
require('connect.php');
$errors = [];

if (isset($_POST['submit'])){
	if (!isset($_POST['name']) || empty($_POST['name'])){
		$errors[] = 'Tên bạn đang để trống';
	} else {
		$name = trim ($_POST['name']);
		$image = trim ($_POST['image']);
		$link = trim ($_POST['link']);
		$description = trim ($_POST['description']);
		$position = trim ($_POST['position']);

		$sql = "SELECT * FROM banners WHERE name = '{$name}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Tên quảng cáo đã tồn tại. Bạn nên chọn tên quảng cáo khác';
		} else {
			$sql = "INSERT INTO banners (name, image, link, description, position) VALUES ('{$name}', '{$image}', '{$link}', '{$description}', '{$position}')";
			$query = $db->query($sql);
			if ($query){
				echo 'Thành công';
			} else{
				$errors[] = " Không thể thêm quảng cáo!";
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
					<td>Name:</td>
					<td>
						<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name'];?>">
					</td>
				</tr>
				<tr>
					<td>Image:</td>
					<td>
						<input type="text" name="image" value="<?php if (isset($_POST['image'])) echo $_POST['image'];?>">
					</td>
				</tr>
				<tr>
					<td>Link</td>
					<td>
						<input type="text" name="link" value="<?php if (isset($_POST['link'])) echo $_POST['link'];?>">
					</td>
				</tr>
				<tr>
					<td>Description:</td>
					<td>
						<textarea cols="22" rows="5" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; else echo $product['description'] ;?>"></textarea>
					</td>
				</tr>
				<tr>
					<td>Position:</td>
					<td>
						<input type="text" name="position" value="<?php if (isset($_POST['position'])) echo $_POST['position'];?>">
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