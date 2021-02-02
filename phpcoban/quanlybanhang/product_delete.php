<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$product_id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = '{$product_id}' LIMIT 1";
$query = $db->query($sql);
$product = $query->fetch_assoc();
if (is_null($product)){
	$message = 'product không tồn tại';
	$_SESSION['products'] = $message;
	header('location: products.php');
	exit;
}
// ____________ Xóa product_relates ___________
$sql = "DELETE FROM product_relates WHERE product_id = '{$product_id}'";
$query = $db->query($sql);
if ($query) {
	// _________ Xóa reviews ____________-
	$sql = "DELETE FROM reviews WHERE product_id = '{$product_id}'";
	$query = $db->query($sql);
	if ($query){
		// _________ Xóa oder_items ____________-
		$sql = "DELETE FROM oder_items WHERE product_id = '{$product_id}'";
		$query = $db->query($sql);
		if ($query){
			// _________ Xóa product_image ____________-
			$sql = "DELETE FROM product_image WHERE product_id = '{$product_id}'";
			$query = $db->query($sql);
			if ($query){
				// _________ Xóa products ____________
				$sql = "DELETE FROM products WHERE id = '{$product_id}'";
				$query = $db->query($sql);
				if ($query){
					$message = "Xóa product {$product_id} thành công";
					header('Location: products.php');
				}else {
					$message = 'Lỗi! Không xóa được product này';
				}
			} else {
				$message = 'Lỗi! Không xóa được product này';
			}
		} else {
			$message = 'Lỗi! Không xóa được product này';
		}
	} else {
		$message = 'Lỗi! Không xóa được product này';
	}
} else {
	$message = 'Lỗi! Không xóa được product này';
}
$_SESSION['products'] = $message;
?>