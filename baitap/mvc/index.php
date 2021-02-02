<?php
/**
 * MVC này định nghĩa Route như sau: 
 * index.php?c=TenController&m=TenMethod&param1=value1&param2=value2&param_n=value_n
 * Thư mục controllers chưa các file điều khiển, xử lý. Tên file sẽ theo định dạng:
 * ProductController.php, NewsController.php, BrandController.php. Tên file và tên 
 * class giống nhau.
 * Thư mục models: Chứa các file (class) thao tác tới CSDL (Database)
 * Thư mục views: Chứa các file hiển thị data
 * Thư mục system: Chứa các file hệ thống, core
 * Dựa trên các đặt tên thư mục, file, cấu trúc hệ thống và Route. 
 * Thì chúng ta sẽ phải phân tích URL (Route) mà người dùng truyền vào để xác định được
 * controller và method (hàm - phương thức) mà người dùng yêu cầu.
 * Ví dụ: Khi người dùng truy cập vào trang chủ website, thì thường sẽ quy định
 * controller là : IndexController và method là: index. Vậy route trong MVC này sẽ
 * là: index.php?c=index&m=index
 * Vậy để xác định được controller và method thì dùng $_GET để lấy xuống.
 */

//Set root path
$rootPath = dirname(__FILE__);
define('ROOT_PATH', $rootPath);
include ROOT_PATH . DIRECTORY_SEPARATOR . 'config.php';
define('CONTROLLER_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR);

define('MODEL_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR);

define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

define('SYSTEM_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);

define('HELPER_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR);

/**
 * Dùng $_GET để lấy xuống c (controller), m (method), trường hợp không truyền vào c và m thì mặc định là index.
 */

$controller = isset($_GET['c']) ? $_GET['c'] : 'index';
$method = isset($_GET['m']) ? $_GET['m'] : 'index';

/**
 * Sau khi lấy được c xuống. Thì phải tạo ra tên class giống với cách mà chúng ta đã 
 * quy định tên file và tên class cho Controller. Ví dụ: ProductController,
 * NewsController.
 * Phần [Controller] là phần tĩnh, là cách quy định để phân biệt class dành cho
 * controller. Còn Product, News, Brand là phần được truyền vào c trên thành địa chỉ 
 * (route). Ví dụ: index.php?c=product&m=create
 * Dựa vào đó chúng ta phải đưa ra được class là: ProductController và trong class
 * ProductController phải có method là: create
 * Vậy phần chúng ta lấy được là product. Là chữ in thường, trong khi tên file
 * controller, class được quy định là: ProductController. Chữ P viết hoa, và có phần
 * đuôi là Controller.
 * Lúc này chúng ta đã GET được product rồi. Chúng ta sẽ dùng hàm ucfirst($controller)
 * với mục đích chuyển chữ đầu tiên thành chữ hoa. ví dụ product->Product, news->News
 * Sau đó chúng ta nối với chuỗi Controller thì sẽ được tên file, class mà chúng ta đã quy định
 */

$className = ucfirst($controller) . 'Controller';

/**
 *
 * Sau khi có $className chúng ta sẽ thực hiện require file (class) này vào để khởi
 * tạo đối tượng và thực hiện phương thức mà người dùng yêu cầu.
 * Theo quy tắc đặt tên: Tên file như thế nào thì tên class như vậy và ngược lại.
 * Vậy theo cách quy định của MVC này, là các file controller được đặt ở thư mục
 * controllers. Chúng ta đã có $className = Tên file rồi, giờ chỉ cần nối thêm phần mở
 * rộng .php và kiểm tra xem files đó có tồn tại trong thư mục chứa controller hay không.
 * Nếu có thì gọi file đó vào. Sau đó khởi tạo đối tượng. Đồng thời gọi phương thức mà 
 * người dùng yêu cầu.
 */

require_once SYSTEM_PATH . "Database.php";
require_once HELPER_PATH . "helper.php";

if (file_exists('controllers/' . $className . '.php')) {
	require('controllers/' . $className . '.php');
	$c = new $className();
	$c->$method();
}