<?php
require_once __DIR__ . '/../config/database.php';

class Product {
    private $conn;
    private $table_name = "products";

    public function __construct() {
        $database = new DatabaseConfig();
        $this->conn = $database->getConnection();
    }

      public function getPaginated($offset = 0, $limit = 9) {
        $query = "SELECT * FROM " . $this->table_name . " 
                 WHERE is_active = 1 
                 ORDER BY name ASC 
                 LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get total count of active products
    public function getTotalActive() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name . " WHERE is_active = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }


    // Get all active products
    public function getAllActive() {
        $query = "SELECT * FROM " . $this->table_name . " 
                 WHERE is_active = 1 
                 ORDER BY name ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get product by ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " 
                 WHERE id = ? AND is_active = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get products by category
    public function getByCategory($category) {
        $query = "SELECT * FROM " . $this->table_name . " 
                 WHERE category = ? AND is_active = 1 
                 ORDER BY name ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all categories
    public function getCategories() {
        $query = "SELECT DISTINCT category FROM " . $this->table_name . " 
                 WHERE is_active = 1 
                 ORDER BY category ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }
}
?>