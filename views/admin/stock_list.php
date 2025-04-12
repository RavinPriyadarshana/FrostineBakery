<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/order_items.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="users-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
        <h2>Stock Items</h2>
        <a href="index.php?page=add-stock" class="green-btn">Add Stock</a>

            <?php
            if (isset($stockItems)) {
            ?>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Branch</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                    <?php if (isset($stockItems)): ?>
                        <?php foreach ($stockItems as $stockItem): ?>
                            <tr>
                                <td><?= $stockItem['id'] ?></td>
                                <td><?= $stockItem['product_name'] ?></td>
                                <td><?= $stockItem['branch_name'] ?></td>
                                <td><?= $stockItem['quantity'] ?></td>
                                <td>
                                    <a href="index.php?page=edit-stock&id=<?= $stockItem['id'] ?>" class="blue-btn">Edit</a>
                                    <a href="index.php?page=delete-stock&id=<?= $stockItem['id'] ?>" class="red-btn" onclick="return confirm('Delete this stock?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No stock found.</td>
                        </tr>
                    <?php endif; ?>
                </table>

            <?php
            }
            ?>

        </div>
    </main>


    <?php include 'views/includes/footer.php'; ?>
</body>

</html>