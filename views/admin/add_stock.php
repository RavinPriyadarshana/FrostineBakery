<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Stock - Frostine Bakery</title>
  <link rel="stylesheet" href="assets/css/order_items.css">
</head>
<body>
  <?php include 'views/includes/header.php'; ?>

  <main>
    <div class="form-container">
      <h2>Add Stock for Product</h2>
      <form method="POST" action="index.php?page=save-stock">
        <label for="branch_id">Branch</label>
        <select name="branch_id" required>
          <option value="">Select Branch</option>
          <?php foreach ($branches as $branch): ?>
            <option value="<?= $branch['id'] ?>"><?= $branch['name'] ?></option>
          <?php endforeach; ?>
        </select>

        <label for="product_id">Product</label>
        <select name="product_id" required>
          <option value="">Select Product</option>
          <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
          <?php endforeach; ?>
        </select>

        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" placeholder="Quantity" required min="1">

        <button type="submit">Add Stock</button>
      </form>
    </div>
  </main>

  <?php include 'views/includes/footer.php'; ?>
</body>
</html>
