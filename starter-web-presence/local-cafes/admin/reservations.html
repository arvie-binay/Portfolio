<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservations — CaféHub Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background: #f6f4f1;
            color: #292421;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

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

    transition:
        width 0.3s ease,
        transform 0.3s ease;

    overflow-y: auto;
    overflow-x: hidden;

    scrollbar-width: thin;
    scrollbar-color: #5a453d transparent;
}
/* =========================
   COLLAPSED SIDEBAR
========================= */

.sidebar.collapsed {
    width: 75px;
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

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: #c48a5a;
            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
        }

        .logo h2 {
            font-size: 20px;
        }

        .logo span {
            display: block;
            font-size: 11px;
            color: #cdbeb5;
            margin-top: 2px;
        }

        .menu-title {
            font-size: 11px;
            color: #9d8d83;
            margin: 25px 12px 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            color: #d8ccc5;
            text-decoration: none;

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px;
            border-radius: 9px;

            font-size: 14px;

            transition: 0.2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #4a362c;
            color: white;
        }

        .sidebar-menu .icon {
            width: 25px;
            text-align: center;
            font-size: 17px;
        }

        .main {
    margin-left: 250px;
    width: calc(100% - 250px);
    min-height: 100vh;

    transition:
        margin-left 0.3s ease,
        width 0.3s ease;
}

/* Main content when sidebar is collapsed */
.main.sidebar-collapsed {
    margin-left: 75px;
    width: calc(100% - 75px);
}
/* =========================================================
   COLLAPSED SIDEBAR CONTENT
========================================================= */

/* Hide logo text */
.sidebar.collapsed .logo h2,
.sidebar.collapsed .logo span {
    display: none;
}

/* Center logo */
.sidebar.collapsed .logo {
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}

/* Remove unnecessary gap */
.sidebar.collapsed .logo {
    gap: 0;
}

/* Center menu icons */
.sidebar.collapsed .sidebar-menu a {
    justify-content: center;
    gap: 0;
    padding-left: 0;
    padding-right: 0;
}

/* Hide menu text */
.sidebar.collapsed .sidebar-menu a span:not(.icon) {
    display: none;
}

/* Hide section titles */
.sidebar.collapsed .menu-title {
    display: none;
}

/* Center icons */
.sidebar.collapsed .sidebar-menu .icon {
    width: auto;
    font-size: 18px;
}

/* Keep menu items properly sized */
.sidebar.collapsed .sidebar-menu a {
    width: 100%;
}

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e9e3df;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;

            position: sticky;
            top: 0;
            z-index: 900;
        }

        .page-title h1 {
            font-size: 22px;
        }

        .page-title p {
            color: #8b817b;
            font-size: 13px;
            margin-top: 3px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification {
            position: relative;
            cursor: pointer;
            font-size: 20px;
        }

        .notification-badge {
            position: absolute;
            top: -6px;
            right: -7px;

            width: 17px;
            height: 17px;

            background: #d9534f;
            color: white;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 10px;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #c48a5a;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: bold;
        }

        .user-info strong {
            display: block;
            font-size: 13px;
        }

        .user-info small {
            color: #8b817b;
            font-size: 11px;
        }

        .content {
            padding: 30px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 20px;

            border: 1px solid #eee7e2;

            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .stat-card h4 {
            color: #8b817b;
            font-size: 13px;
            font-weight: 500;
        }

        .stat-card h2 {
            margin-top: 8px;
            font-size: 25px;
        }

        .stat-change {
            margin-top: 7px;
            font-size: 11px;
        }

        .positive {
            color: #3c8c58;
        }

        .negative {
            color: #c94c4c;
        }

        .stat-icon {
            width: 45px;
            height: 45px;

            border-radius: 11px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
        }

        .brown {
            background: #f4e9df;
        }

        .green {
            background: #e5f2e8;
        }

        .orange {
            background: #fff0dc;
        }

        .blue {
            background: #e7eef8;
        }

        .card {
            background: white;
            border: 1px solid #eee7e2;
            border-radius: 14px;
            padding: 20px;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 20px;
        }

        .card-header h3 {
            font-size: 17px;
        }

        .card-header a {
            color: #a66b3f;
            text-decoration: none;
            font-size: 12px;
        }

        .reservation-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .table-card {
            overflow-x: auto;
        }

        .reservations-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        .reservations-table th {
            text-align: left;
            font-size: 11px;
            color: #8b817b;

            padding: 12px;

            background: #faf8f6;
        }

        .reservations-table td {
            padding: 14px 12px;

            border-bottom: 1px solid #f0ebe7;

            font-size: 13px;
        }

        .reservations-table tr:last-child td {
            border-bottom: none;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .completed {
            background: #e4f3e8;
            color: #398052;
        }

        .pending {
            background: #fff1d9;
            color: #a86b16;
        }

        .preparing {
            background: #e8eef8;
            color: #466a9f;
        }

        .confirmed {
            background: #e4f3e8;
            color: #398052;
        }

        .cancelled {
            background: #fbe5e5;
            color: #b4423a;
        }

        .action-links {
            display: flex;
            gap: 10px;
        }

        .action-links a {
            font-size: 11px;
            text-decoration: none;
            font-weight: 500;
        }

        .action-edit {
            color: #466a9f;
        }

        .action-cancel {
            color: #b4423a;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #4a4440;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd5ce;
            border-radius: 8px;
            font-size: 13px;
            background: white;
            color: #292421;
            transition: 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #c48a5a;
            box-shadow: 0 0 0 3px rgba(196,138,90,0.12);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .btn-book {
            width: 100%;
            padding: 12px;
            background: #2c211c;
            color: white;
            border: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-book:hover {
            background: #4a362c;
        }

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

        @media (max-width: 1100px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .reservation-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
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
        }

        @media (max-width: 480px) {

            .topbar {
                height: 65px;
            }

            .page-title p {
                display: none;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
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
         SIDEBAR LOGO
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
         MAIN MENU
    ========================== -->

    <div class="menu-title">
        Main
    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="dashboard.php">
                <span class="icon">📊</span>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="orders.php">
                <span class="icon">🛒</span>
                <span class="menu-text">Orders</span>
            </a>
        </li>

        <li>
            <a href="menu.php">
                <span class="icon">🍔</span>
                <span class="menu-text">Menu</span>
            </a>
        </li>

        <li>
            <a href="tables.php">
                <span class="icon">🪑</span>
                <span class="menu-text">Tables</span>
            </a>
        </li>

        <li>
            <a href="reservations.php" class="active">
                <span class="icon">📅</span>
                <span class="menu-text">Reservations</span>
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
                <span class="menu-text">Inventory</span>
            </a>
        </li>

        <li>
            <a href="customers.php">
                <span class="icon">👥</span>
                <span class="menu-text">Customers</span>
            </a>
        </li>

        <li>
            <a href="staff.php">
                <span class="icon">👨‍💼</span>
                <span class="menu-text">Staff</span>
            </a>
        </li>

        <li>
            <a href="payments.php">
                <span class="icon">💳</span>
                <span class="menu-text">Payments</span>
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
                <span class="menu-text">Sales Reports</span>
            </a>
        </li>

        <li>
            <a href="analytics.php">
                <span class="icon">📊</span>
                <span class="menu-text">Analytics</span>
            </a>
        </li>

        <li>
            <a href="settings.php">
                <span class="icon">⚙️</span>
                <span class="menu-text">Settings</span>
            </a>
        </li>

    </ul>

</aside>


    <main class="main">

        <header class="topbar">

            <div style="display:flex; align-items:center; gap:15px;">

                <button class="menu-toggle" onclick="toggleSidebar()">
                    ☰
                </button>

                <div class="page-title">
                    <h1>Reservations</h1>
                    <p>Bookings and scheduled table reservations</p>
                </div>

            </div>


            <div class="topbar-right">

                <div class="notification">
                    🔔
                    <span class="notification-badge">4</span>
                </div>

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
                        <h4>Today</h4>
                        <h2>8</h2>
                        <div class="stat-change positive">
                            3 completed so far
                        </div>
                    </div>

                    <div class="stat-icon brown">
                        📅
                    </div>

                </div>


                <div class="stat-card">

                    <div>
                        <h4>Tomorrow</h4>
                        <h2>5</h2>
                        <div class="stat-change positive">
                            2 for lunch, 3 dinner
                        </div>
                    </div>

                    <div class="stat-icon blue">
                        📆
                    </div>

                </div>


                <div class="stat-card">

                    <div>
                        <h4>This Week</h4>
                        <h2>24</h2>
                        <div class="stat-change positive">
                            ↑ 4 from last week
                        </div>
                    </div>

                    <div class="stat-icon green">
                        📊
                    </div>

                </div>


                <div class="stat-card">

                    <div>
                        <h4>Pending Confirm</h4>
                        <h2>3</h2>
                        <div class="stat-change negative">
                            Awaiting response
                        </div>
                    </div>

                    <div class="stat-icon orange">
                        ⏳
                    </div>

                </div>

            </div>


            <div class="reservation-grid">

                <div class="card table-card">

                    <div class="card-header">
                        <h3>Upcoming Reservations</h3>
                        <a href="#">View All →</a>
                    </div>

                    <table class="reservations-table">

                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Name</th>
                                <th>Guests</th>
                                <th>Table</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td><strong>#BKG-1001</strong></td>
                                <td>Maria Santos</td>
                                <td>4</td>
                                <td>Table 4</td>
                                <td>Aug 12</td>
                                <td>6:30 PM</td>
                                <td><span class="status confirmed">Confirmed</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>#BKG-1002</strong></td>
                                <td>John Cruz</td>
                                <td>2</td>
                                <td>Table 1</td>
                                <td>Aug 12</td>
                                <td>7:00 PM</td>
                                <td><span class="status confirmed">Confirmed</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>#BKG-1003</strong></td>
                                <td>Ana Lim</td>
                                <td>3</td>
                                <td>Table 2</td>
                                <td>Aug 12</td>
                                <td>7:30 PM</td>
                                <td><span class="status pending">Pending</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>#BKG-1004</strong></td>
                                <td>Carlos Group</td>
                                <td>6</td>
                                <td>Table 8</td>
                                <td>Aug 12</td>
                                <td>8:00 PM</td>
                                <td><span class="status confirmed">Confirmed</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>#BKG-1005</strong></td>
                                <td>Reyes Family</td>
                                <td>5</td>
                                <td>Table 6</td>
                                <td>Aug 12</td>
                                <td>8:30 PM</td>
                                <td><span class="status pending">Pending</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>#BKG-1006</strong></td>
                                <td>Lisa Tan</td>
                                <td>4</td>
                                <td>Table 7</td>
                                <td>Aug 12</td>
                                <td>9:00 PM</td>
                                <td><span class="status cancelled">Cancelled</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>#BKG-1007</strong></td>
                                <td>Mark Garcia</td>
                                <td>2</td>
                                <td>Table 5</td>
                                <td>Aug 13</td>
                                <td>12:30 PM</td>
                                <td><span class="status confirmed">Confirmed</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>#BKG-1008</strong></td>
                                <td>Delos Reyes</td>
                                <td>8</td>
                                <td>Table 11</td>
                                <td>Aug 13</td>
                                <td>7:00 PM</td>
                                <td><span class="status pending">Pending</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>#BKG-1009</strong></td>
                                <td>Mendoza Party</td>
                                <td>6</td>
                                <td>Table 3</td>
                                <td>Aug 14</td>
                                <td>6:00 PM</td>
                                <td><span class="status confirmed">Confirmed</span></td>
                                <td>
                                    <div class="action-links">
                                        <a href="#" class="action-edit">Edit</a>
                                        <a href="#" class="action-cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>


                <div class="card">

                    <div class="card-header">
                        <h3>New Reservation</h3>
                    </div>

                    <form onsubmit="event.preventDefault(); alert('Reservation booked!');">

                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" placeholder="Full name" required>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" placeholder="+63 9XX XXX XXXX" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="customer@email.com">
                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label>Guests</label>
                                <select required>
                                    <option value="">Select</option>
                                    <option>1 guest</option>
                                    <option>2 guests</option>
                                    <option>3 guests</option>
                                    <option>4 guests</option>
                                    <option>5 guests</option>
                                    <option>6 guests</option>
                                    <option>7 guests</option>
                                    <option>8 guests</option>
                                    <option>9+ guests</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Table</label>
                                <select required>
                                    <option value="">Select</option>
                                    <option>Table 1 · 2 pax</option>
                                    <option>Table 2 · 4 pax</option>
                                    <option>Table 3 · 6 pax</option>
                                    <option>Table 4 · 4 pax</option>
                                    <option>Table 5 · 2 pax</option>
                                    <option>Table 6 · 8 pax</option>
                                    <option>Table 7 · 4 pax</option>
                                    <option>Table 8 · 6 pax</option>
                                    <option>Table 9 · 2 pax</option>
                                    <option>Table 10 · 4 pax</option>
                                    <option>Table 11 · 8 pax</option>
                                    <option>Table 12 · 4 pax</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" required>
                            </div>

                            <div class="form-group">
                                <label>Time</label>
                                <input type="time" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Special Requests</label>
                            <textarea placeholder="Allergies, window seat, birthday, etc."></textarea>
                        </div>

                        <button type="submit" class="btn-book">
                            Book Reservation
                        </button>

                    </form>

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

        if (
            window.innerWidth <= 768 &&
            sidebar.classList.contains("open") &&
            !sidebar.contains(event.target) &&
            !toggle.contains(event.target)
        ) {

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
