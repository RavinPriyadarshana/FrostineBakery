<?php
require_once "models/Cart.php";

class CartController
{
    private $cartModel;

    public function __construct($pdo) {
        $this->cartModel = new Cart($pdo);
    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['id'];
            $productName = $_POST['name'];
            $productPrice = $_POST['price'];

            // $cart = new Cart();

            $this->cartModel->initCart();
            $this->cartModel->addToCart($productId, $productName, $productPrice);

            // Return success response
            header('Location: index.php?page=cart');
            exit();
        }
    }

    public function viewCart()
    {
        // $cartItems = Cart::getCartItems();
        require "views/cart.php";
    }

    public function removeFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $productId = $_POST['product_id'];
            // Cart::removeFromCart($productId);
            // header("Location: cart.php");
            // exit();
        }
    }
}
