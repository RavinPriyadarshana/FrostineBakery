<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stock Report - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/stock_report.css">
    <link rel="icon" href="assets/images/logo.jpg">

<body class="report-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="report-container">
            <h2>Stock Report</h2>

            <form class="report-form" method="POST" action="">
                <input type="date" name="start_date" required>
                <input type="date" name="end_date" required>
                <input type="submit" value="Generate Report">
            </form>

            <?php if (!empty($stocks)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stocks as $stock): ?>
                            <tr>
                                <td><?= htmlspecialchars($stock['stock_date']) ?></td>
                                <td><?= htmlspecialchars($stock['product_name']) ?></td>
                                <td><?= htmlspecialchars($stock['quantity']) ?></td>
                                <td>LKR <?= number_format($stock['quantity'] * $stock['price'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <p>No stock records found for the selected date range.</p>
            <?php endif; ?>

        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>