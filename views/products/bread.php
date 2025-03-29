<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Breads - Frostine Bakery</title>
    <!-- Link to external CSS files -->
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="home-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <h2 style="text-align: center; font-size: 50px; margin-top: 100px;">Our Breads</h2>

        <div class="category-page">
  <p class="category-description">
  Our breads are crafted with the finest grains, offering a variety of textures and flavors to suit 
  every preference. From soft white to hearty whole wheat, each loaf is a fresh and satisfying experience.
  </p>
</div>

        <div class="category-page">
            <!-- Bread Products Grid -->
            <div class="product-grid">
                <?php
                // Example bread products 
                $breads = [
                    [
                        'name' => 'Dry Grapes Bread',
                        'image' => 'assets/images/bread/baked-baked-goods-baking-blur.jpg',
                        'description' => 'A delicious baked bread with dry grapes.',
                        'price' => 'Rs.250.00'
                    ],
                    [
                        'name' => 'Burlap Close Up Club Sandwich',
                        'image' => 'assets/images/bread/bread-burlap-close-up-club-sandwich.jpg',
                        'description' => 'Couple of burlap close up club sandwich.',
                        'price' => 'Rs.200.00'
                    ],
                    [
                        'name' => 'Vegetable Burger ',
                        'image' => 'assets/images/bread/bread-delicious-dinner-food.jpg',
                        'description' => 'A delicious long vegetable burger.',
                        'price' => 'Rs.300.00'
                    ],
                    [
                        'name' => 'Pretzel Cracker',
                        'image' => 'assets/images/bread/bread-food-pretzel-cracker-wallpaper-preview.jpg',
                        'description' => 'A baked pretzel cracker.',
                        'price' => 'Rs.200.00'
                    ]
                ];

                foreach ($breads as $bread) {
                    echo "<div class='product-card'>";
                    echo "<img src='{$bread['image']}' alt='{$bread['name']}' class='product-image'>";
                    echo "<h3 class='product-name'>{$bread['name']}</h3>";
                    echo "<p class='product-description'>{$bread['description']}</p>";
                    echo "<p class='product-price'>{$bread['price']}</p>";
                    echo "<button class='view-details-btn' onclick='showModal(\"{$bread['name']}\", \"{$bread['description']}\", \"{$bread['price']}\", \"{$bread['image']}\")'>View Details</button>";
                    echo "</div>";
                }

                $breads = [
                  [
                      'name' => 'Croatian Breads',
                      'image' => 'assets/images/bread/bread-restaurant-breakfast-bakery.jpg',
                      'description' => 'A baked croatian bread.',
                      'price' => 'Rs.300.00'
                  ],
                  [
                      'name' => 'Chicken Burger',
                      'image' => 'assets/images/bread/brown-bird-perching-during-daytime-wren-wren-wallpaper-preview.jpg',
                      'description' => 'A chicken burger with chips.',
                      'price' => 'Rs.600.00'
                  ],
                  [
                      'name' => 'Pastries',
                      'image' => 'assets/images/bread/cakes-pastries-desserts-wallpaper-preview.jpg',
                      'description' => 'A cake pastries.',
                      'price' => 'Rs.100.00'
                  ],
                  [
                      'name' => 'Chicken and Cheese Burger',
                      'image' => 'assets/images/bread/chicken-burger-lunch-classic-burger-break.jpg',
                      'description' => 'A delisious chicken and cheese burger.',
                      'price' => 'Rs.750.00'
                  ]
              ];

              foreach ($breads as $bread) {
                  echo "<div class='product-card'>";
                  echo "<img src='{$bread['image']}' alt='{$bread['name']}' class='product-image'>";
                  echo "<h3 class='product-name'>{$bread['name']}</h3>";
                  echo "<p class='product-description'>{$bread['description']}</p>";
                  echo "<p class='product-price'>{$bread['price']}</p>";
                  echo "<button class='view-details-btn' onclick='showModal(\"{$bread['name']}\", \"{$bread['description']}\", \"{$bread['price']}\", \"{$bread['image']}\")'>View Details</button>";
                  echo "</div>";
              }

              $breads = [
                [
                    'name' => 'Donuts Cake',
                    'image' => 'assets/images/bread/donuts-cakes-bakery-sweets.jpg',
                    'description' => 'A delicious donuts cake.',
                    'price' => 'Rs.100.00'
                ],
                [
                    'name' => 'Vegetable Hot Dog',
                    'image' => 'assets/images/bread/fast-food-hot-dog-shawarma-shaverma.jpg',
                    'description' => 'A full vegetable hot dog.',
                    'price' => 'Rs.200.00'
                ],
                [
                    'name' => 'Egg Cheese Sandwich',
                    'image' => 'assets/images/bread/food-bread-fried-egg-cheese-wallpaper-preview.jpg',
                    'description' => 'A fried egg and cheese sandwich.',
                    'price' => 'Rs.250.00'
                ],
                [
                    'name' => 'Hamburgers',
                    'image' => 'assets/images/bread/food-burgers-hamburgers-fast-food-wallpaper-preview.jpg',
                    'description' => 'Chicken and cheese hamburgers.',
                    'price' => 'Rs.450.00'
                ]
            ];

            foreach ($breads as $bread) {
                echo "<div class='product-card'>";
                echo "<img src='{$bread['image']}' alt='{$bread['name']}' class='product-image'>";
                echo "<h3 class='product-name'>{$bread['name']}</h3>";
                echo "<p class='product-description'>{$bread['description']}</p>";
                echo "<p class='product-price'>{$bread['price']}</p>";
                echo "<button class='view-details-btn' onclick='showModal(\"{$bread['name']}\", \"{$bread['description']}\", \"{$bread['price']}\", \"{$bread['image']}\")'>View Details</button>";
                echo "</div>";
            }

            $breads = [
              [
                  'name' => 'Sasuage Hot Dog',
                  'image' => 'assets/images/bread/food-hot-dog-bread-sausage-wallpaper-preview.jpg',
                  'description' => 'A delicious sasuage hot dog.',
                  'price' => 'Rs.300.00'
              ],
              [
                  'name' => 'Bread Sandwich',
                  'image' => 'assets/images/bread/food-sandwiches-wallpaper-preview (1).jpg',
                  'description' => 'A bread vegetabe sandwich.',
                  'price' => 'Rs.250.00'
              ],
              [
                  'name' => 'Vegetable Sandwich',
                  'image' => 'assets/images/bread/food-sandwiches-wallpaper-preview.jpg',
                  'description' => 'A vegitable sald sandwich.',
                  'price' => 'Rs.250.00'
              ],
              [
                  'name' => 'Cheese Burger',
                  'image' => 'assets/images/bread/hamburger-cheeseburger-sandwich-snack-food-wallpaper-preview.jpg',
                  'description' => 'A delicious cheese burger.',
                  'price' => 'Rs.400.00'
              ]
          ];

          foreach ($breads as $bread) {
              echo "<div class='product-card'>";
              echo "<img src='{$bread['image']}' alt='{$bread['name']}' class='product-image'>";
              echo "<h3 class='product-name'>{$bread['name']}</h3>";
              echo "<p class='product-description'>{$bread['description']}</p>";
              echo "<p class='product-price'>{$bread['price']}</p>";
              echo "<button class='view-details-btn' onclick='showModal(\"{$bread['name']}\", \"{$bread['description']}\", \"{$bread['price']}\", \"{$bread['image']}\")'>View Details</button>";
              echo "</div>";
          }

          $breads = [
                    [
                        'name' => 'Vegetable Roll',
                        'image' => 'assets/images/bread/pita-bread-vegetables-lemon-roll-wallpaper-preview.jpg',
                        'description' => 'A delicious pita bread lemon roll.',
                        'price' => 'Rs.250.00'
                    ]

                ];

                foreach ($breads as $bread) {
                    echo "<div class='product-card'>";
                    echo "<img src='{$bread['image']}' alt='{$bread['name']}' class='product-image'>";
                    echo "<h3 class='product-name'>{$bread['name']}</h3>";
                    echo "<p class='product-description'>{$bread['description']}</p>";
                    echo "<p class='product-price'>{$bread['price']}</p>";
                    echo "<button class='view-details-btn' onclick='showModal(\"{$bread['name']}\", \"{$bread['description']}\", \"{$bread['price']}\", \"{$bread['image']}\")'>View Details</button>";
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
