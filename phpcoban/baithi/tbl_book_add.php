<?php  
session_start();
require('connect.php');
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
$errors = [];
$title = $price = $author = '';
if (isset($_POST['submit'])) {
	if (!isset($_POST['title']) || $_POST['title'] === '') {
		$errors[] = 'Title bạn đang để trống';
	}

	if (!isset($_POST['price']) || $_POST['price'] == '') {
		$errors[] = 'Price bạn đang để trống';
	}

	if (!isset($_POST['author']) || $_POST['author'] == '') {
		$errors[] = 'Author bạn đang để trống';
	}

	if (!is_numeric($_POST['price'])){
		$errors[] = "Price bạn phải nhập là số";
	}

	if (count($errors) == 0) {
		$title = trim($_POST['title']);
		$price = trim($_POST['price']);
		$author = trim($_POST['author']);

		$sql = "INSERT INTO tbl_book (Title, Price, Author) VALUES ('{$title}', '{$price}', '{$author}');";
			$query = $db->query($sql);
			if ($query){
				header('location: index.php');
			} else{
				$errors[] = " Không thể thêm sách!";
			}
	}
}
if (isset($_POST['reset'])) {
	header('location: tbl_book_add.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Book</title>
</head>
<body>
	<table>
		<div class="message"><!-- message -->
			<!-- Errors Message -->
			<?php if (count($errors) > 0) :?>
				<?php for ($i = 0; $i < count($errors); $i++) :?>
					<p class="errors" style="color: red;"> <?php echo $errors[$i];?> </p>
				<?php endfor;?>
			<?php endif ;?><!-- end errors -->
		</div>
		<form action="" method="post">
			<tr>
				<td colspan="2" align="center">
					<h3>Form add book</h3>
				</td>
			</tr>
			<tr>
				<td>Title:</td>
				<td>
					<input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Price:</td>
				<td>
					<input type="text" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Author:</td>
				<td>
					<input type="text" name="author" value="<?php if (isset($_POST['author'])) echo $_POST['author'] ;?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Add Book">
					<input type="submit" name="reset" value="Reset">
				</td>
				
			</tr>
		</form>
	</table>
</body>
</html>