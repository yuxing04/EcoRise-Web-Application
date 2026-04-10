function toggleSidebarVisibility() {

    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector(".close-sidebar-btn");

    sidebar.classList.toggle("active");
    closeBtn.classList.toggle("active");

}

const events = [
    {
        id: 1,
        title: "Beach Cleanup 2024",
        desc: "Cleaning up the local beach.",
        date: "2024-06-15",
        loc: "Sunset Beach",
        quota: 50,
        participants: 2,
        trees: 0,
        waste: 45
    },
    {
        id: 2,
        title: "Tree Planting Day",
        desc: "Planting 500 saplings in the city park.",
        date: "2024-07-20",
        loc: "Central Park",
        quota: 30,
        participants: 12,
        trees: 150,
        waste: 5
    }
];

function updateUI() {
    const cardList = document.getElementById('card-list');
    const statsBody = document.getElementById('stats-body');

    cardList.innerHTML = events.map(e => `
        <div class="event-card">
            <div class="card-top">
                <h3>${e.title}</h3>
                <span class="badge-active">ACTIVE</span>
            </div>
            <p style="color: #64748b; font-size: 0.95rem;">${e.desc}</p>
            <div class="info-grid">
                <span>📅 ${e.date}</span>
                <span>📍 ${e.loc}</span>
                <span>👥 Quota: ${e.quota}</span>
            </div>
            <div class="btn-row">
                <button class="btn-p">Participants</button>
                <button>Edit</button>
                <button class="btn-d">Delete</button>
            </div>
        </div>
    `).join('');

    statsBody.innerHTML = events.map(e => `
        <tr>
            <td><strong>${e.title}</strong></td>
            <td>${e.participants}</td>
            <td class="text-success">${e.trees}</td>
            <td class="text-accent">${e.waste} kg</td>
        </tr>
    `).join('');
}

updateUI();