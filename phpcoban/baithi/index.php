<?php 
session_start();
require('connect.php');
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
$sql = "SELECT * FROM tbl_book";
$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
</head>
<body>
	<table border="1" cellpadding="10">
		<div class="message">
			<?php 
			if (isset($_SESSION['flash_msg'])) :
			?>
				<p style="color:green;"><?php echo $_SESSION['flash_msg'];?></p>
			<?php
				unset($_SESSION['flash_msg']);
			endif;
			?>
		</div>
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Price</th>
				<th>Aothor</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (count($result) > 0) :
				foreach ($result as $item) :
			?>
			<tr>
				<td><?php echo $item['ID'];?></td>
				<td><?php echo $item['Title'];?></td>
				<td><?php echo $item['Price'] ;?></td>
				<td><?php echo $item['Author'];?></td>
				<td><a href="tbl_book_edit.php?id=<?php echo $item['ID'] ;?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="tbl_book_delete.php?id=<?php echo $item['ID'];?>">Delete</a></td>
				
			</tr>
			<?php
				endforeach;
			endif; 
			?>
		</tbody>
	</table>
	<br><br>
	<a href="tbl_book_add.php">Add book</a>
	<br><br><br>
	<a href="logout.php">Logout</a>
</body>
</html>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Ban co thuc su muon xoa?')) {
			return false;
		}
	}
</script>