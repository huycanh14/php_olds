<?php 

function view($view = '', $data = [])
{
	foreach ($data as $key => $items) {
		$$key = $items;
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

/*function redirect($url = '/')
{
	header('Location: ');
}*/