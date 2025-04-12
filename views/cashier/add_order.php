<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pay Order - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/order_items.css">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
            <h2>Create New Order</h2>

            <!-- New Order Form -->
            <form method="POST" action="index.php?page=save-order">
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id">
                        <?php foreach ($customers as $customer): ?>
                            <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <h3>Order Items</h3>
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id">
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="branch_id">Branch</label>
                    <select name="branch_id">
                        <?php foreach ($branches as $branch): ?>
                            <option value="<?= $branch['id'] ?>"><?= $branch['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" min="1" required>
                </div>

                <button type="submit" class="blue-btn">Create Order</button>
            </form>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>