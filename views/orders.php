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
            <table class="orders-table">
                <tr>
                    <th>Order ID</th>
                    <th>Items</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>#1001</td>
                    <td>Chocolate Cake, French Bread</td>
                    <td>Rs. 2100</td>
                    <td><span class="status pending">Pending</span></td>
                    <td><button class="cancel-btn">Cancel</button></td>
                </tr>
                <tr>
                    <td>#1002</td>
                    <td>Strawberry Muffin, Croissant</td>
                    <td>Rs. 1500</td>
                    <td><span class="status processing">Processing</span></td>
                    <td><button class="disabled-btn" disabled>Cancel</button></td>
                </tr>
                <tr>
                    <td>#1003</td>
                    <td>Red Velvet Cake</td>
                    <td>Rs. 2500</td>
                    <td><span class="status delivered">Delivered</span></td>
                    <td><button class="disabled-btn" disabled>Cancel</button></td>
                </tr>
            </table>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>