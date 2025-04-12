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
        $stmt = $this->db->prepare("SELECT id, name, price, image, description FROM products WHERE category = ?");
        $stmt->execute([$category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllStock()
    {
        $stmt = $this->db->query(
            "SELECT s.id, p.name AS product_name, b.name AS branch_name, s.quantity 
            FROM stock s
            JOIN products p ON s.product_id = p.id
            JOIN branches b ON s.branch_id = b.id"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Find stock for a specific product at a specific branch
    public function findById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT s.id, s.product_id, p.name AS product_name, p.price AS price, s.branch_id, b.name AS branch_name, s.quantity 
            FROM stock s
            JOIN products p ON s.product_id = p.id
            JOIN branches b ON s.branch_id = b.id
            WHERE s.id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update stock quantity
    public function updateQuantity($id, $quantity)
    {
        $stmt = $this->db->prepare("UPDATE stock SET quantity = ? WHERE id = ?");
        $stmt->execute([$quantity, $id]);
    }

    // Add a new product
    public function addProduct($name, $description, $price, $category, $image)
    {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $category, $image]);
    }

    public function getAllProducts()
    {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a product in the database
    public function updateProduct($id, $name, $description, $price, $category, $image)
    {
        if ($image !== null && $image !== "") {
            // Update including image
            $sql = "UPDATE products SET name = :name, description = :description, price = :price, category = :category, image = :image WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'category' => $category,
                'image' => $image,
                'id' => $id
            ]);
        } else {
            // Update without changing image
            $sql = "UPDATE products SET name = :name, description = :description, price = :price, category = :category WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'category' => $category,
                'id' => $id
            ]);
        }
    }
}
