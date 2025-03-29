<?php
require_once __DIR__ . '/../models/User.php';

class RegisterController {
    public function showForm() {
        require 'views/register.php';
    }

    public function handleRegistration() {
        $fullname = trim($_POST['fullname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';
        $branch = trim($_POST['branch'] ?? '');

        // Validation
        if (empty($fullname) || empty($email) || empty($phone) || empty($password) || empty($branch)) {
            $error = "Please fill out all required fields.";
            require 'views/register.php';
            return;
        }

        $branch_id = $this->getBranchIdByName($branch);
        if (!$branch_id) {
            $error = "Invalid branch selected.";
            require 'views/register.php';
            return;
        }

        $username = $email;
        $userModel = new User();

        if ($userModel->userExists($username)) {
            $error = "This email is already registered.";
            require 'views/register.php';
            return;
        }

        try {
            $userModel->save($fullname, $username, $email, $phone, $password, $branch_id);
            header("Location: index.php?page=home&registered=1");
            exit;
        } catch (PDOException $e) {
            $error = "Registration failed: " . $e->getMessage();
            require 'views/register.php';
        }
    }

    private function getBranchIdByName($branchName) {
        $branchMap = [
            'Colombo' => 1,
            'Gampaha' => 2,
            'Horana' => 3,
            'Galle' => 4
        ];
        return $branchMap[$branchName] ?? null;
    }
}
