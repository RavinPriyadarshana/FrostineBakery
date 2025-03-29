<!-- controllers/ProductController.php -->
<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {

    public function showCategory($category) {
        $productModel = new Product();
        $products = $productModel->getProductsByCategory($category);

        // If no products are found for the category
        if (empty($products)) {
            $error = "No products found in this category.";
            require 'views/category.php';
        } else {
            // Pass the products to the view
            require 'views/category.php';
        }
    }
}
