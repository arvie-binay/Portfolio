<?php
// Database configuration
$host = 'localhost';
$dbname = 'businessco';
$username = 'root'; // Default XAMPP username
$password = '';     // Default XAMPP password (empty)

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>