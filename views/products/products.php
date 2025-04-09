<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title><?= ucfirst($type); ?> - Frostine Bakery</title>
    <!-- Link to external CSS files -->
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="home-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <h2 style="text-align: center; font-size: 50px; margin-top: 100px;">
            Our <?= ucfirst($type); ?>s
        </h2>

        <div class="category-page">
            <p class="category-description">
                Discover our finest selection of <?= htmlspecialchars($type); ?>s made with love and care.
                Fresh, flavorful, and perfect for any time of day.
            </p>
        </div>

        <div class="category-page">
            <div class="product-grid">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="product-image">
                            <h3 class="product-name"><?= $product['name']; ?></h3>
                            <p class="product-description"><?= $product['description']; ?></p>
                            <p class="product-price"><?= $product['price']; ?></p>
                            <button class="view-details-btn"
                                onclick='showModal(
            <?php echo json_encode($product["name"]) ?>,
            <?php echo json_encode($product["description"]) ?>,
            <?php echo json_encode($product["price"]) ?>,
            <?php echo json_encode($product["image"]) ?>
        )'>View Details</button>

                            <button class="add-to-cart-btn"
                                onclick='addToCart(
        <?php echo json_encode($product["id"]) ?>,
        <?php echo json_encode($product["name"]) ?>,
        <?php echo json_encode($product["price"]) ?>
    )'>
                                Add to Cart
                            </button>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center;">No products found in this category.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <script>
        // Function to add product to cart via MVC controller
        function addToCart(productId, productName, productPrice) {
            let origin = window.location.origin + '/';
            let url = origin + 'index.php?page=cart&action=add_to_cart';


            const xhr = new XMLHttpRequest();
            xhr.open("POST", url);
            xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            const body = JSON.stringify({
                id: productId,
                name: productName,
                price: productPrice,
            });
            xhr.onload = () => {
                if (xhr.readyState == 4 && xhr.status == 201) {
                    console.log(JSON.parse(xhr.responseText));
                } else {
                    console.log(`Error: ${xhr.status}`);
                }
            };
            xhr.send(body);

            alert(url)
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: {
                        id: productId,
                        name: productName,
                        price: productPrice,
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data)
                    if (data.status === 'success') {
                        alert('Product added to cart!');
                    } else {
                        alert('Failed to add product to cart.');
                    }
                });
        }
    </script>

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