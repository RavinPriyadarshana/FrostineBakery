<h2>Stock Report</h2>
<form method="POST" action="index.php?page=admin&action=updateStock">
  <table>
    <tr><th>Item</th><th>Quantity</th></tr>
    <?php foreach ($stocks as $stock): ?>
      <tr>
        <td><?= $stock['item'] ?></td>
        <td><input type="number" name="stock[<?= $stock['item'] ?>]" value="<?= $stock['quantity'] ?>"></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button type="submit">Update</button>
</form>
