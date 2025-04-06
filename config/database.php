<?php
$host = 'localhost';
$port = '3307';
$dbname = 'frostinebakery';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host; port=$port; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
