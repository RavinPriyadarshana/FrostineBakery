<?php
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function showLoginForm()
    {
        require 'views/login.php';
        // echo "ela";
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';

            $user = $this->userModel->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION["user"] = $user;
                $_SESSION["user_role"] = $user['role'];
                $_SESSION["user_id"] = $user['id'];

                switch ($user['role']) {
                    case 'Admin':
                        header("Location: index.php?page=admin");
                        break;
                    case 'HeadManager':
                        header("Location: index.php?page=dashboard");
                        break;
                    case 'Cashier':
                        header("Location: index.php?page=cashier");
                        break;
                    case 'BranchManager':
                        header("Location: index.php?page=dashboard");
                        break;
                    case null:
                        header("Location: index.php?page=home");
                        break;
                    default:
                        header("Location: index.php?page=home");
                        break;
                }
                exit;
            } else {
                $error = "Invalid credentials.";
                require 'views/login.php';
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?page=home");
        exit;
    }

    public function employees()
    {
        require_once 'models/User.php';
        $userModel = new User();
        $employees = $userModel->getEmployees();
        $topic = 'Employees';

        if ($_SESSION['user_role'] == 'Admin') {
            require 'views/admin/users.php';
        } else {
            require 'views/headmanager/employees.php';
        }
    }

    public function customers()
    {
        require_once 'models/User.php';
        $userModel = new User();
        $customers = $userModel->getCustomers();
        $topic = 'Customers';

        if ($_SESSION['user_role'] == 'Admin') {
            require 'views/admin/users.php';
        } else {
            require 'views/headmanager/employees.php';
        }
    }



    public function addEmployeeForm()
    {
        require_once 'models/User.php';
        $userModel = new User();
        $branches = $userModel->getAllBranches(); // get all branches

        include 'views/admin/add_employee.php';
    }

    public function saveEmployee()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];
            $branch_id = $_POST['branch_id'];

            try {
                $this->userModel->saveWithRole($name, $username, $email, $phone, $password, $role, $branch_id);
                header('Location: index.php?page=employee-list');
                exit;
            } catch (PDOException $e) {
                if ($e->getCode() === '23000') {
                    // Duplicate entry error (likely email or username)
                    $error = "Email or username already exists!";
                } else {
                    $error = "Something went wrong. Please try again later.";
                }

                // Re-fetch branches to show form again
                require_once 'models/User.php';
                $userModel = new User();
                $branches = $userModel->getAllBranches();

                include 'views/admin/add_employee.php';
            }
        }
    }


    public function editEmployeeForm()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $employee = $this->userModel->getById($id);
            include 'views/admin/edit_employee.php';
        } else {
            echo "Employee ID not provided.";
        }
    }

    public function updateEmployee()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $branch_id = $_POST['branch_id'];

            $this->userModel->updateEmployee($id, $name, $username, $email, $phone, $role, $branch_id);
            header('Location: index.php?page=employee-list');
            exit;
        }
    }


    public function deleteEmployee()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->userModel->delete($id);
        }
        header("Location: index.php?page=employee-list");
        exit;
    }

    public function deleteCustomer()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->userModel->delete($id);
        }
        header("Location: index.php?page=customer-list");
        exit;
    }




    public function showCustomerFeedbacks()
    {
        require_once 'models/User.php';
        $model = new User();
        $feedbacks = $model->getCustomerFeedbacks();
        // echo json_encode($feedbacks);
        include 'views/headmanager/customer_requests.php';
    }

    public function updateFeedbackStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['feedback_id'], $_POST['status'])) {
            require_once 'models/User.php';
            $model = new User();
            $model->updateFeedbackStatus($_POST['feedback_id'], $_POST['status']);
        }
        header('Location: index.php?page=customer_feedbacks');
        exit;
    }


    public function profile()
    {
        $userId = $_SESSION['user_id']; // Assuming user ID is stored in session
        $userModel = new User();
        // $branchModel = new Branch();

        // Get user data from the database
        $user = $userModel->getUserById($userId);

        // Get all branches to populate the branch selection dropdown
        $branches = $userModel->getAllBranches();

        require 'views/profile.php'; // Pass user data and branches to the view
    }

    // Update user profile data
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id']; // Assuming user ID is stored in session
            $name = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $branch_id = $_POST['branch_id'];

            $userModel = new User();

            // If a password is provided, hash it, otherwise use the existing password
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            } else {
                // Keep the existing password
                $user = $userModel->getUserById($userId);
                $hashedPassword = $user['password'];
            }

            // Update the user in the database
            $userModel->updateUser($userId, $name, $email, $phone, $hashedPassword, $branch_id);

            // Redirect back to the profile page with a success message
            header('Location: index.php?page=profile');
            exit();
        }
    }
}
