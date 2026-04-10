<?php
    include("../conn.php");
    include("../auth.php");

    if(!isset($_SESSION['role']) || $_SESSION['role'] !== "ORGANIZER"){
        header("Location: ../login/login.php");
        exit();
    };


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
    <img src="../assets/images/close.png" alt="Close Icon" class="close-sidebar-btn" onclick="toggleSidebarVisibility()" />
    <aside class="sidebar">
        <div class="top-sidebar">
            <img src="../assets/images/logo.png" alt="EcoRiseAPU Logo"/>
            <!-- <img  src="../assets/images/close.png" alt="Close Icon" onclick="toggleSidebarVisibility()" /> -->
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php"><img src="../assets/images/home.png" alt="Home Icon">Dashboard</a>
            </li>

            <li>
                <a href="events.php"><img src="../assets/images/event.png" alt="Calendar Icon">Event Management</a>
            </li>

            <li>
                <a href="attendance.php"><img src="../assets/images/group.png" alt="Participants Icon">Attendance Approval</a>
            </li>

            <li class="active_nav">
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

        <div class="page-heading">
            <h1>Impact Report</h1>
            <p>View and analyse the impact you made to the environment!</p>
        </div>

        <div class="controls-row">
            <div class="search-container">
                <img src="../assets/images/search.png" alt="Search" class="search-icon-img">
                <input type="text" placeholder="Search Event..." class="search-input">
            </div>

            <select id="event-switch">
                <option>Sustainable Living Workshop</option>
                <option>Green Energy Seminar</option>
                <option>Recycling Initiative</option>
            </select>

            <button class="export-btn">Export PDF</button>
        </div>

        <div class="stat-grid">
            <div class="metric-card">
                <div class="card-header">
                    <div class="icon-box">
                        <img src="../assets/images/group.png" alt="group icon" class="card-icon">
                    </div>
                    <span class="trend-positive">+12%</span>
                </div>
                <h3>TOTAL REGISTERED</h3>
                <div class="value">50</div>
                <p>Students Registered</p>
            </div>

            <div class="metric-card">
                <div class="card-header">
                    <div class="icon-box">
                        <img src="../assets/images/check-mark.png" alt="check mark icon" class="card-icon">
                    </div>
                    <span class="trend-positive">+5%</span>
                </div>
                <h3>ATTENDANCE RATE</h3>
                <div class="value">84%</div>
                <p>42 students attended</p>
            </div>

            <div class="metric-card">
                <div class="card-header">
                    <div class="icon-box">
                        <img src="../assets/images/clock2.png" alt="clock icon" class="card-icon">
                    </div>
                    <span class="trend-positive">+8%</span>
                </div>
                <h3>VOLUNTEER HOURS</h3>
                <div class="value">80</div>
                <p>Total hours volunteered</p>
            </div>

            <div class="metric-card">
                <div class="card-header">
                    <div class="icon-bo">
                        <img src="../assets/images/diagram.png" alt="diagram icon" class="card-icon">
                    </div>
                    <span class="trend-positive">+15%</span>
                </div>
                <h3>IMPACT SCORE</h3>
                <div class="value">9.4</div>
                <p>Overall impact of the events</p>
            </div>
        </div>

        <div class="charts-grid">
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Participation Statistics</h3>
                    <div class="legend">
                        <span><i class="dot registered"></i> Registered</span>
                        <span><i class="dot pending"></i> Pending</span>
                    </div>
                </div>
                <p class="subtitle">Registration vs Attendance breakdown</p>
                <div class="bar-chart-mockup">
                    <div class="bar-group"><div class="bar-green" style="height: 80%;"></div><span>Registered</span></div>
                    <div class="bar-group"><div class="bar-green-mid" style="height: 65%;"></div><span>Pending</span></div>
                    <div class="bar-group"><div class="bar-green-dark" style="height: 50%;"></div><span>Approved</span></div>
                    <div class="bar-group"><div class="bar-orange" style="height: 25%;"></div><span>Rejected</span></div>
                </div>
            </div>

            <div class="chart-card">
                <div class="chart-header">
                    <h3>Environment Impact</h3>
                    <div class="legend">
                        <span><i class="dot actual"></i>Actual</span>
                        <span><i class="dot target"></i>Target</span>
                    </div>
                </div>
                <p class="subtitle">Key sustainability metrics vs targets</p>
                <div class="progress-section">
                    <div class="progress-item">
                        <label>Trees Planted</label>
                        <div class="progress-track"><div class="progress-fill" style="width: 80%;"></div></div>
                    </div>
                    <div class="progress-item">
                        <label>Waste Collected</label>
                        <div class="progress-track"><div class="progress-fill" style="width: 95%;"></div></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="volunteer-card">
            <div class="card-header-row">
                <div class="title-group">
                    <h2>Volunteer Contributions</h2>
                    <p>Individual student impact and hours</p>
                </div>
                <a href="javascript:void(0)" id="view-all-btn" onclick="toggleUsers()">View All</a>  <!--javascript:void(0) prevent the link navigate to other page -->
            </div>

            <table class="volunteer-table">
                <thead>
                    <tr>
                        <th>VOLUNTEER NAME</th>
                        <th>CONTRIBUTION</th>
                        <th>HOURS</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody id="volunteer-body" class="limit-view">
                    <tr>
                        <td class="name">Alex Johnson</td>
                        <td>Team Lead</td>
                        <td>4h</td>
                        <td><span class="status approved">Approved</span></td>
                    </tr>
                    <tr>
                        <td class="name">Maria Garcia</td>
                        <td>Waste Sorting</td>
                        <td>4h</td>
                        <td><span class="status approved">Approved</span></td>
                    </tr>
                    <tr>
                        <td class="name">Sam Lee</td>
                        <td>General Volunteer</td>
                        <td>4h</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td class="name">Jordan Smith</td>
                        <td>Student</td>
                        <td>4h</td>
                        <td><span class="status approved">Approved</span></td>
                    </tr>
                    <tr>
                        <td class="name">Taylor Reed</td>
                        <td>General Volunteer</td>
                        <td>4h</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr class="extra-user">
                        <td class="name">Chris Evans</td>
                        <td>Event Support</td>
                        <td>2h</td>
                        <td><span class="status approved">Approved</span></td>
                    </tr>
                    <tr class="extra-user">
                        <td class="name">Jayden Luu</td>
                        <td>Event Support</td>
                        <td>1h</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr class="extra-user">
                        <td class="name">Stephen Curry</td>
                        <td>General Volunteer</td>
                        <td>1h</td>
                        <td><span class="status approved">Approved</span></td>
                    </tr>
                    <tr class="extra-user">
                        <td class="name">Kevin Durant</td>
                        <td>Student</td>
                        <td>1h</td>
                        <td><span class="status approved">Approved</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <script src="header.js"></script>
    <script src="report.js"></script>
</body>
</html>