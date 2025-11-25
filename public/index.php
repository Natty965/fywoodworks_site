<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path - adjust this to your folder name
define('BASE_PATH', '/fywoodsite/public');
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . BASE_PATH);

// Bootstrap the application
require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';

// Get the request path
$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];

// Remove base path from request URI
$path = str_replace(dirname($script_name), '', $request_uri);
$path = parse_url($path, PHP_URL_PATH);
$path = trim($path, '/');

// Simple routing
if ($path === '' || $path === 'index.php') {
    $controller = new HomeController();
    $controller->index();
} elseif ($path === 'products') {
    $controller = new ProductController();
    $controller->index();
} elseif ($path === 'contact') {
    $controller = new HomeController();
    $controller->contact();
} elseif (preg_match('#^product/(\d+)$#', $path, $matches)) {
    $controller = new ProductController();
    $controller->show($matches[1]);
}elseif($path === 'about'){
    $controller = new HomeController();
    $controller->about();
}elseif($path === 'services'){
    $controller = new HomeController();
    $controller->services();
} else {
    // 404 Not Found
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 - Page Not Found</h1>";
    echo "<p>The page you are looking for does not exist.</p>";
    echo "<a href='" . SITE_URL . "'>Go Home</a>";
}
?>