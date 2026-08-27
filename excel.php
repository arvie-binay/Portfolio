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
<title>Excel UI - Ayzen's Coffee</title>
    <link rel="stylesheet" href="styles.css">
    <!-- SheetJS Library for Excel file parsing/writing -->
    <script src="js/xlsx.full.min.js"></script>
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
                            <a href="excel.php" class="nav-link active">
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
                            <h1 class="m-0">Excel UI</h1>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <!-- File Upload Area (shown initially) -->
                    <div id="excel-upload-area" class="excel-upload-area card">
                        <div class="excel-upload-content">
<svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" y1="3" x2="12" y2="15"></line>
                            </svg>
                            <h2>Upload your Excel file</h2>
                            <p>Supports all Excel file types (.xlsx, .xls, .csv, .xlsm, .xlsb, etc.)</p>
                            <input type="file" id="excel-file-input" accept=".xlsx,.xls,.csv,.xlsm,.xlsb,.xltx,.xltm,.xlt,.ods" class="excel-file-input">
                            <label for="excel-file-input" class="excel-upload-btn">Choose File</label>
                        </div>
                    </div>

                    <!-- Excel Grid Area (hidden until file is uploaded) -->
                    <div id="excel-grid-area" class="excel-grid-area" style="display: none;">
                        <!-- Excel Toolbar -->
                        <div class="excel-toolbar card">
                            <div class="excel-toolbar-section">
                                <button class="excel-btn" id="excel-undo-btn" title="Undo">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7v6h6"></path><path d="M21 17a9 9 0 0 0-9-9 9 75 0 0 0-6 2.3L3 13"></path></svg>
                                </button>
                                <button class="excel-btn" id="excel-redo-btn" title="Redo">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 7v6h-6"></path><path d="M3 17a9 9 0 0 1 9-9 9 75 0 0 1 6 2.3L21 13"></path></svg>
                                </button>
                                <div class="excel-divider"></div>
                                <button class="excel-btn" id="excel-new-btn" title="New File">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                                <button class="excel-btn" id="excel-upload-new-btn" title="Upload Another File">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                </button>
                                <button class="excel-btn excel-btn-primary" id="excel-download-btn" title="Download Excel File">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                    Download
                                </button>
                                <div class="excel-divider"></div>
                            </div>
                            <div class="excel-toolbar-section">
                                <select class="excel-select" id="excel-font-family">
                                    <option value="Calibri">Calibri</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Times New Roman">Times New Roman</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Verdana">Verdana</option>
                                </select>
                                <select class="excel-select excel-select-sm" id="excel-font-size">
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11" selected>11</option>
                                    <option value="12">12</option>
                                    <option value="14">14</option>
                                    <option value="16">16</option>
                                    <option value="18">18</option>
                                    <option value="20">20</option>
                                    <option value="24">24</option>
                                </select>
                                <div class="excel-divider"></div>
                                <button class="excel-btn" id="excel-bold-btn" title="Bold (Ctrl+B)">
                                    <b>B</b>
                                </button>
                                <button class="excel-btn" id="excel-italic-btn" title="Italic (Ctrl+I)">
                                    <i>I</i>
                                </button>
                                <button class="excel-btn" id="excel-underline-btn" title="Underline (Ctrl+U)">
                                    <u>U</u>
                                </button>
                                <div class="excel-divider"></div>
                                <input type="color" id="excel-text-color" class="excel-color-input" title="Text Color">
                                <input type="color" id="excel-fill-color" class="excel-color-input" title="Fill Color" value="#ffffff">
                                <div class="excel-divider"></div>
                                <button class="excel-btn excel-btn-row" id="excel-add-row" title="Add Row">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"></path></svg>
                                </button>
                                <button class="excel-btn excel-btn-row" id="excel-remove-row" title="Remove Row">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"></path></svg>
                                </button>
                                <div class="excel-divider"></div>
                                <button class="excel-btn excel-btn-col" id="excel-add-col" title="Add Column">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"></path></svg>
                                </button>
                                <button class="excel-btn excel-btn-col" id="excel-remove-col" title="Remove Column">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"></path></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Excel Container -->
                        <div class="excel-container card">
                            <div class="excel-formula-bar">
                                <div class="excel-cell-ref" id="excel-cell-ref">A1</div>
                                <div class="excel-formula-input" id="excel-formula-input" contenteditable="true"></div>
                            </div>
                            <div class="excel-grid-wrapper">
                                <div class="excel-grid" id="excel-grid"></div>
                            </div>
                        </div>
                        
                        <!-- Sheet Tabs (now below the grid) -->
                        <div class="excel-sheet-tabs-container card">
                            <div class="excel-sheet-nav">
                                <button class="excel-sheet-nav-btn" id="excel-sheet-left" title="Scroll sheet left">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                </button>
                                <button class="excel-sheet-nav-btn" id="excel-sheet-right" title="Scroll sheet right">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </button>
                            </div>
                            <div class="excel-sheet-tabs" id="excel-sheet-tabs"></div>
                            <div class="excel-sheet-add">
                                <button class="excel-sheet-add-btn" id="excel-sheet-add" title="Add new sheet">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Status Bar -->
                        <div class="excel-status-bar">
                            <div class="excel-status-left">
                                <span class="excel-status-ready">Ready</span>
                            </div>
                            <div class="excel-status-right">
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

    <!-- Alert Modal -->
    <div class="modal-overlay" id="alertModalOverlay">
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">Alert</h3>
            </div>
            <div class="modal-body">
                <p id="alertModalMessage">Alert message here</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="alertModalOkBtn">OK</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        let workbook = null;
        let currentSheetName = null;
        let activeCell = null;
        let activeCellPrev = null;
        let selectedCells = new Set(); // Stores cell addresses like 'A1'
        let selectedRows = new Set(); // Stores row numbers
        let selectedColumns = new Set(); // Stores column letters
        let lastSelectedRow = null;
        let lastSelectedCol = null;
        let undoStack = [];
        let redoStack = [];
        let currentFileName = 'Workbook.xlsx';

        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('excel-file-input');
            const uploadArea = document.getElementById('excel-upload-area');
            const gridArea = document.getElementById('excel-grid-area');
            const gridContainer = document.getElementById('excel-grid');
            const cellRef = document.getElementById('excel-cell-ref');
            const formulaInput = document.getElementById('excel-formula-input');
            const sheetTabs = document.getElementById('excel-sheet-tabs');
            const newBtn = document.getElementById('excel-new-btn');
            const uploadNewBtn = document.getElementById('excel-upload-new-btn');
            const downloadBtn = document.getElementById('excel-download-btn');
            const boldBtn = document.getElementById('excel-bold-btn');
            const italicBtn = document.getElementById('excel-italic-btn');
            const underlineBtn = document.getElementById('excel-underline-btn');
            const textColorInput = document.getElementById('excel-text-color');
            const fillColorInput = document.getElementById('excel-fill-color');
            const fontFamilySelect = document.getElementById('excel-font-family');
            const fontSizeSelect = document.getElementById('excel-font-size');
            const addRowBtn = document.getElementById('excel-add-row');
            const removeRowBtn = document.getElementById('excel-remove-row');
            const addColBtn = document.getElementById('excel-add-col');
            const removeColBtn = document.getElementById('excel-remove-col');
            const undoBtn = document.getElementById('excel-undo-btn');
            const redoBtn = document.getElementById('excel-redo-btn');
            // Modal elements
            const alertModalOverlay = document.getElementById('alertModalOverlay');
            const alertModalMessage = document.getElementById('alertModalMessage');
            const alertModalOkBtn = document.getElementById('alertModalOkBtn');

            // Helper function to show alert modal
            function showAlert(message) {
                alertModalMessage.textContent = message;
                alertModalOverlay.style.display = 'flex';
            }

            // Modal handlers
            alertModalOkBtn.addEventListener('click', () => {
                alertModalOverlay.style.display = 'none';
            });
            alertModalOverlay.addEventListener('click', (e) => {
                if (e.target === alertModalOverlay) {
                    alertModalOverlay.style.display = 'none';
                }
            });

            // File Upload Handler
            fileInput.addEventListener('change', handleFileUpload);

            // New File / Upload Another Handlers
            newBtn.addEventListener('click', createNewWorkbook);
            uploadNewBtn.addEventListener('click', resetToUpload);

            // Download Handler
            downloadBtn.addEventListener('click', downloadWorkbook);

            // Formatting Handlers
            boldBtn.addEventListener('click', () => applyFormatting('fontWeight', 'bold'));
            italicBtn.addEventListener('click', () => applyFormatting('fontStyle', 'italic'));
            underlineBtn.addEventListener('click', () => applyFormatting('textDecoration', 'underline'));
            textColorInput.addEventListener('input', (e) => applyFormatting('color', e.target.value));
            fillColorInput.addEventListener('input', (e) => applyFormatting('backgroundColor', e.target.value));
            fontFamilySelect.addEventListener('change', (e) => applyFormatting('fontFamily', e.target.value));
            fontSizeSelect.addEventListener('change', (e) => applyFormatting('fontSize', e.target.value + 'px'));

            // Row/Column Handlers
            addRowBtn.addEventListener('click', addRow);
            removeRowBtn.addEventListener('click', removeRow);
            addColBtn.addEventListener('click', addColumn);
            removeColBtn.addEventListener('click', removeColumn);

            // Undo/Redo Handlers
            undoBtn.addEventListener('click', undo);
            redoBtn.addEventListener('click', redo);

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.ctrlKey || e.metaKey) {
                    switch(e.key.toLowerCase()) {
                        case 'b':
                            e.preventDefault();
                            applyFormatting('fontWeight', 'bold');
                            break;
                        case 'i':
                            e.preventDefault();
                            applyFormatting('fontStyle', 'italic');
                            break;
                        case 'u':
                            e.preventDefault();
                            applyFormatting('textDecoration', 'underline');
                            break;
                        case 'z':
                            e.preventDefault();
                            if (e.shiftKey) {
                                redo();
                            } else {
                                undo();
                            }
                            break;
                        case 'y':
                            e.preventDefault();
                            redo();
                            break;
                    }
                }
            });

            // Drag and Drop support
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });
            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('dragover');
            });
            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    handleFileUpload({ target: fileInput });
                }
            });

            function resetToUpload() {
                uploadArea.style.display = 'flex';
                gridArea.style.display = 'none';
                fileInput.value = '';
                workbook = null;
                currentSheetName = null;
                sheetTabs.innerHTML = '';
                gridContainer.innerHTML = '';
                undoStack = [];
                redoStack = [];
            }

            function createNewWorkbook() {
                workbook = XLSX.utils.book_new();
                const wsData = [['']];
                const ws = XLSX.utils.aoa_to_sheet(wsData);
                XLSX.utils.book_append_sheet(workbook, ws, 'Sheet1');
                
                uploadArea.style.display = 'none';
                gridArea.style.display = 'block';
                
                renderSheetTabs();
                renderSheet('Sheet1');
            }

            function saveState() {
                undoStack.push(JSON.stringify(workbook));
                redoStack = [];
            }

            function undo() {
                if (undoStack.length === 0) return;
                redoStack.push(JSON.stringify(workbook));
                workbook = JSON.parse(undoStack.pop());
                renderSheet(currentSheetName);
            }

            function redo() {
                if (redoStack.length === 0) return;
                undoStack.push(JSON.stringify(workbook));
                workbook = JSON.parse(redoStack.pop());
                renderSheet(currentSheetName);
            }

            function handleFileUpload(e) {
                const file = e.target.files[0];
                if (!file) return;
                currentFileName = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    try {
                        const data = new Uint8Array(e.target.result);
                        workbook = XLSX.read(data, { type: 'array' });
                        
                        uploadArea.style.display = 'none';
                        gridArea.style.display = 'block';
                        
                        renderSheetTabs();
                        
                        if (workbook.SheetNames.length > 0) {
                            renderSheet(workbook.SheetNames[0]);
                        }
                    } catch (error) {
                        alert('Error reading file. Please make sure it is a valid Excel file.');
                        console.error(error);
                    }
                };
                reader.readAsArrayBuffer(file);
            }

            function renderSheetTabs() {
                sheetTabs.innerHTML = '';
                workbook.SheetNames.forEach((name, index) => {
                    const tab = document.createElement('button');
                    tab.className = 'excel-sheet-tab' + (index === 0 ? ' active' : '');
                    tab.textContent = name;
                    tab.addEventListener('click', () => {
                        document.querySelectorAll('.excel-sheet-tab').forEach(t => t.classList.remove('active'));
                        tab.classList.add('active');
                        renderSheet(name);
                    });
                    sheetTabs.appendChild(tab);
                });
            }

            function renderSheet(sheetName) {
                currentSheetName = sheetName;
                const sheet = workbook.Sheets[sheetName];
                const range = XLSX.utils.decode_range(sheet['!ref'] || 'A1');
                const numCols = range.e.c - range.s.c + 1;
                const numRows = range.e.r - range.s.r + 1;

                let gridHTML = '<div class="excel-cell excel-header excel-corner" data-type="corner"></div>';

                for (let c = 0; c < numCols; c++) {
                    const colLetter = XLSX.utils.encode_col(c + range.s.c);
                    gridHTML += `<div class="excel-cell excel-header" data-type="col" data-col="${c + range.s.c}" data-col-letter="${colLetter}">${colLetter}</div>`;
                }

                for (let r = 0; r < numRows; r++) {
                    const rowIndex = r + range.s.r; // XLSX row index (0-based)
                    const rowDisplay = r + 1 + range.s.r; // Display row number (1-based)
                    gridHTML += `<div class="excel-cell excel-header" data-type="row" data-row="${rowIndex}">${rowDisplay}</div>`;
                    
                    for (let c = 0; c < numCols; c++) {
                        const cellAddress = XLSX.utils.encode_cell({ c: c + range.s.c, r: r + range.s.r });
                        const cell = sheet[cellAddress];
                        const value = cell ? (cell.v !== undefined ? cell.v : '') : '';
                        const displayValue = cell ? (cell.w !== undefined ? cell.w : value) : '';
                        
                        let styleStr = 'text-align: center;'; // Default to center alignment
                        if (cell && cell.s) {
                            if (cell.s.font) {
                                if (cell.s.font.bold) styleStr += 'font-weight: bold;';
                                if (cell.s.font.italic) styleStr += 'font-style: italic;';
                                if (cell.s.font.underline) styleStr += 'text-decoration: underline;';
                                if (cell.s.font.color && cell.s.font.color.rgb) {
                                    styleStr += `color: #${cell.s.font.color.rgb};`;
                                }
                                if (cell.s.font.name) styleStr += `font-family: ${cell.s.font.name};`;
                                if (cell.s.font.sz) styleStr += `font-size: ${cell.s.font.sz}px;`;
                            }
                            if (cell.s.fill && cell.s.fill.fgColor && cell.s.fill.fgColor.rgb) {
                                styleStr += `background-color: #${cell.s.fill.fgColor.rgb};`;
                            }
                            if (cell.s.alignment) {
                                if (cell.s.alignment.horizontal) {
                                    // Replace default center with saved alignment if exists
                                    styleStr = styleStr.replace('text-align: center;', `text-align: ${cell.s.alignment.horizontal};`);
                                }
                            }
                        }
                        
                        // Ensure cell has default centered alignment in saved data
                        if (!sheet[cellAddress]) {
                            sheet[cellAddress] = { t: 's', v: value, s: { alignment: { horizontal: 'center' } } };
                        }
                        if (!sheet[cellAddress].s) {
                            sheet[cellAddress].s = { alignment: { horizontal: 'center' } };
                        }
                        if (!sheet[cellAddress].s.alignment) {
                            sheet[cellAddress].s.alignment = {};
                        }
                        if (!sheet[cellAddress].s.alignment.horizontal) {
                            sheet[cellAddress].s.alignment.horizontal = 'center';
                        }
                        // If styleStr doesn't have text-align, add center
                        if (!styleStr.includes('text-align')) {
                            styleStr += ' text-align: center;';
                        }
                        gridHTML += `<div class="excel-cell" data-cell="${cellAddress}" data-row="${r + range.s.r}" data-col="${c + range.s.c}" style="${styleStr}" contenteditable="true">${displayValue}</div>`;
                    }
                }

                gridContainer.innerHTML = gridHTML;
                gridContainer.style.gridTemplateRows = `30px repeat(${numRows}, 25px)`;

                // Check if sheet has existing column widths, use them if available
                if (sheet['!cols'] && sheet['!cols'].length > 0) {
                    // Use saved column widths
                    let colWidths = sheet['!cols'].map(col => {
                        // Convert SheetJS width units back to pixels
                        const pxWidth = Math.max(80, Math.min(300, (col.wch || col.width || 8) * 7));
                        return `${pxWidth}px`;
                    });
                    // In case !cols is shorter than numCols, fill remaining with defaults
                    while (colWidths.length < numCols) {
                        colWidths.push('80px');
                    }
                    gridContainer.style.gridTemplateColumns = `50px ${colWidths.join(' ')}`;
                } else {
                    // Auto-fit columns if no saved widths
                    gridContainer.style.gridTemplateColumns = `50px repeat(${numCols}, auto)`;
                    autoFitColumns();
                }
                
                // Re-attach click handlers after rendering
                attachSelectionHandlers();
            }

            function autoFitColumns() {
                const sheet = workbook.Sheets[currentSheetName];
                const range = XLSX.utils.decode_range(sheet['!ref'] || 'A1');
                const numCols = range.e.c - range.s.c + 1;
                const numRows = range.e.r - range.s.r + 1;

                const columns = [];
                // Initialize columns array to track max length
                for (let c = 0; c < numCols; c++) {
                    columns.push({ maxLength: 0 });
                }
                // Iterate all cells in the current sheet to find max content length per column
                for (let r = 0; r < numRows; r++) {
                    for (let c = 0; c < numCols; c++) {
                        const cellAddress = XLSX.utils.encode_cell({ c: c + range.s.c, r: r + range.s.r });
                        const cell = sheet[cellAddress];
                        const value = cell ? (cell.v !== undefined ? cell.v : '') : '';
                        const displayValue = cell ? (cell.w !== undefined ? cell.w : value) : '';
                        const length = displayValue.toString().length;
                        if (length > columns[c].maxLength) {
                            columns[c].maxLength = length;
                        }
                    }
                }
                // Calculate widths & save to sheet['!cols'] (for download)
                let columnWidths = [];
                sheet['!cols'] = []; // Initialize/reset column widths array
                for (let c = 0; c < numCols; c++) {
                    // Calculate pixel width
                    let pxWidth = Math.max(80, Math.min(300, columns[c].maxLength * 9));
                    columnWidths.push(`${pxWidth}px`);
                    // Convert to SheetJS column width units (~ 1/7 inch)
                    let sheetJsWidth = Math.max(8, Math.min(50, pxWidth / 7));
                    sheet['!cols'].push({ wch: sheetJsWidth, width: sheetJsWidth });
                }
                gridContainer.style.gridTemplateColumns = `50px ${columnWidths.join(' ')}`;
            }

            function attachSelectionHandlers() {
                // Get all grid cells
                const allCells = document.querySelectorAll('#excel-grid .excel-cell');

                allCells.forEach(cell => {
                    cell.addEventListener('click', function(e) {
                        e.preventDefault();
                        const type = cell.dataset.type;
                        const sheet = workbook.Sheets[currentSheetName];
                        const range = XLSX.utils.decode_range(sheet['!ref'] || 'A1');
                        
                        if (!e.shiftKey && !e.ctrlKey && !e.metaKey) {
                            clearSelection();
                        }
                        
                        if (type === 'corner') {
                            // Select all cells (overrides any modifiers)
                            clearSelection();
                            for (let r = range.s.r; r <= range.e.r; r++) {
                                selectedRows.add(r);
                            }
                            for (let c = range.s.c; c <= range.e.c; c++) {
                                selectedColumns.add(XLSX.utils.encode_col(c));
                            }
                            for (let r = range.s.r; r <= range.e.r; r++) {
                                for (let c = range.s.c; c <= range.e.c; c++) {
                                    const cellAddr = XLSX.utils.encode_cell({ r, c });
                                    selectedCells.add(cellAddr);
                                }
                            }
                        } else if (type === 'col') {
                            const colLetter = cell.dataset.colLetter;
                            const colIndex = parseInt(cell.dataset.col);
                            
                            if (e.ctrlKey || e.metaKey) {
                                // Toggle this column's selection
                                if (selectedColumns.has(colLetter)) {
                                    selectedColumns.delete(colLetter);
                                    // Remove all cells in this column from selectedCells
                                    for (let r = range.s.r; r <= range.e.r; r++) {
                                        const cellAddr = XLSX.utils.encode_cell({ r, c: colIndex });
                                        selectedCells.delete(cellAddr);
                                    }
                                } else {
                                    selectedColumns.add(colLetter);
                                    for (let r = range.s.r; r <= range.e.r; r++) {
                                        const cellAddr = XLSX.utils.encode_cell({ r, c: colIndex });
                                        selectedCells.add(cellAddr);
                                    }
                                }
                            } else if (e.shiftKey && lastSelectedCol !== null) {
                                // Range column selection
                                let startCol = Math.min(lastSelectedCol, colIndex);
                                let endCol = Math.max(lastSelectedCol, colIndex);
                                
                                for (let c = startCol; c <= endCol; c++) {
                                    const cLetter = XLSX.utils.encode_col(c);
                                    selectedColumns.add(cLetter);
                                    for (let r = range.s.r; r <= range.e.r; r++) {
                                        const cellAddr = XLSX.utils.encode_cell({ r, c });
                                        selectedCells.add(cellAddr);
                                    }
                                }
                            } else {
                                // Single column selection
                                selectedColumns.add(colLetter);
                                for (let r = range.s.r; r <= range.e.r; r++) {
                                    const cellAddr = XLSX.utils.encode_cell({ r, c: colIndex });
                                    selectedCells.add(cellAddr);
                                }
                            }
                            lastSelectedCol = colIndex;
                            lastSelectedRow = null;
                        } else if (type === 'row') {
                            const rowIndex = parseInt(cell.dataset.row);
                            
                            if (e.ctrlKey || e.metaKey) {
                                // Toggle this row's selection
                                if (selectedRows.has(rowIndex)) {
                                    selectedRows.delete(rowIndex);
                                    // Remove all cells in this row from selectedCells
                                    for (let c = range.s.c; c <= range.e.c; c++) {
                                        const cellAddr = XLSX.utils.encode_cell({ r: rowIndex, c });
                                        selectedCells.delete(cellAddr);
                                    }
                                } else {
                                    selectedRows.add(rowIndex);
                                    for (let c = range.s.c; c <= range.e.c; c++) {
                                        const cellAddr = XLSX.utils.encode_cell({ r: rowIndex, c });
                                        selectedCells.add(cellAddr);
                                    }
                                }
                            } else if (e.shiftKey && lastSelectedRow !== null) {
                                // Range row selection
                                let startRow = Math.min(lastSelectedRow, rowIndex);
                                let endRow = Math.max(lastSelectedRow, rowIndex);
                                
                                for (let r = startRow; r <= endRow; r++) {
                                    selectedRows.add(r);
                                    for (let c = range.s.c; c <= range.e.c; c++) {
                                        const cellAddr = XLSX.utils.encode_cell({ r, c });
                                        selectedCells.add(cellAddr);
                                    }
                                }
                            } else {
                                // Single row selection
                                selectedRows.add(rowIndex);
                                for (let c = range.s.c; c <= range.e.c; c++) {
                                    const cellAddr = XLSX.utils.encode_cell({ r: rowIndex, c });
                                    selectedCells.add(cellAddr);
                                }
                            }
                            lastSelectedRow = rowIndex;
                            lastSelectedCol = null;
                        } else {
                            // Single cell selection
                            const cellAddr = cell.dataset.cell;
                            const cellCoords = XLSX.utils.decode_cell(cellAddr);
                            activeCell = cell;
                            
                            if (e.ctrlKey || e.metaKey) {
                                if (selectedCells.has(cellAddr)) {
                                    selectedCells.delete(cellAddr);
                                } else {
                                    selectedCells.add(cellAddr);
                                }
                            } else if (e.shiftKey && activeCellPrev !== null) {
                                // Range cell selection
                                const prevCoords = XLSX.utils.decode_cell(activeCellPrev);
                                let startRow = Math.min(prevCoords.r, cellCoords.r);
                                let endRow = Math.max(prevCoords.r, cellCoords.r);
                                let startCol = Math.min(prevCoords.c, cellCoords.c);
                                let endCol = Math.max(prevCoords.c, cellCoords.c);
                                
                                for (let r = startRow; r <= endRow; r++) {
                                    for (let c = startCol; c <= endCol; c++) {
                                        const addr = XLSX.utils.encode_cell({ r, c });
                                        selectedCells.add(addr);
                                    }
                                }
                            } else {
                                selectedCells.add(cellAddr);
                            }
                            lastSelectedRow = cellCoords.r;
                            lastSelectedCol = cellCoords.c;
                            activeCellPrev = cellAddr;
                        }
                        
                        updateSelectionVisuals();
                    });
                });
            }

            function clearSelection() {
                selectedCells.clear();
                selectedRows.clear();
                selectedColumns.clear();
                if (activeCell) {
                    activeCell.classList.remove('active');
                }
                activeCell = null;
                activeCellPrev = null;
                lastSelectedRow = null;
                lastSelectedCol = null;
                updateSelectionVisuals();
            }

            function updateSelectionVisuals() {
                const allCells = document.querySelectorAll('#excel-grid .excel-cell');
                allCells.forEach(cell => {
                    cell.classList.remove('selected');
                    cell.classList.remove('selected-row');
                    cell.classList.remove('selected-col');
                    cell.classList.remove('selected-corner');
                    cell.classList.remove('active');
                });

                // Highlight selected cells
                selectedCells.forEach(cellAddr => {
                    const cellElement = document.querySelector(`[data-cell="${cellAddr}"]`);
                    if (cellElement) {
                        cellElement.classList.add('selected');
                    }
                });

                // Highlight selected column headers
                selectedColumns.forEach(colLetter => {
                    const headerCell = document.querySelector(`[data-col-letter="${colLetter}"]`);
                    if (headerCell) {
                        headerCell.classList.add('selected-col');
                    }
                });

                // Highlight selected row headers
                selectedRows.forEach(rowNum => {
                    const headerCell = document.querySelector(`[data-type="row"][data-row="${rowNum}"]`);
                    if (headerCell) {
                        headerCell.classList.add('selected-row');
                    }
                });

                // Highlight corner if all selected
                const cornerCell = document.querySelector('[data-type="corner"]');
                if (cornerCell && selectedRows.size > 0 && selectedColumns.size > 0) {
                    const sheet = workbook.Sheets[currentSheetName];
                    const range = XLSX.utils.decode_range(sheet['!ref'] || 'A1');
                    let allRowsSelected = true;
                    for (let r = range.s.r; r <= range.e.r; r++) {
                        if (!selectedRows.has(r)) {
                            allRowsSelected = false;
                            break;
                        }
                    }
                    let allColsSelected = true;
                    for (let c = range.s.c; c <= range.e.c; c++) {
                        if (!selectedColumns.has(XLSX.utils.encode_col(c))) {
                            allColsSelected = false;
                            break;
                        }
                    }
                    if (allRowsSelected && allColsSelected) {
                        cornerCell.classList.add('selected-corner');
                    }
                }

                if (activeCell) {
                    activeCell.classList.add('active');
                }
            }

            function applyFormatting(property, value) {
                if (selectedCells.size === 0) return;
                saveState();

                const sheet = workbook.Sheets[currentSheetName];
                
                selectedCells.forEach(cellAddress => {
                    const cellElement = document.querySelector(`[data-cell="${cellAddress}"]`);
                    if (!sheet[cellAddress]) {
                        sheet[cellAddress] = { t: 's', v: cellElement ? cellElement.textContent : '' };
                    }
                    if (!sheet[cellAddress].s) {
                        sheet[cellAddress].s = {};
                    }

                    switch(property) {
                        case 'fontWeight':
                            if (!sheet[cellAddress].s.font) sheet[cellAddress].s.font = {};
                            if (value === 'bold' && sheet[cellAddress].s.font.bold) {
                                delete sheet[cellAddress].s.font.bold;
                                if (cellElement) cellElement.style.fontWeight = 'normal';
                            } else {
                                sheet[cellAddress].s.font.bold = (value === 'bold');
                                if (cellElement) cellElement.style.fontWeight = value;
                            }
                            break;
                        case 'fontStyle':
                            if (!sheet[cellAddress].s.font) sheet[cellAddress].s.font = {};
                            if (value === 'italic' && sheet[cellAddress].s.font.italic) {
                                delete sheet[cellAddress].s.font.italic;
                                if (cellElement) cellElement.style.fontStyle = 'normal';
                            } else {
                                sheet[cellAddress].s.font.italic = (value === 'italic');
                                if (cellElement) cellElement.style.fontStyle = value;
                            }
                            break;
                        case 'textDecoration':
                            if (!sheet[cellAddress].s.font) sheet[cellAddress].s.font = {};
                            if (value === 'underline' && sheet[cellAddress].s.font.underline) {
                                delete sheet[cellAddress].s.font.underline;
                                if (cellElement) cellElement.style.textDecoration = 'none';
                            } else {
                                sheet[cellAddress].s.font.underline = (value === 'underline');
                                if (cellElement) cellElement.style.textDecoration = value;
                            }
                            break;
                        case 'color':
                            if (!sheet[cellAddress].s.font) sheet[cellAddress].s.font = {};
                            if (!sheet[cellAddress].s.font.color) sheet[cellAddress].s.font.color = {};
                            sheet[cellAddress].s.font.color.rgb = value.replace('#', '');
                            if (cellElement) cellElement.style.color = value;
                            break;
                        case 'backgroundColor':
                            if (!sheet[cellAddress].s.fill) sheet[cellAddress].s.fill = { patternType: 'solid' };
                            if (!sheet[cellAddress].s.fill.fgColor) sheet[cellAddress].s.fill.fgColor = {};
                            if (value === '#ffffff') {
                                delete sheet[cellAddress].s.fill;
                            } else {
                                sheet[cellAddress].s.fill.fgColor.rgb = value.replace('#', '');
                            }
                            if (cellElement) cellElement.style.backgroundColor = value;
                            break;
                        case 'textAlign':
                            if (!sheet[cellAddress].s.alignment) sheet[cellAddress].s.alignment = {};
                            sheet[cellAddress].s.alignment.horizontal = value;
                            if (cellElement) cellElement.style.textAlign = value;
                            break;
                        case 'fontFamily':
                            if (!sheet[cellAddress].s.font) sheet[cellAddress].s.font = {};
                            sheet[cellAddress].s.font.name = value;
                            if (cellElement) cellElement.style.fontFamily = value;
                            break;
                        case 'fontSize':
                            if (!sheet[cellAddress].s.font) sheet[cellAddress].s.font = {};
                            sheet[cellAddress].s.font.sz = parseInt(value);
                            if (cellElement) cellElement.style.fontSize = value;
                            break;
                    }
                });
            }

            function addRow() {
                if (selectedRows.size === 0 && !activeCell) return;
                saveState();

                const sheet = workbook.Sheets[currentSheetName];
                const range = XLSX.utils.decode_range(sheet['!ref'] || 'A1');
                
                let rowToInsert;
                if (selectedRows.size > 0) {
                    const rows = Array.from(selectedRows);
                    rowToInsert = Math.max(...rows) + 1;
                } else {
                    rowToInsert = parseInt(activeCell.dataset.row) + 1;
                }
                
                const newRange = { s: { r: range.s.r, c: range.s.c }, e: { r: range.e.r + 1, c: range.e.c } };
                sheet['!ref'] = XLSX.utils.encode_range(newRange);
                
                for (let r = range.e.r; r >= rowToInsert; r--) {
                    for (let c = range.s.c; c <= range.e.c; c++) {
                        const oldAddr = XLSX.utils.encode_cell({ r, c });
                        const newAddr = XLSX.utils.encode_cell({ r: r + 1, c });
                        if (sheet[oldAddr]) {
                            sheet[newAddr] = sheet[oldAddr];
                            delete sheet[oldAddr];
                        }
                    }
                }
                
                renderSheet(currentSheetName);
            }

            function removeRow() {
                if (selectedRows.size === 0) {
                    showAlert('Please select at least one row header first!');
                    return;
                }
                saveState();

                const sheet = workbook.Sheets[currentSheetName];
                const range = XLSX.utils.decode_range(sheet['!ref'] || 'A1');
                
                // Convert selectedRows set to sorted array (descending to remove from bottom up)
                const rowsToRemove = Array.from(selectedRows).sort((a, b) => b - a);
                
                rowsToRemove.forEach(rowToRemove => {
                    if (rowToRemove < range.s.r || rowToRemove > range.e.r) return;
                    
                    for (let r = rowToRemove; r < range.e.r; r++) {
                        for (let c = range.s.c; c <= range.e.c; c++) {
                            const nextAddr = XLSX.utils.encode_cell({ r: r + 1, c });
                            const currAddr = XLSX.utils.encode_cell({ r, c });
                            if (sheet[nextAddr]) {
                                sheet[currAddr] = sheet[nextAddr];
                                delete sheet[nextAddr];
                            } else if (sheet[currAddr]) {
                                delete sheet[currAddr];
                            }
                        }
                    }
                    
                    range.e.r--;
                });
                
                sheet['!ref'] = XLSX.utils.encode_range(range);
                clearSelection();
                renderSheet(currentSheetName);
            }

            function addColumn() {
                if (selectedColumns.size === 0 && !activeCell) return;
                saveState();

                const sheet = workbook.Sheets[currentSheetName];
                const range = XLSX.utils.decode_range(sheet['!ref'] || 'A1');
                
                let colToInsert;
                if (selectedColumns.size > 0) {
                    // If columns selected, insert after last selected column
                    const cols = Array.from(selectedColumns).map(col => XLSX.utils.decode_col(col));
                    colToInsert = Math.max(...cols) + 1;
                } else {
                    colToInsert = parseInt(activeCell.dataset.col) + 1;
                }
                
                const newRange = { s: { r: range.s.r, c: range.s.c }, e: { r: range.e.r, c: range.e.c + 1 } };
                sheet['!ref'] = XLSX.utils.encode_range(newRange);
                
                for (let c = range.e.c; c >= colToInsert; c--) {
                    for (let r = range.s.r; r <= range.e.r; r++) {
                        const oldAddr = XLSX.utils.encode_cell({ r, c });
                        const newAddr = XLSX.utils.encode_cell({ r, c: c + 1 });
                        if (sheet[oldAddr]) {
                            sheet[newAddr] = sheet[oldAddr];
                            delete sheet[oldAddr];
                        }
                    }
                }
                
                renderSheet(currentSheetName);
            }

            function removeColumn() {
                if (selectedColumns.size === 0) {
                    showAlert('Please select at least one column header first!');
                    return;
                }
                saveState();

                const sheet = workbook.Sheets[currentSheetName];
                const range = XLSX.utils.decode_range(sheet['!ref'] || 'A1');
                
                // Convert selectedColumns to sorted indices (descending to remove from right to left)
                const colsToRemove = Array.from(selectedColumns).map(col => XLSX.utils.decode_col(col)).sort((a, b) => b - a);
                
                colsToRemove.forEach(colToRemove => {
                    if (colToRemove < range.s.c || colToRemove > range.e.c) return;
                    
                    for (let c = colToRemove; c < range.e.c; c++) {
                        for (let r = range.s.r; r <= range.e.r; r++) {
                            const nextAddr = XLSX.utils.encode_cell({ r, c: c + 1 });
                            const currAddr = XLSX.utils.encode_cell({ r, c });
                            if (sheet[nextAddr]) {
                                sheet[currAddr] = sheet[nextAddr];
                                delete sheet[nextAddr];
                            } else if (sheet[currAddr]) {
                                delete sheet[currAddr];
                            }
                        }
                    }
                    
                    range.e.c--;
                });
                
                sheet['!ref'] = XLSX.utils.encode_range(range);
                clearSelection();
                renderSheet(currentSheetName);
            }

            function downloadWorkbook() {
                if (!workbook) return;
                XLSX.writeFile(workbook, currentFileName);
            }

            // Cell click handler
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('excel-cell') && !e.target.classList.contains('excel-header')) {
                    if (activeCell) {
                        activeCell.classList.remove('active');
                    }
                    activeCell = e.target;
                    activeCell.classList.add('active');
                    cellRef.textContent = activeCell.dataset.cell;
                    formulaInput.textContent = activeCell.textContent;
                    // Auto-fit columns on selection change, like VBA's SelectionChange
                    autoFitColumns();
                }
            });

            let autoFitTimeout;
            
            // Formula input handler
            formulaInput.addEventListener('input', function() {
                if (activeCell) {
                    saveState();
                    activeCell.textContent = this.textContent;
                    const cellAddress = activeCell.dataset.cell;
                    const sheet = workbook.Sheets[currentSheetName];
                    if (!sheet[cellAddress]) {
                        sheet[cellAddress] = { t: 's', s: { alignment: { horizontal: 'center' } } };
                    }
                    sheet[cellAddress].v = this.textContent;
                    if (!sheet[cellAddress].s) {
                        sheet[cellAddress].s = { alignment: { horizontal: 'center' } };
                    }
                    if (!sheet[cellAddress].s.alignment) {
                        sheet[cellAddress].s.alignment = {};
                    }
                    if (!sheet[cellAddress].s.alignment.horizontal) {
                        sheet[cellAddress].s.alignment.horizontal = 'center';
                    }

                    // Debounced auto-fit
                    clearTimeout(autoFitTimeout);
                    autoFitTimeout = setTimeout(autoFitColumns, 300);
                }
            });

            // Sheet navigation buttons
            document.getElementById('excel-sheet-left').addEventListener('click', function() {
                const tabsContainer = document.getElementById('excel-sheet-tabs');
                tabsContainer.scrollBy({ left: -100, behavior: 'smooth' });
            });
            document.getElementById('excel-sheet-right').addEventListener('click', function() {
                const tabsContainer = document.getElementById('excel-sheet-tabs');
                tabsContainer.scrollBy({ left: 100, behavior: 'smooth' });
            });
            
            // Add new sheet button
            document.getElementById('excel-sheet-add').addEventListener('click', function() {
                saveState();
                const newSheetName = `Sheet${workbook.SheetNames.length + 1}`;
                const wsData = [['']];
                const ws = XLSX.utils.aoa_to_sheet(wsData);
                XLSX.utils.book_append_sheet(workbook, ws, newSheetName);
                renderSheetTabs();
                renderSheet(newSheetName);
            });

            // Cell edit handler
            document.addEventListener('input', function(e) {
                if (e.target.classList.contains('excel-cell') && !e.target.classList.contains('excel-header')) {
                    saveState();
                    formulaInput.textContent = e.target.textContent;
                    const cellAddress = e.target.dataset.cell;
                    const sheet = workbook.Sheets[currentSheetName];
                    if (!sheet[cellAddress]) {
                        sheet[cellAddress] = { t: 's', s: { alignment: { horizontal: 'center' } } };
                    }
                    sheet[cellAddress].v = e.target.textContent;
                    if (!sheet[cellAddress].s) {
                        sheet[cellAddress].s = { alignment: { horizontal: 'center' } };
                    }
                    if (!sheet[cellAddress].s.alignment) {
                        sheet[cellAddress].s.alignment = {};
                    }
                    if (!sheet[cellAddress].s.alignment.horizontal) {
                        sheet[cellAddress].s.alignment.horizontal = 'center';
                    }

                    // Debounced auto-fit
                    clearTimeout(autoFitTimeout);
                    autoFitTimeout = setTimeout(autoFitColumns, 300);
                }
            });
        });
    </script>

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
</body>
</html>