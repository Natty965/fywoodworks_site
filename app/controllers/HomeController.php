<?php
class HomeController {
    public function index() {
        require_once __DIR__ . '/../views/home.php';
    }

    public function contact() {
        require_once __DIR__ . '/../views/contact.php';
    }

    public function about() {
        require_once __DIR__ . '/../views/about.php';
    }

    public function services() {
        require_once __DIR__ . '/../views/services.php';
    }
}
?>