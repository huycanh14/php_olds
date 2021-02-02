<html>
<head>
  <title>Bai 04</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php

function KTNT($x)
{
	if ($x < 2)
		return false;

	$kt = true;
	for ($i=2; $i<$x; $i++)
	 if ($x % $i == 0)
	 {
		$kt = false;
		break;
	 }
	return $kt;
}

$dem = 0;
echo '<table border="0" cellspacing="2" cellpadding="10">';

for ($i=1; $i<=100; $i++)
  if (KTNT($i))
  {
	if ($dem % 5 == 0)
		echo '<tr>';

    echo '<td bgcolor="#ADB2B5">'. $i. '</td>';
	$dem++;

	if ($dem % 5 == 0)
		echo '</tr>';
  }

echo '</table>';

?>
</body>
</html>