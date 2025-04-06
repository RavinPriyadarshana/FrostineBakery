<?php

// Default page to load
$page = $_GET['page'] ?? 'home';

switch ($page) {
    // ✅ Register page
    case 'register':
        require_once 'controllers/RegisterController.php';
        $controller = new RegisterController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->handleRegistration();
        } else {
            // $controller->showForm();
        }
        break;

    // ✅ User Login page
    case 'login':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login();
        } else {
            // $controller->showLoginForm();
        }
        break;

    // ✅ Product Category Page (Dynamic)
    case 'category':
        require_once 'controllers/ProductController.php';
        $category = $_GET['category'] ?? '';
        $controller = new ProductController();
        $controller->showCategory($category);
        break;

    // ✅ Static Product Pages
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

    // ✅ Admin Panel Routes
    case 'admin':
        require_once 'controllers/AdminController.php';
        $controller = new AdminController();
        $action = $_GET['action'] ?? 'dashboard';
        $controller->$action();
        break;

    // ✅ Default: Home Page
    case 'home':
    default:
        require_once 'views/home.php';
        break;
}
