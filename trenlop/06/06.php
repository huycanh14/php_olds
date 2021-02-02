<?php
//Bat thong bao loi
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Tat thong bao loi
error_reporting(1);

function isNumber34343($num)
{
	if (is_numeric($num)) {
		return true;
	}
	
	throw new Exception("This is a string");
}

try {
	isNumber('abcsdsa');
	echo 34343;
	$a = 0;
	$b = 5;
	$c = $a + $b;
} catch (Exception $ex) {
	echo $ex->getMessage();
}