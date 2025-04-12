<?php
require_once "models/Order.php";

class OrderController
{

    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    public function viewOrders()
    {
        $customerId = $_SESSION['user_id']; // assuming logged in user is customer
        $orderModel = new Order();

        $orders = $orderModel->getCustomerOrders($customerId);

        // For each order, get items
        foreach ($orders as &$order) {
            $order['items'] = $orderModel->getOrderItems($order['id']);
        }

        require 'views/orders.php';
    }

    public function salesReport()
    {
        $model = new Order();

        $sales = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $sales = $model->getSalesReport($startDate, $endDate);
            // echo json_encode($sales);
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

    //For headmanager
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

    public function confirmOrder()
    {
        $userId = $_SESSION['user_id'];
        $cardName = $_POST['card_name'];
        $cardNumber = $_POST['card_number'];
        $expiryDate = $_POST['expiry_date'];
        $cvv = $_POST['cvv'];

        $cartModel = new Cart();
        $cartItems = $cartModel->getCartItems($userId);
        $totalPrice = $cartModel->getTotalPrice($userId);

        if (empty($cartItems)) {
            echo "Cart is empty.";
            return;
        }

        // Save card info (for now, into a simple table called `payments`)
        $stmt = $this->db->prepare("INSERT INTO payments (user_id, card_name, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $cardName, $cardNumber, $expiryDate, $cvv]);

        // Insert into orders
        $stmt = $this->db->prepare("INSERT INTO orders (customer_id, branch_id, status, total_price, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$userId, 1, 'Pending', $totalPrice]);
        $orderId = $this->db->lastInsertId();

        // Insert into order_items
        foreach ($cartItems as $item) {
            $stmt = $this->db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$orderId, $item['product_id'], $item['quantity'], $item['price']]);
        }

        // Clear cart
        $stmt = $this->db->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->execute([$userId]);

        // Redirect to order success
        header("Location: index.php?page=order&action=success");
    }

    public function cashierSaveOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Fetch the form data
            $customerId = $_POST['customer_id'];
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $branch = $_POST['branch_id'];

            // Calculate the total price
            $productModel = new Product();
            $product = $productModel->findById($productId);
            $totalPrice = $product['price'] * $quantity;

            // Insert the order into the 'orders' table
            $orderModel = new Order();
            $orderId = $orderModel->createOrder($customerId, $totalPrice, $branch);

            // Insert the order items into the 'order_items' table
            $orderItemModel = new Order();
            $orderItemModel->addOrderItem($orderId, $productId, $quantity, $product['price']);

            // Optionally: Update the stock (if necessary)
            $stockModel = new Stock();
            $stockModel->updateStockQuantity($productId, $quantity);

            // Redirect to the orders list page
            header('Location: index.php?page=orders');
            exit;
        }
    }

    public function showOrderRequests()
    {
        $orderModel = new Order();
        $requests = $orderModel->getAllRequests();
        include 'views/headmanager/order_requests_view.php';
    }

    public function updateOrderRequestStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestId = $_POST['request_id'] ?? null;
            $status = $_POST['status'] ?? null;

            if ($requestId && $status) {
                $orderModel = new Order($this->db);
                $orderModel->updateRequestStatus($requestId, $status);
            }
        }

        // Redirect back to the order requests page after update
        header("Location: index.php?page=order_requests");
        exit();
    }

    public function showFilteredOrderRequests()
    {
        $orderModel = new Order();
        $requests = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start_date'], $_POST['end_date'])) {
            $start = $_POST['start_date'];
            $end = $_POST['end_date'];
            $requests = $orderModel->filterRequestsByDate($start, $end);
        }

        include 'views/headmanager/filter_order_request.php';
    }
}
