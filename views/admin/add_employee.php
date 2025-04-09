<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/order_items.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
            <h2>Add Employee</h2>
            <form method="POST" action="index.php?page=save-employee">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="role" placeholder="Role" required>
                <input type="number" name="branch_id" placeholder="Branch ID" required>
                <button type="submit">Add Employee</button>
            </form>
        </div>
    </main>



    <?php include 'views/includes/footer.php'; ?>
</body>

</html>