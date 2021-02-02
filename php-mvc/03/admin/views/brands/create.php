<h3> Brand Add</h3>
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
				<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
			</td>
		</tr>
		<tr>
			<td>Slug</td>
			<td>
				<input type="text" name="slug" value="<?php if (isset($_POST['slug'])) echo $_POST['slug'] ;?>">
			</td>
		</tr>
		<tr>
			<td>Logo</td>
			<td>
				<input type="text" name="logo" value="<?php if (isset($_POST['logo'])) echo $_POST['logo'] ;?>">
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td>
				<input type="text" name="image" value="<?php if (isset($_POST['image'])) echo $_POST['image'] ;?>">
			</td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
				<input type="text" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description'] ;?>">
			</td>
		</tr>
		<tr>
			<td>Meta title</td>
			<td>
				<input type="text" name="meta_title" value="<?php if (isset($_POST['meta_title'])) echo $_POST['meta_title'] ;?>">
			</td>
		</tr>
		<tr>
			<td>Meta keyword</td>
			<td>
				<input type="text" name="meta_keyword" value="<?php if (isset($_POST['meta_keyword'])) echo $_POST['meta_keyword'] ;?>">
			</td>
		</tr>
		<tr>
			<td>Meta description</td>
			<td>
				<input type="text" name="meta_description" value="<?php if (isset($_POST['meta_description'])) echo $_POST['meta_description'] ;?>">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="padding-top: 10px;">
				<input type="submit" name="submit" value="Add">
			</td>
		</tr>
	</table>
</form>