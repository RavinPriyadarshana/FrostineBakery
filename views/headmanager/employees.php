<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employees - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/employees.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="employee-container">
            <h2>Employees</h2>

            <table>
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>REQ101</td>
                        <td>Amasha Vidumani</td>
                        <td>amasha@example.com</td>
                        <td>I need a custom cake for a birthday.</td>
                        <td>2025-04-01</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>REQ102</td>
                        <td>Kavindu Nimesh</td>
                        <td>kavindu@example.com</td>
                        <td>Do you deliver outside Colombo?</td>
                        <td>2025-04-02</td>
                        <td>Responded</td>
                    </tr>
                    <tr>
                        <td>REQ103</td>
                        <td>Sachini Perera</td>
                        <td>sachini@example.com</td>
                        <td>Can I get gluten-free cupcakes?</td>
                        <td>2025-04-03</td>
                        <td>Resolved</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>