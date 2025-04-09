<?php
session_start();
require_once 'controllers/UserController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/StockController.php';
require_once 'controllers/CashierController.php';

// Handle the request (simple routing logic)
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'login';

require_once "models/Cart.php";

switch ($page) {

    // // ✅ Admin Login & Panel Routing
    // case 'admin':
    //     require_once 'controllers/AdminController.php';
    //     $controller = new AdminController();
    //     $controller->$action();
    //     break;

    // ✅ Registration
    case 'register':
        require_once 'controllers/RegisterController.php';
        $controller = new RegisterController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->handleRegistration();
        } else {
            $controller->showForm();
        }
        break;

    // ✅ Unified Login (Admin or User)
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($email === 'admin@gmail.com' && $password === 'admin123') {
                $_SESSION['admin'] = $email;
                header('Location: index.php?page=admin&action=dashboard');
                exit;
            } else {
                $controller = new UserController();
                $controller->login();
            }
        } else {
            require 'views/login.php';
        }
        break;


    case 'logout':
        $user = new UserController();
        $user->logout();
        break;



    case 'cart':
        require_once 'controllers/CartController.php';
        $cartController = new CartController();
        $cartController->viewCart();
        break;


    case 'add_to_cart': // Route for adding items to cart
        require_once 'controllers/CartController.php';
        $cartController = new CartController();
        $cartController->addToCart();
        break;

    case 'remove_from_cart': // Route for removing items from cart
        require_once 'controllers/CartController.php';
        $cartController = new CartController();
        $cartController->removeFromCart();
        break;


    case 'my-orders':
        require_once 'controllers/OrderController.php';
        $orderController = new OrderController();
        $orderController->viewOrders();
        break;



    // ✅ User Logout or Admin Logout
    case 'logout':
        session_destroy();
        header("Location: index.php?page=login");
        exit;

        // ✅ Public Home Page
    case 'home':
        require_once 'views/home.php';
        break;

    case 'contact_us':
        require_once 'views/contact_us.php';
        break;

    // ✅ Product Category Pages

    case 'category':
        $controller = new ProductController();
        $controller->showCategory($_GET['type'] ?? 'bread'); // default to bread
        break;

    case 'cake':
        require_once 'views/products/cake.php';
        break;

    case 'bread':
        require_once 'views/products/bread.php';
        break;

    case 'pancake':
        require_once 'views/products/pancake.php';
        break;

    case 'waffle':
        require_once 'views/products/waffle.php';
        break;

    case 'short_eats':
        require_once 'views/products/short_eats.php';
        break;


    //Head manager func
    case 'dashboard':
        require_once 'views/headmanager/dashboard.php';
        break;

    case 'sales_reports':
        require_once 'views/headmanager/sales_report.php';
        break;

    case 'sales_report':
        require_once 'controllers/OrderController.php';
        $controller = new OrderController();
        $controller->salesReport();
        break;


    case 'stock_reports':
        require_once 'views/headmanager/stock_report.php';
        break;

    case 'stock_report':
        require_once 'controllers/OrderController.php';
        $controller = new OrderController();
        $controller->stockReport();
        break;


    case 'order_items':
        require_once 'controllers/OrderController.php';
        $controller = new OrderController();
        $controller->orderItems();
        break;


    case 'customer_requests':
        require_once 'views/headmanager/customer_requests.php';
        break;

    case 'employees':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        $controller->employees();
        break;

    case 'customer_feedbacks':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        $controller->showCustomerFeedbacks();
        break;

    case 'update_feedback_status':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        $controller->updateFeedbackStatus();
        break;

    //Admin func

    case 'admin':
        require_once 'views/admin/dashboard.php';
        break;

    case 'employee-list':
        $controller = new UserController();
        $controller->employees();
        break;

    case 'customer-list':
        $controller = new UserController();
        $controller->customers();
        break;

    case 'add-employee':
        $controller = new UserController();
        $controller->addEmployeeForm();
        break;

    case 'save-employee':
        $controller = new UserController();
        $controller->saveEmployee();
        break;

    case 'delete-employee':
        $controller = new UserController();
        $controller->deleteEmployee();
        break;

    case 'edit-employee':
        $controller = new UserController();
        $controller->editEmployeeForm();
        break;

    case 'update-employee':
        $controller = new UserController();
        $controller->updateEmployee();
        break;

    case 'delete-employee':
        $controller = new UserController();
        $controller->deleteEmployee();
        break;

    case 'delete-customer':
        $controller = new UserController();
        $controller->deleteCustomer();
        break;


    case 'stock-list':
        $controller = new ProductController();
        $controller->showAllStock();
        break;

    case 'edit-stock':
        $controller = new ProductController();
        $controller->editStockForm();
        break;

    case 'update-stock':
        $controller = new ProductController();
        $controller->updateStock();
        break;


    case 'add-product':
        $controller = new ProductController();
        $controller->addProductForm();
        break;

    case 'save-product':
        $controller = new ProductController();
        $controller->saveProduct();
        break;

    // Add stock form
    case 'add-stock':
        $controller = new StockController();
        $controller->addStockForm();
        break;

    // Save stock for product
    case 'save-stock':
        $controller = new StockController();
        $controller->saveStock();
        break;


    // Cashier func


    case 'cashier':
        require_once 'views/cashier/dashboard.php';
        break;

    case 'orders':
        $controller = new CashierController();
        $controller->showOrders();
        break;

    case 'add-order':
        $controller = new CashierController();
        $controller->addOrderForm();
        break;

    case 'process-payment':
        $controller = new CashierController();
        $controller->processPayment();
        break;



    case 'profile':
        // Show profile page
        $userController = new UserController();
        $userController->profile();
        break;

    case 'update-profile':
        // Update profile information
        $userController = new UserController();
        $userController->updateProfile();
        break;

    // case 'stock_reports':
    //     include 'controllers/OrderController.php';
    //     $controller = new OrderController();
    //     $controller->showStockReport();
    //     break;

    // ✅ Fallback
    default:
        require_once 'views/home.php';
}
