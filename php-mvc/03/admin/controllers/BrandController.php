<?php 

require MODEL_PATH . 'Brand.php';

class BrandController {

	protected $brandModel;

	public function __construct()
	{
		$this->brandModel = new Brand();
	}

	public function index()
	{
		$data = [];
		$where = '';
		if (isset($_GET['name']) && $_GET['name'] != '') {
			$where = "name LIKE '%" . trim($_GET['name']) . "%'"; 
		}

		$brands = $this->brandModel->getBrands($where);
		$data['brands'] = $brands;

		return view('brands.index', $data);
	}

	public function create()
	{	
		$data = $errors = [];

		if (isset($_POST['submit'])){
			if (!isset($_POST['name']) || empty($_POST['name'])){
				$errors[] = 'Bạn chưa nhập tên';
			}
			if (!isset($_POST['slug']) || empty($_POST['slug'])){
				$errors[] = 'Bạn chưa nhập Slug';
			}
			if (!isset($_POST['meta_title']) || empty($_POST['meta_title'])){
				$errors[] = 'Bạn chưa nhập Meta Title';
			}
			if (!isset($_POST['meta_keyword']) || empty($_POST['meta_keyword'])){
				$errors[] = 'Bạn chưa nhập Meta Keyword';
			}
			if (!isset($_POST['meta_description']) || empty($_POST['meta_description'])){
				$errors[] = 'Bạn chưa nhập Meta Description';
			}
			if (count ($errors) == 0){
				$name = trim ($_POST['name']);
				$slug = trim ($_POST['slug']);
				$logo = trim ($_POST['logo']);
				$image = trim ($_POST['image']);
				$description = trim ($_POST['description']);
				$meta_title = trim ($_POST['meta_title']);
				$meta_keyword = trim ($_POST['meta_keyword']);
				$meta_description = trim ($_POST['meta_description']);

				$brands = $this->brandModel->addBrand($name, $slug, $logo, $image, $description, $meta_title, $meta_keyword, $meta_description);

				if ($brands) {
					redirect('index.php?c=brand&m=index');
				}
			}
		}

		$data['errors'] = $errors;

		return view('brands.create', $data);
	}

	public function update() 
	{
		$data = $errors = [];

		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?c=brand');
		}

		$where = 'id = ' . $id;
		$brand = $this->brandModel->getBrand($where);
		$data['brand'] = $brand;

		if (isset($_POST['submit'])) {
			if (!isset($_POST['name']) || $_POST['name'] == '') {
				$errors[] = 'Vui lòng nhập tên thương hiệu';
			}

			if (!isset($_POST['slug']) || $_POST['slug'] == '') {
				$errors[] = 'Vui lòng nhập đường dẫn tĩnh';
			}

			if (count($errors) == 0) {
				$name = trim($_POST['name']);
				$slug = trim($_POST['slug']);
				$status = trim($_POST['status']);
				$brand = $this->brandModel->editBrand($id, $name, $slug, $status);
				if ($brand) {
					redirect('index.php?c=brand&m=index');
				}
			}
		}

		$data['errors'] = $errors;
		return view('brands.update', $data);
	}

	public function delete()
	{
		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?c=brand');
		}

		$where = 'id = ' . $id;
		$brand = $this->brandModel->getBrand($where);
		if (!is_null($brand)) {
			$this->brandModel->deleteBrand($id);
		}

		redirect('index.php?c=brand');
	}

}