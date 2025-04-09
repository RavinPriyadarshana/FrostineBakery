<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Orders - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/orders.css">

</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
            <h2>Orders</h2>
            <a href="index.php?page=add-order" class="btn">Add New Order</a>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Branch</th>
                    <th>Status</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                <?php if (isset($orders) && !empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['id']) ?></td>
                            <td><?= htmlspecialchars($order['customer_name']) ?></td>
                            <td><?= htmlspecialchars($order['branch_name']) ?></td>
                            <td><?= htmlspecialchars($order['status']) ?></td>
                            <td><?= htmlspecialchars($order['total_price']) ?> LKR</td>
                            <td><?= htmlspecialchars($order['created_at']) ?></td>
                            <td>
                                <a href="index.php?page=add-order&id=<?= $order['id'] ?>">Pay</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>
