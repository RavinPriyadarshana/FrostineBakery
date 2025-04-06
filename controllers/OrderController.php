<?php
require_once "models/Order.php";

class OrderController {
    

    public function viewOrders() {
        // $cartItems = Cart::getCartItems();
        require "views/orders.php";
    }

    
}
?>
