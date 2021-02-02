<?php  

class Brand extends Database {

	public function addBrand($name, $slug, $logo, $image, $description, $meta_title, $meta_keyword, $meta_description)
	{
		$sql = "INSERT INTO brands (name, slug, logo, image, description, meta_title, meta_keyword, meta_description) VALUES ('{$name}', '{$slug}', '{$logo}', '{$image}', '{$description}', '{$meta_title}', '{$meta_keyword}', '{$meta_description}')";
		$query = $this->_connect->query($sql);
		try {
			$query = $this->_connect->query($sql);
			if ($query) {
				return true;
			}
		} catch (Exception $ex ) {
 			//throw new Exception("can not execute this query");
 			die($ex->getMassage());
 		}
		return null;
	}

	public function editBrand($id, $name, $slug, $logo, $image, $description, $meta_title, $meta_keyword, $meta_description)
	{
		$sql = "UPDATE brands SET name = '{$name}', slug = '{$slug}', logo = '{$logo}', image = '{$image}', description = '{$description}', meta_title = '{$meta_title}', meta_keyword = '{$meta_keyword}', meta_description = '{$meta_description}' WHERE id = '{$id}'";
		$query = $this->_connect->query($sql);
		$query = $this->_connect->query($sql);
		try {
			$query = $this->_connect->query($sql);
			if ($query) {
				return true;
			}
		} catch (Exception $ex ) {
 			die($ex->getMassage());
 		}
		return null;
	}

	public function tatalBrand ()
	{

	}

	public function getBrand()
	{

	}

	public function getBrands($where = '', $limit = 10, $offset = 0, $orderby = '')
	{	
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}
		$sql = sprintf("SELECT * FROM brands WHERE 1=1 %s LIMIT %s OFFSET %s %s", $condition, $limit, $offset, $orderby);
		// Kỹ thuật bắt lỗi
		try {
			$query = $this->_connect->query($sql);
			if ($query) {
				return $query->fetch_all(MYSQLI_ASSOC);
			}
		} catch (Exception $ex ) {
 			//throw new Exception("can not execute this query");
 			die($ex->getMassage());
 		}
		return null;
	}

	public function deleteBrand()
	{

	}
}

?>