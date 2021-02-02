<link rel="stylesheet" type="text/css" href="public/css/style.css">
<div id="content">
	<div class="container">
			<div class="cart-info">
				<?php  
					if (isset($_SESSION['cart'])) :
				?>
				<p align="center">
					Đang có 
					<a href="?c=cart&m=index">
						<?php  
							echo count($_SESSION['cart']);
						?>
					</a>
					sản phẩm trong giỏ hàng.
				</p>
				<?php  
					else:
				?>
				<p>
					Chưa có sản phẩm trong giỏ hàng.
				</p>
				<?php  
					endif;
				?>
			</div>
			<?php  
				foreach ($products as $item) :
			?>
			<div class="item">

				<div class="name">

					<p>
						<?php  
							echo $item['name'];
						?>
					</p>

				</div>

				<div class="img">
					<img src="public/<?php echo $item['img']; ?>">
				</div>

				<div class="price">
					<p align="center">
						Price : <?php echo $item['price']; ?> $
					</p>
				</div>

				<div class="add-cart">
					<a href="?c=cart&m=addCart&id=<?php echo $item['id']; ?>">Thêm vào giỏ hàng</a>
				</div>

			</div>
			<?php  
				endforeach;
			?>
	</div>	
</div>