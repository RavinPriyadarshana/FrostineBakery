<!-- views/branch_manager/cashier_list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cashier List</title>
</head>
<body>
    <h2>Cashiers</h2>
    <a href="index.php?page=add-cashier" class="btn">Add Cashier</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($cashiers as $cashier): ?>
            <tr>
                <td><?= $cashier['id'] ?></td>
                <td><?= $cashier['name'] ?></td>
                <td><?= $cashier['email'] ?></td>
                <td>
                    <a href="index.php?page=view-cashier&id=<?= $cashier['id'] ?>">View</a>
                    <a href="index.php?page=edit-cashier&id=<?= $cashier['id'] ?>">Edit</a>
                    <a href="index.php?page=delete-cashier&id=<?= $cashier['id'] ?>" onclick="return confirm('Delete this cashier?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
