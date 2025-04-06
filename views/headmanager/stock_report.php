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

            <!-- Hardcoded sample results table -->
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
                    <tr>
                        <td>2025-04-01</td>
                        <td>Chocolate Bread</td>
                        <td>40</td>
                        <td>LKR 8,000</td>
                    </tr>
                    <tr>
                        <td>2025-04-02</td>
                        <td>Banana Muffins</td>
                        <td>25</td>
                        <td>LKR 5,000</td>
                    </tr>
                    <tr>
                        <td>2025-04-03</td>
                        <td>Butter Croissants</td>
                        <td>35</td>
                        <td>LKR 7,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>
