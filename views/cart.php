<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/footer.css">
    <meta charset="UTF-8">
    <title>Contact - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="cart-page">
    <?php include 'views/includes/header.php'; ?>

    <main>

        <div class="cart-container">
            <h2>Shopping Cart</h2>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>Chocolate Cake</td>
                    <td>2</td>
                    <td>Rs. 1200</td>
                    <td>
                        <button class="remove-btn">Remove</button>
                    </td>
                </tr>
                <tr>
                    <td>Strawberry Muffin</td>
                    <td>1</td>
                    <td>Rs. 500</td>
                    <td>
                        <button class="remove-btn">Remove</button>
                    </td>
                </tr>
                <tr>
                    <td>French Bread</td>
                    <td>3</td>
                    <td>Rs. 900</td>
                    <td>
                        <button class="remove-btn">Remove</button>
                    </td>
                </tr>
            </table>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>