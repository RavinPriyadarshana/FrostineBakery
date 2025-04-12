<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Requests - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/order_items.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
            <h2>Branch Order Requests</h2>
            <a href="index.php?page=filter_order_requests" class="blue-btn">Filter Requests</a>

            <table>
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Branch Name</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Requested Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($requests) && count($requests) > 0): ?>
                        <?php foreach ($requests as $req): ?>
                            <tr>
                                <td>REQ<?= htmlspecialchars($req['id']) ?></td>
                                <td><?= htmlspecialchars($req['branch_name']) ?></td>
                                <td><?= htmlspecialchars($req['item_name']) ?></td>
                                <td><?= htmlspecialchars($req['quantity']) ?></td>
                                <td><?= htmlspecialchars($req['product_name']) ?></td>
                                <td><?= htmlspecialchars($req['product_description']) ?></td>
                                <td>Rs. <?= number_format($req['product_price'], 2) ?></td>
                                <td><?= htmlspecialchars($req['requested_date']) ?></td>
                                <td><?= htmlspecialchars($req['status']) ?></td>
                                <td>
                                    <form method="POST" action="index.php?page=update_order_request_status" style="display:inline;">
                                        <input type="hidden" name="request_id" value="<?= $req['id'] ?>">
                                        <input type="hidden" name="status" value="Approved">
                                        <button type="submit" class="blue-btn">Approve</button>
                                    </form>
                                    <form method="POST" action="index.php?page=update_order_request_status" style="display:inline;">
                                        <input type="hidden" name="request_id" value="<?= $req['id'] ?>">
                                        <input type="hidden" name="status" value="Rejected">
                                        <button type="submit" class="red-btn">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10">No order requests found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>