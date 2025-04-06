<h2>Admin Login</h2>
<?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
<form method="POST" action="index.php?page=admin&action=login">
  <label for="email">Email</label>
  <input type="text" name="email" placeholder="Email" required>
  
  <label for="password">Password</label>
  <input type="password" name="password" placeholder="Password" required>
  
  <button type="submit">Login</button>
</form>
