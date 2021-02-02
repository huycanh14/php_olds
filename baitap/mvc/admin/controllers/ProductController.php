<?php 

require MODEL_PATH . 'Product.php';

class ProductController {

 	protected $productModel;

	public function __construct()
    {        
        $this->productModel = new Product();
    }

	public function index()
	{
		$products = $this->productModel->getProducts();
		$data = [
			'products' => $products,
			'total' => 5
		];

		return view('products.index', $data);
	}

	public function view()
	{
		echo 'This is view method - ProductController';
	}

	public function create()
	{
		echo 'This is create method - ProductController';
	}
}