<?php

class Cart {

    // Initialize the cart session if it's not set
    public static function initCart() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Add product to the cart
    public static function addToCart($productId, $productName, $productPrice) {
        // If the product is already in the cart, increment its quantity
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            // Otherwise, add it as a new product
            $_SESSION['cart'][$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1
            ];
        }
    }

    // Update the quantity of a product in the cart
    public static function updateCart($productId, $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
        }
    }

    // Remove a product from the cart
    public static function removeFromCart($productId) {
        unset($_SESSION['cart'][$productId]);
    }

    // Get all the products in the cart
    public static function getCart() {
        return $_SESSION['cart'];
    }

    // Calculate the total price of all items in the cart
    public static function getTotalPrice() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    // Clear the cart
    public static function clearCart() {
        unset($_SESSION['cart']);
    }
}
