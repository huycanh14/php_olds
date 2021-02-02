<?php  

class ProductCategory extends Database {

	public function getCategories()
	{
		$sql = "SELECT * FROM product_categories";
		$query = $this->_connect->query($sql);
		if ($query)
		{
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		return null;
	}

	public function addCategory($name, $slug, $parent_id, $meta_title, $meta_keyword, $meta_description)
	{
		$sql = "INSERT INTO product_categories (name, slug, parent_id, meta_title, meta_keyword, meta_description) VALUES ('{$name}', '{$slug}', '{$parent_id}', '{$meta_title}', '{$meta_keyword}', '{$meta_description}')";
		$query = $this->_connect->query($sql);
		if ($query)
		{
			return true;
		}

		return null;
	}

	public function editCategory($id, $name, $slug, $parent_id, $meta_title, $meta_keyword, $meta_description)
	{
		$sql = "UPDATE product_categories SET name = '{$name}', image = '{$image}', description = '{$description}', parent_id = '{$parent_id}', meta_title = '{$meta_title}', meta_keyword = '{$meta_keyword}', meta_description = '{$meta_description}' WHERE id = '{$id}'";
		$query = $this->_connect->query($sql);
		if ($query)
		{
			return true;
		}

		return null;
	}
}
?>