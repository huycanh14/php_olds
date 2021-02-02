<form action="" method="get" accept-charset="utf-8">
	<input type="text" name="name">
	<input type="submit" name="submit" value="Tìm kiếm">
</form>
<table border="1">
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		if (isset($brands) && count($brands) > 0):
			$i = 0;
			foreach ($brands as $item ) :
				$i++;
		?>
		<tr>
			<td><?php echo $i ;?></td>
			<td><?php echo $item['name'] ;?></td>
			<td><?php echo $item['status'] ;?></td>
			<td><a href="index.php?c=brand&m=update&id=<?php echo $item['id'] ;?>">Edit</a></td>
		</tr>
		<?php  
			endforeach;
		else:
		?>
		<tr>
			<td colspan="3">Records not found!</td>
		</tr>
		<?php 
		endif;
		?>
	</tbody>
</table>