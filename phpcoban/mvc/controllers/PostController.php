<?php  

class PostController {
	public function index()
	{
		return view('posts.index');
	}

	public function create()
	{
		return view('posts.create');
	}

	public function update()
	{
		return view('posts.update');
	}
}
?>