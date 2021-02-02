<table border="1">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (count($categories) > 0) : 
			$i = 0;
			foreach ($categories as $category) : 
				$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $category['name'];?></td>
			<td><?php echo $category['status'];?></td>
		</tr>
		<?php
			endforeach;
		else: 
		?>
		<tr>
			<td colspan="3">Record not found!</td>
		</tr>
		<?php
		endif; 
		?>
	</tbody>
</table>