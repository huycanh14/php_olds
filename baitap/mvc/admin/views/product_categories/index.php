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
		if (isset($categories) && count($categories) > 0):
			$i = 0;
			foreach ($categories as $category ) :
				$i++;
		?>
		<tr>
			<td><?php echo $i ;?></td>
			<td><?php echo $category['name'] ;?></td>
			<td><?php echo $category['status'] ;?></td>
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