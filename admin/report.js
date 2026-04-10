document.addEventListener('DOMContentLoaded', () => {
    const bars = document.querySelectorAll('.bar');

    bars.forEach(bar => {
        bar.addEventListener('click', (e) => {
            // Prevent the document click listener from firing
            e.stopPropagation();

            const isShowing = bar.classList.contains('show-number');

            // Reset all bars first
            bars.forEach(b => b.classList.remove('show-number'));

            // Toggle current bar if it wasn't already showing
            if (!isShowing) {
                bar.classList.add('show-number');
            }
        });
    });

    // Close tooltip when clicking anywhere else
    document.addEventListener('click', () => {
        bars.forEach(b => b.classList.remove('show-number'));
    });
});

// Placeholder for your sidebar function
function toggleSidebarVisibility() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
}