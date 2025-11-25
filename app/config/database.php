<?php
class DatabaseConfig {
    private $host = "127.0.0.1";
    private $db_name = "fywoodworks_erp";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            die("Database connection error: " . $exception->getMessage());
        }
        return $this->conn;
    }
}

// Company contact details - UPDATE THESE!
define('COMPANY_PHONE', '+233241234567');
define('COMPANY_WHATSAPP', '+233241234567');
define('COMPANY_EMAIL', 'ayuubaivin9@gmail.com');
define('COMPANY_ADDRESS', 'Kumasi, Ghana');
define('COMPANY_NAME', 'FY Woodworks');

// Define SITE_URL if not already defined (for direct access to views)
if (!defined('SITE_URL')) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $base = '/fywoodsite/public'; // Adjust this to your folder structure
    define('SITE_URL', $protocol . '://' . $host . $base);
}
?>