<?php
require_once 'models/Product.php';
require_once 'models/Stock.php';
class ProductController
{
    public function showCategory($type)
    {
        $validCategories = ['cake', 'bread', 'waffle', 'pancake', 'short_eats'];

        if (!in_array($type, $validCategories)) {
            $type = 'bread'; // fallback category
        }

        $productModel = new Product();
        $products = $productModel->getProductsByCategory($type);

        require 'views/products/products.php';
    }


    public function showAllStock()
    {
        $stockModel = new Stock();
        $stockItems = $stockModel->getAllStockItems();
        require 'views/admin/stock_list.php'; // View to show stock list
    }

    public function editStockForm()
    {
        $productStockModel = new Product();
        $stock = $productStockModel->findById($_GET['id']);
        require 'views/admin/edit_stock.php'; // View to edit stock
    }

    public function updateStock()
    {
        $productStockModel = new Product();
        $productStockModel->updateQuantity($_POST['id'], $_POST['quantity']);
        header("Location: index.php?page=stock-list"); // Redirect after update
    }


    public function addProductForm()
    {
        require 'views/admin/add_product.php';
    }

    // Save a new product
    public function saveProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];


            // Handle file upload for product image
            $image = "";
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['image']['name']);


                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image = $target_file;
                }
            }

            $productModel = new Product();
            $productModel->addProduct($name, $description, $price, $category, $image);

            header("Location: index.php?page=view_products");
            exit();
        }
    }

    public function viewProducts()
    {
        $productModel = new Product();
        $products = $productModel->getAllProducts(); // Fetch all products from the database
        include 'views/admin/view_products.php'; // Load the view to display products
    }

    public function editProductPage()
    {
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $productModel = new Product();
            $product = $productModel->getProductById($productId);  // Fetch product data by ID
            include 'views/admin/edit_product.php';  // Pass the product data to the view
        } else {
            // Handle case if no ID is provided (e.g., show an error or redirect)
            echo "Product not found.";
        }
    }

    public function saveEditedProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
    
            $productModel = new Product();

            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "uploads/";
                $image_name = basename($_FILES['image']['name']);
                $target_file = $target_dir . $image_name;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image = $target_file; 
                }
            }

            $productModel->updateProduct($id, $name, $description, $price, $category, $image);

            header("Location: index.php?page=view_products");
            exit();
        }
    }
}
