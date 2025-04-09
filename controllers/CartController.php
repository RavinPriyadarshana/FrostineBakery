<?php
require_once "models/Cart.php";

class CartController
{
    // Add product to cart (DB)
    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['id'];
            $productName = $_POST['name'];
            $productPrice = $_POST['price'];
            $userId = $_SESSION['user_id'];

            $cart = new Cart();
            $cart->addToCart($userId, $productId, $productName, $productPrice);

            header('Location: index.php?page=cart');
            exit();
        }
    }

    // View cart items from DB
    public function viewCart()
    {
        $userId = $_SESSION['user_id'];
        $cart = new Cart();

        $cartItems = $cart->getCart($userId);
        $totalPrice = $cart->getTotalPrice($userId);

        require "views/cart.php";
    }

    // Remove item from cart
    public function removeFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $userId = $_SESSION['user_id'];

            $cart = new Cart();
            $cart->removeFromCart($userId, $productId);

            header("Location: index.php?page=cart");
            exit();
        }
    }

    // Update item quantity
    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $userId = $_SESSION['user_id'];

            $cart = new Cart();
            $cart->updateCart($userId, $productId, $quantity);

            header("Location: index.php?page=cart");
            exit();
        }
    }

    // Clear the entire cart
    public function clearCart()
    {
        $userId = $_SESSION['user_id'];
        $cart = new Cart();
        $cart->clearCart($userId);

        header("Location: index.php?page=cart");
        exit();
    }
}
