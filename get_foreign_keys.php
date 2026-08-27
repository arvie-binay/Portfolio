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
        
        $stmt = $pdo->prepare("
            SELECT CONSTRAINT_NAME
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ?
            AND TABLE_NAME = ?
            AND REFERENCED_TABLE_NAME IS NOT NULL
        ");
        $stmt->execute([$dbName, $tableName]);
        $foreignKeys = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        echo '<option value="">Select a constraint...</option>';
        foreach ($foreignKeys as $fk) {
            echo '<option value="' . htmlspecialchars($fk) . '">' . htmlspecialchars($fk) . '</option>';
        }
    }
} catch(PDOException $e) {
    echo '<option value="">Error loading constraints</option>';
}
?>
