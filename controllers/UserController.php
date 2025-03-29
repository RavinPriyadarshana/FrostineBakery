<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function showLoginForm() {
        require 'views/login.php';
        // echo "ela";
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';

            $user = $this->userModel->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION["user"] = $user;
                header("Location: index.php?page=dashboard");
                exit;
            } else {
                $error = "Invalid credentials.";
                require 'views/login.php';
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?page=home");
        exit;
    }
}
?>
