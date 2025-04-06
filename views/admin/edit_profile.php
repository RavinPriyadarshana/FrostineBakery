<h2>Edit Profile</h2>
<form method="POST">
  <input type="text" name="name" value="Admin">
  <input type="email" name="email" value="admin@gmail.com">
  <button type="submit">Update</button>
</form>
<?php if ($success) echo "<p>Profile updated!</p>"; ?>
