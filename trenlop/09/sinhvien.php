<?php 
// Gọi file kết nối CSDL
require('connect2.php');

/**
 * Lấy nhiều bản ghi
 */

$sql = "SELECT * FROM sinhvien WHERE gioitinh=1";
$query = $db->query($sql);
//MYSQLI_ASSOC đưa về dạng mảng kết hợp: Associative Array
$result = $query->fetch_all(MYSQLI_ASSOC);
?>

<table>
	<thead>
		<tr>
			<th>MaSV</th>
			<th>TenSV</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if (count($result) > 0) :
			foreach ($result as $sv) :
		?>
		<tr>
			<td><?php echo $sv['masv'];?></td>
			<td><?php echo $sv['hoten'];?></td>
		</tr>
		<?php
			endforeach;
		endif; 
		?>
	</tbody>
</table>

<?php

/**
 * Lấy 1 bản ghi
 */

$sql = "SELECT * FROM sinhvien LIMIT 1";
$query = $db->query($sql);
$result = $query->fetch_assoc();
print_r($result);

/**
 * Đếm số bản ghi
 */

$sql = "SELECT COUNT(*) FROM sinhvien";
$query = $db->query($sql);
$result = $query->fetch_row();
echo $result[0];

$db->close();