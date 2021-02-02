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
		return view('products.view');
	}

	public function create()
	{
		return view('products.create');
	}
}