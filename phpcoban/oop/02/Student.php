<?php  
// Tất cả những thuộc tính, phương thức của thằng cha là public, protected thì thằng con được sử dụng
class Student extends People { // extends: sử dụng kế thừa: class con -> class cha

	public $masv;

	public function __construct()
	{
		parent::__construct();
	}

	public function displayInfo()
	{
		// parent::displayInfo(); - với file People là echo 
		$people = parent::displayInfo(); //với file People là return 
		return $people . $this->masv; // với file People là return 
		// return $this->masv;  - với file People là echo 
	}
}
?>