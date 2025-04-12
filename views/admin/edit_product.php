<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/order_items.css">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
            <h2>Edit Product</h2>
            <form method="POST" action="index.php?page=save-edited-product" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" placeholder="Product Name" required>
                <textarea name="description" placeholder="Product Description" required><?= htmlspecialchars($product['description']); ?></textarea>
                <input type="number" name="price" value="<?= htmlspecialchars($product['price']); ?>" placeholder="Price" required>
                <input type="text" name="category" value="<?= htmlspecialchars($product['category']); ?>" placeholder="Category" required>
                <input type="file" name="image">
                <button type="submit" class="blue-btn">Save Changes</button>
            </form>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>