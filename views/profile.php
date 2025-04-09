<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/footer.css">
    <meta charset="UTF-8">
    <title>Register - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="auth-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="auth-container">
            <h2>Profile - Frostine Bakery</h2>
            <form method="POST" action="index.php?page=update-profile">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" id="fullname" value="<?= htmlspecialchars($user['name']) ?>" required>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>

                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" value="<?= htmlspecialchars($user['phone']) ?>" pattern="[0-9]{10}" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter a new password (optional)">

                <label for="branch_id">Branch</label>
                <select name="branch_id" id="branch_id" required>
                    <?php foreach ($branches as $branch): ?>
                        <option value="<?= $branch['id'] ?>" <?= $branch['id'] == $user['branch_id'] ? 'selected' : '' ?>><?= htmlspecialchars($branch['name']) ?> (<?= htmlspecialchars($branch['location']) ?>)</option>
                    <?php endforeach; ?>
                </select>

                <input type="submit" value="Update Profile">
            </form>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>