<?php  

require MODEL_PATH . 'ProductCategory.php';

class ProductCategoryController {

	protected $productCategoryModel; //Khởi tạo

	public function __construct()
	{
		$this->productCategoryModel = new ProductCategory();
	}

	public function index()
	{
		$data = [];

		$categories = $this->productCategoryModel->getCategories();
		$data['categories']  = $categories;

		return view('product_categories.index', $data);
	}

	public function create()
	{	
	
		$data = [];

		$errors = [];
		$name = $slug = $parent_id = $meta_title = $meta_keyword = $meta_description = '';
		if (isset($_POST['submit'])){
			if (!isset($_POST['name']) || empty($_POST['name'])){
				$errors[] = 'Bạn chưa nhập tên thư mục!';
			}
			if (!isset($_POST['slug']) || empty($_POST['slug'])){
				$errors[] = 'Bạn chưa nhập slug!';
			}
			if (!isset($_POST['parent_id']) || empty($_POST['parent_id'])){
				$errors[] = 'Bạn chưa nhập parent id!';
			}
			if (!isset($_POST['meta_title']) || empty($_POST['meta_title'])){
				$errors[] = 'Bạn chưa nhập meta title!';
			}
			if (!isset($_POST['meta_keyword']) || empty($_POST['meta_keyword'])){
				$errors[] = 'Bạn chưa nhập meta keyword!';
			}
			if (!isset($_POST['meta_description']) || empty($_POST['meta_description'])){
				$errors[] = 'Bạn chưa nhập meta description!';
			}
			if (count ($errors) == 0){
				$name = trim($_POST['name']);
				$slug = trim($_POST['slug']);
				$parent_id = trim($_POST['parent_id']);
				$meta_title = trim($_POST['meta_title']);
				$meta_keyword = trim($_POST['meta_keyword']);
				$meta_description = trim($_POST['meta_description']);
			}

		}
		// Truyền errors vào data[];
		$categories = $this->productCategoryModel->addCategory($name, $slug, $parent_id, $meta_title, $meta_keyword, $meta_description);
		$data = [
			'errors' => $errors,
			 'categories' => $categories
		];
		return view('product_categories.create', $data);
	}

	public function update()
	{
		$data = [];
		$errors = [];
		$id = $name = $slug = $parent_id = $meta_title = $meta_keyword = $meta_description = '';

		if (isset($_POST['submit'])){
			if (!isset($_POST['id']) || empty($_POST['id'])){
				$errors[] = 'Bạn chưa nhập ID!';
			}
			if (!isset($_POST['name']) || empty($_POST['name'])){
				$errors[] = 'Bạn chưa nhập tên thư mục!';
			}
			if (!isset($_POST['slug']) || empty($_POST['slug'])){
				$errors[] = 'Bạn chưa nhập slug!';
			}
			if (!isset($_POST['parent_id']) || empty($_POST['parent_id'])){
				$errors[] = 'Bạn chưa nhập parent id!';
			}
			if (!isset($_POST['meta_title']) || empty($_POST['meta_title'])){
				$errors[] = 'Bạn chưa nhập meta title!';
			}
			if (!isset($_POST['meta_keyword']) || empty($_POST['meta_keyword'])){
				$errors[] = 'Bạn chưa nhập meta keyword!';
			}
			if (!isset($_POST['meta_description']) || empty($_POST['meta_description'])){
				$errors[] = 'Bạn chưa nhập meta description!';
			}
			if (count ($errors) == 0){
				$id = trim($_POST['id']);
				$name = trim($_POST['name']);
				$slug = trim($_POST['slug']);
				$parent_id = trim($_POST['parent_id']);
				$meta_title = trim($_POST['meta_title']);
				$meta_keyword = trim($_POST['meta_keyword']);
				$meta_description = trim($_POST['meta_description']);
			}

		}

		$categories = $this->productCategoryModel->editCategory($id, $name, $slug, $parent_id, $meta_title, $meta_keyword, $meta_description);
		$data = [
			'errors' => $errors,
			 'categories' => $categories
		];
		return view('product_categories.update', $data);
	}

	public function delete()
	{
		
	}
}
?>