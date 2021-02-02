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
		} catch (Exception $ex) {
			die($ex->getMessage());
 		}
		return false;
	
	}

	public function editBrand($id, $name, $slug, $status)
	{
		$sql = "UPDATE brands SET name = '$name', slug='$slug', status=$status WHERE id=$id";
		try {

			$query = $this->_connect->query($sql);
			if ($query) {
				return true;
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		return false;
	}

	public function totalBand()
	{

	}

	public function getBrand($where = '')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM brands WHERE 1=1 %s LIMIT 1", $condition);
		try {
			$query = $this->_connect->query($sql);
			if ($query) {
				return $query->fetch_assoc();
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		return null;
	}

	public function getBrands($where = '', $limit = 10, $offset = 0, $orderby = '')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM brands WHERE 1=1 %s LIMIT %s OFFSET %s %s", $condition, $limit, $offset, $orderby);
		try {
			$query = $this->_connect->query($sql);
			if ($query) {
				return $query->fetch_all(MYSQLI_ASSOC);
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		return null;
	}

	public function deleteBrand($id)
	{
		$sql = "DELETE FROM brands WHERE id=$id";
		try {

			$query = $this->_connect->query($sql);
			if ($query) {
				return true;
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		return false;
	}

}