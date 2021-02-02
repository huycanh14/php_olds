<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$product_category_id = $_GET['id'];
$sql = "SELECT * FROM product_categories WHERE id = '{$product_category_id}' LIMIT 1";
$query = $db->query($sql);
$product_category = $query->fetch_assoc();
if (is_null($product_category)){
	$message = 'product_category không tồn tại';
	$_SESSION['product_categories'] = $message;
	header('location: product_categories.php');
	exit;
}
// ____________Xóa product_relates______________
$sql = "DELETE FROM product_relates WHERE product_id IN (SELECT id FROM products WHERE product_category_id = '{$product_category_id}')";
$query = $db->query($sql);
// _____________Xóa product_image___________
if ($query){
	$sql = "DELETE FROM product_image WHERE product_id IN (SELECT id FROM products WHERE product_category_id = '{$product_category_id}')";
	$query = $db->query($sql);
	// _____________Xóa oder_items___________
	if($query){
		$sql = "DELETE FROM oder_items WHERE product_id IN (SELECT id FROM products WHERE product_category_id = '{$product_category_id}')";
		$query = $db->query($sql);
		// _____________Xóa reviews___________
		if($query){
			$sql = "DELETE FROM reviews WHERE product_id IN (SELECT id FROM products WHERE product_category_id = '{$product_category_id}')";
			$query = $db->query($sql);
			// _____________Xóa products___________
			if ($query){
				$sql = "DELETE FROM products WHERE product_category_id = '{$product_category_id}'";
				$query = $db->query($sql);
				// _____________Xóa product_categories_________________-
				if ($query){
					$sql = "DELETE FROM product_categories WHERE id = '{$product_category_id}'";
					$query = $db->query($sql);
					if ($query){
						$message = "Xóa banner {$banner_id} thành công";
						header('Location: product_categories.php');
					} else {
						$message = 'Lỗi! Không xóa được được product category này';
					}
				}else{
					$message = 'Lỗi! Không xóa được được product category này';
				}

			} else{
				$message = 'Lỗi! Không xóa được được product category này';
			}

		} else{
			$message = 'Lỗi! Không xóa được được product category này';
		}

	} else{
		$message = 'Lỗi! Không xóa được được product category này';
	}

} else{
	$message = 'Lỗi! Không xóa được được product category này';
}

$_SESSION['product_categories'] = $message;
?>