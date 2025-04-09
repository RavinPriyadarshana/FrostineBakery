<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/footer.css">
    <meta charset="UTF-8">
    <title>Contact - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/contact_us.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="auth-page">
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="auth-container">
            <h2>Contact with Frostine Bakery</h2>
            <?php if (isset($_GET['success'])): ?>
                <p class="success-message">Thank you for your message! We'll get back to you soon.</p>
            <?php endif; ?>

            <form method="POST" action="index.php?page=contact_us">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" required>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>

                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" pattern="[0-9]{10}" required>

                <label for="message">Message</label>
                <textarea name="message" id="message" cols="20" rows="10" required></textarea>

                <input type="submit" value="Submit">
            </form>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>