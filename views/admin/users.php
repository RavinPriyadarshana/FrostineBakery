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
    <div class="user-container">
      <h2>All Users</h2>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
        <!-- <?php foreach ($users as $user): ?>
          <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
              <a href="index.php?page=admin&action=editUser&id=<?= $user['id'] ?>">Edit</a>
              <a href="index.php?page=admin&action=deleteUser&id=<?= $user['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?> -->
      </table>

    </div>
  </main>

  <?php include 'views/includes/footer.php'; ?>
</body>

</html>