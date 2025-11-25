<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        // Pagination setup
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 9; // Products per page
        $offset = ($page - 1) * $perPage;

        // Get paginated products
        $products = $this->productModel->getPaginated($offset, $perPage);
        $totalProducts = $this->productModel->getTotalActive();
        $totalPages = ceil($totalProducts / $perPage);
        
        $categories = $this->productModel->getCategories();
        
        require_once __DIR__ . '/../views/products.php';
    }

    public function show($id) {
        $product = $this->productModel->getById($id);
        
        if (!$product) {
            header("HTTP/1.0 404 Not Found");
            echo "<h1>Product Not Found</h1>";
            exit;
        }

        require_once __DIR__ . '/../views/product_single.php';
    }
}
?>