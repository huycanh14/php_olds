<?php  
session_start();
require('connect.php');
$message = 'Không có gì';
$customer_id = $_GET['id'];
$sql = "SELECT * FROM customers WHERE id = '{$customer_id}' LIMIT 1";
$query = $db->query($sql);
$banner = $query->fetch_assoc();
if (is_null($banner)){
	$message = 'customer không tồn tại';
	$_SESSION['customers'] = $message;
	header('location: customers.php');
	exit;
}
// ____________Xóa order_items______________
$sql = "DELETE FROM order_items WHERE order_id IN (SELECT id FROM orders WHERE customer_id = '{$customer_id}')";
$query = $db->query($sql);
// _____________Xóa orders___________
if ($query){
	$sql = "DELETE FROM orders WHERE customer_id = '{$customer_id}'";
	$query = $db->query($sql);
	// _____________Xóa reviews___________
	if($query){
		$sql = "DELETE FROM reviews WHERE customer_id = '{$customer_id}'";
		$query = $db->query($sql);
		// _____________Xóa comments___________
		if($query){
			$sql = "DELETE FROM comments WHERE customer_id = '{$customer_id}'";
			$query = $db->query($sql);
			// _____________Xóa customers ___________
		
			if ($query){
				$sql = "DELETE FROM customers WHERE id = '{$customer_id}'";
				$query = $db->query($sql);
				if ($query){
					$message = "Xóa customer {$customer_id} thành công";
					header('Location: customers.php');
				} else {
					$message = 'Lỗi! Không xóa được được customer này';
				}
			}else{
				$message = 'Lỗi! Không xóa được được customer này';
			}

		} else{
			$message = 'Lỗi! Không xóa được được customer này';
		}

	} else{
		$message = 'Lỗi! Không xóa được được customer này';
	}

} else{
	$message = 'Lỗi! Không xóa được được customer này';
}

$_SESSION['customers'] = $message;
?>