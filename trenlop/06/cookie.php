<?php 
/**
 * Cookie là một file nhỏ(tối đa 4KB) được server sử dụng để lưu các thông tin tại phía Trình duyệt.
 * Cookie thường được dùng để lưu trữ thông tin về người sử dụng khi họ truy cập vào website. 
 * Mỗi lần máy tính gửi yêu cầu một trang web từ trình duyệt, nó sẽ gửi kèm theo cả cookie.
 * Khả năng tạo cookie phụ thuộc vào trình duyệt và sự cho phép của người sử dụng.
 */
?>
<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>