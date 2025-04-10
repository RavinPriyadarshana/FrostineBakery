<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stock List - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/order_items.css">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>


    <main>
        <div class="order-container">
            <h2>Update Stock</h2>
            <form method="POST" action="index.php?page=update-stock">
                <input type="hidden" name="id" value="<?= $stock['id'] ?>">
                <p><strong>Product:</strong> <?= $stock['product_name'] ?></p>
                <p><strong>Branch:</strong> <?= $stock['branch_name'] ?></p>
                <input type="number" name="quantity" value="<?= $stock['quantity'] ?>" required>
                <button type="submit" class="add-button">Update Quantity</button>
            </form>
        </div>
    </main>


    <?php include 'views/includes/footer.php'; ?>
</body>

</html>