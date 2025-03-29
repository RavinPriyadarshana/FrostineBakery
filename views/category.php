<!-- views/category.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst($category); ?> - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2><?php echo ucfirst($category); ?> Products</h2>

        <?php if (!empty($error)): ?>
            <p><?php echo $error; ?></p>
        <?php else: ?>
            <div class="product-list">
                <?php foreach ($products as $product): ?>
                    <div class="product">
                        <h3><?php echo $product['name']; ?></h3>
                        <p>Price: <?php echo $product['price']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
