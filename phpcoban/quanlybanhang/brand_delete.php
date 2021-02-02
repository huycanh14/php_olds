<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$brand_id = $_GET['id'];
$sql = "SELECT * FROM brands WHERE id = '{$brand_id}' LIMIT 1";
$query = $db->query($sql);
$brand = $query->fetch_assoc();
if (is_null($brand)){
	$message = 'Brand không tồn tại';
	$_SESSION['brands'] = $message;
	header('location: brands.php');
	exit;
}
// ____________Xóa product_relates______________
$sql = "DELETE FROM product_relates WHERE product_id IN (SELECT id FROM products WHERE brand_id = '{$brand_id}')";
$query = $db->query($sql);
// _____________Xóa product_image___________
if ($query){
	$sql = "DELETE FROM product_image WHERE product_id IN (SELECT id FROM products WHERE brand_id = '{$brand_id}')";
	$query = $db->query($sql);
	// _____________Xóa oder_items___________
	if($query){
		$sql = "DELETE FROM oder_items WHERE product_id IN (SELECT id FROM products WHERE brand_id = '{$brand_id}')";
		$query = $db->query($sql);
		// _____________Xóa reviews___________
		if($query){
			$sql = "DELETE FROM reviews WHERE product_id IN (SELECT id FROM products WHERE brand_id = '{$brand_id}')";
			$query = $db->query($sql);
			// _____________Xóa products___________
			if ($query){
				$sql = "DELETE FROM products WHERE brand_id = '{$brand_id}'";
				$query = $db->query($sql);
				// _____________Xóa brands_________________-
				if ($query){
					$sql = "DELETE FROM brands WHERE id = '{$brand_id}'";
					$query = $db->query($sql);
					if ($query){
						$message = "Xóa banner {$banner_id} thành công";
						header('Location: brands.php');
					} else {
						$message = 'Lỗi! Không xóa được được Brand này';
					}
				}else{
					$message = 'Lỗi! Không xóa được được Brand này';
				}

			} else{
				$message = 'Lỗi! Không xóa được được Brand này';
			}

		} else{
			$message = 'Lỗi! Không xóa được được Brand này';
		}

	} else{
		$message = 'Lỗi! Không xóa được được Brand này';
	}

} else{
	$message = 'Lỗi! Không xóa được được Brand này';
}

$_SESSION['brands'] = $message;
?>