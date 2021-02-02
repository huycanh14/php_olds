<h3> Brand Edit</h3>
<div class="message">
	<?php
	if (count($errors) > 0) :
		for ($i=0; $i < count($errors); $i++) :
			?>
			<p style="color:red;"><?php echo $errors[$i]?></p>
			<?php 
		endfor;
	endif;
	?>
</div>

<div class="message">
	<?php 
	if (count($errors) > 0):
		for ($i = 0; $i < count($errors); $i++):
	?>
		<p style="color: red;"><?php echo $errors[$i] ;?></p>
	<?php  
		endfor;
	endif;
	?>
</div>
<form action="" method="post" accept-charset="utf-8">
		
	<table border="1" cellpadding="10">
		<tr>
			<td>Name</td>
			<td>
				<input type="text" name="name" value="<?php echo $brand['name'];?>">
			</td>
		</tr>
		<tr>
			<td>Slug</td>
			<td>
				<input type="text" name="slug" value="<?php echo $brand['slug'];?>">
			</td>
		</tr>
		<tr>
			<td>Logo</td>
			<td>
				<input type="text" name="logo" value="<?php echo $brand['logo'];?>">
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td>
				<input type="text" name="image" value="<?php echo $brand['image'];?>">
			</td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
				<input type="text" name="description" value="<?php echo $brand['description'];?>">
			</td>
		</tr>
		<tr>
			<td>Meta title</td>
			<td>
				<input type="text" name="meta_title" value="<?php echo $brand['meta_title'];?>">
			</td>
		</tr>
		<tr>
			<td>Meta keyword</td>
			<td>
				<input type="text" name="meta_keyword" value="<?php echo $brand['meta_keyword'];?>">
			</td>
		</tr>
		<tr>
			<td>Meta description</td>
			<td>
				<input type="text" name="meta_description" value="<?php echo $brand['meta_description'];?>">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="padding-top: 10px;">
				<input type="submit" name="submit" value="Edit">
			</td>
		</tr>
	</table>
</form>