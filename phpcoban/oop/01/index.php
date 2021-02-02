<?php  
require('People.php');
// Khai báo một mảng đa chiều (5 người), sử dụng class thiết lập giá trị và hiển thị người đó ra table

$people_1 = new People();
$people_1->fullname = 'Nguyen Van A';
$people_1->age = 24;
$people_1->gender = '1';
$people_1->address = 'Hai Phong';

$people_2 = new People();
$people_2->fullname = 'Tran Van B';
$people_2->age = 20;
$people_2->gender = '1';
$people_2->address = 'Ha Noi';

$people_3 = new People();
$people_3->fullname = 'Nguyen Thi C';
$people_3->age = 20;
$people_3->gender = '0';
$people_3->address = 'Ha Noi';

$people_4 = new People();
$people_4->fullname = 'Tran Thi D';
$people_4->age = 22;
$people_4->gender = '0';
$people_4->address = 'Ha Noi';

$people_5 = new People();
$people_5->fullname = 'Le Van E';
$people_5->age = 20;
$people_5->gender = '1';
$people_5->address = 'Nam Dinh';


$array = [$people_1, $people_2, $people_3, $people_4, $people_5];

for ($i = 0; $i < count($array); $i++){
	echo $array[$i]->displayInfo();
	echo '</br>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
</head>
<body>
	<style type="text/css">
	table, th, td {
	    border:1px solid black;
	}

</style>
<table>
		<thead>
			<tr>
				<th>Fullname</th>
				<th>Age</th>
				<th>Sex</th>
				<th>Address</th>

			</tr>
		</thead>
		<tbody>
			<?php  
				if (count ($array) > 0):
					for ($i = 0; $i < count($array); $i++):

			?>
			<tr>
				<td><?php echo $array[$i]->fullname ;?></td>
				<td><?php echo $array[$i]->age ;?></td>
				<td><?php echo $array[$i]->gender($array[$i]->gender) ;?></td>
				<td><?php echo $array[$i]->address ;?></td>
				</a></td>
			</tr>
			<?php  
				endfor;
			else:
			?>
			<tr>
				<td colspan="4">Not Found</td>
			</tr>
			<?php  
				endif;
			?>
		</tbody>
	</table>
</body>
</html>