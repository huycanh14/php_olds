<html>
<head>
  <title>Bai 01</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
for ($i=1; $i<=100; $i++)
  if ($i % 2 == 0)
    echo '<font color="red"><b>'. $i. '</b></font>&nbsp; &nbsp;';
  else
    echo $i. '&nbsp; &nbsp;';
?>
</body>
</html>