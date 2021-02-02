<?php

class Product extends Database {

	public function getProduct($where = '')
	{

		$condition = '';
		if ($where != '') {
			$condition = ' AND ' . $where;
		}

		$sql = sprintf("SELECT products.*, product_categories.name as cate_name FROM products LEFT JOIN categories ON products.product_category_id = product_categories.id WHERE 1=1 %s LIMIT 1", $condition);

		$query = $this->_connect->query($sql);
		if ($query) {
			return $query->fetch_assoc();	
		}
		
		return null;
	}

	public function getProducts($where = '', $limit = 10, $offset = 0, $orderBy = '')
    {

    	$condition = '';
		if ($where != '') {
			$condition = ' AND ' . $where;
		}

		$sql = sprintf("SELECT products.*, product_categories.name as cate_name FROM products LEFT JOIN product_categories ON products.product_category_id = product_categories.id WHERE 1=1 %s %s LIMIT %s OFFSET %s", $condition, $orderBy, $limit, $offset);
		

		$result = $this->_connect->query($sql);
		if ($result && $result->num_rows > 0) {
			return $result->fetch_all(MYSQLI_ASSOC);	
		}
		
		return null;
    }

}