<?php
//pathinfo($path, $options) trả về một mảng các thông tin từ đường dẫn $path
 /*
	+ dirname
	+ basename 
	+ extension 
 */
	$path = '/files/abc.txt';
	$pathInfo = pathinfo($path);
	echo '<pre>';
	print_r($pathInfo);
	echo '<pre>';
	/*
		Array
		(
		    [dirname] => /files
		    [basename] => abc.txt
		    [extension] => txt
		    [filename] => abc
		)
	*/

	$baseName = pathinfo($path, PATHINFO_BASENAME);
	$extension = pathinfo($path, PATHINFO_EXTENSION);
	

	echo '<ul>';
	echo '<li> PATH: <b>' . $path . '<b></li>';
	echo '<li> PATHINFO_BASENAME: <b>' . $baseName . '</b></li>';
	echo '<li> PATHINFO_EXTENSION: <b>' . $extension . '</b></li>';
	echo '</ul>';