<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    // Save new user
    public function save($name, $username, $email, $phone, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (name, username, email, phone, password, branch_id, role) 
                                    VALUES (?, ?, ?, ?, ?, NULL, NULL)");
        $stmt->execute([$name, $username, $email, $phone, $hashedPassword]);
    }

    // User login
    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // Check if username/email already exists
    public function userExists($username) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        return $stmt->fetch() ? true : false;
    }

    // Get all users
    public function getAll() {
        return [
            ["id" => 1, "name" => "Alice", "email" => "alice@mail.com"],
            ["id" => 2, "name" => "Bob", "email" => "bob@mail.com"]
        ];
    }

    public function getById($id) {
        return ["id" => $id, "name" => "Example", "email" => "user@example.com"];
    }

    public function delete($id) {
        // Simulated deletion
    }
}
?>
