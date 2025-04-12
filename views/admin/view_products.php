<?php
$base_url = "http://localhost:8080/FrostineBakery/"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/order_items.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="users-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
            <h2>Products</h2>
            <a href="index.php?page=add-product" class="green-btn">Add Product</a>


            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= htmlspecialchars($product['name']) ?></td>
                                <td><?= htmlspecialchars($product['description']) ?></td>
                                <td>LKR <?= number_format($product['price'], 2) ?></td>
                                <td><?= htmlspecialchars($product['category']) ?></td>
                                <td>
                                    <img src="<?php echo $base_url; ?><?php echo $product['image']; ?>" alt="Product Image" width="100" height="100">
                                </td>
                                <td><a href="index.php?page=edit-product&id=<?= $product['id']; ?>" class="blue-btn">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No products found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>


    <?php include 'views/includes/footer.php'; ?>
</body>

</html>