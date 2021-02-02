<?php  
session_start();
require('connect.php');
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
$errors = [];
$title = $price = $author = $id_new ='';
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_book WHERE ID = '{$id}' LIMIT 1";
$query = $db->query($sql);
$book = $query->fetch_assoc();

if (is_null($book)){
	header('Location: index.php');
}

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
		$id_new = trim($_POST['id']);
		$title = trim($_POST['title']);
		$price = trim($_POST['price']);
		$author = trim($_POST['author']);

		$sql = "SELECT * FROM tbl_book WHERE ID = '{$id_new}' AND ID <> '{$id}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();

		if (!is_null($result)) {
			$errors[]  = "ID đã thay đổi";
		} else{
			//Sửa và nhập vào CSDL
			$sql = "UPDATE tbl_book SET Title = '{$title}', Price = '{$price}', Author = '{$author}'WHERE ID = '{$id}' ";
			$query = $db->query($sql);
			if ($query){
				header('Location: index.php');
			} else{
				$errors[] = "không cập nhật được";
			}
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
	<title>Update Book</title>
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
				<td>ID:</td>
				<td>
					<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $book['ID'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Title:</td>
				<td>
					<input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; else echo $book['Title'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Price:</td>
				<td>
					<input type="text" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price']; else echo $book['Price'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Author:</td>
				<td>
					<input type="text" name="author" value="<?php if (isset($_POST['author'])) echo $_POST['author']; else echo $book['Author'] ;?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Update Book">
					<input type="submit" name="reset" value="Reset">
				</td>
				
			</tr>
		</form>
	</table>
	<br><br><br>
	<a href="logout.php">Logout</a>
</body>
</html>