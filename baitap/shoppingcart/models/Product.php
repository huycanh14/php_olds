<?php

class Product extends Database {

	public function getProduct($where = null)
	{
		$condition = '';
		if ($where != '') {
			$condition = ' AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM products  WHERE 1=1 %s LIMIT 1", $condition);

		$result = $this->_connect->query($sql);

		if ($result) {
			return $result->fetch_assoc();	
		}
		
		return null;
	}

	public function getProducts()
    {

    	$sql = "SELECT * FROM products ";

    	$query = $this->_connect->query($sql);

    	if ($query) {
    		return $query->fetch_all(MYSQLI_ASSOC);
    	}

    	return null;
    }

}