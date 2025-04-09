<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Users - Frostine Bakery</title>
  <link rel="stylesheet" href="assets/css/footer.css">
  <link rel="stylesheet" href="assets/css/order_items.css">
  <link rel="icon" href="assets/images/logo.jpg">
</head>

<body class="users-page">
  <?php include 'views/includes/header.php'; ?>

  <main>
    <div class="user-container">
      <h2><?php echo $topic; ?></h2>
      <?php
      if ($topic == "Employees") {
      ?>
        <a href="index.php?page=add-employee" class="btn">Add New Employee</a>
      <?php
      }
      ?>
      <?php
      if (isset($employees)) {
        if ($employees != null) {
      ?>
          <table>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Actions</th>
            </tr>
            <?php

            foreach ($employees as $employee): ?>
              <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['name'] ?></td>
                <td><?= $employee['email'] ?></td>
                <td><?= $employee['role'] ?></td>
                <td>
                  <a href="index.php?page=edit-employee&id=<?= $employee['id'] ?>">Edit</a>
                  <a href="index.php?page=delete-employee&id=<?= $employee['id'] ?>" onclick="return confirm('Delete this employee?')">Delete</a>
                </td>
              </tr>
        <?php endforeach;
          }
        } ?>

          </table>

          <?php
          if (isset($customers)) {
            if ($customers != null) {
          ?>
              <table>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
                <?php
                foreach ($customers as $customer): ?>
                  <tr>
                    <td><?= $customer['id'] ?></td>
                    <td><?= $customer['name'] ?></td>
                    <td><?= $customer['email'] ?></td>
                    <td>
                      <a href="index.php?page=edit-customer&id=<?= $customer['id'] ?>">Edit</a>
                      <a href="index.php?page=delete-customer&id=<?= $customer['id'] ?>" onclick="return confirm('Delete this customer?')">Delete</a>
                      </td>
                  </tr>
            <?php endforeach;
              }
            } ?>

              </table>

    </div>
  </main>


  <?php include 'views/includes/footer.php'; ?>
</body>

</html>