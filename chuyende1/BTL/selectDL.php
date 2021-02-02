<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'chuyende1';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
  $id = array();
 	$name = array();
 	$img = array();
  $address = array();
  $lat = array();
  $lon = array();
  $type = array();
  $descr = array();
  $toado = array(); 

	// Select all the rows in the markers table
	$query = "SELECT  * FROM food ";
	$result = $mysqli->query($query) or die('Lỗi: ' . $mysqli->error);

 	while ($row = mysqli_fetch_array($result)) {
    $id[] = $row['id'];
    $name[] = $row['name'];
    $img[] = $row['img'];
    $address[] = $row['address'];
    $lat[] = $row['lat'];
    $lon[] = $row['lon'];
    $type[] = $row['type'];
    $descr[] = $row['descr'];
    $toado[] = 'new google.maps.LatLng(' . $row['lat'] .','. $row['lon'] .'),';
	}

	//remove the comaa ',' from last coordinate
	$lastcount = count($toado)-1;
  $toado[$lastcount] = trim($toado[$lastcount], ",");	
?>