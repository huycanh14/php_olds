<form action="" method="get" accept-charset="utf-8">
	<input type="text" name="name">
	<input type="submit" name="submit" value="Tìm">
</form>

<table border="1">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>Tên thương hiệu</th>
			<th>Trạng thái</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (count($brands) > 0) : 
			$i = 0;
			foreach ($brands as $item) :
				$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $item['id'];?></td>
			<td><?php echo $item['name'];?></td>
			<td><?php echo displayStatus($item['status']);?></td>
			<td>
				<a href="index.php?c=brand&m=update&id=<?php echo $item['id'];?>" title="">Sửa</a>
			</td>
			<td>
				<a onclick="return checkDelete();" href="index.php?c=brand&m=delete&id=<?php echo $item['id'];?>" title="">Xóa</a>
			</td>
		</tr>
		<?php
			endforeach;
		else: 
		?>
			<tr><td colspan="5">Chưa có bản ghi</td></tr>
		<?php
		endif; 
		?>
	</tbody>
</table>
<script type="text/javascript">
	function checkDelete()
	{
		if (!confirm('Bạn chắc chắn muốn xóa ?')) {
			return false;
		}
	}
</script>