<?php  
require('connect.php');
$errors = [];
$customer_id = $_GET['id'];
// ____________________
$sql = "SELECT * FROM customers WHERE id = '{$customer_id}' LIMIT 1";
$query = $db->query($sql);
$customer = $query->fetch_assoc();
// $email_edit = 
if (is_null ($customer)){
	header ('location: customers.php');
}
// _________________________________
$sql = "SELECT * FROM customer_groups";
$query = $db->query($sql);
$customer_groups = $query->fetch_all(MYSQLI_ASSOC);
// ______________________________
if (isset($_POST['submit'])){
	if (!isset($_POST['fullname']) || empty($_POST['fullname'])){
		$errors[] = 'Bạn chưa nhập tên';
	}
	if (!isset($_POST['email']) || empty($_POST['email'])){
		$errors[] = 'Bạn chưa nhập Email';
	}
	if (!isset($_POST['phone']) || empty($_POST['phone'])){
		$errors[] = 'Bạn chưa nhập số điện thoại';
	}
	if (!isset($_POST['address']) || empty($_POST['address'])){
		$errors[] = 'Bạn chưa nhập địa chỉ';
	}
	if (!isset($_POST['gender']) || $_POST['gender'] =''){
		$errors[] = 'Bạn chưa nhập Giới tính';
	}
	if (!isset($_POST['password']) || empty($_POST['password'])){
		$errors[] = 'Bạn chưa nhập Mật khẩu';
	}
	if (count($errors) == 0){
		$id = trim ($_POST['id']);
		$fullname = trim ($_POST['fullname']);
		$email = trim ($_POST['email']);
		$phone = trim ($_POST['phone']);
		$address = trim ($_POST['address']);
		$gender = trim ($_POST['gender']);
		$password = trim ($_POST['password']);
		$customer_group_id = trim ($_POST['customer_group_id']);
		$created_at = trim ($_POST['created_at']);
		$updated_at = trim ($_POST['updated_at']);
		// _________________________
		$sql = "SELECT * FROM customers WHERE id = '{$id}' AND id <> '{$customer_id}' LIMIT 1";
		$query = $db->query($sql);
		$result = $query->fetch_assoc();
		if (!is_null($result)){
			$errors[] = 'Id trùng';
		} else {
			$sql = "SELECT * FROM customers WHERE email = '{$email}' AND email <> '{$customer['email']}' LIMIT 1";
			$query = $db->query($sql);
			$result = $query->fetch_assoc();
			if(!is_null($result)){
				$errors[] = 'email trùng';
			}else{
				$sql ="UPDATE customers SET fullname = '{$fullname}', email = '{$email}', phone = '{$phone}', address = '{$address}', gender = '{$gender}', password = '{$password}', customer_group_id = '{$customer_group_id}', created_at = '{$created_at}', updated_at = '{$updated_at}'";
				$query = $db->query($sql);
				if ($query){
					header('location: customers.php');
				} else{
					$errors[] = 'không sửa được';
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Edit</title>
</head>
<body>
	<h3>Customer Edit</h3>
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
				<td>ID:</td>
				<td>
					<input type="text" name="id" readonly="readonly" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $customer['id'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Fullname</td>
				<td>
					<input type="text" name="fullname" value="<?php if (isset($_POST['fullname'])) echo $_POST['fullname']; else echo $customer['fullname'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="text" name="email" readonly="readonly" value="<?php if (isset($_POST['email'])) echo $_POST['email']; else echo $customer['email'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>
					<input type="text" name="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; else echo $customer['phone'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>
					<input type="text" name="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']; else echo $customer['address'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Sex</td>
				<td>
					<input type="radio" name="gender" value="1" <?php if (isset($_POST['gender']) && $_POST['gender'] == 1 || $customer['gender'] == 1) echo "checked = 'checked' " ;?>> Nam
					<input type="radio" name="gender" value="0" <?php if (isset($_POST['gender']) && $_POST['gender'] == 0 || $customer['gender'] == 0) echo "checked = 'checked' " ;?>> Nữ
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="text" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; else echo $customer['password'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Customer Group Id</td>
				<td>
					<select name="customer_group_id">
						<option value="">---Chọn---</option>
						<!-- Danh sách group -->
						<?php 
							if (!is_null($customer_groups) && count($customer_groups) > 0) :
								foreach ($customer_groups as $item) :
						?>
						<!--  -->
						<option value="<?php echo $item['id']; ?>"
							<?php if (isset($_POST['customer_group_id']) &&  $_POST['customer_group_id'] == $item['id'] || $customer['customer_group_id'] == $item['id']) echo 'selected = "selected" ' ;?>
						>
							<?php echo $item['name']  . " - " . $item["id"];?>
						</option>
						<!--  -->
						<?php  
								endforeach;
							endif;
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Created At</td>
				<td>
					<input type="date" name="created_at" value="<?php if (isset($_POST['created_at'])) echo $_POST['created_at']; else echo $customer['created_at'] ;?>">
				</td>
			</tr>
			<tr>
				<td>Updated At</td>
				<td>
					<input type="date" name="updated_at" value="<?php if (isset($_POST['updated_at'])) echo $_POST['updated_at']; else echo $customer['updated_at'] ;?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Sửa khách hàng">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>