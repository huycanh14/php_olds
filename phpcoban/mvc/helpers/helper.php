<?php 

function view($view = '', $data = []) {
	
	foreach ($data as $key => $item) {
		$$key = $item; // $a = 'b' => $$a = $b
	}

	$view = @str_replace('.', '/', $view);

	$content = 'views/' . $view . '.php';

	if (!file_exists($content)) {

		$content = 'views/layouts/error.php';

	}

	require 'views/layouts/layout.php';
}
?>


