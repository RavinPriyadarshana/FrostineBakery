<?php
require_once __DIR__ . '/../config/database.php';

class User
{
    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    // Save new user
    public function save($name, $username, $email, $phone, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (name, username, email, phone, password, branch_id, role) 
                                    VALUES (?, ?, ?, ?, ?, NULL, NULL)");
        $stmt->execute([$name, $username, $email, $phone, $hashedPassword]);
    }

    // User login
    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // Check if username/email already exists
    public function userExists($username)
    {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        return $stmt->fetch() ? true : false;
    }

    // Get all users
    public function getAll()
    {
        return [
            ["id" => 1, "name" => "Alice", "email" => "alice@mail.com"],
            ["id" => 2, "name" => "Bob", "email" => "bob@mail.com"]
        ];
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateEmployee($id, $name, $username, $email, $phone, $role, $branch_id)
    {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, username = ?, email = ?, phone = ?, role = ?, branch_id = ? WHERE id = ?");
        $stmt->execute([$name, $username, $email, $phone, $role, $branch_id, $id]);
    }


    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getEmployees()
    {
        $stmt = $this->db->prepare("SELECT id, name, email, role, username, phone FROM users WHERE role IS NOT NULL AND branch_id IS NOT NULL");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCustomers()
    {
        $stmt = $this->db->prepare("SELECT id, name, email, role, username, phone FROM users WHERE role IS NULL AND branch_id IS NULL");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCustomerFeedbacks()
    {
        $stmt = $this->db->prepare("SELECT * FROM feedback");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update feedback status
    public function updateFeedbackStatus($id, $status)
    {
        $stmt = $this->db->prepare("UPDATE feedback SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }


    public function saveWithRole($name, $username, $email, $phone, $password, $role, $branch_id)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (name, username, email, phone, password, role, branch_id)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $username, $email, $phone, $hashedPassword, $role, $branch_id]);
    }


    // Get user by ID
    public function getUserById($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch();
    }

    // Update user details
    public function updateUser($userId, $name, $email, $phone, $password, $branch_id)
    {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, phone = ?, password = ?, branch_id = ? WHERE id = ?");
        $stmt->execute([$name, $email, $phone, $password, $branch_id, $userId]);
    }

    public function getAllBranches()
    {
        $stmt = $this->db->prepare("SELECT * FROM branches");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCashiers()
    {
        $stmt = $this->db->query("SELECT * FROM users WHERE role = 'Cashier'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUser($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getOrdersByCustomer($customerId)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE customer_id = :customer_id");
        $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDailyOrders()
    {
        $today = date('Y-m-d'); // Get today's date in Y-m-d format
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE DATE(order_date) = :today");
        $stmt->bindParam(':today', $today, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
