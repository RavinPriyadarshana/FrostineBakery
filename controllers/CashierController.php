<?php
require_once 'models/Order.php';

class CashierController
{
    // Show all orders
    public function showOrders()
    {
        $orderModel = new Order();
        $orders = $orderModel->getAllOrders();
        require 'views/cashier/orders.php'; // View that displays all orders
    }

    // View for adding payment to an order
    public function addOrderForm()
    {
        $orderModel = new Order();
        $userModel = new User();
        $productModel = new Product();
        $branches = $userModel->getAllBranches(); 
        $customers = $userModel->getCustomers();

        $products = $productModel->getAllProducts();
        require 'views/cashier/add_order.php';
    }

    // Handle order payment
    public function processPayment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderId = $_POST['order_id'];
            $paymentAmount = $_POST['payment_amount'];
            $paymentMethod = $_POST['payment_method'];
            $paymentDate = date('Y-m-d H:i:s');

            $orderModel = new Order();
            $orderModel->markOrderAsPaid($orderId, $paymentAmount, $paymentMethod, $paymentDate);

            header('Location: index.php?page=orders');
            exit;
        }
    }
}
