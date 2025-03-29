<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pancake - Frostine Bakery</title>
    <!-- Link to external CSS files -->
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="home-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <h2 style="text-align: center; font-size: 50px; margin-top: 100px;">Our Pancakes</h2>

        <div class="category-page">
  <p class="category-description">
  
Our pancakes are made with the finest ingredients, offering a delightful range of flavors and textures 
to satisfy every craving. From light and fluffy to rich and indulgent, each stack is a comforting and 
delicious treat.
  </p>
</div>

        <div class="category-page">
            <!-- Pancakes Products Grid -->
            <div class="product-grid">
                <?php
                // Example pancake products 
                $pancakes = [
                    [
                        'name' => 'Chocolate Fruite Pancake',
                        'image' => 'assets/images/pancake/berries-food-chocolate-fruit-wallpaper-preview.jpg',
                        'description' => 'A delicious chocolate creamy fruite pancake.',
                        'price' => 'Rs.250.00'
                    ],
                    [
                        'name' => 'Barries Pancake',
                        'image' => 'assets/images/pancake/food-berries-pancakes-breakfast-wallpaper-preview.jpg',
                        'description' => 'A sweet barries and chocolate mixed pancake.',
                        'price' => 'Rs.300.00'
                    ],
                    [
                        'name' => 'Fruite Pancake ',
                        'image' => 'assets/images/pancake/food-pancakes-fork-fruit-wallpaper-preview.jpg',
                        'description' => 'A delicious frute pancake.',
                        'price' => 'Rs.250.00'
                    ],
                    [
                        'name' => 'Horney Nuts Apricot Pancake',
                        'image' => 'assets/images/pancake/honey-nuts-apricot-pancakes-hd-wallpaper-preview.jpg',
                        'description' => 'A delicious horney mixed nuts aprico pancake.',
                        'price' => 'Rs.300.00'
                    ]
                ];

                foreach ($pancakes as $pancake) {
                    echo "<div class='product-card'>";
                    echo "<img src='{$pancake['image']}' alt='{$pancake['name']}' class='product-image'>";
                    echo "<h3 class='product-name'>{$pancake['name']}</h3>";
                    echo "<p class='product-description'>{$pancake['description']}</p>";
                    echo "<p class='product-price'>{$pancake['price']}</p>";
                    echo "<button class='view-details-btn' onclick='showModal(\"{$pancake['name']}\", \"{$pancake['description']}\", \"{$pancake['price']}\", \"{$pancake['image']}\")'>View Details</button>";
                    echo "</div>";
                }

                $pancakes = [
                  [
                      'name' => 'Meat & Vegetable Pancake',
                      'image' => 'assets/images/pancake/pancakes-meat-vegetables-decoration-wallpaper-preview (1).jpg',
                      'description' => 'A meat and vegetable mixed pancake.',
                      'price' => 'Rs.300.00'
                  ]

              ];

              foreach ($pancakes as $pancake) {
                  echo "<div class='product-card'>";
                  echo "<img src='{$pancake['image']}' alt='{$pancake['name']}' class='product-image'>";
                  echo "<h3 class='product-name'>{$pancake['name']}</h3>";
                  echo "<p class='product-description'>{$pancake['description']}</p>";
                  echo "<p class='product-price'>{$pancake['price']}</p>";
                  echo "<button class='view-details-btn' onclick='showModal(\"{$pancake['name']}\", \"{$pancake['description']}\", \"{$pancake['price']}\", \"{$pancake['image']}\")'>View Details</button>";
                  echo "</div>";
              }

                ?>
            </div>
        </div>
    </main>

    <!-- Modal for product details -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2 id="modalName"></h2>
            <img id="modalImage" src="" alt="Product Image" class="modal-image">
            <p id="modalDescription"></p>
            <p id="modalPrice"></p>
        </div>
    </div>

    <?php include 'views/includes/footer.php'; ?>

    <script src="assets/js/category.js"></script>
</body>

</html>
