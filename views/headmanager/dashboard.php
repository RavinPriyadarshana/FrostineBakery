<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/footer.css">
    <meta charset="UTF-8">
    <title>Dashboard - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="dashboard-container">
            <div class="card">
                <h3>Sales Reports</h3>
                <p>View overall sales performance.</p>
                <a href="index.php?page=sales_reports">View Report</a>
            </div>
            <div class="card">
                <h3>Stock Reports</h3>
                <p>Monitor bakery inventory and stock levels.</p>
                <a href="index.php?page=stock_reports">View Stock</a>
            </div>
            <div class="card">
                <h3>Order Items</h3>
                <p>Check order details and items ordered.</p>
                <a href="index.php?page=order_items">View Orders</a>
            </div>
            <div class="card">
                <h3>Employee Management</h3>
                <p>Manage employee accounts and roles.</p>
                <a href="index.php?page=employees">Manage</a>
            </div>
            <div class="card">
                <h3>Customer Requests</h3>
                <p>Review and respond to customer queries.</p>
                <a href="index.php?page=customer_requests">View Requests</a>
            </div>
            <div class="card">
                <h3>User Profile</h3>
                <p>View or update your profile details.</p>
                <a href="index.php?page=profile">Profile</a>
            </div>

            <?php
            if (isset($_SESSION['user_role'])) {
                if ($_SESSION['user_role'] == 'BranchManager') {
            ?>
                    <div class="card">
                        <h3>Request Orders</h3>
                        <p>Request Orders.</p>
                        <a href="index.php?page=branch-manager-orders">Request</a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>

</body>

</html>