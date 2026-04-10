<?php
    include("../auth.php");

    if(!isset($_SESSION['role']) || $_SESSION['role'] !== "STUDENT"){
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
    <link rel="stylesheet" href="profile.css">
<body>

    <aside class="sidebar">
        <div class="top-sidebar">
            <img src="../assets/images/logo.png" alt="EcoRiseAPU Logo"/>
            <img src="../assets/images/close.png" alt="Close Icon" onclick="toggleSidebarVisibility()" />
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php"><img src="../assets/images/home.png" alt="home">Dashboard</a>
            </li>
            <li>
                <a href="events.php"><img src="../assets/images/event.png" alt="calender">Events</a>
            </li>
            <li>
                <a href="my_events.php"><img src="../assets/images/timetable.png" alt="timetable">My Events</a>
            </li>
            <li>
                <a href="submit_proof.php"><img src="../assets/images/upload.png" alt="upload">Submit Proof</a>
            </li>
            <li>
                <a href="rewards.php"><img src="../assets/images/reward.png" alt="reward">Rewards</a>
            </li>
            <li>
                <a href="leaderboard.php"><img src="../assets/images/leaderboard.png" alt="leaderboard">Leaderboard</a>
            </li>
            <li class="active_nav">
                <a href="profile.php"><img src="../assets/images/user.png" alt="user">Profile</a>
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
                <img src="<?php echo htmlspecialchars($avatar)  ?>" alt="user icon" class="user-icon" href="profile.php">
            </div>
        </header>

        <section class="settings-card">
                <div class="profile-picture-section">
                    <img src="<?php echo htmlspecialchars($avatar ?? '../assets/images/user-icon.png'); ?>" alt="user icon" class="profile-preview">
                    <div class="picture-controls">
                        <h3>Profile Picture</h3>
                        <p>PNG, JPEG. Max size of 1MB</p>
                        <div class="btn-group">
                            <button class="btn btn-main">Upload New</button>
                            <button class="btn btn-sub">Remove</button>
                        </div>
                    </div>
                </div>

            <hr class="divider">
            
            <form class="profile-form" action="update_profile.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($username ?? ''); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" value="<?php echo htmlspecialchars($role ?? 'STUDENT'); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Account Status</label>
                        <input type="text" value="<?php echo htmlspecialchars($account_status ?? 'ACTIVE'); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Total Volunteer Hours</label>
                        <input type="text" value="<?php echo htmlspecialchars($total_volunteer_hours ?? '0.00'); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Current Points</label>
                        <input type="text" value="<?php echo htmlspecialchars($current_points ?? '0'); ?>" readonly>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-sub">Cancel</button>
                    <button type="submit" class="btn btn-main">Save Changes</button>
                </div>
            </form>
        </section>
    <script src="header.js"></script>
</body>
</html>