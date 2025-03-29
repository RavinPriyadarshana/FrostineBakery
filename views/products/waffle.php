<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Waffle - Frostine Bakery</title>
    <!-- Link to external CSS files -->
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="home-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <h2 style="text-align: center; font-size: 50px; margin-top: 100px;">Our Waffles</h2>

        <div class="category-page">
  <p class="category-description">
  
  Our waffles are made with the finest ingredients, offering a delicious range of crispy and fluffy 
  textures to satisfy every sweet tooth. From classic to decadent, each bite is a perfect blend of 
  warmth and flavor.
  </p>
</div>

        <div class="category-page">
            <!-- Waffle Products Grid -->
            <div class="product-grid">
                <?php
                // Example waffle products 
                $waffles = [
                    [
                        'name' => 'Berries & Ice Cream Waffle',
                        'image' => 'assets/images/waffle/berries-raspberry-ice-cream-dessert-wallpaper-preview.jpg',
                        'description' => 'A delicious barries raspberry ice cream waffle.',
                        'price' => 'Rs.200.00'
                    ],
                    [
                        'name' => 'Waffle Sticks With Ice Cream',
                        'image' => 'assets/images/waffle/chocolate-ice-cream-dessert-waffles-wallpaper-preview.jpg',
                        'description' => 'A sweet waffle sticks with ice cream cup.',
                        'price' => 'Rs.300.00'
                    ],
                    [
                        'name' => 'Chocolate Cream Waffle',
                        'image' => 'assets/images/waffle/delicious-food-homemade-jam.jpg',
                        'description' => 'A sweet chocolate cream mixed waffle.',
                        'price' => 'Rs.200.00'
                    ],
                    [
                        'name' => 'Chocolate Ice Cream Banana Waffle',
                        'image' => 'assets/images/waffle/food-chocolate-ice-cream-bananas-wallpaper-preview.jpg',
                        'description' => 'A delicious chocolate ice cream and bananas mixed waffle.',
                        'price' => 'Rs.250.00'
                    ]
                ];

                foreach ($waffles as $waffle) {
                    echo "<div class='product-card'>";
                    echo "<img src='{$waffle['image']}' alt='{$waffle['name']}' class='product-image'>";
                    echo "<h3 class='product-name'>{$waffle['name']}</h3>";
                    echo "<p class='product-description'>{$waffle['description']}</p>";
                    echo "<p class='product-price'>{$waffle['price']}</p>";
                    echo "<button class='view-details-btn' onclick='showModal(\"{$waffle['name']}\", \"{$waffle['description']}\", \"{$waffle['price']}\", \"{$waffle['image']}\")'>View Details</button>";
                    echo "</div>";
                }

                $waffle = [
                  [
                      'name' => 'Berlin Waffle',
                      'image' => 'assets/images/waffle/germany-berlin-waffle-food.jpg',
                      'description' => 'A delicious germany berlin waffle with ice cream.',
                      'price' => 'Rs.200.00'
                  ],

                  [
                    'name' => 'Raspberries Ice Cream Waffle',
                    'image' => 'assets/images/waffle/waffles-raspberries-ice-cream-fork-wallpaper-preview.jpg',
                    'description' => 'A sweet raspberries with ice cream mixed waffle.',
                    'price' => 'Rs.350.00'
                  ]

              ];

              foreach ($waffle as $waffle) {
                  echo "<div class='product-card'>";
                  echo "<img src='{$waffle['image']}' alt='{$waffle['name']}' class='product-image'>";
                  echo "<h3 class='product-name'>{$waffle['name']}</h3>";
                  echo "<p class='product-description'>{$waffle['description']}</p>";
                  echo "<p class='product-price'>{$waffle['price']}</p>";
                  echo "<button class='view-details-btn' onclick='showModal(\"{$waffle['name']}\", \"{$waffle['description']}\", \"{$waffle['price']}\", \"{$waffle['image']}\")'>View Details</button>";
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
