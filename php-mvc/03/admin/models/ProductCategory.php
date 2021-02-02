<?php 

class ProductCategory extends Database {

	public function getCategories()
	{
		$sql = "SELECT * FROM product_categories";
		$query = $this->_connect->query($sql);
		if ($query) {
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		return null;
	}

	public function addCategory($name)
	{

	}
}