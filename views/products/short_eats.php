<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Short Eats - Frostine Bakery</title>
    <!-- Link to external CSS files -->
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="home-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <h2 style="text-align: center; font-size: 50px; margin-top: 100px;">Our Short Eats</h2>

        <div class="category-page">
  <p class="category-description">
  
  Our short eats are prepared with the finest ingredients, offering a variety of savory and satisfying 
  flavors to satisfy every snack craving. From crispy bites to soft pastries, each treat is a perfect 
  balance of taste and texture.
  </p>
</div>

        <div class="category-page">
            <!-- Short eats Products Grid -->
            <div class="product-grid">
                <?php
                // Example short eats products 
                $short_eats = [
                    [
                        'name' => 'Cutlets',
                        'image' => 'assets/images/short_eats/cutlets.jpeg',
                        'description' => 'A delicious cutlet.',
                        'price' => 'Rs.20.00'
                    ],
                    [
                        'name' => 'Egg Roti',
                        'image' => 'assets/images/short_eats/egg-roti-16.png',
                        'description' => 'A egg roti with curry.',
                        'price' => 'Rs.150.00'
                    ],
                    [
                        'name' => 'Hoppers',
                        'image' => 'assets/images/short_eats/hoppers.jpg',
                        'description' => 'A hopper with curry.',
                        'price' => 'Rs.20.00'
                    ],
                    [
                        'name' => 'Patties',
                        'image' => 'assets/images/short_eats/patties.jpg',
                        'description' => 'A delicious patties.',
                        'price' => 'Rs.20.00'
                    ]
                ];

                foreach ($short_eats as $short_eat) {
                    echo "<div class='product-card'>";
                    echo "<img src='{$short_eat['image']}' alt='{$short_eat['name']}' class='product-image'>";
                    echo "<h3 class='product-name'>{$short_eat['name']}</h3>";
                    echo "<p class='product-description'>{$short_eat['description']}</p>";
                    echo "<p class='product-price'>{$short_eat['price']}</p>";
                    echo "<button class='view-details-btn' onclick='showModal(\"{$short_eat['name']}\", \"{$short_eat['description']}\", \"{$short_eat['price']}\", \"{$short_eat['image']}\")'>View Details</button>";
                    echo "</div>";
                }

                $short_eats = [
                  [
                      'name' => 'Egg Roles',
                      'image' => 'assets/images/short_eats/roles.jpg',
                      'description' => 'A delicious egg role.',
                      'price' => 'Rs.70.00'
                  ],

                  [
                    'name' => 'Coconut Roti',
                    'image' => 'assets/images/short_eats/roti.jpg',
                    'description' => 'A coconut roti with curry.',
                    'price' => 'Rs.30.00'
                  ],

                  [
                    'name' => 'Wade',
                    'image' => 'assets/images/short_eats/wade.jpg',
                    'description' => 'A delicious wade with chilli paste.',
                    'price' => 'Rs.30.00'
                  ]

              ];

              foreach ($short_eats as $short_eat) {
                  echo "<div class='product-card'>";
                  echo "<img src='{$short_eat['image']}' alt='{$short_eat['name']}' class='product-image'>";
                  echo "<h3 class='product-name'>{$short_eat['name']}</h3>";
                  echo "<p class='product-description'>{$short_eat['description']}</p>";
                  echo "<p class='product-price'>{$short_eat['price']}</p>";
                  echo "<button class='view-details-btn' onclick='showModal(\"{$short_eat['name']}\", \"{$short_eat['description']}\", \"{$short_eat['price']}\", \"{$short_eat['image']}\")'>View Details</button>";
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
