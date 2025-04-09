<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sales Report - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/sales_report.css">
    <link rel="icon" href="assets/images/logo.jpg">

<body class="report-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="report-container">
            <h2>Sales Report</h2>

            <form class="report-form" method="POST" action="">
                <input type="date" name="start_date" required>
                <input type="date" name="end_date" required>
                <input type="submit" value="Generate Report">
            </form>

            <?php if (!empty($sales)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Quantity Sold</th>
                            <th>Total Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sales as $sale): ?>
                            <tr>
                                <td><?= htmlspecialchars($sale['order_date']) ?></td>
                                <td><?= htmlspecialchars($sale['item_name']) ?></td>
                                <td><?= htmlspecialchars($sale['quantity']) ?></td>
                                <td>LKR <?= number_format($sale['quantity'] * $sale['price'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <p>No sales found for the selected date range.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>