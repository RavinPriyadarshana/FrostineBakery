<!-- views/branch_manager/customer_list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer List</title>
</head>
<body>
    <h2>Customers</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $customer['id'] ?></td>
                <td><?= $customer['name'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td>
                    <a href="index.php?page=view-customer-orders&id=<?= $customer['id'] ?>">View Orders</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
