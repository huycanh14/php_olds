<?php  
// index.php?c=product&m=view
$controller = isset($_GET['c']) ? $_GET['c'] : 'index';
$method = isset($_GET['m']) ? $_GET['m'] : 'index';

$className = ucfirst($controller) . 'Controller';

require "helpers/helper.php";

if (file_exists('controllers/' . $className . '.php')) {

	require('controllers/' . $className . '.php');
	$c = new $className();
	$c->$method();
} else {
	require('controllers/IndexController.php');
	$c = new IndexController();
	$c->index();
}
?>