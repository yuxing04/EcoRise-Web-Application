/**
 * UI & MODAL CONTROLS
 */
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

function openModal(modalId) {
    document.getElementById(modalId).style.display = 'flex';
}

function toggleSidebarVisibility() {
    const sidebar = document.querySelector('.sidebar');
    const closeBtn = document.querySelector('.close-sidebar-btn');
    sidebar.classList.toggle('active');
    if (closeBtn) closeBtn.classList.toggle('active');
}

/**
 * EVENT MANAGEMENT LOGIC
 */

// Function to reset and open the form for a NEW event
function openCreateModal() {
    const form = document.getElementById('eventDataForm');
    form.reset();
    document.getElementById('eventId').value = ""; // No ID means "Create Mode"
    document.getElementById('modalTitle').innerText = "Create New Event";
    document.getElementById('eventDataForm').querySelector('button').innerText = "Create Event";
    openModal('eventFormModal');
}

// Function to populate and open the form for EDITING
function openEditModal(cardId) {
    const card = document.getElementById(cardId);
    if (!card) return;

    // Extract current data from the card
    const currentTitle = card.querySelector('h2').innerText;
    const currentDesc = card.querySelector('.card-title p').innerText;
    const currentLocation = card.querySelector('.info-value').innerText;
    const currentDate = card.querySelector('.info-item:nth-child(2) .info-value')?.innerText || "";

    // Fill the form
    document.getElementById('eventId').value = cardId;
    document.getElementById('eventTitle').value = currentTitle;
    document.getElementById('eventDescription').value = currentDesc;
    document.getElementById('eventLocation').value = currentLocation;
    // Note: Date conversion might be needed if format is MM/DD/YYYY
    
    // Update Modal UI
    document.getElementById('modalTitle').innerText = "Edit Event Details";
    document.getElementById('eventDataForm').querySelector('button').innerText = "Save Changes";
    
    openModal('eventFormModal');
}

// Handle Form Submission (Create and Update)
document.getElementById('eventDataForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const eventId = document.getElementById('eventId').value;
    const title = document.getElementById('eventTitle').value;
    const description = document.getElementById('eventDescription').value;
    const location = document.getElementById('eventLocation').value;
    const date = document.getElementById('eventDate').value;

    if (eventId) {
        // --- MODE: UPDATE EXISTING ---
        const card = document.getElementById(eventId);
        card.querySelector('h2').innerText = title;
        card.querySelector('.card-title p').innerText = description;
        card.querySelector('.info-value').innerText = location;
        
        showStatus('success', 'Event Updated', `Successfully updated "${title}"`);
    } else {
        // --- MODE: CREATE NEW ---
        const newId = 'event-' + Date.now(); // Generate unique ID
        createNewEventCard(newId, title, description, location, date);
        showStatus('success', 'Event Created', `New campaign "${title}" has been launched!`);
    }
    
    closeModal('eventFormModal');
});

/**
 * DYNAMIC CARD CREATION
 */
function createNewEventCard(id, title, desc, loc, date) {
    const container = document.querySelector('.dashboard-container');
    const newCard = document.createElement('article');
    newCard.className = 'event-card';
    newCard.id = id;

    // We use a template literal to keep your exact HTML structure
    newCard.innerHTML = `
        <div class="event-image">
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1000" alt="New Event">
        </div>
        <div class="card-content">
            <div class="card-header">
                <div class="card-title">
                    <h2>${title}</h2>
                    <p>${desc}</p>
                </div>
                <div class="card-actions">
                    <button class="icon-btn" aria-label="View Participants" onclick="window.location.href='submit_proof.html'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </button>
                    <button class="icon-btn edit" aria-label="Edit Event" onclick="openEditModal('${id}')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                    </button>
                    <button class="icon-btn delete" aria-label="Delete Event" onclick="confirmDelete('${id}')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                    </button>
                </div>
            </div>
            <hr class="divider">
            <div class="info-grid">
                <div class="info-item">
                    <label>Location</label>
                    <div class="info-value">${loc}</div>
                </div>
                <div class="info-item">
                    <label>Date</label>
                    <div class="info-value">${date}</div>
                </div>
            </div>
            <div class="stats-grid">
                <div class="stat-box"><label>Trees</label><p class="stat-number green">0</p></div>
                <div class="stat-box"><label>Waste</label><p class="stat-number">0kg</p></div>
            </div>
        </div>
    `;
    container.appendChild(newCard);
}

/**
 * DELETE LOGIC
 */
function confirmDelete(cardId) {
    const card = document.getElementById(cardId);
    if (!card) return;

    const title = card.querySelector('h2').innerText;
    
    // Using a simple confirm for now, but you could trigger a modal here too
    if (confirm(`Are you sure you want to delete "${title}"?`)) {
        card.remove();
        showStatus('success', 'Deleted', 'The event has been successfully removed.');
    }
}

/**
 * STATUS MODAL FEEDBACK
 */
function showStatus(type, title, message) {
    const successModal = document.getElementById('successModal');
    if (!successModal) return;

    document.getElementById('successTitle').innerText = title;
    document.getElementById('successMsg').innerText = message;
    
    openModal('successModal');
}


const start = "09:00";
const end = "17:30";

const startTime = new Date(`1970-01-01T${start}:00`);
const endTime = new Date(`1970-01-01T${end}:00`);

const diffInMs = endTime - startTime;
const diffInHours = diffInMs / (1000 * 60 * 60);

console.log(`Total duration: ${diffInHours} hours`);




document.addEventListener('DOMContentLoaded', () => {
    // Select both forms
    const forms = document.querySelectorAll('#createEventForm, #editEventForm');

    forms.forEach(form => {
        const startTimeInput = form.querySelector('input[name="start_time"]');
        const endTimeInput = form.querySelector('input[name="end_time"]');

        const validateTimes = () => {
            const start = startTimeInput.value;
            const end = endTimeInput.value;

            if (start && end && end <= start) {
                alert("End time must be later than start time!");
                endTimeInput.value = ''; // Clear the invalid end time
            }
        };

        // Check whenever either time is changed
        startTimeInput.addEventListener('change', validateTimes);
        endTimeInput.addEventListener('change', validateTimes);

        // Handle Form Submission
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Gather data
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            
            console.log("Form Submitted:", data);
            alert("Event saved successfully!");
        });
    });
});