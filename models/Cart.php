<?php

class Cart
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addToCart($userId, $productId, $productName, $productPrice)
    {
        // Check if item already exists in cart for the user
        $stmt = $this->db->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$userId, $productId]);

        if ($stmt->rowCount() > 0) {
            // Update quantity
            $this->db->prepare("UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?")
                ->execute([$userId, $productId]);
        } else {
            // Insert new product
            $this->db->prepare("INSERT INTO cart (user_id, product_id, name, price, quantity) VALUES (?, ?, ?, ?, 1)")
                ->execute([$userId, $productId, $productName, $productPrice]);
        }
    }

    public function getCartItems($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM cart WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalPrice($userId)
    {
        $stmt = $this->db->prepare("SELECT SUM(price * quantity) AS total FROM cart WHERE user_id = ?");
        $stmt->execute([$userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }

    public function updateQuantity($userId, $productId, $quantity)
    {
        $this->db->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?")
            ->execute([$quantity, $userId, $productId]);
    }

    public function removeItem($userId, $productId)
    {
        $this->db->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?")
            ->execute([$userId, $productId]);
    }

    public function clearCart($userId)
    {
        $this->db->prepare("DELETE FROM cart WHERE user_id = ?")
            ->execute([$userId]);
    }
}
?>