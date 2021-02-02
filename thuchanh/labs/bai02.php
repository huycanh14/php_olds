<html>
<head>
  <title>Bai 02</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
</head>
<body>
<?php
echo '<table border="1" width="400px">';

echo '<tr bgcolor="#9496D6">';
echo '<th width="40px">STT</th>';
echo '<th width="100px">Tên sách</th>';
echo '<th>Nội dung sách</th>';
echo '</tr>';

for ($i=1; $i<=100; $i++)
{
	if ($i % 2 == 0)
	  echo '<tr bgcolor="#ADB2B5">';
	else
	  echo '<tr>';
	echo '<td align="center">'. $i. '</td>';
	echo '<td>Tensach'. $i. '</td>';
	echo '<td>Noidung'. $i. '</td>';
	echo '</tr>';
}

echo '</table>';
?>
</body>
</html>