<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Filter Order Requests - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/sales_report.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="report-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="report-container">
            <h2>Filter Order Requests</h2>

            <form class="report-form" method="POST" action="index.php?page=filter_order_requests">
                <input type="date" name="start_date" required>
                <input type="date" name="end_date" required>
                <input type="submit" value="Filter Requests">
            </form>

            <?php if (!empty($requests)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Requested By</th>
                            <th>Branch</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requests as $req): ?>
                            <tr>
                                <td>REQ<?= htmlspecialchars($req['id']) ?></td>
                                <td><?= htmlspecialchars($req['requester_name']) ?> <br><small><?= htmlspecialchars($req['email']) ?></small></td>
                                <td><?= htmlspecialchars($req['branch_name']) ?></td>
                                <td><?= htmlspecialchars($req['product_name']) ?></td>
                                <td><?= htmlspecialchars($req['quantity']) ?></td>
                                <td><?= htmlspecialchars($req['request_at']) ?></td>
                                <td><?= htmlspecialchars($req['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <p>No order requests found for the selected date range.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>
