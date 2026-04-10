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
    <link rel="stylesheet" href="events.css">
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

            <li class="active_nav">
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

    <div class="dashboard-container">
            <header class="main-header">
                <div class="page-heading">
                    <h1>Event Management</h1>
                    <p>Manage and track your environmental initiatives.</p>
                </div>
                <button class="btn-create" onclick="openCreateModal()">
                    <span class="plus-icon">+</span> Create Event
                </button>
            </header>
        

        <article class="event-card" id="event-1">
            <div class="event-image">
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1000" alt="Reforestation project">
            </div>

            <div class="status-ribbon banner-rejected">
                REJECTED
            </div>

            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Urban Reforestation</h2>
                        <p>Planting native trees in the city park.</p>
                    </div>
                    <div class="card-actions">
                        <button class="icon-btn" aria-label="View Participants" style="display:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </button>
                        <button class="icon-btn edit" aria-label="Edit Event" style="display:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                        </button>
                        <button class="icon-btn delete" aria-label="Delete Event">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                        </button>
                    </div>
                </div>

                <hr class="divider">

                <div class="info-grid">
                    <div class="info-item">
                        <label>Location</label>
                        <div class="info-value">Central Park</div>
                    </div>
                    <div class="info-item">
                        <label>Date</label>
                        <div class="info-value">5/20/2026</div>
                    </div>
                    <div class="info-item">
                        <label>Time</label>
                        <div class="info-value">13:00 - 17:00</div>
                    </div>
                    <div class="info-item">
                        <label>Max Participants</label>
                        <div class="info-value">500</div>
                    </div>
                </div>

                <div class="stats-grid" style="display: none">
                    <div class="stat-box"><label>Trees</label><p class="stat-number green">45</p></div>
                    <div class="stat-box"><label>Waste</label><p class="stat-number">0kg</p></div>
                </div>
            </div>
        </article>

        <article class="event-card" id="event-2">
            <div class="event-image">
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1000" alt="Reforestation project">
            </div>

            <div class="status-ribbon banner-pending">
                PENDING
            </div>

            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Urban Reforestation</h2>
                        <p>Planting native trees in the city park.</p>
                    </div>
                    <div class="card-actions">
                        <button class="icon-btn" aria-label="View Participants">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </button>
                        <button class="icon-btn edit" aria-label="Edit Event" onclick="openEditModal('event-2')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                        </button>
                        <button class="icon-btn delete" aria-label="Delete Event">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                        </button>
                    </div>
                </div>

                <hr class="divider">

                <div class="info-grid">
                    <div class="info-item">
                        <label>Location</label>
                        <div class="info-value">Central Park</div>
                    </div>
                    <div class="info-item">
                        <label>Date</label>
                        <div class="info-value">5/20/2026</div>
                    </div>
                    <div class="info-item">
                        <label>Time</label>
                        <div class="info-value">13:00 - 17:00</div>
                    </div>
                    <div class="info-item">
                        <label>Max Participants</label>
                        <div class="info-value">500</div>
                    </div>
                </div>

                <div class="stats-grid" style="display: none">
                    <div class="stat-box"><label>Trees</label><p class="stat-number green">45</p></div>
                    <div class="stat-box"><label>Waste</label><p class="stat-number">0kg</p></div>
                </div>
            </div>
        </article>

        <article class="event-card" id="event-3">
            <div class="event-image">
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1000" alt="Reforestation project">
            </div>

            <div class="status-ribbon banner-approved">
                APPROVED
            </div>

            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Urban Reforestation</h2>
                        <p>Planting native trees in the city park.</p>
                    </div>
                    <div class="card-actions">
                        <button class="icon-btn" aria-label="View Participants">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </button>
                        <button class="icon-btn edit" aria-label="Edit Event" style="display: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                        </button>
                        <button class="icon-btn delete" aria-label="Delete Event">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                        </button>
                    </div>
                </div>

                <hr class="divider">

                <div class="info-grid">
                    <div class="info-item">
                        <label>Location</label>
                        <div class="info-value">Central Park</div>
                    </div>
                    <div class="info-item">
                        <label>Date</label>
                        <div class="info-value">5/20/2026</div>
                    </div>
                    <div class="info-item">
                        <label>Time</label>
                        <div class="info-value">13:00 - 17:00</div>
                    </div>
                    <div class="info-item">
                        <label>Max Participants</label>
                        <div class="info-value">500</div>
                    </div>
                </div>

                <button class="btn-impact" onclick="openImpactModal(3)">
                    + Record Final Impact
                </button>

                <div class="stats-grid" style="display: none">
                    <div class="stat-box"><label>Trees</label><p class="stat-number green">45</p></div>
                    <div class="stat-box"><label>Waste</label><p class="stat-number">0kg</p></div>
                </div>
            </div>
        </article>

        <article class="event-card" id="event-4">
            <div class="event-image">
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1000" alt="Reforestation project">
            </div>

            <div class="status-ribbon banner-completed">
                COMPLETED
            </div>

            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Urban Reforestation</h2>
                        <p>Planting native trees in the city park.</p>
                    </div>
                    <div class="card-actions">
                        <button class="icon-btn" aria-label="View Participants">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </button>
                        <button class="icon-btn edit" aria-label="Edit Event" style="display: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                        </button>
                        <button class="icon-btn delete" aria-label="Delete Event" style="display: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                        </button>
                    </div>
                </div>

                <hr class="divider">

                <div class="info-grid">
                    <div class="info-item">
                        <label>Location</label>
                        <div class="info-value">Central Park</div>
                    </div>
                    <div class="info-item">
                        <label>Date</label>
                        <div class="info-value">5/20/2026</div>
                    </div>
                    <div class="info-item">
                        <label>Time</label>
                        <div class="info-value">13:00 - 17:00</div>
                    </div>
                    <div class="info-item">
                        <label>Max Participants</label>
                        <div class="info-value">500</div>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-box"><label>Trees</label><p class="stat-number green">45</p></div>
                    <div class="stat-box"><label>Waste</label><p class="stat-number">0kg</p></div>
                </div>
            </div>
        </article>



        <div id="eventFormModal" class="blur-background" style="display: none;">
            <form class="event-form-content" id="eventDataForm">
                <div class="modal-header">
                    <h1 id="modalTitle">Edit Event</h1>
                    <span class="close-modal" onclick="closeModal('eventFormModal')">&times;</span>
                </div>
                
                <input type="hidden" id="eventId">
                
                <div class="form-grid">
                    <div class="input-field">
                        <label for="eventTitle">Event Title</label>
                        <input type="text" id="eventTitle" required>
                    </div>
                    <div class="input-field">
                        <label for="eventLocation">Location</label>
                        <input type="text" id="eventLocation" required>
                    </div>
                    <div class="input-field">
                        <label for="eventDate">Date</label>
                        <input type="date" id="eventDate" required>
                    </div>
                    <div class="input-field">
                        <label for="category">Category</label>
                        <select name="category">
                            <option value="-">-</option>
                            <option value="recycling">Recycling Drive</option>
                            <option value="workshop">Eco-Workshop</option>
                            <option value="comunity">Community Cleanup</option>
                            <option value="education">Green Education</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="start">Start Time:</label>
                        <input type="time" id="start" name="start" required>
                    </div>
                    <div class="input-field">
                        <label for="event">End Time:</label>
                        <input type="time" id="end" name="end" required>
                    </div>
                </div>

                <div class="info-item">
                    <label for="eventImage">Cover Image</label>
                    <input type="file" id="eventImage" accept="image/*">    
                </div>

                <div class="info-item">
                    <label>Max Participants</label>
                    <input type="number" name="max_participants" min="1" placeholder="1">
                </div>


                <div class="info-item">
                    <label for="eventDescription">Description</label>
                    <textarea id="eventDescription" rows="3" required></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn-submit-event">Save Event Changes</button>
                </div>
            </form>
        </div>

        <div id="successModal" class="blur-background" style="display: none;">
            <div class="modal-card">
                <img src="./../assets/images/tick.png" alt="Success" class="status-icon" />
                <h2 id="successTitle">Success!</h2>
                <p id="successMsg">Action completed.</p>
                <button class="btn-confirm success" onclick="closeModal('successModal')">OK</button>
            </div>
        </div>
    </div>

    <div id="setImpactModal" class="blur-background" style="display: none;">
        <form class="event-form-content" id="impactDataForm">
            <div class="modal-header">
                <h1 id="impactModalTitle">Record Final Impact</h1>
                <span class="close-modal" onclick="closeModal('setImpactModal')">&times;</span>
            </div>
            
            <input type="hidden" id="impactEventId">
            
            <p style="margin-bottom: 20px; color: var(--text-muted); font-size: 0.9rem;">
                Enter the final achievements for this completed event. Once saved, these stats will be locked.
            </p>
            
            <div class="form-grid">
                <div class="input-field">
                    <label for="actualTrees">Total Trees Planted</label>
                    <input type="number" id="actualTrees" min="0" placeholder="e.g. 50">
                </div>
                <div class="input-field">
                    <label for="actualWaste">Total Waste Collected (kg)</label>
                    <input type="number" id="actualWaste" min="0" step="0.1" placeholder="e.g. 12.5">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn-submit-event">Save Impact Stats</button>
            </div>
        </form>
    </div>
    <script src="header.js"></script>
    <script src="events.js"></script>
</body>
</html>