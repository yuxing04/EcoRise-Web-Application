<?php
    include "../conn.php";
    include("../auth.php");

    if(!isset($_SESSION['role']) || $_SESSION['role'] !== "ADMIN"){
        header("Location: ../login/login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoStudent Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="report.css">
<body>

    <aside class="sidebar">
        <div class="top-sidebar">
            <img src="../assets/images/logo.png" alt="EcoRiseAPU Logo"/>
            <img src="../assets/images/close.png" alt="Close Icon" onclick="toggleSidebarVisibility()" />
        </div>
         <ul class="nav-links">
            <li>
                <a href="dashboard.php"><img src="../assets/images/home.png" alt="Home Icon">Dashboard</a>
            </li>

            <li>
                <a href="event.php"><img src="../assets/images/event.png" alt="Event Icon">Events Management</a>
            </li>

            <li>
                <a href="voucher.php"><img src="../assets/images/reward.png" alt="Reward Icon">Voucher Management</a>
            </li>

            <li>
                <a href="user.php"><img src="../assets/images/group.png" alt="Group Icon">User Management</a>
            </li>

            <li class="active_nav">
                <a href="report.php"><img src="../assets/images/report.png" alt="Group Icon">System Report</a>
            </li>

            <li>
                <a href="profile.php"><img src="../assets/images/user.png" alt="User Icon">Profile</a>
            </li>

            <li class="signout-item">
                <a href="../logout.php"><img src="./../assets/images/logout.png" alt="Sign Out Icon">Sign Out</a>
            </li>
        </ul>
    </aside>

    <div class="main-wrapper">
        <header class="top-header">
            <div class="hamburger-menu" onclick="toggleSidebarVisibility()">
                 <img src="./../assets/images/hamburger-menu.png" alt="Hamburger Menu" />
            </div>
            <div class="logo-icon">
                <img src="./../assets/images/logo-black.png" alt="EcoRiseAPU Logo" />
            </div>
            <div class="user-profile">
                <div class="user-text">
                    <strong><?php echo $username ?></strong>
                    <small>ADMIN</small>
                </div>
                <img src="<?php echo $avatar ?>" alt="user icon" class="user-icon" href="profile.php">
            </div>
        </header>

        <header class="main-header">
            <div class="page-heading">
                <h1>Event Management</h1>
                <p>Manage and approve events created by students.</p>
            </div>
            <button class="btn-export">
                <span class="icon">📄</span> Export Full Report
            </button>
        </header>

        <main class="dashboard-grid">
            <section class="card">
                <h2>Participation by Category</h2>
                <div class="chart-container">
                    <div class="bar-group">
                        <div class="bar env">
                            <span class="tooltip">Environment <br> value : 160</span>
                        </div>
                        <span class="bar-label">Environment</span>
                    </div>
                    <div class="bar-group">
                        <div class="bar comm">
                            <span class="tooltip">Community <br> value : 110</span>
                        </div>
                        <span class="bar-label">Community</span>
                    </div>
                    <div class="bar-group">
                        <div class="bar edu">
                            <span class="tooltip">Education <br> value : 75</span>
                        </div>
                        <span class="bar-label">Education</span>
                    </div>
                    <div class="bar-group">
                        <div class="bar health">
                            <span class="tooltip">Health <br> value : 55</span>
                        </div>
                        <span class="bar-label">Health</span>
                    </div>
                </div>
            </section>

            <section class="card">
                <h2>Recent System Activity</h2>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="dot green"></div>
                        <div class="activity-content">
                            <p>Event "Beach Cleanup" approved</p>
                            <small>2 mins ago</small>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="dot red"></div>
                        <div class="activity-content">
                            <p>User "Mark Wilson" banned</p>
                            <small>15 mins ago</small>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="dot blue"></div>
                        <div class="activity-content">
                            <p>New organizer registration</p>
                            <small>1 hour ago</small>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="dot accent"></div>
                        <div class="activity-content">
                            <p>Voucher report generated</p>
                            <small>3 hours ago</small>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="status-banner">
            <div class="banner-header">
                <h2>Voucher Distribution Status</h2>
                <p>Monitor integrity and participation certificates across the platform.</p>
            </div>
            <div class="metrics-grid">
                <div class="metric">
                    <span class="metric-label">Issued Today</span>
                    <span class="metric-value">124</span>
                </div>
                <div class="metric">
                    <span class="metric-label">Total Value</span>
                    <span class="metric-value">$1,240</span>
                </div>
                <div class="metric">
                    <span class="metric-label">Integrity Score</span>
                    <span class="metric-value score-high">99.9%</span>
                </div>
            </div>
        </footer>
    <script src="header.js"></script>
</body>
</html>