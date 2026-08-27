<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['db']) && !empty($_GET['db'])) {
        $dbName = $_GET['db'];
        $pdo->exec("USE `$dbName`");
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        echo '<option value="">Select a table...</option>';
        foreach ($tables as $table) {
            echo '<option value="' . htmlspecialchars($table) . '">' . htmlspecialchars($table) . '</option>';
        }
    }
} catch(PDOException $e) {
    echo '<option value="">Error loading tables</option>';
}
?>
