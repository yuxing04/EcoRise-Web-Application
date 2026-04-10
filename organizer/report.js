/* Toggle volunteer table view (limited or full) */
function toggleUsers() {
    const tableBody = document.getElementById('volunteer-body'); /* get the volunteer table body*/
    const viewBtn = document.getElementById('view-all-btn'); /* Get the toggle button */

    if (tableBody.classList.contains('limit-view')) { /* Check if table is currently limited */
        tableBody.classList.remove('limit-view'); /* Remove limit to show all users */
        viewBtn.innerText = "Show Less"; /* Change button text */
    } else {
        tableBody.classList.add('limit-view'); /* Add limit to show fewer users */
        viewBtn.innerText = "View All"; /* Change button text */
    }
}


