<?php  
session_start();

require('People.php');
require('Student.php');

$student = new Student();
$student->fullname = 'Nguyen Van A';
$student->age = 24;
$student->gender = '1';
$student->address = 'Hai Phong';
$student->masv = 23458590;
$student->setCMND(1234567890);
$student->setVO('My');
echo $student->displayInfo() . ' - ' . $student->getVO();

?>
