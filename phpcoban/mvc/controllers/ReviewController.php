<?php  

class ReviewController {
	public function index()
	{
		return view('reviews.index');
	}

	public function create()
	{
		return view('reviews.create');
	}

	public function update()
	{
		return view('reviews.update');
	}
}
?>