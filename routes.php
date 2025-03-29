<?php

// Default page to load
$page = $_GET['page'] ?? 'home';

switch ($page) {
    // Route for Register page
    case 'register':
        require_once 'controllers/RegisterController.php';
        $controller = new RegisterController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->handleRegistration();
        } else {
            // $controller->showForm();
        }
        break;

    // Route for Login page
    case 'login':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login();
        } else {
            // $controller->showLoginForm();
        }
        break;

    // Route for Category (Products)
    case 'category':
        require_once 'controllers/ProductController.php';
        $category = $_GET['category'] ?? '';
        $controller = new ProductController();
        $controller->showCategory($category);
        break;

    // New Routes for Product Categories
    case 'cake':
        require_once 'views/products/cake.php';  // Correct path to your product page
        break;

    case 'bread':
        require_once 'views/products/bread.php';  // Correct path to your product page
        break;

    case 'pancake':
        require_once 'views/products/pancake.php';  // Correct path to your product page
        break;

    case 'waffle':
        require_once 'views/products/waffle.php';  // Correct path to your product page
        break;

    case 'short_eats':
        require_once 'views/products/short_eats.php';  // Correct path to your product page
        break;

    // Home page or default page
    case 'home':
    default:
        require_once 'views/home.php';
        break;
}
