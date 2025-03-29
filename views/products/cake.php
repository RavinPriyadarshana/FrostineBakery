<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cakes - Frostine Bakery</title>
    <!-- Link to external CSS files -->
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="home-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <h2 style="text-align: center; font-size: 50px; margin-top: 100px;">Our Cakes</h2>

        <div class="category-page">
  <p class="category-description">
    Our cakes are made with the finest ingredients, offering a variety of flavors to suit every taste.
    From chocolate to vanilla, each slice is a delightful experience.
  </p>
</div>


        <div class="category-page">
            <!-- Cake Products Grid -->
            <div class="product-grid">
                <?php
                // Example cake products (you can replace with database queries later)
                $cakes = [
                    [
                        'name' => 'Strawberry Cake',
                        'image' => 'assets/images/cake/berries-food-strawberry-cake.jpg',
                        'description' => 'A delicious strawberry cake with fresh berries.',
                        'price' => 'Rs.2200.00'
                    ],
                    [
                        'name' => 'Birthday Cake',
                        'image' => 'assets/images/cake/birthday-cake.jpg',
                        'description' => 'A white cream birthday cake.',
                        'price' => 'Rs.1500.00'
                    ],
                    [
                        'name' => 'Chocolate Fruit Cake',
                        'image' => 'assets/images/cake/cake-chocolate-fruit.jpg',
                        'description' => 'A classic chocolate with fruits cake piece.',
                        'price' => 'Rs.800.00'
                    ],
                    [
                        'name' => 'A white Cream Chocolate Cake',
                        'image' => 'assets/images/cake/cake-chocolate.jpg',
                        'description' => 'White cream mixed chocolate cake.',
                        'price' => 'Rs.2500.00'
                    ]
                ];

                foreach ($cakes as $cake) {
                    echo "<div class='product-card'>";
                    echo "<img src='{$cake['image']}' alt='{$cake['name']}' class='product-image'>";
                    echo "<h3 class='product-name'>{$cake['name']}</h3>";
                    echo "<p class='product-description'>{$cake['description']}</p>";
                    echo "<p class='product-price'>{$cake['price']}</p>";
                    echo "<button class='view-details-btn' onclick='showModal(\"{$cake['name']}\", \"{$cake['description']}\", \"{$cake['price']}\", \"{$cake['image']}\")'>View Details</button>";
                    echo "</div>";
                }

                $cakes = [
                  [
                      'name' => 'Cup Cake',
                      'image' => 'assets/images/cake/cake-cupcakes-dessert-sweets.jpg',
                      'description' => 'A delicious cup cake with vanila cream.',
                      'price' => 'Rs.200.00'
                  ],
                  [
                      'name' => 'Kids Birthday Cake',
                      'image' => 'assets/images/cake/cake-frosting-cream-dessert.jpg',
                      'description' => 'A yellow cream kids birthday cake.',
                      'price' => 'Rs.1500.00'
                  ],
                  [
                      'name' => 'Strawberry Layer Cake',
                      'image' => 'assets/images/cake/cake-fruit-strawberries.jpg',
                      'description' => 'A strawberry three layers cake.',
                      'price' => 'Rs.1800.00'
                  ],
                  [
                      'name' => 'Pink Two Layers Wedding Cake ',
                      'image' => 'assets/images/cake/cake-pink-party-white.jpg',
                      'description' => 'A pink color two layers with white roses wedding cake.',
                      'price' => 'Rs.3500.00'
                  ]
              ];

              foreach ($cakes as $cake) {
                  echo "<div class='product-card'>";
                  echo "<img src='{$cake['image']}' alt='{$cake['name']}' class='product-image'>";
                  echo "<h3 class='product-name'>{$cake['name']}</h3>";
                  echo "<p class='product-description'>{$cake['description']}</p>";
                  echo "<p class='product-price'>{$cake['price']}</p>";
                  echo "<button class='view-details-btn' onclick='showModal(\"{$cake['name']}\", \"{$cake['description']}\", \"{$cake['price']}\", \"{$cake['image']}\")'>View Details</button>";
                  echo "</div>";
              }

              $cakes = [
                [
                    'name' => 'Four Layers Wedding Cake',
                    'image' => 'assets/images/cake/cake-roses-dessert-decoration.jpg',
                    'description' => 'A four layers white cream mixed wedding cake.',
                    'price' => 'Rs.5000.00'
                ],
                [
                    'name' => 'Chocolate Cake',
                    'image' => 'assets/images/cake/cake-strawberries-food-fruit.jpg',
                    'description' => 'A delicious chocolate with strawberry cake piece.',
                    'price' => 'Rs.500.00'
                ],
                [
                    'name' => 'Vanila Cake',
                    'image' => 'assets/images/cake/cake-strawberries-food.jpg',
                    'description' => 'A delicious vanila white cream with strawberry cake piece.',
                    'price' => 'Rs.500.00'
                ],
                [
                    'name' => 'Chocolate Cream Cake ',
                    'image' => 'assets/images/cake/cake-sweet-cream-chocolate.jpg',
                    'description' => 'A sweet cream chocolate cake piece.',
                    'price' => 'Rs.800.00'
                ]
            ];

            foreach ($cakes as $cake) {
                echo "<div class='product-card'>";
                echo "<img src='{$cake['image']}' alt='{$cake['name']}' class='product-image'>";
                echo "<h3 class='product-name'>{$cake['name']}</h3>";
                echo "<p class='product-description'>{$cake['description']}</p>";
                echo "<p class='product-price'>{$cake['price']}</p>";
                echo "<button class='view-details-btn' onclick='showModal(\"{$cake['name']}\", \"{$cake['description']}\", \"{$cake['price']}\", \"{$cake['image']}\")'>View Details</button>";
                echo "</div>";
            }

            $cakes = [
              [
                  'name' => 'Chocolate Syrup Cake',
                  'image' => 'assets/images/cake/cakes-pastries-chocolate-syrup.jpg',
                  'description' => 'A pastries chocolate syrup cake piece.',
                  'price' => 'Rs.900.00'
              ],
              [
                  'name' => 'White Birthday Cake',
                  'image' => 'assets/images/cake/candles-cake-cake-sweet.jpg',
                  'description' => 'A delicious white cream birthday cake.',
                  'price' => 'Rs.1200.00'
              ],
              [
                  'name' => 'Cheese Cake',
                  'image' => 'assets/images/cake/cheesecake-cake-slice-sweet.jpg',
                  'description' => 'A delicious cheese cake piece.',
                  'price' => 'Rs.500.00'
              ],
              [
                  'name' => 'Kids Three Layers Birthday Cake ',
                  'image' => 'assets/images/cake/children-s-birthday-cake-marzipan-birthday-cake.jpg',
                  'description' => 'A sweet pink color three layers birthday cake.',
                  'price' => 'Rs.3000.00'
              ]
          ];

          foreach ($cakes as $cake) {
              echo "<div class='product-card'>";
              echo "<img src='{$cake['image']}' alt='{$cake['name']}' class='product-image'>";
              echo "<h3 class='product-name'>{$cake['name']}</h3>";
              echo "<p class='product-description'>{$cake['description']}</p>";
              echo "<p class='product-price'>{$cake['price']}</p>";
              echo "<button class='view-details-btn' onclick='showModal(\"{$cake['name']}\", \"{$cake['description']}\", \"{$cake['price']}\", \"{$cake['image']}\")'>View Details</button>";
              echo "</div>";
          }

          $cakes = [
            [
                'name' => 'Chocolate Cake',
                'image' => 'assets/images/cake/chocolate-cake-dessert-fruit.jpg',
                'description' => 'A chocolate cream and strawberry chocolate cake.',
                'price' => 'Rs.2300.00'
            ],
            [
                'name' => 'Cream Cup Cake',
                'image' => 'assets/images/cake/colorful-cream-cakes-pastries-sweet.jpg',
                'description' => 'A delicious cream cup cake.',
                'price' => 'Rs.250.00'
            ],
            [
                'name' => 'Two Layer Cheese Cake',
                'image' => 'assets/images/cake/cream-cake-cake-cherry.jpg',
                'description' => 'A delicious cheese cherry cake piece.',
                'price' => 'Rs.700.00'
            ],
            [
                'name' => 'Fruit Cake ',
                'image' => 'assets/images/cake/food-berries-cake-dessert.jpg',
                'description' => 'A sweet berries and strawberry mixed white cream cake piece.',
                'price' => 'Rs.950.00'
            ]
        ];

        foreach ($cakes as $cake) {
            echo "<div class='product-card'>";
            echo "<img src='{$cake['image']}' alt='{$cake['name']}' class='product-image'>";
            echo "<h3 class='product-name'>{$cake['name']}</h3>";
            echo "<p class='product-description'>{$cake['description']}</p>";
            echo "<p class='product-price'>{$cake['price']}</p>";
            echo "<button class='view-details-btn' onclick='showModal(\"{$cake['name']}\", \"{$cake['description']}\", \"{$cake['price']}\", \"{$cake['image']}\")'>View Details</button>";
            echo "</div>";
        }

        $cakes = [
          [
              'name' => 'White Cream and Chocolate Mixed Cake',
              'image' => 'assets/images/cake/food-cake-berries-cream.jpg',
              'description' => 'A white cream and chocolate mixed cake.',
              'price' => 'Rs.2500.00'
          ],
          [
              'name' => 'Chocolate, Vanila and Strawberry Mixed Cake',
              'image' => 'assets/images/cake/food-chocolate-cake-cake.jpg',
              'description' => 'A delicious creamy chocolate, vanila and Strawberry cake piece.',
              'price' => 'Rs.450.00'
          ],
          [
              'name' => 'Lemon Cake',
              'image' => 'assets/images/cake/lemon-food-pie-cake.jpg',
              'description' => 'A delicious white cream with lemon cake piece.',
              'price' => 'Rs.350.00'
          ],
          [
              'name' => 'Valentine Cake ',
              'image' => 'assets/images/cake/love-holiday-tea-heart.jpg',
              'description' => 'A sweet creamy rose design valentine cake.',
              'price' => 'Rs.3200.00'
          ]
      ];

      foreach ($cakes as $cake) {
          echo "<div class='product-card'>";
          echo "<img src='{$cake['image']}' alt='{$cake['name']}' class='product-image'>";
          echo "<h3 class='product-name'>{$cake['name']}</h3>";
          echo "<p class='product-description'>{$cake['description']}</p>";
          echo "<p class='product-price'>{$cake['price']}</p>";
          echo "<button class='view-details-btn' onclick='showModal(\"{$cake['name']}\", \"{$cake['description']}\", \"{$cake['price']}\", \"{$cake['image']}\")'>View Details</button>";
          echo "</div>";
      }

      

                ?>
            </div>
        </div>
        </p>
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
