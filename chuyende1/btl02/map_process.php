<?php
//PHP 5 +

// database settings 
$db_username = 'root';
$db_password = '';
$db_name = 'vtcagt';
$db_host = 'localhost';

//mysqli
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

if (mysqli_connect_errno()) 
{
	header('HTTP/1.1 500 Error: Could not connect to db!'); 
	exit();
}

################ Save & delete markers #################
if($_POST) //run only if there's a post data
{
	//make sure request is comming from Ajax
	$xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'; 
	if (!$xhr){ 
		header('HTTP/1.1 500 Error: Request must come from Ajax!'); 
		exit();	
	}
	
	// get marker position and split it for database
	$mLatLang	= explode(',',$_POST["latlang"]);
	$mLat 		= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
	$mLng 		= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
	
	//Delete Marker
	if(isset($_POST["del"]) && $_POST["del"]==true)
	{
		$results = $mysqli->query("DELETE FROM csgt WHERE lat=$mLat AND lng=$mLng");
		if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not delete Markers!'); 
		  exit();
		} 
		exit("Done!");
	}
	
	$mMistake 	= filter_var($_POST["mistake"], FILTER_SANITIZE_STRING);
	$mAddress 	= filter_var($_POST["address"], FILTER_SANITIZE_STRING);
	$mType		= filter_var($_POST["type"], FILTER_SANITIZE_STRING);
	$mTeam	 	= filter_var($_POST["team"], FILTER_SANITIZE_STRING);

	// $mTimedate	= date('Y-m-d H:i:s', time());
	$mTimedate	= filter_var($_POST["timedate"], FILTER_SANITIZE_STRING);

	
	$results = $mysqli->query("INSERT INTO csgt (team, address, lat, lng, mistake, timedate, type) VALUES ('$mTeam','$mAddress',$mLat, $mLng, '$mMistake','$mTimedate','$mType')");
	if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not create marker!'); 
		  exit();
	} 
	
	$output = '<h1 class="marker-heading">'.$mAddress.'</h1><p>'.$mTimedate.'</p><p>'.$mMistake.'</p><p>'.$mTeam.'</p>';
	exit($output);
}


################ Continue generating Map XML #################

//Create a new DOMDocument object
$dom = new DOMDocument("1.0");
$node = $dom->createElement("csgt"); //Create new element node
$parnode = $dom->appendChild($node); //make the node show up 

// Select all the rows in the markers table
$results = $mysqli->query("SELECT * FROM csgt WHERE 1");
if (!$results) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
} 

//set document header to text/xml
header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each
while($obj = $results->fetch_object())
{
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   

  $newnode->setAttribute("team",$obj->team);
  $newnode->setAttribute("address", $obj->address);  
  $newnode->setAttribute("lat", $obj->lat);  
  $newnode->setAttribute("lng", $obj->lng);  
  $newnode->setAttribute("type", $obj->type);	
  $newnode->setAttribute("mistake",$obj->mistake);
  $newnode->setAttribute("timedate",$obj->timedate);
}



echo $dom->saveXML();
?>