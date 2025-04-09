<?php
class Stock
{
    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    // Add stock for a product in a branch
    public function addStock($branch_id, $product_id, $quantity)
    {
        // Check if stock already exists for the product and branch
        $stmt = $this->db->prepare("SELECT * FROM stock WHERE branch_id = ? AND product_id = ?");
        $stmt->execute([$branch_id, $product_id]);
        $existingStock = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingStock) {
            // If stock exists, update the quantity
            $newQuantity = $existingStock['quantity'] + $quantity;
            $stmt = $this->db->prepare("UPDATE stock SET quantity = ? WHERE branch_id = ? AND product_id = ?");
            $stmt->execute([$newQuantity, $branch_id, $product_id]);
        } else {
            // If no stock exists, insert new stock entry
            $stmt = $this->db->prepare("INSERT INTO stock (branch_id, product_id, quantity) VALUES (?, ?, ?)");
            $stmt->execute([$branch_id, $product_id, $quantity]);
        }
    }


    public function getAllStockItems()
    {
        $stmt = $this->db->query("SELECT stock.id, products.name AS product_name, branches.name AS branch_name, stock.quantity 
                                  FROM stock
                                  JOIN products ON stock.product_id = products.id
                                  JOIN branches ON stock.branch_id = branches.id");
        $stockItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        return $stockItems;
    }

    // Get all branches (for dropdown in form)
    public function getAllBranches()
    {
        $stmt = $this->db->query("SELECT * FROM branches");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all products (for dropdown in form)
    public function getAllProducts()
    {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
