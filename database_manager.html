<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

// Database connection without selecting a specific database initially
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$message = '';
$messageType = '';

// Check for flash messages
if (isset($_SESSION['db_manager_message'])) {
    $message = $_SESSION['db_manager_message'];
    $messageType = $_SESSION['db_manager_message_type'];
    unset($_SESSION['db_manager_message']);
    unset($_SESSION['db_manager_message_type']);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create database
    if (isset($_POST['create_db'])) {
        $dbName = trim($_POST['db_name']);
        if (!empty($dbName)) {
            try {
                // Check if database already exists
                $stmt = $pdo->query("SHOW DATABASES LIKE '$dbName'");
                if ($stmt->rowCount() > 0) {
                    $_SESSION['db_manager_message'] = "Error: Database '$dbName' already exists!";
                    $_SESSION['db_manager_message_type'] = 'error';
                } else {
                    $pdo->exec("CREATE DATABASE `$dbName`");
                    $_SESSION['db_manager_message'] = "Database '$dbName' created successfully!";
                    $_SESSION['db_manager_message_type'] = 'success';
                }
            } catch (PDOException $e) {
                $_SESSION['db_manager_message'] = "Error creating database: " . $e->getMessage();
                $_SESSION['db_manager_message_type'] = 'error';
            }
        }
        // Redirect to prevent resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Drop database
    if (isset($_POST['drop_db'])) {
        $dbName = trim($_POST['drop_db_name']);
        if (!empty($dbName)) {
            try {
                // Check if database exists
                $stmt = $pdo->query("SHOW DATABASES LIKE '$dbName'");
                if ($stmt->rowCount() === 0) {
                    $_SESSION['db_manager_message'] = "Error: Database '$dbName' doesn't exist!";
                    $_SESSION['db_manager_message_type'] = 'error';
                } else {
                    $pdo->exec("DROP DATABASE `$dbName`");
                    $_SESSION['db_manager_message'] = "Database '$dbName' dropped successfully!";
                    $_SESSION['db_manager_message_type'] = 'success';
                }
            } catch (PDOException $e) {
                $_SESSION['db_manager_message'] = "Error dropping database: " . $e->getMessage();
                $_SESSION['db_manager_message_type'] = 'error';
            }
        }
        // Redirect to prevent resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Create table
    if (isset($_POST['create_table'])) {
        $dbName = trim($_POST['table_db']);
        $tableName = trim($_POST['table_name']);
        $columns = $_POST['columns'];
        
        if (!empty($dbName) && !empty($tableName) && !empty($columns)) {
            try {
                $pdo->exec("USE `$dbName`");
                // Check if table already exists
                $stmt = $pdo->query("SHOW TABLES LIKE '$tableName'");
                if ($stmt->rowCount() > 0) {
                    $_SESSION['db_manager_message'] = "Error: Table '$tableName' already exists in database '$dbName'!";
                    $_SESSION['db_manager_message_type'] = 'error';
                } else {
                    $sqlColumns = [];
                    foreach ($columns as $col) {
                        $colName = trim($col['name']);
                        $colType = trim($col['type']);
                        if (!empty($colName) && !empty($colType)) {
                            $colDef = "`$colName` $colType";
                            if (isset($col['primary']) && $col['primary'] === 'on') {
                                $colDef .= " PRIMARY KEY AUTO_INCREMENT";
                            }
                            $sqlColumns[] = $colDef;
                        }
                    }
                    if (!empty($sqlColumns)) {
                        $sql = "CREATE TABLE `$tableName` (" . implode(", ", $sqlColumns) . ") ENGINE=InnoDB DEFAULT CHARSET=utf8";
                        $pdo->exec($sql);
                        $_SESSION['db_manager_message'] = "Table '$tableName' created successfully in database '$dbName'!";
                        $_SESSION['db_manager_message_type'] = 'success';
                    }
                }
            } catch (PDOException $e) {
                $_SESSION['db_manager_message'] = "Error creating table: " . $e->getMessage();
                $_SESSION['db_manager_message_type'] = 'error';
            }
        }
        // Redirect to prevent resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Drop table
    if (isset($_POST['drop_table'])) {
        $dbName = trim($_POST['drop_table_db']);
        $tableName = trim($_POST['drop_table_name']);
        
        if (!empty($dbName) && !empty($tableName)) {
            try {
                $pdo->exec("USE `$dbName`");
                // Check if table exists
                $stmt = $pdo->query("SHOW TABLES LIKE '$tableName'");
                if ($stmt->rowCount() === 0) {
                    $_SESSION['db_manager_message'] = "Error: Table '$tableName' doesn't exist in database '$dbName'!";
                    $_SESSION['db_manager_message_type'] = 'error';
                } else {
                    $pdo->exec("DROP TABLE `$tableName`");
                    $_SESSION['db_manager_message'] = "Table '$tableName' dropped successfully from database '$dbName'!";
                    $_SESSION['db_manager_message_type'] = 'success';
                }
            } catch (PDOException $e) {
                $_SESSION['db_manager_message'] = "Error dropping table: " . $e->getMessage();
                $_SESSION['db_manager_message_type'] = 'error';
            }
        }
        // Redirect to prevent resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Add Foreign Key
    if (isset($_POST['add_foreign_key'])) {
        $dbName = trim($_POST['fk_db']);
        $tableName = trim($_POST['fk_table']);
        $constraintName = trim($_POST['fk_constraint_name']);
        $columnName = trim($_POST['fk_column']);
        $refTableName = trim($_POST['fk_referenced_table']);
        $refColumnName = trim($_POST['fk_referenced_column']);
        $onDelete = trim($_POST['fk_on_delete']);
        $onUpdate = trim($_POST['fk_on_update']);
        
        if (!empty($dbName) && !empty($tableName) && !empty($columnName) && !empty($refTableName) && !empty($refColumnName)) {
            try {
                $pdo->exec("USE `$dbName`");
                // Build the ALTER TABLE query
                $sql = "ALTER TABLE `$tableName` ADD ";
                if (!empty($constraintName)) {
                    $sql .= "CONSTRAINT `$constraintName` ";
                }
                $sql .= "FOREIGN KEY (`$columnName`) REFERENCES `$refTableName` (`$refColumnName`)";
                if (!empty($onDelete)) {
                    $sql .= " ON DELETE $onDelete";
                }
                if (!empty($onUpdate)) {
                    $sql .= " ON UPDATE $onUpdate";
                }
                $pdo->exec($sql);
                $_SESSION['db_manager_message'] = "Foreign key added successfully to table '$tableName'!";
                $_SESSION['db_manager_message_type'] = 'success';
            } catch (PDOException $e) {
                $_SESSION['db_manager_message'] = "Error adding foreign key: " . $e->getMessage();
                $_SESSION['db_manager_message_type'] = 'error';
            }
        }
        // Redirect to prevent resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Drop Foreign Key
    if (isset($_POST['drop_foreign_key'])) {
        $dbName = trim($_POST['drop_fk_db']);
        $tableName = trim($_POST['drop_fk_table']);
        $constraintName = trim($_POST['drop_fk_constraint']);
        
        if (!empty($dbName) && !empty($tableName) && !empty($constraintName)) {
            try {
                $pdo->exec("USE `$dbName`");
                $pdo->exec("ALTER TABLE `$tableName` DROP FOREIGN KEY `$constraintName`");
                $_SESSION['db_manager_message'] = "Foreign key constraint '$constraintName' dropped successfully from table '$tableName'!";
                $_SESSION['db_manager_message_type'] = 'success';
            } catch (PDOException $e) {
                $_SESSION['db_manager_message'] = "Error dropping foreign key: " . $e->getMessage();
                $_SESSION['db_manager_message_type'] = 'error';
            }
        }
        // Redirect to prevent resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Get list of databases
$databases = [];
try {
    $stmt = $pdo->query("SHOW DATABASES");
    $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);
    // Filter out system databases
    $systemDbs = ['information_schema', 'mysql', 'performance_schema', 'phpmyadmin', 'test'];
    $databases = array_filter($databases, function($db) use ($systemDbs) {
        return !in_array(strtolower($db), $systemDbs);
    });
} catch (PDOException $e) {
    $message = "Error fetching databases: " . $e->getMessage();
    $messageType = 'error';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Database Manager - Ayzen's Coffee</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .db-manager-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.5rem;
        }
        .card {
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-radius: 0.75rem;
            overflow: hidden;
        }
        .card-header {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            background-color: var(--bg-card);
        }
        .card-body {
            padding: 1.25rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.9375rem;
        }
        .form-control {
            width: 100%;
            padding: 0.6875rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 0.9375rem;
            background-color: var(--bg-card);
            color: var(--text-primary);
            transition: all 0.2s ease;
        }
.form-control:focus {
            outline: none;
            border-color: #777777;
            box-shadow: 0 0 0 3px rgba(100, 100, 100, 0.1);
        }
        .btn {
            padding: 0.6875rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            font-size: 0.9375rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, #666666 0%, #444444 100%);
            color: white;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #555555 0%, #333333 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(100, 100, 100, 0.3);
        }
        .btn-danger {
            background: linear-gradient(135deg, #777777 0%, #555555 100%);
            color: white;
        }
        .btn-danger:hover {
            background: linear-gradient(135deg, #555555 0%, #333333 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(100, 100, 100, 0.3);
        }
        .btn-success {
            background: linear-gradient(135deg, #777777 0%, #555555 100%);
            color: white;
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #555555 0%, #333333 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(100, 100, 100, 0.3);
        }
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        .alert-success {
            background-color: #e0e0e0;
            color: #333333;
            border: 1px solid #cccccc;
        }
        .alert-error {
            background-color: #d0d0d0;
            color: #111111;
            border: 1px solid #999999;
        }
        .db-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .db-item {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .db-item:last-child {
            border-bottom: none;
        }
        .db-name {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 1rem;
        }
        .column-row {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            padding: 0.875rem;
            background-color: var(--bg-main);
            border-radius: 0.5rem;
            align-items: center;
        }
        .column-row > * {
            flex: 1;
        }
        .column-row .btn-remove {
            flex: 0 0 auto;
        }
        .column-row label {
            margin-bottom: 0;
        }
        .table-list {
            margin-top: 0.5rem;
            padding-left: 1.5rem;
        }
        .table-item {
            padding: 0.25rem 0;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        .section-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }
        .db-manager-container .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            margin-right: 0;
            margin-left: 0;
        }
        .db-manager-container .row > [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
            flex: 1 1 calc(50% - 0.75rem);
            min-width: 0;
        }
        @media (max-width: 991px) {
            .db-manager-container .row > [class*="col-"] {
                flex: 1 1 100%;
            }
        }
        /* Custom search box styles for database manager */
        #db-search-wrapper {
            margin: 0;
            max-width: 400px;
        }
        /* Make all form cards have consistent height */
        /* Keep Create New Table same height behavior as Drop Table */
        #createDatabaseForm,
        #dropDatabaseForm {
            height: 150px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        #createTableForm,
        #dropTableForm,
        #addForeignKeyForm,
        #dropForeignKeyForm {
            height: 400px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }


        /* Custom scrollbar for better appearance */
        #createDatabaseForm::-webkit-scrollbar,
        #dropDatabaseForm::-webkit-scrollbar,
        #createTableForm::-webkit-scrollbar,
        #dropTableForm::-webkit-scrollbar,
        #addForeignKeyForm::-webkit-scrollbar,
        #dropForeignKeyForm::-webkit-scrollbar {
            width: 6px;
        }
        #createDatabaseForm::-webkit-scrollbar-track,
        #dropDatabaseForm::-webkit-scrollbar-track,
        #createTableForm::-webkit-scrollbar-track,
        #dropTableForm::-webkit-scrollbar-track,
        #addForeignKeyForm::-webkit-scrollbar-track,
        #dropForeignKeyForm::-webkit-scrollbar-track {
            background: var(--bg-main);
            border-radius: 3px;
        }
        #createDatabaseForm::-webkit-scrollbar-thumb,
        #dropDatabaseForm::-webkit-scrollbar-thumb,
        #createTableForm::-webkit-scrollbar-thumb,
        #dropTableForm::-webkit-scrollbar-thumb,
        #addForeignKeyForm::-webkit-scrollbar-thumb,
        #dropForeignKeyForm::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 3px;
        }
        #createDatabaseForm::-webkit-scrollbar-thumb:hover,
        #dropDatabaseForm::-webkit-scrollbar-thumb:hover,
        #createTableForm::-webkit-scrollbar-thumb:hover,
        #dropTableForm::-webkit-scrollbar-thumb:hover,
        #addForeignKeyForm::-webkit-scrollbar-thumb:hover,
        #dropForeignKeyForm::-webkit-scrollbar-thumb:hover {
            background: #999;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <script>
        // Backup: Apply dark mode immediately to body
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark-mode');
                document.body.classList.add('dark-mode');
            }
        })();
    </script>
    <div class="wrapper">
        <!-- Top Navigation Bar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link search-toggle" href="#" role="button">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a>
                </li>
                <li class="nav-item search-box-wrapper">
                    <div class="search-box">
                        <input type="text" class="search-input" placeholder="Search...">
                        <div class="search-results"></div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <button class="nav-link theme-toggle-btn" id="themeToggleBtn" aria-label="Toggle Dark Mode">
                        <svg class="theme-icon sun-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                        <svg class="theme-icon moon-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                    </button>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <div class="dropdown-menu" id="userDropdownMenu">
                        <div class="dropdown-user-info">
                            <div class="user-avatar-dropdown">
                                <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
                            </div>
                            <div class="user-name-dropdown">
                                <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                            </div>
                        </div>
                        <button class="dropdown-item" id="logoutTriggerBtn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            Logout
                        </button>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="dashboard.php" class="brand-link">
                <span class="brand-logo">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="36" height="36" rx="8" fill="url(#brand-gradient)"></rect>
                        <path d="M10 26V10H18C21.3137 10 24 12.6863 24 16C24 19.3137 21.3137 22 18 22H14V26H10ZM14 14H18C19.1046 14 20 14.8954 20 16C20 17.1046 19.1046 18 18 18H14V14Z" fill="white"></path>
                        <defs>
                            <linearGradient id="brand-gradient" x1="0" y1="0" x2="36" y2="36" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#666666"></stop>
                                <stop offset="1" stop-color="#444444"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
<span class="brand-text font-weight-light">Ayzen's Coffee</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <div class="user-avatar">
                            <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
                        </div>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                </svg>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="excel.php" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="9" y1="3" x2="9" y2="21"></line>
                                    <line x1="15" y1="3" x2="15" y2="21"></line>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="3" y1="15" x2="21" y2="15"></line>
                                </svg>
                                <p>Excel UI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="widgets.php" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="9" y1="3" x2="9" y2="21"></line>
                                </svg>
                                <p>Widgets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="database_manager.php" class="nav-link active">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                    <path d="M4 6v6c0 1.657 3.582 3 8 3s8-1.343 8-3V6"></path>
                                    <path d="M4 12v6c0 1.657 3.582 3 8 3s8-1.343 8-3v-6"></path>
                                </svg>
                                <p>Database Manager</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Database Manager</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="db-manager-container">
                    <?php if ($message): ?>
                        <div class="alert alert-<?php echo $messageType; ?>">
                            <?php echo htmlspecialchars($message); ?>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <!-- Create Database -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Create New Database</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="createDatabaseForm">
                                        <div class="form-group">
                                            <label for="db_name">Database Name</label>
                                            <input type="text" id="db_name" name="db_name" class="form-control" placeholder="Enter database name" required>
                                        </div>
                                        <button type="submit" name="create_db" class="btn btn-primary">Create Database</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Drop Database -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Drop Database</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="dropDatabaseForm">
                                        <div class="form-group">
                                            <label for="drop_db_name">Select Database</label>
                                            <select id="drop_db_name" name="drop_db_name" class="form-control" required>
                                                <option value="">Select a database...</option>
                                                <?php foreach ($databases as $db): ?>
                                                    <option value="<?php echo htmlspecialchars($db); ?>"><?php echo htmlspecialchars($db); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button type="submit" name="drop_db" class="btn btn-danger" onclick="return confirm('Are you sure you want to drop this database? This action cannot be undone!');">Drop Database</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <!-- Create Table -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Create New Table</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="createTableForm">
                                        <div class="form-group">
                                            <label for="table_db">Select Database</label>
                                            <select id="table_db" name="table_db" class="form-control" required>
                                                <option value="">Select a database...</option>
                                                <?php foreach ($databases as $db): ?>
                                                    <option value="<?php echo htmlspecialchars($db); ?>"><?php echo htmlspecialchars($db); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="table_name">Table Name</label>
                                            <input type="text" id="table_name" name="table_name" class="form-control" placeholder="Enter table name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Columns</label>
                                            <div id="columnsContainer">
                                                <div class="column-row">
                                                    <input type="text" name="columns[0][name]" class="form-control" placeholder="Column name" required>
                                                    <select name="columns[0][type]" class="form-control" required>
                                                        <option value="">Select type</option>
                                                        <option value="INT">INT</option>
                                                        <option value="VARCHAR(255)">VARCHAR(255)</option>
                                                        <option value="TEXT">TEXT</option>
                                                        <option value="DATE">DATE</option>
                                                        <option value="DATETIME">DATETIME</option>
                                                        <option value="DECIMAL(10,2)">DECIMAL(10,2)</option>
                                                        <option value="TINYBLOB">TINYBLOB</option>
                                                        <option value="BLOB">BLOB</option>
                                                        <option value="MEDIUMBLOB">MEDIUMBLOB</option>
                                                        <option value="LONGBLOB">LONGBLOB</option>
                                                    </select>
                                                    <label style="display: flex; align-items: center; gap: 0.5rem;">
                                                        <input type="checkbox" name="columns[0][primary]">
                                                        <span style="font-weight: normal;">Primary</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="button" id="addColumnBtn" class="btn btn-success btn-sm mt-2">Add Column</button>
                                        </div>
                                        <button type="submit" name="create_table" class="btn btn-primary">Create Table</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Drop Table -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Drop Table</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="dropTableForm">
                                        <div class="form-group">
                                            <label for="drop_table_db">Select Database</label>
                                            <select id="drop_table_db" name="drop_table_db" class="form-control" required onchange="loadTables(this.value)">
                                                <option value="">Select a database...</option>
                                                <?php foreach ($databases as $db): ?>
                                                    <option value="<?php echo htmlspecialchars($db); ?>"><?php echo htmlspecialchars($db); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="drop_table_name">Select Table</label>
                                            <select id="drop_table_name" name="drop_table_name" class="form-control" required>
                                                <option value="">Select a table...</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="drop_table" class="btn btn-danger" onclick="return confirm('Are you sure you want to drop this table? This action cannot be undone!');">Drop Table</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Foreign Key and Drop Foreign Key -->
                    <div class="row mt-4">
                        <!-- Add Foreign Key -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Foreign Key</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="addForeignKeyForm">
                                        <div class="form-group">
                                            <label for="fk_db">Select Database</label>
                                            <select id="fk_db" name="fk_db" class="form-control" required onchange="loadFKTables('fk_table', this.value); loadFKTables('fk_referenced_table', this.value);">
                                                <option value="">Select a database...</option>
                                                <?php foreach ($databases as $db): ?>
                                                    <option value="<?php echo htmlspecialchars($db); ?>"><?php echo htmlspecialchars($db); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fk_table">Select Table</label>
                                            <select id="fk_table" name="fk_table" class="form-control" required onchange="loadFKColumns('fk_column', document.getElementById('fk_db').value, this.value);">
                                                <option value="">Select a table...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fk_constraint_name">Constraint Name</label>
                                            <input type="text" id="fk_constraint_name" name="fk_constraint_name" class="form-control" placeholder="Enter constraint name (optional)">
                                        </div>
                                        <div class="form-group">
                                            <label for="fk_column">Select Column</label>
                                            <select id="fk_column" name="fk_column" class="form-control" required>
                                                <option value="">Select a column...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fk_referenced_table">Select Referenced Table</label>
                                            <select id="fk_referenced_table" name="fk_referenced_table" class="form-control" required onchange="loadFKColumns('fk_referenced_column', document.getElementById('fk_db').value, this.value);">
                                                <option value="">Select a table...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fk_referenced_column">Select Referenced Column</label>
                                            <select id="fk_referenced_column" name="fk_referenced_column" class="form-control" required>
                                                <option value="">Select a column...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fk_on_delete">ON DELETE</label>
                                            <select id="fk_on_delete" name="fk_on_delete" class="form-control">
                                                <option value="">No action</option>
                                                <option value="CASCADE">CASCADE</option>
                                                <option value="SET NULL">SET NULL</option>
                                                <option value="RESTRICT">RESTRICT</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fk_on_update">ON UPDATE</label>
                                            <select id="fk_on_update" name="fk_on_update" class="form-control">
                                                <option value="">No action</option>
                                                <option value="CASCADE">CASCADE</option>
                                                <option value="SET NULL">SET NULL</option>
                                                <option value="RESTRICT">RESTRICT</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="add_foreign_key" class="btn btn-primary">Add Foreign Key</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Drop Foreign Key -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Drop Foreign Key</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="dropForeignKeyForm">
                                        <div class="form-group">
                                            <label for="drop_fk_db">Select Database</label>
                                            <select id="drop_fk_db" name="drop_fk_db" class="form-control" required onchange="loadDropFKTables(this.value);">
                                                <option value="">Select a database...</option>
                                                <?php foreach ($databases as $db): ?>
                                                    <option value="<?php echo htmlspecialchars($db); ?>"><?php echo htmlspecialchars($db); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="drop_fk_table">Select Table</label>
                                            <select id="drop_fk_table" name="drop_fk_table" class="form-control" required onchange="loadFKConstraints(this.value, document.getElementById('drop_fk_db').value);">
                                                <option value="">Select a table...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="drop_fk_constraint">Select Foreign Key Constraint</label>
                                            <select id="drop_fk_constraint" name="drop_fk_constraint" class="form-control" required>
                                                <option value="">Select a constraint...</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="drop_foreign_key" class="btn btn-danger" onclick="return confirm('Are you sure you want to drop this foreign key constraint? This action cannot be undone!');">Drop Foreign Key</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- List of Databases and Tables -->
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
                                        <h3 class="card-title" style="margin: 0;">Existing Databases and Tables</h3>
                                        <div style="display: flex; align-items: center; gap: 1rem;">
                                            <a class="search-toggle" href="#" role="button" id="db-search-toggle" style="color: var(--text-primary);">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>
                                            </a>
                                            <div class="search-box-wrapper" id="db-search-wrapper">
                                                <div class="search-box">
                                                    <input type="text" id="db-search" class="search-input" placeholder="Search databases...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php if (empty($databases)): ?>
                                        <p style="color: var(--text-muted);">No databases found.</p>
                                    <?php else: ?>
                                        <ul class="db-list" id="db-list-container">
                                            <?php foreach ($databases as $db): ?>
                                                <li class="db-item database-item" data-db-name="<?php echo htmlspecialchars(strtolower($db)); ?>">
                                                    <div>
                                                        <div class="db-header" onclick="toggleTables('<?php echo htmlspecialchars($db); ?>')" style="cursor: pointer; display: flex; align-items: center; gap: 0.75rem;">
                                                            <svg class="toggle-icon" id="toggle-<?php echo htmlspecialchars($db); ?>" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.2s ease;">
                                                                <polyline points="9 18 15 12 9 6"></polyline>
                                                            </svg>
                                                            <span class="db-name"><?php echo htmlspecialchars($db); ?></span>
                                                        </div>
                                                        <ul class="table-list" id="tables-<?php echo htmlspecialchars($db); ?>" style="display: none; margin-top: 0.75rem;">
                                                            <?php
                                                            try {
                                                                $pdo->exec("USE `$db`");
                                                                $stmt = $pdo->query("SHOW TABLES");
                                                                $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
                                                                if (empty($tables)): ?>
                                                                    <li class="table-item" style="color: var(--text-muted); font-style: italic;">No tables</li>
                                                                <?php else:
                                                                    foreach ($tables as $table): ?>
                                                                        <li class="table-item" style="margin-bottom: 0.5rem;" data-table-name="<?php echo htmlspecialchars(strtolower($table)); ?>">
                                                                            <div class="table-header" onclick="toggleColumns('<?php echo htmlspecialchars($db); ?>', '<?php echo htmlspecialchars($table); ?>')" style="cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                                                                                <svg class="table-toggle-icon" id="table-toggle-<?php echo htmlspecialchars($db); ?>-<?php echo htmlspecialchars($table); ?>" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.2s ease;">
                                                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                                                </svg>
                                                                                <span><?php echo htmlspecialchars($table); ?></span>
                                                                            </div>
                                                                            <ul class="column-list" id="columns-<?php echo htmlspecialchars($db); ?>-<?php echo htmlspecialchars($table); ?>" style="display: none; margin-top: 0.5rem; padding-left: 1.5rem;">
                                                                                <?php
                                                                                try {
                                                                                    $colStmt = $pdo->query("SHOW COLUMNS FROM `$table`");
                                                                                    $columns = $colStmt->fetchAll(PDO::FETCH_ASSOC);
                                                                                    if (empty($columns)): ?>
                                                                                        <li class="column-item" style="color: var(--text-muted); font-style: italic; font-size: 0.875rem;">No columns</li>
                                                                                    <?php else:
                                                                                        foreach ($columns as $col): ?>
                                                                                            <li class="column-item" style="font-size: 0.875rem; padding: 0.25rem 0;" data-column-name="<?php echo htmlspecialchars(strtolower($col['Field'])); ?>">
                                                                                                <strong><?php echo htmlspecialchars($col['Field']); ?></strong>
                                                                                                <span style="color: var(--text-muted); margin-left: 0.5rem;">- <?php echo htmlspecialchars($col['Type']); ?></span>
                                                                                                <?php if ($col['Key'] === 'PRI'): ?>
                                                                                                    <span style="color: #666666; margin-left: 0.5rem;">(Primary Key)</span>
                                                                                                <?php endif; ?>
                                                                                                <?php if ($col['Extra'] === 'auto_increment'): ?>
                                                                                                    <span style="color: #888888; margin-left: 0.5rem;">(Auto Increment)</span>
                                                                                                <?php endif; ?>
                                                                                            </li>
                                                                                        <?php endforeach;
                                                                                    endif;
                                                                                    
                                                                                    // Fetch foreign keys
                                                                                    $fkStmt = $pdo->query("
                                                                                        SELECT 
                                                                                            CONSTRAINT_NAME,
                                                                                            COLUMN_NAME,
                                                                                            REFERENCED_TABLE_NAME,
                                                                                            REFERENCED_COLUMN_NAME
                                                                                        FROM information_schema.KEY_COLUMN_USAGE
                                                                                        WHERE TABLE_SCHEMA = '$db'
                                                                                        AND TABLE_NAME = '$table'
                                                                                        AND REFERENCED_TABLE_NAME IS NOT NULL
                                                                                    ");
                                                                                    $foreignKeys = $fkStmt->fetchAll(PDO::FETCH_ASSOC);
                                                                                    if (!empty($foreignKeys)): ?>
                                                                                        <li style="font-size: 0.875rem; padding: 0.5rem 0; border-top: 1px dashed var(--border-color); margin-top: 0.5rem;">
                                                                                            <strong style="color: #666666;">Foreign Keys:</strong>
                                                                                            <ul style="padding-left: 1.25rem; margin-top: 0.25rem;">
                                                                                                <?php foreach ($foreignKeys as $fk): ?>
                                                                                                    <li style="padding: 0.25rem 0;">
                                                                                                        <span style="font-weight: 500;"><?php echo htmlspecialchars($fk['COLUMN_NAME']); ?></span>
                                                                                                        <span style="color: var(--text-muted);"> → </span>
                                                                                                        <span style="color: #555555;"><?php echo htmlspecialchars($fk['REFERENCED_TABLE_NAME']); ?>.</span>
                                                                                                        <span style="color: #777777;"><?php echo htmlspecialchars($fk['REFERENCED_COLUMN_NAME']); ?></span>
                                                                                                        <span style="color: var(--text-muted); font-style: italic; margin-left: 0.5rem;">(<?php echo htmlspecialchars($fk['CONSTRAINT_NAME']); ?>)</span>
                                                                                                    </li>
                                                                                                <?php endforeach; ?>
                                                                                            </ul>
                                                                                        </li>
                                                                                    <?php endif;
                                                                                } catch (PDOException $e) {
                                                                                    echo "<li style='color: #888888; font-size: 0.875rem;'>Error loading columns/foreign keys</li>";
                                                                                }
                                                                                ?>
                                                                            </ul>
                                                                        </li>
                                                                    <?php endforeach;
                                                                endif;
                                                            } catch (PDOException $e) {
                                                                echo "<li class='table-item' style='color: #888888;'>Error loading tables</li>";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="main-footer">
<strong>Copyright &copy; 2026 <a href="index.html">Ayzen's Coffee</a>.</strong> All rights reserved.
        </footer>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal-overlay" id="logoutModalOverlay">
        <div class="modal">
            <div class="modal-header">
            <h3 class="modal-title">Confirm Logout</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to log out?</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="logoutCancelBtn">Cancel</button>
            <a href="signin.php?logout=1" class="btn btn-danger" id="logoutConfirmBtn">Logout</a>
        </div>
    </div>
    </div>

    <script src="script.js"></script>
    <script>
        let columnIndex = 1;

        document.getElementById('addColumnBtn').addEventListener('click', function() {
            const container = document.getElementById('columnsContainer');
            const newRow = document.createElement('div');
            newRow.className = 'column-row';
            newRow.innerHTML = `
                <input type="text" name="columns[${columnIndex}][name]" class="form-control" placeholder="Column name" required>
                <select name="columns[${columnIndex}][type]" class="form-control" required>
                    <option value="">Select type</option>
                    <option value="INT">INT</option>
                    <option value="VARCHAR(255)">VARCHAR(255)</option>
                    <option value="TEXT">TEXT</option>
                    <option value="DATE">DATE</option>
                    <option value="DATETIME">DATETIME</option>
                    <option value="DECIMAL(10,2)">DECIMAL(10,2)</option>
                    <option value="TINYBLOB">TINYBLOB</option>
                    <option value="BLOB">BLOB</option>
                    <option value="MEDIUMBLOB">MEDIUMBLOB</option>
                    <option value="LONGBLOB">LONGBLOB</option>
                </select>
                <label style="display: flex; align-items: center; gap: 0.5rem;">
                    <input type="checkbox" name="columns[${columnIndex}][primary]">
                    <span style="font-weight: normal;">Primary</span>
                </label>
                <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="this.parentElement.remove()">Remove</button>
            `;
            container.appendChild(newRow);
            columnIndex++;
        });

        function loadTables(dbName) {
            const tableSelect = document.getElementById('drop_table_name');
            tableSelect.innerHTML = '<option value="">Select a table...</option>';
            
            if (!dbName) return;

            // Fetch tables via AJAX (we'll use a simple approach)
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    tableSelect.innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'get_tables.php?db=' + encodeURIComponent(dbName), true);
            xhr.send();
        }

        function toggleTables(dbName) {
            const tableList = document.getElementById('tables-' + dbName);
            const toggleIcon = document.getElementById('toggle-' + dbName);
            
            if (tableList.style.display === 'none' || tableList.style.display === '') {
                tableList.style.display = 'block';
                toggleIcon.style.transform = 'rotate(90deg)';
            } else {
                tableList.style.display = 'none';
                toggleIcon.style.transform = 'rotate(0deg)';
            }
        }

        function toggleColumns(dbName, tableName) {
            const columnList = document.getElementById('columns-' + dbName + '-' + tableName);
            const toggleIcon = document.getElementById('table-toggle-' + dbName + '-' + tableName);
            
            if (columnList.style.display === 'none' || columnList.style.display === '') {
                columnList.style.display = 'block';
                toggleIcon.style.transform = 'rotate(90deg)';
            } else {
                columnList.style.display = 'none';
                toggleIcon.style.transform = 'rotate(0deg)';
            }
        }

        // Load tables for foreign key forms
        function loadFKTables(selectId, dbName) {
            const tableSelect = document.getElementById(selectId);
            tableSelect.innerHTML = '<option value="">Select a table...</option>';
            
            if (!dbName) return;

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    tableSelect.innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'get_tables.php?db=' + encodeURIComponent(dbName), true);
            xhr.send();
        }

        // Load columns for foreign key forms
        function loadFKColumns(selectId, dbName, tableName) {
            const columnSelect = document.getElementById(selectId);
            columnSelect.innerHTML = '<option value="">Select a column...</option>';
            
            if (!dbName || !tableName) return;

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    columnSelect.innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'get_columns.php?db=' + encodeURIComponent(dbName) + '&table=' + encodeURIComponent(tableName), true);
            xhr.send();
        }

        // Load tables for drop foreign key form
        function loadDropFKTables(dbName) {
            loadFKTables('drop_fk_table', dbName);
            // Reset constraint select
            document.getElementById('drop_fk_constraint').innerHTML = '<option value="">Select a constraint...</option>';
        }

        // Load foreign key constraints for drop form
        function loadFKConstraints(tableName, dbName) {
            const constraintSelect = document.getElementById('drop_fk_constraint');
            constraintSelect.innerHTML = '<option value="">Select a constraint...</option>';
            
            if (!dbName || !tableName) return;

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    constraintSelect.innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'get_foreign_keys.php?db=' + encodeURIComponent(dbName) + '&table=' + encodeURIComponent(tableName), true);
            xhr.send();
        }

        // Toggle search box visibility
        document.getElementById('db-search-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            const searchWrapper = document.getElementById('db-search-wrapper');
            searchWrapper.classList.toggle('active');
            if (searchWrapper.classList.contains('active')) {
                document.getElementById('db-search').focus();
            }
        });

        // Search function for database names only
        document.getElementById('db-search').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            const dbItems = document.querySelectorAll('.database-item');
            
            dbItems.forEach(dbItem => {
                const dbName = dbItem.getAttribute('data-db-name');
                if (searchTerm === '' || dbName.includes(searchTerm)) {
                    dbItem.style.display = '';
                } else {
                    dbItem.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
