<?php
session_start();
require_once 'controllers/UserController.php';

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
        require_once 'controllers/ProductController.php';
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


    case 'stock_reports':
        require_once 'views/headmanager/stock_report.php';
        break;

    case 'order_items':
        require_once 'views/headmanager/order_items.php';
        break;

    case 'customer_requests':
        require_once 'views/headmanager/customer_requests.php';
        break;

    case 'employees':
        require_once 'views/headmanager/employees.php';
        break;

    //Admin func

    case 'admin':
        require_once 'views/admin/dashboard.php';
        break;

    case 'user-list':
        require_once 'views/admin/users.php';
        break;

    // ✅ Fallback
    default:
        require_once 'views/home.php';
}
