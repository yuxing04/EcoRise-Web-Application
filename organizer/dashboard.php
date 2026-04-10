<?php
    include("../auth.php");

    if(!isset($_SESSION['role']) || $_SESSION['role'] !== "ORGANIZER"){
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
                <a href="events.php"><img src="../assets/images/event.png" alt="Calendar Icon">Event Management</a>
            </li>

            <li>
                <a href="attendance.php"><img src="../assets/images/group.png" alt="Participants Icon">Attendance Approval</a>
            </li>

            <li>
                <a href="report.php"><img src="../assets/images/business-report.png" alt="Report Icon">Impact Report</a>
            </li>

            <li>
                <a href="profile.php"><img src="../assets/images/user.png" alt="User Icon">Profile</a>
            </li>
            <li class="signout-item">
                <a href="../logout.php"><img src="../assets/images/logout.png" alt="Sign Out Icon">Sign Out</a>
            </li>
        </ul>
    </aside>

    <div class="main-wrapper">
        <header class="top-header">
            <div class="hamburger-menu" onclick="toggleSidebarVisibility()">
                 <img src="../assets/images/hamburger-menu.png" alt="Hamburger Menu" />
            </div>
            <div class="logo-icon">
                <img src="../assets/images/logo-black.png" alt="EcoRiseAPU Logo" />
            </div>
            <div class="user-profile">
                <div class="user-text">
                    <strong><?php echo htmlspecialchars($username) ?></strong>
                    <small>STUDENT</small>
                </div>
                <img src="<?php echo htmlspecialchars($avatar) ?>" alt="user icon" class="user-icon" href="profile.php">
            </div>
        </header>

        <section class="hero-banner">
            <div class="hero-content">
                <h1>Welcome back,<br><span class="name-banner"><?php echo htmlspecialchars($username) ?>!</span></h1>
                <p>You're making a real difference. Check out your impact summary below and see what new initiatives are happening this week.</p>
                <a href="events.html" class="btn-primary">CREATE NEW EVENTS <span>🡺</span></a>
            </div>
        </section>

        <section class="stats-container">
            <div class="stat-card" style="--card-color: #00FF88;">
                <div class="stat-header">
                    <img src="../assets/images/calendar-check.png" alt="Calendar Icon">
                    <p>ACTIVE</p>
                </div>
                <h2>3</h2>
                <label>ACTIVE EVENTS</label>
                <div class="stats">
                    <img src="../assets/images/trend.png" alt="Trending Icon" />
                    <span class="trend">+1 Event This Month</span>
                </div>
            </div>
            <div class="stat-card" style="--card-color: #60A5FA;">
                <div class="stat-header">
                    <img src="../assets/images/total impact.png" alt="Impact Icon">
                    <p>TOTAL</p>
                </div>
                <h2>15</h2>
                <label>TOTAL IMPACT</label>
                <div class="stats">
                    <img src="../assets/images/trend.png" alt="Trending Icon" />
                    <span class="trend">+2 This Month</span>
                </div>
            </div>
            <div class="stat-card" style="--card-color: #C084FC;">
                <div class="stat-header">
                    <img src="../assets/images/participants.png" alt="Participants Icon">
                    <p>AVAILABLE</p>
                </div>
                <h2>20</h2>
                <label>PARTICIPANTS</label>
                <div class="stats">
                    <img src="../assets/images/trend.png" alt="Trending Icon" />
                    <span class="trend">+5 Participants Per Event</span>
                </div>
            </div>
        </section>

        <div class="lower-grid">
            <div class="events-panel">
                <div class="panel-header">
                    <h3>Recent Events</h3>
                    <a href="events.html" id="browse-all">Create New Event 🡺</a>
                </div>
                
                <div class="events-item">
                    <div class="events-thumb">
                        <img src="../assets/images/event-1.jpg" alt="event" class="event-img">
                    </div>
                    <div class="events-info">
                        <h4>Main Campus Tree Blitz</h4>
                        <h5>Planting 200 saplings in the Campus.</h5>
                        <p >📅 2026 MAY 15</p> 
                            <p>📍 Pusat Bandar Puchong</p>
                            <p>👥 Quota 50</p>
                    </div>
                    <button class="btn-outline">View ></button>
                </div>

                <div class="events-item">
                    <div class="events-thumb">
                        <img src="../assets/images/event-2.jpg" alt="event" class="event-img">
                    </div>
                    <div class="events-info">
                        <h4>Riverbank Clean-Up</h4>
                        <h5>Cleaning up the river.</h5>
                        <p>📅 2026 MAY 20</p>
                        <p>📍 Bukit Jalil</p>
                        <p>👥 Quota 50</p>
                    </div>
                    <button class="btn-outline">View ></button>
                </div>

                <div class="events-item">
                    <div class="events-thumb">
                        <img src="../assets/images/recycle.png" alt="event" class="event-img">
                    </div>
                    <div class="events-info">
                        <h4>Weekly Recycling Drive.</h4>
                        <h5>Gather Sport and Recycling</h5>
                        <p>📅 2026 MAY 22</p>
                        <p>📍 Kuala Lumpur</p>
                        <p>👥 Quota 50</p>
                    </div>
                    <button class="btn-outline">View ></button>
                </div>
            </div>

        <div class="page-frame">
            <div class="stats-card">
            <h2 class="stats-title">Detailed Statistics</h2>
            
            <div class="stats-grid-container">
                <div class="stats-header">
                <div>EVENT</div>
                <div>PARTICIPANTS</div>
                <div>TREES PLANTED</div>
                <div>WASTE COLLECTED</div>
                </div>

                <div class="events-item stats-row">
                <div class="events-info">
                    <h4 class="event-display-name">Beach<br>Cleanup<br>2024</h4>
                </div>
                <div class="stat-value" data-label="PARTICIPANTS">2</div>
                <div class="stat-value green" data-label="TREES PLANTED">0</div>
                <div class="stat-value blue" data-label="WASTE COLLECTED">0 kg</div>
                </div>

                <div class="events-item stats-row">
                <div class="events-info">
                    <h4 class="event-display-name">Tree<br>Planting<br>Day</h4>
                </div>
                <div class="stat-value" data-label="PARTICIPANTS">1</div>
                <div class="stat-value green" data-label="TREES PLANTED">0</div>
                <div class="stat-value blue" data-label="WASTE COLLECTED">0 kg</div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <script src="header.js"></script>
</body>
</html>