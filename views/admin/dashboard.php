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
                <h3>View Profile</h3>
                <p>View and manage your admin profile.</p>
                <a href="index.php?page=admin_profile">My Profile</a>
            </div>

            <div class="card">
                <h3>User Profile Management</h3>
                <p>Update your user account details.</p>
                <a href="index.php?page=user_profile">Update Profile</a>
            </div>

            <div class="card">
                <h3>Employee Management</h3>
                <p>Manage employee records (add/edit/delete).</p>
                <a href="index.php?page=employee-list">Manage Employees</a>
            </div>

            <div class="card">
                <h3>Customer Management</h3>
                <p>Manage customer records (add/edit/delete).</p>
                <a href="index.php?page=customer-list">Manage Customers</a>
            </div>

            <div class="card">
                <h3>Stock Report</h3>
                <p>Monitor and update stock levels.</p>
                <a href="index.php?page=stock_reports">Stock Report</a>
            </div>

            <div class="card">
                <h3>Update Stock</h3>
                <p>Manually update available stock quantities.</p>
                <a href="index.php?page=stock-list">Update Stock</a>
            </div>

            <div class="card">
                <h3>Sales Reports</h3>
                <p>Analyze overall sales performance.</p>
                <a href="index.php?page=sales_reports">Sales Report</a>
            </div>

            <div class="card">
                <h3>Order Items</h3>
                <p>Check ordered items and statuses.</p>
                <a href="index.php?page=order_items">View Orders</a>
            </div>

            <div class="card">
                <h3>Customer Requests</h3>
                <p>Respond to customer messages and requests.</p>
                <a href="index.php?page=customer_requests">View Requests</a>
            </div>

        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>

</body>

</html>