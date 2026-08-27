<?php
require 'db_config.php';

echo "<h1>Database Test</h1>";

try {
    // Get all users
    $stmt = $pdo->query("SELECT * FROM credentials");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) > 0) {
        echo "<h2>Users in Database:</h2>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>CredentialID</th><th>FullName</th><th>Email</th><th>Password (hashed)</th></tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['CredentialID']) . "</td>";
            echo "<td>" . htmlspecialchars($user['FullName']) . "</td>";
            echo "<td>" . htmlspecialchars($user['Email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['Password']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>Quick Test:</h2>";
        echo "<p>Make sure your password in the database starts with <code>\$2y\$</code> (or similar) - that means it's hashed!</p>";
        echo "<p>If it's a plain text password, delete that user and sign up again via the signup.php page!</p>";
    } else {
        echo "<p>No users found in the database. Please sign up via signup.php!</p>";
    }

} catch (PDOException $e) {
    echo "<p style='color: red;'>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>