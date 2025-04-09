<?php
// controllers/StockController.php
require_once 'models/Stock.php';

class StockController
{
    // Show the stock list page
    public function stockList()
    {
        $stockModel = new Stock();
        $stockItems = $stockModel->getAllStockItems();
        require 'views/admin/stock_list.php'; // Pass stockItems to the view
    }

    // Add stock form
    public function addStockForm()
    {
        $stockModel = new Stock();
        $branches = $stockModel->getAllBranches();
        $products = $stockModel->getAllProducts();
        require 'views/admin/add_stock.php'; // View to add stock
    }

    // Save stock for product
    public function saveStock()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $branch_id = $_POST['branch_id'];
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $stockModel = new Stock();
            $stockModel->addStock($branch_id, $product_id, $quantity);

            header("Location: index.php?page=stock-list");
            exit();
        }
    }

    public function editStockForm()
    {
        $productStockModel = new Stock();
        $stock = $productStockModel->findById($_GET['id']);
        require 'views/admin/edit_stock.php'; // View to edit stock
    }

    public function updateStock()
    {
        $productStockModel = new Stock();
        $productStockModel->updateQuantity($_POST['id'], $_POST['quantity']);
        header("Location: index.php?page=stock-list"); // Redirect after update
    }
}
