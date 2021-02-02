<?php  
	
class BrandController {
	public function index()
	{	
		$data = [];

		$data['totalBrand'] = 50;
		$data['brands'] = ['adidas', 'nike'];
		return view('brands.index', $data);
	}

	public function create()
	{
		return view('brands.create');
	}

	public function update()
	{
		return view('brands.update');
	}
}
?>