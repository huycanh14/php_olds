<?php

class People { 
	public $fullname; 
	public $age;
	public $gender;
	public $address;

	protected $cmnd;

	private $vo; // private chỉ được sử dụng trong class, chỉ xuất hiện trong class con

	public function __construct() // __construct(): hàm khởi tạo
	{
		// echo "hhhhhhhhhhhh";
		 // echo $this->age + 1;
		if (!isset($_SESSION['login'])){
			header('Location: login.php');
			exit;
		}
	}

	public function displayInfo()
	{	
		$cmnd = 12345566;
		// echo  $this->fullname . ' - ' . $this->age . ' - ' . $this->gender . ' - ' . $this->address . ' - ' . $this->cmnd;
		return $this->fullname . ' - ' . $this->age . ' - ' . $this->gender . ' - ' . $this->address . ' - ' . $this->cmnd;
	}

	public function gender($gender) 
	{
		return ($gender == 1) ? 'Male' : 'Female'; 
	}

	public function setCMND($cmnd){
		$this->cmnd = $cmnd;
	}

	public function getCMND(){
		return $this->cmnd;
	}

	public function setVO($vo){
		$this->vo = $vo;
	}

	public function getVO(){
		return $this->vo;
	}
}
$people = new People();
$people->fullname = 'Tran Van Cam';
$people->age = 23;
$people->gender = 'Nam';
$people->address = 'Ha Noi';
$people->displayInfo();


?>
