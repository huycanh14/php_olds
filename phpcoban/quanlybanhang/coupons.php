<!-- Mã giảm giá -->
<?php  
session_start();
require('connect.php');
$sql = "SELECT * FROM coupons";
$query = $db->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table, th, td {
		    border:1px solid black;
		}
	</style>
	<title>Mã giảm giá</title>
</head>
<body>
	<h3>Mã giảm giá</h3>
	<div class="message">
		<?php 
		if (isset($_SESSION['coupons'])) :
		?>
			<p style="color:green;"><?php echo $_SESSION['coupons'];?></p>
		<?php
			unset($_SESSION['coupons']);
		endif;
		?>
	</div>
	<a href="coupon_add.php">Thêm mã coupons</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>CODE</th>
				<th>Start Day</th>
				<th>End Day</th>
				<th>Amount</th>
				<th>Type</th>
				<th>User per user</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				if (count ($result) > 0):
					foreach ($result as $coupons) :
			?>
			<tr>
				<td><?php echo $coupons['id']; ?></td>
				<td><?php echo $coupons['code']; ?></td>
				<td><?php echo $coupons['start_date']; ?></td>
				<td><?php echo $coupons['end_date']; ?></td>
				<td><?php echo $coupons['amount']; ?></td>
				<td><?php echo $coupons['type']; ?></td>
				<td><?php echo $coupons['user_per_user']; ?></td>			
				<td><a href="coupon_edit.php?code=<?php echo $coupons['code'];?>">Edit</a></td>
				<td><a onclick="return checkDelete();" href="coupon_delete.php?code=<?php echo $coupons['code'];?>">Delete</a></td>
			</tr>
			<?php  
					endforeach;
				endif;
			?>
		</tbody>
	</table>
</body>
</html>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa banner này?')) {
			return false;
		}
	}
</script>