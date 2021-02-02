<?php  
require('connect.php');
$errors = [];
$post_id_edit = $_GET['post_id'];
// _______________________________
$sql = "SELECT * FROM comments WHERE post_id = '{$post_id_edit}' LIMIT 1";
$query = $db->query($sql);
$comment = $query->fetch_assoc();
if (is_null($comment)){
	header('location: comments.php');
} else {
	if (isset($_POST['submit'])){
		if (!isset($_POST['content']) || empty($_POST['content'])){
			$errors[] = 'Content bạn đang để trống';
		}
		if (!isset($_POST['created_at']) || empty($_POST['created_at'])){
			$errors[] = 'Created At bạn đang để trống';
		}
		if (!isset($_POST['updated_at']) || empty($_POST['updated_at'])){
			$errors[] = 'Updated At bạn đang để trống';
		}
		if (!isset($_POST['status']) || empty($_POST['status'])){
			$errors[] = 'Status bạn đang để trống';
		}
		if (count ($errors) == 0){
			$post_id = trim ($_POST['post_id']);
			$email = trim ($_POST['email']);
			$content = trim ($_POST['content']);
			$created_at = trim ($_POST['created_at']);
			$updated_at = trim ($_POST['updated_at']);
			$status = trim ($_POST['status']);
			// __________________________
			$sql = "SELECT  * FROM comments WHERE post_id = '{$post_id_edit}' AND post_id <> '{$post_id}' LIMIT 1";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if (!is_null($result)){
				$errors[] = 'Id không trung';
			} else {
				$sql = "UPDATE comments SET post_id = '{$post_id}', email = '{$email}', content = '{$content}', created_at = '{$created_at}', updated_at = '{$updated_at}', status = '{$status}' WHERE post_id = '{$post_id}'";
				$query = $db->query($sql);
				if ($query){
					header('location: comments.php');
				} else{
					$errors[] = 'Không sửa được';
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Commemt Edit</title>
</head>
<body>
	<h3>Comment Edit</h3>
	<div class="message">
		<?php if (count($errors) > 0) :?>
			<?php for ($i = 0; $i < count($errors); $i++) :?>
				<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
			<?php endfor;?>
		<?php endif ;?>
	<form action="" method="post">
		<table border="1" cellpadding="10">
			<tr>
				<td>Post ID:</td>
				<td>
					<input type="text" name="post_id" readonly="readonly" value="<?php if (isset($_POST['post_id'])) echo $_POST['post_id']; else echo $comment['post_id'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>
					<input type="text" name="email" readonly="readonly" value="<?php if (isset($_POST['email'])) echo $_POST['email']; else echo $comment['email'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Content:</td>
				<td>
					<textarea cols="22" rows="5" name="content" value="<?php if (isset($_POST['content'])) echo $_POST['content']; else echo $comment['content'];?>"></textarea>
				</td>
			</tr>
			<tr>
				<td>Created At:</td>
				<td>
					<input type="date" name="created_at" value="<?php if (isset($_POST['created_at'])) echo $_POST['created_at']; else echo $comment['created_at'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Updated At:</td>
				<td>
					<input type="date" name="updated_at" value="<?php if (isset($_POST['updated_at'])) echo $_POST['updated_at']; else echo $comment['updated_at'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Status:</td>
				<td>
					<input type="text" name="status" placeholder="0 or 1" value="<?php if (isset($_POST['status'])) echo $_POST['status']; else echo $comment['status'] ;?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Edit Comment">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>