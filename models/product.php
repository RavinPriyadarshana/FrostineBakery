<!-- models/Product.php -->
<?php

class Product {
    private $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    // Get products by category
    public function getProductsByCategory($category) {
        // Here you can query the database to fetch products by category
        // Below is a simulation with static data, which you can replace with actual database queries.

        $products = [
            'cake' => [
                ['name' => 'Chocolate Cake', 'price' => '$10'],
                ['name' => 'Vanilla Cake', 'price' => '$8'],
            ],
            'bread' => [
                ['name' => 'Whole Wheat Bread', 'price' => '$3'],
                ['name' => 'Sourdough', 'price' => '$4'],
            ],
            'waffle' => [
                ['name' => 'Belgian Waffle', 'price' => '$5'],
                ['name' => 'Chocolate Waffle', 'price' => '$6'],
            ],
            'pancake' => [
                ['name' => 'Buttermilk Pancake', 'price' => '$7'],
                ['name' => 'Blueberry Pancake', 'price' => '$8'],
            ],
            'shorteats' => [
                ['name' => 'Spring Rolls', 'price' => '$2'],
                ['name' => 'Samosa', 'price' => '$2.5'],
            ],
        ];

        return isset($products[$category]) ? $products[$category] : [];
    }
}
