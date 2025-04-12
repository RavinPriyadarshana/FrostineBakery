<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Add Product - Frostine Bakery</title>
  <link rel="stylesheet" href="assets/css/order_items.css">
</head>

<body>
  <?php include 'views/includes/header.php'; ?>

  <main>
    <div class="order-container">
      <h2>Add New Product</h2>
      <form method="POST" action="index.php?page=save-product" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="number" name="price" placeholder="Price" required>
        <input type="text" name="category" placeholder="Category" required>
        <input type="file" name="image" required>
        <button type="submit" class="blue-btn">Add Product</button>
      </form>
    </div>
  </main>

  <?php include 'views/includes/footer.php'; ?>
</body>

</html>