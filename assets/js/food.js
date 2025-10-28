document.addEventListener('DOMContentLoaded', function() {
    // Handle image errors
    const cards = document.querySelectorAll('.festival-card img');
    cards.forEach(img => {
        img.onerror = function() {
            this.src = 'https://via.placeholder.com/600x400?text=Food+Festival';
        };
    });

    // Initialize tooltips
    const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltips.forEach(tooltip => {
        new bootstrap.Tooltip(tooltip);
    });

    // Show notification if URL has success or error parameters
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error')) {
        showNotification(urlParams.get('error'), 'danger');
    }
    if (urlParams.has('success')) {
        showNotification(urlParams.get('success'), 'success');
    }
});

function showNotification(message, type = 'info') {
    const container = document.createElement('div');
    container.style.position = 'fixed';
    container.style.top = '20px';
    container.style.right = '20px';
    container.style.zIndex = '9999';
    
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show`;
    alert.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    container.appendChild(alert);
    document.body.appendChild(container);
    
    setTimeout(() => {
        alert.classList.remove('show');
        setTimeout(() => container.remove(), 150);
    }, 3000);
}