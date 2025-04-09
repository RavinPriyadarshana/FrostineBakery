<?php
require_once 'models/Product.php';
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
        $productStockModel = new Product();
        $products = $productStockModel->getAllStock();
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
        require 'views/admin/add_product.php'; // View to add new product
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
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image = $target_file;
                }
            }

            $productModel = new Product();
            $productModel->addProduct($name, $description, $price, $category, $image);

            header("Location: index.php?page=stock-list");
            exit();
        }
    }
}
