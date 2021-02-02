<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$customer_group_id = $_GET['id'];
$sql = "SELECT * FROM customer_groups WHERE id = '{$customer_group_id}' LIMIT 1";
$query = $db->query($sql);
$banner = $query->fetch_assoc();
if (is_null($banner)){
	$message = 'Brand không tồn tại';
	$_SESSION['customer_groups'] = $message;
	header('location: customer_groups.php');
	exit;
}
// _________ Xóa order_items ____________
$sql = "DELETE FROM order_items WHERE order_id
		IN (SELECT id FROM orders WHERE customer_id 
		IN (SELECT id FROM customers WHERE customer_group_id = '{$customer_group_id}'))";
$query = $db->query($sql);
if ($query){
	// _________- Xóa orders _______________
	$sql = "DELETE FROM orders WHERE customer_id IN (SELECT id FROM customers WHERE customer_group_id = '{$customer_group_id}'))";
	$query = $db->query($sql);
	if($query) {
		// ___________ Xóa comments ______________________
		$sql = "DELETE FROM comments WHERE customer_id IN (SELECT id FROM customers WHERE customer_group_id = '{$customer_group_id}'))";
		$query = $db->query($sql);
		if ($query) {
			// __________ Xóa reviews __________________-
			$sql = "DELETE FROM reviews WHERE customer_id IN (SELECT id FROM customers WHERE customer_group_id = '{$customer_group_id}'))";
			$query = $db->query($sql);
			if ($query){
				// _________________ Xóa customers ___________
				$sql = "DELETE FROM customers WHERE customer_group_id = '{$customer_group_id}'";
				$query = $db->query($sql);
				if ($query){
					$sql = "DELETE FROM customer_groups WHERE id = '{$customer_group_id}'";
					$query = $db->query($sql);
					if ($query){
						$message = "Xóa customer group {$customer_group_id} thành công";
						header('Location: customer_groups.php');
					}
				} else{
					$message = 'Lỗi! Không xóa được được customer group này';
				}
			} else {
				$message = 'Lỗi! Không xóa được được customer group này';
			}

		}  else {
			$message = 'Lỗi! Không xóa được được customer group này';
		}
	} else{
		$message = 'Lỗi! Không xóa được được customer group này';
	}
} else{
	$message = 'Lỗi! Không xóa được được customer group này';
}
$_SESSION['customer_groups'] = $message;
?>