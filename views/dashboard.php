<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION["user"];
echo "<h2>Welcome, " . $user["name"] . "</h2>";
echo "<p>Role: " . $user["role"] . "</p>";
echo '<a href="index.php?action=logout">Logout</a>';
?>
