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
    <link rel="stylesheet" href="dashboard.css">
<body>
    <img src="../assets/images/close.png" alt="Close Icon" class="close-sidebar-btn" onclick="toggleSidebarVisibility()" />
    <aside class="sidebar">
        <div class="top-sidebar">
            <img src="../assets/images/logo.png" alt="EcoRiseAPU Logo"/>
            <!-- <img  src="../assets/images/close.png" alt="Close Icon" onclick="toggleSidebarVisibility()" /> -->
        </div>
        <ul class="nav-links">
            <li class="active_nav">
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

            <li>
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

        <section class="hero-banner">
            <div class="hero-content">
                <h1>Welcome back,<br><span class="name-banner"><?php echo $username ?>!</span></h1>
                <p>"Review and approve submitted events to ensure they meet campus guidelines. See the latest event requests and manage approvals below."</p>
                <a href="event.php" class="btn-primary">APPROVE EVENTS<span>🡺</span></a>
            </div>
        </section>

        <section class="stats-container">
            <div class="stat-card" style="--card-color: #00FF88;">
                <div class="stat-header">
                    <img src="../assets/images/clock.png" alt="Clock Icon">
                    <p>TOTAL</p>
                </div>
                <h2>45</h2>
                <label>VOLUNTEER HOURS</label>
                <div class="stats">
                    <img src="./../assets/images/trend.png" alt="Trending Icon" />
                    <span class="trend">+5.2H This Week</span>
                </div>
            </div>
            <div class="stat-card" style="--card-color: #60A5FA;">
                <div class="stat-header">
                    <img src="./../assets/images/calendar-check.png" alt="Calendar Icon">
                    <p>TOTAL</p>
                </div>
                <h2>15</h2>
                <label>ACTIVE EVENTS</label>
                <div class="stats">
                    <img src="./../assets/images/trend.png" alt="Trending Icon" />
                    <span class="trend">+32 Pending Approval</span>
                </div>
            </div>
            <div class="stat-card" style="--card-color: #C084FC;">
                <div class="stat-header">
                    <img src="./../assets/images/user_green.png" alt="active-voucher">
                    <p>TOTAL</p>
                </div>
                <h2>3</h2>
                <label>ACTIVE USERS</label>
                <div class="stats">
                    <img src="./../assets/images/trend.png" alt="Trending Icon" />
                    <span class="trend">1892 Students • 955 Organizers</span>
                </div>
            </div>
        </section>

        <div class="lower-grid">
            <div class="opportunities-panel">
                <div class="panel-header">
                    <h3>Events Management</h3>
                    <a href="event.php" id="browse-all">BROWSE ALL 🡺</a>
                </div>
                
                <div class="opp-item">
                    <div class="opp-thumb">
                        <img src="../assets/images/event-1.jpg" alt="event" class="event-img">
                    </div>
                    <div class="opp-info">
                        <h4>Sustainable Campus Planting Day</h4>
                        <p>📅 2026 MARCH 15</p>
                    </div>
                    <button class="btn-outline">APPROVE ></button>
                </div>

                <div class="opp-item">
                    <div class="opp-thumb">
                        <img src="../assets/images/event-2.jpg" alt="event" class="event-img">
                    </div>
                    <div class="opp-info">
                        <h4>Green Earth Tree Initiative</h4>
                        <p>📅 2026 MAY 20</p>
                    </div>
                    <button class="btn-outline">APPROVE ></button>
                </div>

                <div class="opp-item">
                    <div class="opp-thumb">
                        <img src="../assets/images/recycle.png" alt="event" class="event-img">
                    </div>
                    <div class="opp-info">
                        <h4>Eco Restoration Day</h4>
                        <p>📅 2026 JULY 22</p>
                    </div>
                    <button class="btn-outline">APPROVE ></button>
                </div>
            </div>

            <div class="goal-tracking-panel">
                <div class="badge-icon">🎖️</div>
                <label class="label-light">GOAL TRACKING</label>
                <h2>The Gold Badge</h2>
                <p>You are exactly 5 verified hours away from reaching elite status. Complete one more event this week.</p>
                
                <div class="progress-section">
                    <div class="progress-labels">
                        <span>PROGRESS: 45H</span>
                        <span>TARGET: 50H</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill"></div>
                    </div>
                </div>
                <button class="btn-white">CHECK PROGRESS</button>
            </div>
        </div>
    </div>
    <script src="header.js"></script>
</body>
</html>