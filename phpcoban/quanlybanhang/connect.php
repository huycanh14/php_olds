<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = 'quanlybanhang1';
$db = new mysqli($server, $username, $password, $database);
$db->set_charset('utf8');
if ($db->connect_error) {
    exit('Lỗi kết nối: '.$db->connect_error);
}