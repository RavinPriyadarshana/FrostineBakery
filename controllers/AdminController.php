<?php
require_once 'models/User.php';
require_once 'models/Stock.php';

class AdminController {
    private $userModel;
    private $stockModel;

    public function __construct() {
        $this->userModel = new User();
        $this->stockModel = new Stock();
    }

    private function checkAdmin() {
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?page=login');
            exit;
        }
        return true;
    }

    public function login() {
        require 'views/login.php';
    }

    public function logout() {
        unset($_SESSION['admin']);
        header('Location: index.php?page=login');
        exit;
    }

    public function dashboard() {
        $this->checkAdmin();
        require 'views/admin/dashboard.php';
    }

    public function profile() {
        $this->checkAdmin();
        $admin = ['email' => 'admin@gmail.com', 'name' => 'Admin'];
        require 'views/admin/profile.php';
    }

    public function editProfile() {
        $this->checkAdmin();
        $success = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = true;
        }
        require 'views/admin/edit_profile.php';
    }

    public function users() {
        $this->checkAdmin();
        $users = $this->userModel->getAll();
        require 'views/admin/users.php';
    }

    public function deleteUser() {
        $this->checkAdmin();
        $id = $_GET['id'] ?? null;
        if ($id) $this->userModel->delete($id);
        header('Location: index.php?page=admin&action=users');
    }

    public function editUser() {
        $this->checkAdmin();
        $id = $_GET['id'] ?? null;
        $user = $this->userModel->getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Add update logic if needed
        }
        require 'views/admin/edit_user.php';
    }

    public function stock() {
        $this->checkAdmin();
        $stocks = $this->stockModel->getAll();
        require 'views/admin/stock.php';
    }

    public function updateStock() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->stockModel->update($_POST['stock']);
        }
        header('Location: index.php?page=admin&action=stock');
    }
}
