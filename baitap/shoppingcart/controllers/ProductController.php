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
		session_start();

		$products = $this->productModel->getProducts();

		$data = [
			'products' 	=> $products,
			'cart' 	 	=> (isset($_SESSION['cart'])) ? $_SESSION['cart'] : ''
		];


		return view('products.index', $data);
	}

	
}