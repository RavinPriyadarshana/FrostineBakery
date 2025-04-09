<?php
class BranchOrderRequest
{
    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }
    // Create a new order request
    public function createOrderRequest($productId, $quantity, $branchId)
    {
        $stmt = $this->db->prepare("INSERT INTO branch_order_requests (product_id, quantity, branch_id) 
                                    VALUES (:product_id, :quantity, :branch_id)");
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':branch_id', $branchId);
        $stmt->execute();
    }

    // Optionally, fetch all order requests if needed for listing
    public function getAllRequests()
    {
        $stmt = $this->db->query("SELECT * FROM branch_order_requests");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
