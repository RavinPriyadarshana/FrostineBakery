<?php
require_once "models/Order.php";

class OrderController
{


    public function viewOrders()
    {
        // $cartItems = Cart::getCartItems();
        require "views/orders.php";
    }

    public function salesReport()
    {
        require_once 'models/OrderModel.php';
        $model = new Order();

        $sales = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $sales = $model->getSalesReport($startDate, $endDate);
        }

        require 'views/headmanager/sales_report.php';
        // require 'views/headmanager/sales_report.php';
    }

    public function stockReport()
    {
        require_once 'models/Order.php';
        $model = new Order();

        $stocks = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $stocks = $model->getStockReport($startDate, $endDate);
        }

        require 'views/headmanager/stock_report.php';
        // require 'views/headmanager/stock_report.php';
    }

    public function orderItems()
    {
        require_once 'models/Order.php';
        $model = new Order();
        $orderItems = $model->getAllOrderItems();
        require 'views/headmanager/order_items.php';
    }

    // Show the order creation form
    public function createOrderForm()
    {
        // Fetch all customers and products for dropdowns
        $orderModel = new Order();
        $customers = $orderModel->getAllCustomers();
        $products = $orderModel->getAllProducts();

        // Show the order creation form
        require 'views/admin/create_order.php';
    }

    // Save the new order
    public function saveOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_id = $_POST['customer_id'];
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $orderModel = new Order();

            // Create the order (this will also insert into the order_items table)
            $order_id = $orderModel->createOrder($customer_id);

            // Add order items
            $orderModel->addOrderItem($order_id, $product_id, $quantity);

            // Redirect to the payment page after the order is created
            header('Location: index.php?page=pay-order&id=' . $order_id);
            exit();
        }
    }
    
}
