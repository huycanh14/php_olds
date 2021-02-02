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
$database = 'quanlysinhvien3';
/**
 * [$db Khởi tạo kết nối và tạo ra đối tượng $db]
 * @var mysqli
 */
$db = new mysqli($server, $username, $password, $database);
$db->set_charset('utf8');
/**
 * Kiểm tra kết nối, nếu có lỗi thì thoát khỏi chương trình và xuất hiện thông báo trong hàm exit
 */
if ($db->connect_error) {
    exit('Lỗi kết nối: '.$db->connect_error);
}