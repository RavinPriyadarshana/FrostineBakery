<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Items - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/order_items.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
            <h2>Order Items</h2>

            <!-- Hardcoded sample order items table -->
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ORD1234</td>
                        <td>Sachini Perera</td>
                        <td>Strawberry Cupcake</td>
                        <td>12</td>
                        <td>2025-04-02</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>ORD1235</td>
                        <td>Ruwan Silva</td>
                        <td>Cheese Bread</td>
                        <td>8</td>
                        <td>2025-04-03</td>
                        <td>Delivered</td>
                    </tr>
                    <tr>
                        <td>ORD1236</td>
                        <td>Nimali Fernando</td>
                        <td>Chocolate Roll</td>
                        <td>5</td>
                        <td>2025-04-03</td>
                        <td>Cancelled</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>
