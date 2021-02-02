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

$txtMaLop = $_POST['txtMaLop'];
$txtTenLop = $_POST['txtTenLop'];

//Cap nhat vao CSDL
$sql = "INSERT INTO lop(MaLop, TenLop) VALUES('". $txtMaLop . "', '". $txtTenLop. "')";

echo $sql;

mysqli_query($conn, $sql);
?>