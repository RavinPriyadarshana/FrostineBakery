<!-- models/Product.php -->
<?php

class Product
{
    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    // Get products by category

    public function getProductsByCategory($category)
    {
        $stmt = $this->db->prepare("SELECT name, price, image, description FROM products WHERE category = ?");
        $stmt->execute([$category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
