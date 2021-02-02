<html>
<head>
  <title>Bai 03</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
</head>
<body>
<?php
//Chon ngay
echo 'Ngày: ';
echo '<select name="selNgay">';
for ($i=1; $i<=31; $i++)
	echo '<option value="'. $i. '">'. $i. '</option>';
echo '</select>';

//Chon thang
echo '&nbsp; Tháng: ';
echo '<select name="selThang">';
for ($i=1; $i<=12; $i++)
	echo '<option value="'. $i. '">'. $i. '</option>';
echo '</select>';

//Chon nam
$today = getdate();
$curYear = $today["year"];
echo '&nbsp; Năm: ';
echo '<select name="selNam">';
for ($i=1900; $i<=$curYear; $i++)
	echo '<option value="'. $i. '">'. $i. '</option>';
echo '</select>';

?>
</body>
</html>