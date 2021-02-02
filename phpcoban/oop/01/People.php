<?php

// Khai báo class (đối tượng)
class People { 				
	/*Tên file là gì thì tên class phải như vậy. Class là 1 lớp để mô hình hóa hoặc 1 lớp đối tượng trong thực tế 
	Class gồm thuộc tính và phương thức
	*/
	// Các thuộc tính public: công khai
	public $fullname; 
	public $age;
	public $gender;
	public $address;


	// Mỗi 1 phương thức cách nhau 1 đoạn
	//Phương thức . $this chỉ sử dụng bên trong class, tương tự giống $db->query()
	public function displayInfo()
	{	
		// echo  $this->fullname . ' - ' . $this->age . ' - ' . $this->gender . ' - ' . $this->address . ' - ' . $this->cmnd;
		return $this->fullname . ' - ' . $this->age . ' - ' . $this->gender . ' - ' . $this->address . ' - ' . $this->cmnd;
	}

	public function gender($gender) /*gender ở đây là thuộc tính*/
	{
		return ($gender == 1) ? 'Male' : 'Female'; /*gender ở đây là tham số*/
	}

}
// Khởi tạo: new để (là) khởi tạo: Cách khởi tạo là new + tên Class
// Khởi tạo đối tượng
$people = new People();
// Thiết lập giá trị cho thuộc tính
$people->fullname = 'Tran Van Cam';
$people->age = 23;
$people->gender = 'Nam';
$people->address = 'Ha Noi';
// Gọi phương thức
$people->displayInfo();

/*echo '<br>';

$people = new People();
$people->fullname = 'Nguyen Van Tuan';
$people->age = 24;
$people->gender = 'Nam';
$people->address = 'Hai Phong';
$people->displayInfo();
*/


?>
