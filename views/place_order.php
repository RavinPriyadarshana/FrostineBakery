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
        <div class="checkout-container">
            <h2>Checkout</h2>
            <form action="index.php?page=order&action=confirm" method="POST">
                <label>Card Holder Name:</label>
                <input type="text" name="card_name" required>

                <label>Card Number:</label>
                <input type="text" name="card_number" required>

                <label>Expiry Date:</label>
                <input type="text" name="expiry_date" placeholder="MM/YY" required>

                <label>CVV:</label>
                <input type="text" name="cvv" required>

                <input type="submit" value="Confirm Order">
            </form>
        </div>
    </main>




    <?php include 'views/includes/footer.php'; ?>
</body>

</html>