<table border="1">
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>Price</th>
			<th>Category</th>
			<th>Stock Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (isset($products) && count($products) > 0) :
			$i = 0;
			foreach ($products as $product) :
				$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $product['name'];?></td>
			<td><?php echo $product['price'];?></td>
			<td><?php echo $product['cate_name'];?></td>
			<td>
				<?php 
				if ($product['qty'] > 0) {
					echo  'In Stock';
				} else {
					echo 'Out of Stock';
				}
				?>
			</td>
			<td></td>
		</tr>
		<?php
	        endforeach;
		else :
		?>
		    <tr>
			    <td colspan="6">No Records!</td>
		    </tr>
	    <?php 
	    endif;
	    ?>
	</tbody>
</table>