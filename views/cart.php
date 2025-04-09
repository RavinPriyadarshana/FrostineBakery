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
            <?php if (empty($cartItems)): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($cartItems as $productId => $item): ?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['price'] ?></td>
                            <td>
                                <form action="index.php?page=cart&action=update" method="POST">
                                    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1">
                                    <input type="hidden" name="product_id" value="<?= $productId ?>">
                                    <input type="submit" value="Update">
                                </form>
                            </td>
                            <td><?= $item['price'] * $item['quantity'] ?></td>
                            <td>
                                <form action="index.php?page=cart&action=remove" method="POST">
                                    <input type="hidden" name="product_id" value="<?= $productId ?>">
                                    <input type="submit" value="Remove">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <h3>Total Price: <?= $totalPrice ?></h3>
                <a href="index.php?page=cart&action=clear">Clear Cart</a>
                <a href="index.php?page=order">Place Order</a>
            <?php endif; ?>

        </div>
    </main>

 


    <?php include 'views/includes/footer.php'; ?>
</body>

</html>