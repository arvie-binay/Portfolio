<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['db']) && !empty($_GET['db']) && isset($_GET['table']) && !empty($_GET['table'])) {
        $dbName = $_GET['db'];
        $tableName = $_GET['table'];
        $pdo->exec("USE `$dbName`");
        $stmt = $pdo->query("SHOW COLUMNS FROM `$tableName`");
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo '<option value="">Select a column...</option>';
        foreach ($columns as $column) {
            echo '<option value="' . htmlspecialchars($column['Field']) . '">' . htmlspecialchars($column['Field']) . '</option>';
        }
    }
} catch(PDOException $e) {
    echo '<option value="">Error loading columns</option>';
}
?>
