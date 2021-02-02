<?php  
	$cart = $_SESSION['cart'];
	if (count($cart) > 0) :

?>
<div class="content">
	<div class="container">
		<form method="POST" action="?c=cart&m=update">
			<div class="header-form">
				<input type="submit" name="submit" value="Update">
			</div>
			<div class="main-form">
				<table border="1" cellpadding="10">
					<thead>
						<tr>
							<th>
								Tên
							</th>

							<th>
								Ảnh
							</th>

							<th>
								Giá
							</th>

							<th>
								Số lượng
							</th>

							<th>
								Options
							</th>
						</tr>
					</thead>

					<tbody>
						<?php  
							foreach ($cart as $item) :
						?>
						<tr>
							<td>
								<?php  
									echo $item['name'];
								?>
							</td>

							<td>
								<img src="public/<?php echo $item['img']; ?>" width="50" height = "50" >
							</td>

							<td>
								<?php  
									echo $item['price'];
								?> $
							</td>

							<td>
								<input type="text" name="qty[<?php echo $item['id']; ?>]" value="<?php if (isset($_POST['qty'][$item['id']])) {
		echo $_POST['qty'][$item['id']];
	} else {
		echo $item['qty'];
	} ?>">
							</td>

							<td>
								<a href="?c=cart&m=delCart&id=<?php echo $item['id']; ?>">Delete</a>
							</td>
						</tr>

						<?php  

							endforeach;
						?>
					</tbody>

				</table>
			</div>
		</form>
	</div>
</div>
<?php  
	else :
?>

<div class="message">
	<p>
		<?php  
			echo $message;
		?>
	</p>
	<p>
		<a href="?c=product&m=index"> Quay lại mua hàng</a>
	</p>
</div>

<?php  
	endif;
?>

