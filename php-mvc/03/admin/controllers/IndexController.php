<?php 

class IndexController {

	public function index()
	{
		$data = [];

		$data['totalStudent'] = 50;
		$data['students'] = ['Tuan', 'Hung'];

		return view('home.index', $data);
	}

	public function view()
	{
		echo 2343433;
	}
}