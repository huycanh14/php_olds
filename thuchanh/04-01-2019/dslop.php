<html>
<head>
    <title>Danh sach lop</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = 'SELECT * FROM Lop';
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo '<table border="1">';	
	echo '<tr>';
	echo '<th>Mã lớp</th>';
	echo '<th>Tên lớp</th>';
	echo '</tr>';

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $row['MaLop']. '</td><td>' . $row["TenLop"]. "</td></tr>";
    }

    echo '</table>';
}

mysqli_close($conn);
?>

</body>
</html>