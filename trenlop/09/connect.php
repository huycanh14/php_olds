<?php
/**
 * [$server Địa chỉ host, thường là localhost hay 127.0.0.1, đối với một số hosting, server có thể là địa chỉ khác]
 * @var string
 */
$server = "localhost";
/**
 * [$username Tài khoản login mysql. Khi cài đặt Xampp thường là root. Tài khoản khi upload website lên mạng có thể thay đổi]
 * @var string
 */
$username = "root";
/**
 * [$password Mật khẩu để đăng nhập mysql. Thường ở Local mặc định là trống]
 * @var string
 */
$password = "";
/**
 * [$database Tên CSDL]
 * @var string
 */
$database = "qlsv";
/**
 * [$con $con là biến lưu trữ thông tin kết nối với database]
 * @var [type]
 */
$con = mysqli_connect($server, $username, $password, $database);
/**
 * Kiểm tra xem $con không đúng, trả về false thì thoát khỏi chương trình và đưa ra thông báo trong hàm die
 */
if (!$con) {
   die('Can not connect DB: '.mysqli_connect_error());
}