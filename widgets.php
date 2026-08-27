<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Widgets - Ayzen's Coffee</title>
    <link rel="stylesheet" href="styles.css">
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
                            <a href="widgets.php" class="nav-link active">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="9" y1="3" x2="9" y2="21"></line>
                                </svg>
                                <p>Widgets <span class="badge badge-info right">New</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="database_manager.php" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                    <path d="M4 6v6c0 1.657 3.582 3 8 3s8-1.343 8-3V6"></path>
                                    <path d="M4 12v6c0 1.657 3.582 3 8 3s8-1.343 8-3v-6"></path>
                                </svg>
                                <p>Database Manager</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                    <path d="M2 17l10 5 10-5"></path>
                                    <path d="M2 12l10 5 10-5"></path>
                                </svg>
                                <p>Layout Options <span class="badge badge-info right">6</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="20" x2="18" y2="10"></line>
                                    <line x1="12" y1="20" x2="12" y2="4"></line>
                                    <line x1="6" y1="20" x2="6" y2="14"></line>
                                </svg>
                                <p>Charts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51v-.09a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                                <p>UI Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <p>Forms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="3" y1="15" x2="21" y2="15"></line>
                                    <line x1="9" y1="3" x2="9" y2="21"></line>
                                    <line x1="15" y1="3" x2="15" y2="21"></line>
                                </svg>
                                <p>Tables</p>
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
                            <h1 class="m-0">Widgets</h1>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <!-- Widgets Row 1 -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget-top-row" style="display:flex; gap:1.5rem; flex-wrap:wrap;">
                                <div style="flex:1 1 320px;">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title" style="display:flex; align-items:center; gap:10px;">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 2l9 4-9 4-9-4 9-4z"></path>
                                                    <path d="M3 10l9 4 9-4"></path>
                                                    <path d="M3 14l9 4 9-4"></path>
                                                </svg>
                                                Simple Card
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p>This is a simple hard-coded widget card with some text content inside it. It follows the same styling as the dashboard cards.</p>
                                        </div>
                                    </div>
                                </div>

                                <div style="flex:1 1 320px;">
                                    <div class="card bg-info">
                                        <div class="card-header">
                                            <h3 class="card-title" style="display:flex; align-items:center; gap:10px;">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <path d="M12 6v6l4 2"></path>
                                                </svg>
                                                Colored Card
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p style="color: white;">This is an info-colored widget card. Perfect for highlighting important information or status updates.</p>
                                        </div>
                                    </div>
                                </div>

                                <div style="flex:1 1 320px;">
                                    <div class="card bg-success">
                                        <div class="card-header">
                                            <h3 class="card-title" style="display:flex; align-items:center; gap:10px;">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                                Success Card
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p style="color: white;">Success-themed card to display positive feedback, completed tasks, or successful operations.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widgets Row 1.5 (Design add-on below the 3 cards) -->
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card" style="border: 1px solid var(--border-color);">
                                <div class="card-header">
                                    <h3 class="card-title" style="display:flex; align-items:center; gap:10px;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 6h-8"></path>
                                            <path d="M14 12H4"></path>
                                            <path d="M20 18H8"></path>
                                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                        </svg>
                                        Quick Widget Summary
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div style="display:flex; gap: 1.25rem; flex-wrap: wrap;">
                                        <div style="flex: 1 1 260px;">
                                            <div style="display:flex; align-items:center; gap:10px;">
                                                <span class="badge badge-info" style="font-size:0.85rem; padding:0.4rem 0.7rem;">Live</span>
                                                <strong>Always up to date</strong>
                                            </div>
                                            <p style="margin-top:0.5rem; color: var(--text-muted);">Shows the latest widget status and UI highlights.</p>
                                        </div>
                                        <div style="flex: 1 1 260px;">
                                            <div style="display:flex; align-items:center; gap:10px;">
                                                <span class="badge badge-info" style="font-size:0.85rem; padding:0.4rem 0.7rem;">Design</span>
                                                <strong>Consistent layout</strong>
                                            </div>
                                            <p style="margin-top:0.5rem; color: var(--text-muted);">Aligned cards and readable dark-mode typography.</p>
                                        </div>
                                        <div style="flex: 1 1 260px;">
                                            <div style="display:flex; align-items:center; gap:10px;">
                                                <span class="badge badge-info" style="font-size:0.85rem; padding:0.4rem 0.7rem;">Fast</span>
                                                <strong>Lightweight UI</strong>
                                            </div>
                                            <p style="margin-top:0.5rem; color: var(--text-muted);">No external dependencies; pure PHP/HTML/CSS.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Widgets Row 2 -->
                    <div class="row mt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Stats Widget</h3>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>1,234</h4>
                                            <p>Active Users</p>
                                        </div>
<svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#666666" stroke-width="1.5">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Revenue Widget</h3>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>$45,678</h4>
                                            <p>Total Revenue</p>
                                        </div>
<svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#666666" stroke-width="1.5">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <polyline points="17 6 12 11 7 6"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widgets Row 3 -->
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Notification List Widget</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li class="p-3 mb-2 border-bottom d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>New Order</strong>
                                                <p class="mb-0 text-muted small">Order #1234 has been placed</p>
                                            </div>
                                            <span class="badge badge-info">5 min ago</span>
                                        </li>
                                        <li class="p-3 mb-2 border-bottom d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>User Registered</strong>
                                                <p class="mb-0 text-muted small">john.doe@example.com joined</p>
                                            </div>
                                            <span class="badge badge-warning">1 hour ago</span>
                                        </li>
                                        <li class="p-3 d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>System Update</strong>
                                                <p class="mb-0 text-muted small">Maintenance scheduled tomorrow</p>
                                            </div>
                                            <span class="badge badge-danger">Tomorrow</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widgets Row 4 -->
                    <div class="row mt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Progress Widget</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Project Alpha</span>
                                            <span>85%</span>
                                        </div>
                                        <div style="height: 8px; background: var(--border-color); border-radius: 4px; overflow: hidden;">
<div style="width: 85%; height: 100%; background: linear-gradient(135deg, #666666 0%, #444444 100%);"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Project Beta</span>
                                            <span>45%</span>
                                        </div>
                                        <div style="height: 8px; background: var(--border-color); border-radius: 4px; overflow: hidden;">
<div style="width: 45%; height: 100%; background: linear-gradient(135deg, #555555 0%, #333333 100%);"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Project Gamma</span>
                                            <span>60%</span>
                                        </div>
                                        <div style="height: 8px; background: var(--border-color); border-radius: 4px; overflow: hidden;">
<div style="width: 60%; height: 100%; background: linear-gradient(135deg, #777777 0%, #555555 100%);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Widgets Row 5 -->
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 8px;">
                                        <line x1="18" y1="20" x2="18" y2="10"></line>
                                        <line x1="12" y1="20" x2="12" y2="4"></line>
                                        <line x1="6" y1="20" x2="6" y2="14"></line>
                                    </svg>
                                    Sales Overview Widget
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool btn-chart active">Area</button>
                                        <button type="button" class="btn btn-tool btn-chart">Donut</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <svg width="100%" height="250" viewBox="0 0 600 250" preserveAspectRatio="none">
                                            <defs>
                                                <linearGradient id="areaGradientWidgets" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#666666" stop-opacity="0.2"></stop>
                                                    <stop offset="100%" stop-color="#666666" stop-opacity="0"></stop>
                                                </linearGradient>
                                            </defs>
                                            <line x1="0" y1="50" x2="600" y2="50" stroke="var(--border-color)" stroke-width="1"></line>
                                            <line x1="0" y1="100" x2="600" y2="100" stroke="var(--border-color)" stroke-width="1"></line>
                                            <line x1="0" y1="150" x2="600" y2="150" stroke="var(--border-color)" stroke-width="1"></line>
                                            <line x1="0" y1="200" x2="600" y2="200" stroke="var(--border-color)" stroke-width="1"></line>
                                            <path d="M0 200 C 100 180, 150 120, 200 140 C 250 160, 300 80, 350 100 C 400 120, 450 60, 500 80 C 550 100, 580 40, 600 60 L 600 250 L 0 250 Z" fill="url(#areaGradientWidgets)"></path>
<path d="M0 200 C 100 180, 150 120, 200 140 C 250 160, 300 80, 350 100 C 400 120, 450 60, 500 80 C 550 100, 580 40, 600 60" fill="none" stroke="#666666" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
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
</body>
</html>