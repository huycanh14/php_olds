<?php 

require MODEL_PATH . 'ProductCategory.php';

class ProductCategoryController {

	protected $productCategoryModel;

	public function __construct()
	{
		$this->productCategoryModel = new ProductCategory();
	}

	public function index()
	{
		$data = [];

		$categories = $this->productCategoryModel->getCategories();
		$data['categories'] = $categories;

		return view('product_categories.index', $data);
	}

	public function create()
	{
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
		}

		return view('product_categories.create');
	}

	public function update()
	{
		return view('product_categories.update');
	}

	public function delete()
	{

	}
}