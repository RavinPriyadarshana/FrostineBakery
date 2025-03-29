<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/footer.css">
    <meta charset="UTF-8">
    <title>Login - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>
<body class="auth-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="auth-container">
            <h2>Login to Frostine Bakery</h2>
            <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST" action="index.php?page=login">
                <label for="username">Email</label>
                <input type="text" name="username" id="username" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>

                <input type="submit" value="Login">
            </form>
            <p>Don't have an account? <a href="index.php?page=register">Register here</a></p>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>
</html>
