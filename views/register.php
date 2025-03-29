<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/footer.css">
    <meta charset="UTF-8">
    <title>Register - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>
<body class="auth-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="auth-container">
            <h2>Register to Frostine Bakery</h2>
            <form method="POST" action="index.php?page=register">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" id="fullname" placeholder="Enter your full name" required>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>

                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" pattern="[0-9]{10}" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>

                <label for="branch">Select Branch</label>
                <select name="branch" id="branch" required>
                    <option value="">-- Select Branch --</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Horana">Horana</option>
                    <option value="Galle">Galle</option>
                </select>

                <input type="submit" value="Register">
            </form>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>
</html>
