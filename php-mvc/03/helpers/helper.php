<?php 

function view($view = '', $data = [])
{
	//$data['totalStudent'] = 50;
	//$data['students'] = ['Tuan', 'Hung'];
	foreach ($data as $key => $items) {
		$$key = $items;
		//$totalStudent = 50;
		//$students = $items;
	}

	$view = @str_replace('.', '/', $view);

	$content = VIEW_PATH . $view . '.php';

	if (!file_exists($content)) {

		$content = VIEW_PATH . 'layouts/error.php';
	}

	require VIEW_PATH . 'layouts/layout.php';
}

function redirect($url = '/')
{
	header('Location: ' . $url);
	exit;
}