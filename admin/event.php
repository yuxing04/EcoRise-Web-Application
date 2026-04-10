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
    <title>EcoAdmin - Events Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="event.css">
</head>
<body>
    <img src="../assets/images/close.png" alt="Close Icon" class="close-sidebar-btn" onclick="toggleSidebarVisibility()" />
    
    <aside class="sidebar">
        <div class="top-sidebar">
            <img src="../assets/images/logo.png" alt="EcoRiseAPU Logo"/>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php"><img src="../assets/images/home.png" alt="Home Icon">Dashboard</a>
            </li>

            <li class="active_nav">
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

        <div class="page-heading">
            <h1>Event Management</h1>
            <p>Manage and approve events created by students.</p>
        </div>

        <div class="main-content">
            <div class="filter-wrapper">
                <button class="mobile-filter-btn" onclick="toggleMobileFilters()">
                    <span>Filter Events</span>
                    <span id="filter-arrow"><img src="./../assets/images/dropdown.svg" alt="Dropdown Icon" /></span>
                </button>

                <div class="multi-filter-group" id="filterGroup"> 
                    <div class="filter-item">
                        <label for="categoryFilter" class="filter-label">CATEGORY</label>
                        <select id="categoryFilter" class="filter-input" onchange="filterEvents()">
                            <option value="All">All</option>
                        </select>
                    </div>

                    <div class="filter-item">
                        <label for="dateFilter" class="filter-label">MONTH</label>
                        <input type="month" id="dateFilter" class="filter-input" onchange="filterEvents()">
                    </div>

                    <button class="btn-clear-filters" onclick="resetFilter()">Reset</button>
                </div>
            </div>      

        <div class="all-events">
            <div class="detailed-event-card" 
                data-category="Tree Washing" 
                data-date="2026-05" 
                data-location="Penang"
            >
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80" alt="Tree Planting" class="event-hero-img">
                <div class="event-body">
                    <div class="event-tags">
                        <span class="tag type-tag">Tree Washing</span>
                        <span class="tag hours-tag">8 Fixed Hours</span>
                    </div>
                    <h4>Tree Washing</h4>
                    <div class="event-meta">
                        <div class="event-info">
                            <img src="./../assets/images/calendar-check.png" />
                            <p>2026-05-12</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/clock.png" />
                            <p>08:00 AM - 12:00 PM</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/location.png" />
                            <p>Penang</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/host.png" />
                            <p>Lebron James</p>
                        </div>
                    </div>
                    <div class="event-actions">
                        <button class="btn-primary" onclick="openRejectModal(this)">REJECT <span>🡺</span></button>
                        <button class="btn-primary2" onclick="openApproveModal(this)">APPROVE <span>🡺</span></button>
                    </div>
                </div>
            </div>
            <div class="detailed-event-card" 
                data-category="Tree Planting" 
                data-date="2026-05" 
                data-location="Pusat Bandar Puchong"
            >
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80" alt="Tree Planting" class="event-hero-img">
                <div class="event-body">
                    <div class="event-tags">
                        <span class="tag type-tag">Tree Planting</span>
                        <span class="tag hours-tag">4 Fixed Hours</span>
                    </div>
                    <h4>Main Campus Tree Blitz</h4>
                    <div class="event-meta">
                        <div class="event-info">
                            <img src="./../assets/images/calendar-check.png" />
                            <p>2026-05-12</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/clock.png" />
                            <p>08:00 AM - 12:00 PM</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/location.png" />
                            <p>Pusat Bandar Puchong</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/host.png" />
                            <p>Lebron James</p>
                        </div>
                    </div>
                    <div class="event-actions">
                        <button class="btn-primary" onclick="openRejectModal(this)">REJECT <span>🡺</span></button>
                        <button class="btn-primary2" onclick="openApproveModal(this)">APPROVE <span>🡺</span></button>
                    </div>
                </div>
            </div>

            <div class="detailed-event-card" 
                data-category="Tree Planting" 
                data-date="2026-05" 
                data-location="Pusat Bandar Puchong"
            >
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80" alt="Tree Planting" class="event-hero-img">
                <div class="event-body">
                    <div class="event-tags">
                        <span class="tag type-tag">Tree Planting</span>
                        <span class="tag hours-tag">4 Fixed Hours</span>
                    </div>
                    <h4>Recycle Tree</h4>
                    <div class="event-meta">
                        <div class="event-info">
                            <img src="./../assets/images/calendar-check.png" />
                            <p>2026-05-12</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/clock.png" />
                            <p>08:00 AM - 12:00 PM</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/location.png" />
                            <p>Pusat Bandar Puchong</p>
                        </div>
                        <div class="event-info">
                            <img src="./../assets/images/host.png" />
                            <p>Lebron James</p>
                        </div>
                    </div>
                    <div class="event-actions">
                        <button class="btn-primary" onclick="openRejectModal(this)">REJECT <span>🡺</span></button>
                        <button class="btn-primary2" onclick="openApproveModal(this)">APPROVE <span>🡺</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="header.js"></script>
<script src="event.js"></script>
</body>
</html>