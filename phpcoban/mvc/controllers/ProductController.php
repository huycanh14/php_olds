<?php 

class ProductController {

	public function index()
	{
		echo 'This is index method - ProductController';
	}

	public function view()
	{
		return view('products.view');
	}

	public function create()
	{
		return view('products.create');
	}

	public function read() {
		return view('products.read');
	}
}
?>