<?php
    include("../auth.php");

    // if(!isset($_SESSION['role']) || $_SESSION['role'] !== "ORGANIZER"){
    //     header("Location: ../login/login.php");
    //     exit();
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoStudent Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="profile.css">
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
                <a href="events.php"><img src="../assets/images/event.png" alt="Calendar Icon">Event Management</a>
            </li>

            <li>
                <a href="attendance.php"><img src="../assets/images/group.png" alt="Participants Icon">Attendance Approval</a>
            </li>

            <li>
                <a href="report.php"><img src="../assets/images/business-report.png" alt="Report Icon">Impact Report</a>
            </li>

            <li class="active_nav">
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
                    <small>ORGANIZER</small>
                </div>
                <img src="<?php echo htmlspecialchars($avatar) ?>" alt="user icon" class="user-icon" href="profile.php">
            </div>
        </header>

        <section class="settings-card">
                <div class="profile-picture-section">
                    <img src="../assets/images/user-icon.png" alt="user icon" class="profile-preview">
                    <div class="picture-controls">
                        <h3>Profile Picture</h3>
                        <p>PNG, JPEG.Max size of 1MB</p>
                        <div class="btn-group">
                        <button class="btn btn-main">Upload New</button>
                        <button class="btn btn-sub">Remove</button>
                    </div>
                </div>
            </div>

            <hr class="divider">
            
            <form class="profile-form">
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" value="Lebron">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" value="James">
                    </div>

                    <div class="form-group">
                        <label>Email Address (Gmail)</label>
                        <input type="email" value="lebron_james@gmail.com">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" value="012-3456-789">
                    </div>
                    <div class="form-group full width">
                        <div class="label-row">
                            <label>Bio</label>
                        </div>
                        <textarea rows="4"></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-sub">Cancel</button>
                        <button type="button" class="btn btn-main">Save Changes</button>
                    </div>
                </div>
            </form>
        </section>
    <script src="header.js"></script>
</body>
</html>