<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    public function save($name, $username, $email, $phone, $password, $branch_id) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (name, username, email, phone, password, branch_id) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $username, $email, $phone, $hashedPassword, $branch_id]);
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function userExists($username) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        return $stmt->fetch() ? true : false;
    }
}
