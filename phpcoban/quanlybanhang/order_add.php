<?php  
require('connect.php');
$errors = [];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm đơn hàng</title>
</head>
<body>
	<h3>Thêm đơn hàng</h3>
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
				<td>Email</td>
				<td>
					<input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>
					<input type="text" name="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>">
				</td>
			</tr>
			<tr>
				<td>Province</td>
				<td>
					<select name="province_id">
						<option value="">---Chọn---</option>
						<?php  
							$sql = "SELECT * FROM provinces";
							$query = $db->query($sql);
							$result = $query->fetch_all(MYSQLI_ASSOC);
						?>
						<?php 
						if (!is_null($result) && count($result) > 0):
							foreach ($result as $province):
						?>
						<option value="<?php echo $province['id'] ;?>"
							<?php if (isset($_POST['province_id']) && $_POST['province_id'] == $province['id']) echo 'selected = "selected" ' ; ?>
						> 
							<?php echo $province['name']; ?>
						</option>
						<?php  
							endforeach;
						endif;
						?>
				</select>
				</td>
			</tr>
			<!-- huyện/quận -->
			<tr>
				<td>District</td>
				<td>
					<select name="district_id">
						<option value="">---Chọn---</option>
						<?php  
							$sql = "SELECT * FROM districts WHERE province_id = '{$province['id']}'";
							$query = $db->query($sql);
							$result = $query->fetch_all(MYSQLI_ASSOC);
						?>
						<?php 
						if (!is_null($result) && count($result) > 0):
							foreach ($result as $district):
						?>
						<option value="<?php echo $district['id'] ;?>"
							<?php if (isset($_POST['district_id']) && $_POST['district_id'] == $district['id']) echo 'selected = "selected" ' ; ?>
						> 
							<?php echo $district['name']; ?>
						</option>
						<?php  
							endforeach;
						endif;
						?>
				</select>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>