<?php
// Include the routes file
require_once 'routes.php';

// Handle the request (simple routing logic)
$page = $_GET['page'] ?? 'home';

// Use the switch-case to handle pages
switch ($page) {
    case 'register':
        require_once 'controllers/RegisterController.php';
        $controller = new RegisterController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->handleRegistration();
        } else {
            $controller->showForm();
        }
        break;

    case 'login':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login();
        } else {
            $controller->showLoginForm();
        }
        break;

    case 'home':
    default:
        require_once 'views/home.php';
        break;

    // Handle new product category routes
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
}
?>
