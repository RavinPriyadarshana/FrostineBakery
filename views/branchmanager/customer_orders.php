<!-- views/branch_manager/customer_orders.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer Orders</title>
</head>

<body>
    <h2>Orders for Customer <?= htmlspecialchars($customerId) ?></h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['order_id'] ?></td>
                <td><?= $order['product_name'] ?></td>
                <td><?= $order['quantity'] ?></td>
                <td><?= $order['total_price'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>