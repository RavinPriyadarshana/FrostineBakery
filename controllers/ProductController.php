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
}
