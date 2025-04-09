<?php

class Cart
{
    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    // public function addToCart($userId, $productId, $productName, $productPrice)
    // {
    //     // Check if item already exists in cart for the user
    //     $stmt = $this->db->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    //     $stmt->execute([$userId, $productId]);

    //     if ($stmt->rowCount() > 0) {
    //         // Update quantity
    //         $this->db->prepare("UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?")
    //             ->execute([$userId, $productId]);
    //     } else {
    //         // Insert new product
    //         $this->db->prepare("INSERT INTO cart (user_id, product_id, name, price, quantity) VALUES (?, ?, ?, ?, 1)")
    //             ->execute([$userId, $productId, $productName, $productPrice]);
    //     }
    // }

    public function addToCart($userId, $productId, $quantity)
    {
        // Check if the product already exists in the cart
        $query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId, $productId]);
        $existingProduct = $stmt->fetch();

        if ($existingProduct) {
            // If the product already exists, update the quantity
            $newQuantity = $existingProduct['quantity'] + $quantity;
            $updateQuery = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
            $stmt = $this->db->prepare($updateQuery);
            $stmt->execute([$newQuantity, $userId, $productId]);
        } else {
            // If the product does not exist, insert it
            $insertQuery = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($insertQuery);
            $stmt->execute([$userId, $productId, $quantity]);
        }
    }

    public function getCartItems($userId)
    {
        $stmt = $this->db->prepare("SELECT cart.*, products.name, products.price FROM cart 
        INNER JOIN products ON cart.product_id = products.id
        WHERE cart.user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalPrice($userId)
    {
        $stmt = $this->db->prepare("SELECT SUM(products.price * cart.quantity) AS total FROM cart 
        INNER JOIN products ON cart.product_id = products.id
        WHERE cart.user_id = ?");
        $stmt->execute([$userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }

    public function removeFromCart($userId, $productId)
    {
        $query = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId, $productId]);
    }

    public function updateQuantity($userId, $productId, $quantity)
    {
        $query = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$quantity, $userId, $productId]);
    }

    public function clearCart($userId)
    {
        $this->db->prepare("DELETE FROM cart WHERE user_id = ?")
            ->execute([$userId]);
    }
}
