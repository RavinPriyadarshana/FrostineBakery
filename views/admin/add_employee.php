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
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <h2>Add Employee</h2>
            <form method="POST" action="index.php?page=save-employee">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="role" placeholder="Role" required>

                <select name="branch_id" required>
                    <option value="">Select Branch</option>
                    <?php foreach ($branches as $branch): ?>
                        <option value="<?= htmlspecialchars($branch['id']) ?>">
                            <?= htmlspecialchars($branch['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" class="add-button">Add Employee</button>
            </form>
        </div>
    </main>



    <?php include 'views/includes/footer.php'; ?>
</body>

</html>