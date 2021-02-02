<?php 
/**
 * ltrim ( string $str [, string $charlist ] ): Trả về chuỗi $str đã loại bỏ các kí tự trắng ở đầu.
 * rtrim ( string $str [, string $charlist ] ): Trả về chuỗi $str đã loại bỏ các kí tự trắng ở cuối.
 * trim ( string $str [, string $charlist ] ): Trả về chuỗi $str đã loại bỏ các kí tự trắng ở đầu và cuối.
 * strtolower ( string $str ): trả về chuỗi $str với tất cả các kí tự chữ được chuyển thành chữ in thường.
 * strtoupper ( string $str ): trả về chuỗi $str với tất cả các kí tự chữ được chuyển thành chữ in hoa.
 * ucwords(string $str):  trả về chuỗi $str được in hoa các kí tự đầu mỗi từ.
 * explode ( string $delimiter , string $string [, int $limit ] ): trả về một mảng các chuỗi, mỗi chuỗi con được tách ra từ $string. $delimiter là giới hạn để tách
 */

$string = '    Hello, Trung dsads dsad    ';
$str = trim($string);

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $string;?></title>
</head>
<body>
<p><?php echo $string;?></p>
<p><?php echo strtolower($str);?></p>
<p><?php echo strtoupper($str);?></p>
<p><?php echo ucwords($str);?></p>
</body>
</html>

