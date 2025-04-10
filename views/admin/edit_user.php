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
            <h2>Edit Employee</h2>
            <form method="POST" action="index.php?page=update-employee">
                <input type="hidden" name="id" value="<?= $employee['id'] ?>">

                <input type="text" name="name" placeholder="Full Name" value="<?= $employee['name'] ?>" required>
                <input type="text" name="username" placeholder="Username" value="<?= $employee['username'] ?>" required>
                <input type="email" name="email" placeholder="Email" value="<?= $employee['email'] ?>" required>
                <input type="text" name="phone" placeholder="Phone" value="<?= $employee['phone'] ?>" required>
                <input type="text" name="role" placeholder="Role" value="<?= $employee['role'] ?>" required>
                <input type="number" name="branch_id" placeholder="Branch ID" value="<?= $employee['branch_id'] ?>" required>

                <button type="submit">Update Employee</button>
            </form>
        </div>
    </main>




    <?php include 'views/includes/footer.php'; ?>
</body>

</html>