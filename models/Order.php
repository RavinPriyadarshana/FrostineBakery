<?php
require_once __DIR__ . '/../config/database.php';

class Order
{
    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    // Fetch sales data between selected dates
    public function getSalesReport($startDate, $endDate)
    {
        $stmt = $this->db->prepare("
            SELECT 
                o.id AS order_id,
                o.created_at AS order_date,
                oi.item_name,
                oi.quantity,
                oi.price
            FROM orders o
            JOIN order_items oi ON o.id = oi.order_id
            WHERE DATE(o.created_at) BETWEEN ? AND ?
            ORDER BY o.created_at DESC
        ");
        $stmt->execute([$startDate, $endDate]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Optional: Get summarized sales per product
    public function getSummaryReport($startDate, $endDate)
    {
        $stmt = $this->db->prepare("
            SELECT 
                oi.item_name,
                SUM(oi.quantity) AS total_quantity,
                SUM(oi.quantity * oi.price) AS total_revenue
            FROM orders o
            JOIN order_items oi ON o.id = oi.order_id
            WHERE DATE(o.created_at) BETWEEN ? AND ?
            GROUP BY oi.item_name
            ORDER BY total_revenue DESC
        ");
        $stmt->execute([$startDate, $endDate]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStockReport($startDate, $endDate)
    {
        $stmt = $this->db->prepare("
            SELECT 
                s.id AS stock_id,
                s.quantity,
                s.updated_at AS stock_date,
                p.name AS product_name,
                p.price
            FROM stock s
            JOIN products p ON s.item_id = p.id
            WHERE DATE(s.updated_at) BETWEEN ? AND ?
            ORDER BY s.updated_at DESC
        ");
        $stmt->execute([$startDate, $endDate]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllOrderItems()
    {
        $stmt = $this->db->prepare("
            SELECT 
                o.id AS order_id,
                o.status,
                o.created_at,
                u.name AS customer_name,
                p.name AS product_name,
                oi.quantity
            FROM order_items oi
            JOIN orders o ON oi.order_id = o.id
            JOIN users u ON o.customer_id = u.id
            JOIN products p ON oi.product_id = p.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all orders
    public function getAllOrders()
    {
        $stmt = $this->db->query("SELECT orders.id, users.name AS customer_name, branches.name AS branch_name, 
                                  orders.status, orders.total_price, orders.created_at
                                  FROM orders
                                  JOIN users ON orders.customer_id = users.id
                                  JOIN branches ON orders.branch_id = branches.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get order by ID
    public function getOrderById($orderId)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get items of an order
    public function getOrderItems($orderId)
    {
        $stmt = $this->db->prepare("SELECT order_items.*, products.name 
        FROM order_items 
        INNER JOIN products ON order_items.product_id = products.id 
        WHERE order_items.order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Mark an order as paid
    public function markOrderAsPaid($orderId, $paymentAmount, $paymentMethod, $paymentDate)
    {
        $stmt = $this->db->prepare("UPDATE orders SET status = 'Paid', payment_amount = ?, payment_method = ?, payment_date = ? WHERE id = ?");
        $stmt->execute([$paymentAmount, $paymentMethod, $paymentDate, $orderId]);
    }


    public function getAllCustomers()
    {
        $stmt = $this->db->prepare("SELECT * FROM customers");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Get all products for order creation
    public function getAllProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    // Create a new order
    public function createOrder($customer_id, $price, $branch)
    {
        $stmt = $this->db->prepare("INSERT INTO orders (customer_id, branch_id, status, total_price,created_at) VALUES ($customer_id, $branch, 'pending', $price, now())");
        $stmt->execute([$customer_id]);

        // Return the ID of the newly created order
        return $this->db->lastInsertId();
    }

    // Add items to the order
    public function addOrderItem($order_id, $product_id, $quantity)
    {
        // Get product price
        $stmt = $this->db->prepare("SELECT price FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();
        $price = $product['price'];

        // Insert the order item
        $stmt = $this->db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $product_id, $quantity, $price]);

        // Update the total price of the order
        $stmt = $this->db->prepare("UPDATE orders SET total_price = total_price + ? WHERE id = ?");
        $stmt->execute([$price * $quantity, $order_id]);
    }

    public function getCustomerOrders($customerId)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE customer_id = ? ORDER BY created_at DESC");
        $stmt->execute([$customerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
