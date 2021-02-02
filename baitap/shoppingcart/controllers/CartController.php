<?php  
	require MODEL_PATH . 'Product.php';

	/**
	 * 
	 */
	class CartController
	{
		protected $products;

		function __construct()
		{
			$this->products = new Product();
		}

		public function index()
		{
			session_start();


			if (count($_SESSION['cart']) == 0) {
				$message = 'Chưa có sản phẩm trong giỏ hàng. Vui lòng mua hàng.';
			}


			$data = [
				'cart' 		=> (isset($_SESSION['cart'])) ? $_SESSION['cart'] : '',
				'message' => (isset($message)) ? $message : ''
			];

			return view('cart.index',$data);
		}

		public function addCart()
		{	
			session_start();

			$id 	= $_GET['id'];

			$product = $this->products->getProduct("id= '{$id}'");

			if (!isset($_SESSION['cart'][$id]) || $_SESSION['cart'][$id] == null) {
				
				$_SESSION['cart'][$id] = [
					'id'   => $id,
					'name' => $product['name'],
					'img'  => $product['img'],
					'price' => $product['price'],
					'qty'   => 1
				];

			} else {

				if (array_key_exists($id, $_SESSION['cart'])) {
					$_SESSION['cart'][$id]['qty'] += 1;
				}
				
			}

			header('Location:?c=product&m=index');
		}

		public function update()
		{
			session_start();

			foreach ($_POST['qty'] as $key => $value) {
				$_SESSION['cart'][$key]['qty'] = $value;
			}

			header('Location:?c=cart&m=index');
		}

		public function delCart()
		{
			session_start();

			$id = $_GET['id'];

			unset($_SESSION['cart'][$id]);

			header('Location:?c=cart&m=index');

		}
	}
?>