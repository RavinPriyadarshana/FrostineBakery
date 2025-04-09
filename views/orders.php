<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/footer.css">
    <meta charset="UTF-8">
    <title>My Orders - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/orders.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="orders-page">
    <?php include 'views/includes/header.php'; ?>

    <main>

        <div class="orders-container">
            <h2>My Orders</h2>
            <?php if (empty($orders)): ?>
                <p>No orders found.</p>
            <?php else: ?>
                <table class="orders-table">
                    <tr>
                        <th>Order ID</th>
                        <th>Items</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>#<?= htmlspecialchars($order['id']) ?></td>
                            <td>
                                <?php
                                $itemNames = array_map(function ($item) {
                                    return htmlspecialchars($item['name']);
                                }, $order['items']);
                                echo implode(', ', $itemNames);
                                ?>
                            </td>
                            <td>Rs. <?= number_format($order['total_price'], 2) ?></td>
                            <td><span class="status <?= strtolower($order['status']) ?>"><?= ucfirst($order['status']) ?></span></td>
                            <td>
                                <?php if ($order['status'] === 'Pending'): ?>
                                    <form method="POST" action="index.php?page=orders&action=cancel">
                                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                        <button class="cancel-btn" type="submit">Cancel</button>
                                    </form>
                                <?php else: ?>
                                    <button class="disabled-btn" disabled>Cancel</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>