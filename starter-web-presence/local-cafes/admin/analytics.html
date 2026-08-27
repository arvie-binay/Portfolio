<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics — CaféHub Management System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Segoe UI", Arial, sans-serif; }
        body { background: #f6f4f1; color: #292421; }
        .dashboard { display: flex; min-height: 100vh; }
        .sidebar {
    width: 250px;
    background: #2c211c;
    color: white;

    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;

    padding: 20px 15px;

    z-index: 1000;

    /* Smoothly resize the sidebar */
    transition: width 0.3s ease;

    overflow-y: auto;
    overflow-x: hidden;

    scrollbar-width: thin;
    scrollbar-color: #5a453d transparent;
}
/* =========================
   COLLAPSED SIDEBAR
========================= */
/* =========================
   COLLAPSED LOGO
========================= */

/* Hide CaféHub text */
.sidebar.collapsed .logo-text {
    display: none;
}

/* Center the coffee logo */
.sidebar.collapsed .logo {
    justify-content: center;
    align-items: center;

    padding-left: 0;
    padding-right: 0;

    gap: 0;
}

/* Keep the coffee icon visible */
.sidebar.collapsed .logo-icon {
    display: flex;

    width: 42px;
    height: 42px;

    flex-shrink: 0;

    align-items: center;
    justify-content: center;
}
.sidebar.collapsed {
    width: 75px;
}   
/* Hide logo text when sidebar is collapsed */
.sidebar.collapsed .logo h2,
.sidebar.collapsed .logo span {
    display: none;
}
/* Center logo icon */
.sidebar.collapsed .logo {
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}
/* Hide menu text when collapsed */
.sidebar.collapsed .sidebar-menu a span:not(.icon) {
    display: none;
}
.sidebar.collapsed .sidebar-menu a {
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}
.sidebar.collapsed .sidebar-menu .icon {
    display: block;
    width: 25px;
    margin: 0;
    text-align: center;
}
.sidebar.collapsed .menu-title {
    display: none;
}

/* Custom Scrollbar for Chrome, Edge, Safari */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar::-webkit-scrollbar-thumb {
    background-color: #5a453d; /* Matches your warm brown theme */
    border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background-color: #7c5f54; /* Highlight color on hover */
}
        .logo { display: flex; align-items: center; gap: 12px; padding: 10px 12px 25px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .logo-icon { width: 42px; height: 42px; background: #c48a5a; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; }
        .logo h2 { font-size: 20px; }
        .logo span { display: block; font-size: 11px; color: #cdbeb5; margin-top: 2px; }
        .menu-title { font-size: 11px; color: #9d8d83; margin: 25px 12px 10px; text-transform: uppercase; letter-spacing: 1px; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li { margin-bottom: 5px; }
        .sidebar-menu a { color: #d8ccc5; text-decoration: none; display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 9px; font-size: 14px; transition: 0.2s; }
        .sidebar-menu a:hover, .sidebar-menu a.active { background: #4a362c; color: white; }
        .sidebar-menu .icon { width: 25px; text-align: center; font-size: 17px; }
        .main {
    margin-left: 250px;
    width: calc(100% - 250px);
    min-height: 100vh;

    transition:
        margin-left 0.3s ease,
        width 0.3s ease;
}
.main.sidebar-collapsed {
    margin-left: 75px;
    width: calc(100% - 75px);
}
        .topbar { height: 70px; background: white; border-bottom: 1px solid #e9e3df; display: flex; align-items: center; justify-content: space-between; padding: 0 30px; position: sticky; top: 0; z-index: 900; }
        .page-title h1 { font-size: 22px; }
        .page-title p { color: #8b817b; font-size: 13px; margin-top: 3px; }
        .topbar-right { display: flex; align-items: center; gap: 20px; }
        .notification { position: relative; cursor: pointer; font-size: 20px; }
        .notification-badge { position: absolute; top: -6px; right: -7px; width: 17px; height: 17px; background: #d9534f; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 10px; }
        .user { display: flex; align-items: center; gap: 10px; }
        .user-avatar { width: 38px; height: 38px; border-radius: 50%; background: #c48a5a; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; }
        .user-info strong { display: block; font-size: 13px; }
        .user-info small { color: #8b817b; font-size: 11px; }
        .content { padding: 30px; }
        .card { background: white; border: 1px solid #eee7e2; border-radius: 14px; padding: 20px; }
        .card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
        .card-header h3 { font-size: 17px; }
        .card-header a { color: #a66b3f; text-decoration: none; font-size: 12px; }
       /* =========================
   MENU TOGGLE
========================= */

.menu-toggle {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 42px;
    height: 42px;

    border: none;
    background: transparent;

    font-size: 23px;
    cursor: pointer;

    color: #292421;
}

        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-bottom: 25px; }
        .stat-card { background: white; border-radius: 14px; padding: 20px; border: 1px solid #eee7e2; display: flex; justify-content: space-between; align-items: flex-start; }
        .stat-card h4 { color: #8b817b; font-size: 13px; font-weight: 500; }
        .stat-card h2 { margin-top: 8px; font-size: 25px; }
        .stat-change { margin-top: 7px; font-size: 11px; }
        .positive { color: #3c8c58; }
        .negative { color: #c94c4c; }
        .stat-icon { width: 45px; height: 45px; border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
        .brown { background: #f4e9df; }
        .green { background: #e5f2e8; }
        .orange { background: #fff0dc; }
        .blue { background: #e7eef8; }
        .purple { background: #f0e8f5; }
        .red { background: #fbe6e4; }

        .analytics-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px; }
        .analytics-left, .analytics-right { display: flex; flex-direction: column; gap: 20px; }

        .demographics-wrap { display: flex; flex-direction: column; gap: 22px; padding: 10px 0; }
        .age-group { display: flex; align-items: center; gap: 15px; }
        .age-label { width: 80px; font-size: 12px; color: #5a524c; font-weight: 500; }
        .donut-bar { flex: 1; height: 34px; border-radius: 8px; overflow: hidden; display: flex; background: #faf8f6; position: relative; }
        .donut-seg { height: 100%; }
        .age-count { width: 55px; text-align: right; font-size: 13px; font-weight: 600; color: #4a362c; }

        .peak-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 6px; align-items: end; height: 200px; padding: 10px 0 5px; }
        .peak-col { display: flex; flex-direction: column; align-items: center; gap: 6px; height: 100%; justify-content: flex-end; }
        .heat-bar { width: 100%; border-radius: 5px 5px 0 0; transition: 0.3s; min-height: 6px; }
        .heat-bar:hover { filter: brightness(0.9); }
        .heat-label { font-size: 9px; color: #8b817b; text-align: center; line-height: 1.1; }

        .staff-item { display: flex; align-items: center; justify-content: space-between; padding: 11px 0; border-bottom: 1px solid #f5f0ec; }
        .staff-item:last-child { border-bottom: none; padding-bottom: 0; }
        .staff-info { display: flex; align-items: center; gap: 12px; }
        .staff-avatar { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px; }
        .staff-name { font-size: 13px; font-weight: 500; }
        .staff-role { font-size: 11px; color: #8b817b; display: block; margin-top: 2px; }
        .staff-bar-wrap { width: 130px; height: 8px; background: #f4efe9; border-radius: 4px; overflow: hidden; margin: 0 15px; }
        .staff-bar { height: 100%; border-radius: 4px; background: #c48a5a; }
        .staff-count { font-size: 13px; font-weight: 700; color: #4a362c; min-width: 35px; text-align: right; }

        .reco-item { display: flex; align-items: flex-start; gap: 14px; padding: 14px 0; border-bottom: 1px solid #f5f0ec; }
        .reco-item:last-child { border-bottom: none; padding-bottom: 0; }
        .reco-badge { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
        .reco-text { flex: 1; }
        .reco-title { font-size: 13px; font-weight: 600; color: #292421; }
        .reco-desc { font-size: 12px; color: #7a706a; margin-top: 4px; line-height: 1.5; }
        .reco-tag { display: inline-block; margin-top: 7px; padding: 3px 9px; border-radius: 5px; font-size: 10px; font-weight: 600; }
        .tag-growth { background: #e5f2e8; color: #3c8c58; }
        .tag-ops { background: #fff0dc; color: #a86b16; }
        .tag-risk { background: #fbe6e4; color: #c94c4c; }
        .tag-cust { background: #e7eef8; color: #466a9f; }

        @media (max-width: 1100px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
            .analytics-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {

    .sidebar {
        width: 250px;
        transform: translateX(-100%);
    }

    .sidebar.open {
        transform: translateX(0);
    }

    .main,
    .main.sidebar-collapsed {
        margin-left: 0;
        width: 100%;
    }

    .topbar {
        padding: 0 18px;
    }

    .content {
        padding: 20px;
    }

    .stats {
        grid-template-columns: 1fr;
    }

    .user-info {
        display: none;
    }

    .staff-bar-wrap {
        display: none;
    }

}
        @media (max-width: 480px) {
            .topbar { height: 65px; }
            .page-title p { display: none; }
        }
        /* =========================================================
   USER PROFILE DROPDOWN
========================================================= */

.user-dropdown {
    position: relative;
}


/* Profile button */

.user-profile-btn {
    border: none;
    background: transparent;

    display: flex;
    align-items: center;
    gap: 10px;

    cursor: pointer;

    padding: 5px 8px;

    border-radius: 10px;

    transition: 0.2s;
}

.user-profile-btn:hover {
    background: #f6f1ed;
}


/* Arrow */

.dropdown-arrow {
    color: #8b817b;

    font-size: 14px;

    margin-left: 3px;

    transition: 0.2s;
}


/* Dropdown */

.profile-dropdown {
    position: absolute;

    top: calc(100% + 10px);
    right: 0;

    width: 270px;

    background: white;

    border: 1px solid #eee7e2;

    border-radius: 13px;

    box-shadow:
        0 10px 30px rgba(44, 33, 28, 0.12);

    padding: 10px;

    z-index: 2000;

    /* Hidden by default */
    display: none;

    animation: dropdownAnimation 0.18s ease;
}


/* Show dropdown */

.profile-dropdown.show {
    display: block;
}


/* Dropdown animation */

@keyframes dropdownAnimation {

    from {
        opacity: 0;
        transform: translateY(-5px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


/* Dropdown header */

.dropdown-header {
    display: flex;

    align-items: center;

    gap: 12px;

    padding: 10px;
}


/* Large dropdown avatar */

.dropdown-avatar {
    width: 45px;
    height: 45px;

    border-radius: 50%;

    background: #c48a5a;

    color: white;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 14px;

    font-weight: bold;
}


.dropdown-header strong {
    display: block;

    font-size: 13px;

    color: #332b27;
}


.dropdown-header small {
    display: block;

    color: #8b817b;

    font-size: 11px;

    margin-top: 3px;
}


/* Divider */

.dropdown-divider {
    height: 1px;

    background: #eee7e2;

    margin: 7px 0;
}


/* Dropdown item */

.dropdown-item {
    width: 100%;

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 11px;

    border-radius: 9px;

    text-decoration: none;

    color: #403631;

    background: transparent;

    border: none;

    text-align: left;

    cursor: pointer;

    transition: 0.2s;
}


.dropdown-item:hover {
    background: #f8f2ed;
}


/* Icon */

.dropdown-item > span {
    width: 32px;
    height: 32px;

    border-radius: 8px;

    background: #f4e9df;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 15px;

    flex-shrink: 0;
}


/* Text */

.dropdown-item strong {
    display: block;

    font-size: 12px;

    color: #403631;
}


.dropdown-item small {
    display: block;

    color: #91857d;

    font-size: 10px;

    margin-top: 2px;
}


/* Logout */

.logout-item:hover {
    background: #fff1ef;
}


.logout-item:hover > span {
    background: #f9dddd;
}


.logout-item:hover strong {
    color: #c94c4c;
}


/* Mobile */

@media (max-width: 480px) {

    .profile-dropdown {
        width: 250px;

        right: -5px;
    }

    .dropdown-arrow {
        display: none;
    }

}
/* =========================================================
   LOGOUT CONFIRMATION MODAL
========================================================= */

.logout-modal-overlay {

    position: fixed;

    inset: 0;

    background: rgba(44, 33, 28, 0.55);

    display: none;

    align-items: center;
    justify-content: center;

    z-index: 5000;

    padding: 20px;
}


/* Show modal */

.logout-modal-overlay.show {
    display: flex;
}


/* Modal */

.logout-modal {

    width: 100%;
    max-width: 400px;

    background: white;

    border-radius: 16px;

    padding: 30px;

    text-align: center;

    box-shadow:
        0 20px 50px rgba(0,0,0,0.2);

    animation: logoutModalAnimation 0.2s ease;
}


/* Animation */

@keyframes logoutModalAnimation {

    from {
        opacity: 0;
        transform: scale(0.95) translateY(10px);
    }

    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }

}


/* Logout icon */

.logout-modal-icon {

    width: 60px;
    height: 60px;

    margin: 0 auto 15px;

    background: #fff0ed;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 25px;
}


/* Title */

.logout-modal h2 {

    font-size: 20px;

    color: #332b27;

    margin-bottom: 8px;
}


/* Message */

.logout-modal p {

    color: #8b817b;

    font-size: 13px;

    line-height: 1.6;

    margin-bottom: 25px;
}


/* Buttons */

.logout-modal-actions {

    display: flex;

    gap: 10px;
}


/* Cancel */

.logout-cancel {

    flex: 1;

    padding: 11px;

    border: 1px solid #e2d9d3;

    background: white;

    color: #665c56;

    border-radius: 9px;

    font-size: 12px;

    font-weight: 600;

    cursor: pointer;

    transition: 0.2s;
}


.logout-cancel:hover {

    background: #f7f3f0;
}


/* Confirm */

.logout-confirm {

    flex: 1;

    padding: 11px;

    border: none;

    background: #c94c4c;

    color: white;

    border-radius: 9px;

    font-size: 12px;

    font-weight: 600;

    cursor: pointer;

    transition: 0.2s;
}


.logout-confirm:hover {

    background: #b63d3d;

}
</style>
</head>
<body>
<div class="dashboard">
    <aside class="sidebar" id="sidebar">

    <!-- =========================
         LOGO
    ========================== -->
    <div class="logo">

        <div class="logo-icon">
            ☕
        </div>

        <div class="logo-text">
            <h2>CaféHub</h2>
            <span>Management System</span>
        </div>

    </div>


    <!-- =========================
         MAIN
    ========================== -->

    <div class="menu-title">
        Main
    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="dashboard.php">

                <span class="icon">📊</span>

                <span class="menu-text">
                    Dashboard
                </span>

            </a>
        </li>


        <li>
            <a href="orders.php">

                <span class="icon">🛒</span>

                <span class="menu-text">
                    Orders
                </span>

            </a>
        </li>


        <li>
            <a href="menu.php">

                <span class="icon">🍔</span>

                <span class="menu-text">
                    Menu
                </span>

            </a>
        </li>


        <li>
            <a href="tables.php">

                <span class="icon">🪑</span>

                <span class="menu-text">
                    Tables
                </span>

            </a>
        </li>


        <li>
            <a href="reservations.php">

                <span class="icon">📅</span>

                <span class="menu-text">
                    Reservations
                </span>

            </a>
        </li>

    </ul>


    <!-- =========================
         MANAGEMENT
    ========================== -->

    <div class="menu-title">
        Management
    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="inventory.php">

                <span class="icon">📦</span>

                <span class="menu-text">
                    Inventory
                </span>

            </a>
        </li>


        <li>
            <a href="customers.php">

                <span class="icon">👥</span>

                <span class="menu-text">
                    Customers
                </span>

            </a>
        </li>


        <li>
            <a href="staff.php">

                <span class="icon">👨‍💼</span>

                <span class="menu-text">
                    Staff
                </span>

            </a>
        </li>


        <li>
            <a href="payments.php">

                <span class="icon">💳</span>

                <span class="menu-text">
                    Payments
                </span>

            </a>
        </li>

    </ul>


    <!-- =========================
         REPORTS
    ========================== -->

    <div class="menu-title">
        Reports
    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="sales-reports.php">

                <span class="icon">📈</span>

                <span class="menu-text">
                    Sales Reports
                </span>

            </a>
        </li>


        <li>
            <a href="analytics.php" class="active">

                <span class="icon">📊</span>

                <span class="menu-text">
                    Analytics
                </span>

            </a>
        </li>


        <li>
            <a href="settings.php">

                <span class="icon">⚙️</span>

                <span class="menu-text">
                    Settings
                </span>

            </a>
        </li>

    </ul>

</aside>

    <main class="main">
        <header class="topbar">
            <div style="display:flex; align-items:center; gap:15px;">
                <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
                <div class="page-title">
                    <h1>Analytics</h1>
                    <p>Insights and performance KPIs</p>
                </div>
            </div>
            <div class="topbar-right">
                <div class="notification">🔔<span class="notification-badge">4</span></div>
               <div class="user-dropdown">

    <!-- USER PROFILE BUTTON -->
    <button class="user-profile-btn" onclick="toggleUserDropdown(event)">

        <div class="user-avatar">
            KB
        </div>

        <div class="user-info">

            <strong>
                King Binay
            </strong>

            <small>
                Administrator
            </small>

        </div>

        <span class="dropdown-arrow">
            ▾
        </span>

    </button>


    <!-- USER DROPDOWN -->
    <div class="profile-dropdown" id="profileDropdown">

        <div class="dropdown-header">

            <div class="dropdown-avatar">
                KB
            </div>

            <div>

                <strong>
                    King Binay
                </strong>

                <small>
                    Administrator
                </small>

            </div>

        </div>


        <div class="dropdown-divider"></div>


        <a href="settings.php#my-profile" class="dropdown-item">

            <span>
                👤
            </span>

            <div>
                <strong>My Profile</strong>
                <small>View your account</small>
            </div>

        </a>


        <a href="settings.php" class="dropdown-item">

            <span>
                ⚙️
            </span>

            <div>
                <strong>Settings</strong>
                <small>Manage system settings</small>
            </div>

        </a>


        <div class="dropdown-divider"></div>


        <button
            type="button"
            class="dropdown-item logout-item"
            onclick="openLogoutModal()"
        >

            <span>
                🚪
            </span>

            <div>
                <strong>Logout</strong>
                <small>Sign out of your account</small>
            </div>

        </button>

    </div>

</div>
            </div>
        </header>

        <div class="content">
            <div class="stats">
                <div class="stat-card">
                    <div>
                        <h4>Foot Traffic Today</h4>
                        <h2>126</h2>
                        <div class="stat-change positive">↑ 5.4% from yesterday</div>
                    </div>
                    <div class="stat-icon blue">🚶</div>
                </div>
                <div class="stat-card">
                    <div>
                        <h4>Avg Time Spent</h4>
                        <h2>32min</h2>
                        <div class="stat-change positive">↑ 3min vs last week</div>
                    </div>
                    <div class="stat-icon purple">⏱️</div>
                </div>
                <div class="stat-card">
                    <div>
                        <h4>Bounce Rate</h4>
                        <h2>8%</h2>
                        <div class="stat-change positive">↓ 2.1% improvement</div>
                    </div>
                    <div class="stat-icon red">🚪</div>
                </div>
                <div class="stat-card">
                    <div>
                        <h4>Conversion Rate</h4>
                        <h2>74%</h2>
                        <div class="stat-change positive">↑ 4.2% this month</div>
                    </div>
                    <div class="stat-icon green">✅</div>
                </div>
                <div class="stat-card">
                    <div>
                        <h4>Customer Retention</h4>
                        <h2>68%</h2>
                        <div class="stat-change positive">↑ 6.5% YoY</div>
                    </div>
                    <div class="stat-icon orange">❤️</div>
                </div>
                <div class="stat-card">
                    <div>
                        <h4>Peak Hour</h4>
                        <h2>2-4 PM</h2>
                        <div class="stat-change positive">+42 orders avg</div>
                    </div>
                    <div class="stat-icon brown">📈</div>
                </div>
            </div>

            <div class="analytics-grid">
                <div class="analytics-left">
                    <div class="card">
                        <div class="card-header">
                            <h3>Customer Demographics</h3>
                            <a href="#">Details →</a>
                        </div>
                        <div class="demographics-wrap">
                            <div class="age-group">
                                <span class="age-label">Under 18</span>
                                <div class="donut-bar">
                                    <div class="donut-seg" style="width:38%; background:#c48a5a;"></div>
                                    <div class="donut-seg" style="width:32%; background:#e8a760;"></div>
                                    <div class="donut-seg" style="width:30%; background:#f0c490;"></div>
                                </div>
                                <span class="age-count">18%</span>
                            </div>
                            <div class="age-group">
                                <span class="age-label">18-24</span>
                                <div class="donut-bar">
                                    <div class="donut-seg" style="width:45%; background:#7ab288;"></div>
                                    <div class="donut-seg" style="width:35%; background:#9bc9a6;"></div>
                                    <div class="donut-seg" style="width:20%; background:#bddbc4;"></div>
                                </div>
                                <span class="age-count">32%</span>
                            </div>
                            <div class="age-group">
                                <span class="age-label">25-34</span>
                                <div class="donut-bar">
                                    <div class="donut-seg" style="width:52%; background:#7aa1c9;"></div>
                                    <div class="donut-seg" style="width:30%; background:#9bbbd9;"></div>
                                    <div class="donut-seg" style="width:18%; background:#bcd5e6;"></div>
                                </div>
                                <span class="age-count">28%</span>
                            </div>
                            <div class="age-group">
                                <span class="age-label">35-44</span>
                                <div class="donut-bar">
                                    <div class="donut-seg" style="width:40%; background:#a88cc4;"></div>
                                    <div class="donut-seg" style="width:36%; background:#bfa8d4;"></div>
                                    <div class="donut-seg" style="width:24%; background:#d5c4e3;"></div>
                                </div>
                                <span class="age-count">14%</span>
                            </div>
                            <div class="age-group">
                                <span class="age-label">45-54</span>
                                <div class="donut-bar">
                                    <div class="donut-seg" style="width:30%; background:#d07a7a;"></div>
                                    <div class="donut-seg" style="width:38%; background:#dc9b9b;"></div>
                                    <div class="donut-seg" style="width:32%; background:#e7bcbc;"></div>
                                </div>
                                <span class="age-count">5%</span>
                            </div>
                            <div class="age-group">
                                <span class="age-label">55+</span>
                                <div class="donut-bar">
                                    <div class="donut-seg" style="width:24%; background:#c9a76b;"></div>
                                    <div class="donut-seg" style="width:40%; background:#d6bb8a;"></div>
                                    <div class="donut-seg" style="width:36%; background:#e3cfa8;"></div>
                                </div>
                                <span class="age-count">3%</span>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3>Peak Hours by Foot Traffic</h3>
                            <a href="#">Heatmap →</a>
                        </div>
                        <div class="peak-grid">
                            <div class="peak-col"><div class="heat-bar" style="height:12%; background:#e7d9cc;"></div><span class="heat-label">7AM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:28%; background:#d8bfaa;"></div><span class="heat-label">8AM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:45%; background:#c8a588;"></div><span class="heat-label">9AM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:52%; background:#bf9370;"></div><span class="heat-label">10AM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:60%; background:#b5825a;"></div><span class="heat-label">11AM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:74%; background:#a66b3f;"></div><span class="heat-label">12PM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:66%; background:#b07a4d;"></div><span class="heat-label">1PM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:88%; background:#8d5a32;"></div><span class="heat-label">2PM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:95%; background:#7a4c29;"></div><span class="heat-label">3PM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:70%; background:#a06840;"></div><span class="heat-label">4PM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:54%; background:#b3835f;"></div><span class="heat-label">5PM</span></div>
                            <div class="peak-col"><div class="heat-bar" style="height:36%; background:#c69f82;"></div><span class="heat-label">6PM</span></div>
                        </div>
                    </div>
                </div>

                <div class="analytics-right">
                    <div class="card">
                        <div class="card-header">
                            <h3>Top Performing Staff</h3>
                            <a href="#">By Orders</a>
                        </div>
                        <div class="staff-item">
                            <div class="staff-info">
                                <div class="staff-avatar" style="background:#c48a5a;">JR</div>
                                <div>
                                    <div class="staff-name">Jessa Reyes</div>
                                    <small class="staff-role">Barista • Morning Shift</small>
                                </div>
                            </div>
                            <div class="staff-bar-wrap"><div class="staff-bar" style="width:96%;"></div></div>
                            <span class="staff-count">48</span>
                        </div>
                        <div class="staff-item">
                            <div class="staff-info">
                                <div class="staff-avatar" style="background:#7ab288;">PS</div>
                                <div>
                                    <div class="staff-name">Paolo Santos</div>
                                    <small class="staff-role">Barista • Mid Shift</small>
                                </div>
                            </div>
                            <div class="staff-bar-wrap"><div class="staff-bar" style="width:82%;"></div></div>
                            <span class="staff-count">41</span>
                        </div>
                        <div class="staff-item">
                            <div class="staff-info">
                                <div class="staff-avatar" style="background:#7aa1c9;">MC</div>
                                <div>
                                    <div class="staff-name">Mia Cruz</div>
                                    <small class="staff-role">Cashier • All Day</small>
                                </div>
                            </div>
                            <div class="staff-bar-wrap"><div class="staff-bar" style="width:74%;"></div></div>
                            <span class="staff-count">37</span>
                        </div>
                        <div class="staff-item">
                            <div class="staff-info">
                                <div class="staff-avatar" style="background:#a88cc4;">LT</div>
                                <div>
                                    <div class="staff-name">Liza Tan</div>
                                    <small class="staff-role">Server • Afternoon</small>
                                </div>
                            </div>
                            <div class="staff-bar-wrap"><div class="staff-bar" style="width:66%;"></div></div>
                            <span class="staff-count">33</span>
                        </div>
                        <div class="staff-item">
                            <div class="staff-info">
                                <div class="staff-avatar" style="background:#d07a7a;">RB</div>
                                <div>
                                    <div class="staff-name">Rico Bautista</div>
                                    <small class="staff-role">Barista • Closing</small>
                                </div>
                            </div>
                            <div class="staff-bar-wrap"><div class="staff-bar" style="width:58%;"></div></div>
                            <span class="staff-count">29</span>
                        </div>
                        <div class="staff-item">
                            <div class="staff-info">
                                <div class="staff-avatar" style="background:#c9a76b;">AD</div>
                                <div>
                                    <div class="staff-name">Ana Dela Cruz</div>
                                    <small class="staff-role">Server • Weekend</small>
                                </div>
                            </div>
                            <div class="staff-bar-wrap"><div class="staff-bar" style="width:48%;"></div></div>
                            <span class="staff-count">24</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>💡 Recommendations</h3>
                    <a href="#">View All →</a>
                </div>
                <div style="display:grid; grid-template-columns:repeat(2,1fr); gap: 0 40px;">
                    <div>
                        <div class="reco-item">
                            <div class="reco-badge" style="background:#e5f2e8;">📣</div>
                            <div class="reco-text">
                                <div class="reco-title">Promote Matcha Latte</div>
                                <div class="reco-desc">Matcha-based drinks show 15% weekly growth. Consider combo meals or loyalty bonus.</div>
                                <span class="reco-tag tag-growth">+15% growth</span>
                            </div>
                        </div>
                        <div class="reco-item">
                            <div class="reco-badge" style="background:#fff0dc;">🍰</div>
                            <div class="reco-text">
                                <div class="reco-title">Restock Cheesecake by 2PM</div>
                                <div class="reco-desc">82% of cheesecake sales happen 2-5PM. Avoid stockouts during peak demand.</div>
                                <span class="reco-tag tag-ops">Ops suggestion</span>
                            </div>
                        </div>
                        <div class="reco-item">
                            <div class="reco-badge" style="background:#fbe6e4;">⚠️</div>
                            <div class="reco-text">
                                <div class="reco-title">Low inventory: Fresh Milk</div>
                                <div class="reco-desc">Current stock (8L) will last ~1.5 days at current consumption. Place order today.</div>
                                <span class="reco-tag tag-risk">Action needed</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="reco-item">
                            <div class="reco-badge" style="background:#e7eef8;">⭐</div>
                            <div class="reco-text">
                                <div class="reco-title">Loyalty Program for 25-34 age group</div>
                                <div class="reco-desc">This segment has 62% revisit rate. Tiered rewards could boost retention further.</div>
                                <span class="reco-tag tag-cust">Customer</span>
                            </div>
                        </div>
                        <div class="reco-item">
                            <div class="reco-badge" style="background:#e5f2e8;">☕</div>
                            <div class="reco-text">
                                <div class="reco-title">Bundle: Croissant + Spanish Latte</div>
                                <div class="reco-desc">Top 2 items sold together. Bundle at ₱245 (vs ₱265 a la carte) to increase AOV.</div>
                                <span class="reco-tag tag-growth">+12% AOV est.</span>
                            </div>
                        </div>
                        <div class="reco-item">
                            <div class="reco-badge" style="background:#f0e8f5;">👥</div>
                            <div class="reco-text">
                                <div class="reco-title">Add staff during 2-4 PM peak</div>
                                <div class="reco-desc">Avg wait time spikes to 14min vs 6min baseline. Part-timer could reduce churn.</div>
                                <span class="reco-tag tag-ops">Staff planning</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
  function toggleSidebar() {

    const sidebar = document.getElementById("sidebar");
    const main = document.querySelector(".main");

    if (window.innerWidth <= 768) {

        // MOBILE
        // Slide sidebar in and out
        sidebar.classList.toggle("open");

    } else {

        // DESKTOP
        // Make sidebar small
        sidebar.classList.toggle("collapsed");

        // Move main content
        main.classList.toggle("sidebar-collapsed");

    }
}
    document.addEventListener("click", function(event) {
        const sidebar = document.getElementById("sidebar");
        const toggle = document.querySelector(".menu-toggle");
        if (window.innerWidth <= 768 && sidebar.classList.contains("open") && !sidebar.contains(event.target) && !toggle.contains(event.target)) {
            sidebar.classList.remove("open");
        }
    });
    /* =========================================================
   USER PROFILE DROPDOWN
========================================================= */

function toggleUserDropdown(event) {

    // Prevent the document click event from immediately
    // closing the dropdown.
    event.stopPropagation();

    const dropdown =
        document.getElementById("profileDropdown");

    dropdown.classList.toggle("show");

}


/* =========================================================
   CLOSE DROPDOWN WHEN CLICKING OUTSIDE
========================================================= */

document.addEventListener("click", function(event) {

    const dropdown =
        document.getElementById("profileDropdown");

    const userDropdown =
        document.querySelector(".user-dropdown");

    if (
        dropdown &&
        userDropdown &&
        !userDropdown.contains(event.target)
    ) {

        dropdown.classList.remove("show");

    }

});
/* =========================================================
   OPEN LOGOUT MODAL
========================================================= */

function openLogoutModal() {

    // Close profile dropdown first
    const dropdown =
        document.getElementById("profileDropdown");

    if (dropdown) {
        dropdown.classList.remove("show");
    }


    // Show logout modal
    const modal =
        document.getElementById("logoutModal");

    modal.classList.add("show");

}


/* =========================================================
   CLOSE LOGOUT MODAL
========================================================= */

function closeLogoutModal() {

    const modal =
        document.getElementById("logoutModal");

    modal.classList.remove("show");

}


/* =========================================================
   CONFIRM LOGOUT
========================================================= */

function confirmLogout() {

    /*
     * Change this to your actual logout PHP file.
     */

    window.location.href = "login.php";

}


/* =========================================================
   CLOSE MODAL WHEN CLICKING OUTSIDE
========================================================= */

document.getElementById("logoutModal")
    .addEventListener("click", function(event) {

        if (event.target === this) {

            closeLogoutModal();

        }

    });
</script>
<!-- =========================================================
     LOGOUT CONFIRMATION MODAL
========================================================= -->

<div class="logout-modal-overlay" id="logoutModal">

    <div class="logout-modal">

        <!-- Icon -->

        <div class="logout-modal-icon">
            🚪
        </div>


        <!-- Title -->

        <h2>
            Logout?
        </h2>


        <!-- Message -->

        <p>
            Are you sure you want to log out of your CaféHub account?
        </p>


        <!-- Buttons -->

        <div class="logout-modal-actions">

            <button
                type="button"
                class="logout-cancel"
                onclick="closeLogoutModal()"
            >
                Cancel
            </button>


            <button
                type="button"
                class="logout-confirm"
                onclick="confirmLogout()"
            >
                Logout
            </button>

        </div>

    </div>

</div>
</body>
</html>
