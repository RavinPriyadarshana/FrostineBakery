<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/employees.css">
    <link rel="icon" href="assets/images/logo.jpg">
    <style>
        .table-responsive {
            overflow-x: auto;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="employee-container">
            <h2>Employees</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Emp Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $emp): ?>
                            <tr>
                                <td><?= 'EMP' . str_pad($emp['id'], 3, '0', STR_PAD_LEFT) ?></td>
                                <td><?= htmlspecialchars($emp['name']) ?></td>
                                <td><?= htmlspecialchars($emp['email']) ?></td>
                                <td><?= htmlspecialchars($emp['phone']) ?></td>
                                <td>Active</td> <!-- You can customize this status as needed -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>