// Leisure page JavaScript

let currentLeisurePrice = 0;
let currentLeisureActivity = '';
let selectedActivityDate = '';

// Select activity date
function selectActivityDate(button, date) {
    // Remove active class from all date buttons in the same card
    const card = button.closest('.card');
    const dateButtons = card.querySelectorAll('.btn-outline-primary');
    dateButtons.forEach(btn => {
        btn.classList.remove('active', 'btn-primary');
        btn.classList.add('btn-outline-primary');
    });
    
    // Add active class to selected button
    button.classList.remove('btn-outline-primary');
    button.classList.add('active', 'btn-primary');
    
    selectedActivityDate = date;
}

// Open leisure booking modal
function openLeisureBooking(activityName, price) {
    currentLeisureActivity = activityName;
    currentLeisurePrice = price;
    
    document.getElementById('leisureActivityTitle').textContent = activityName;
    document.getElementById('leisurePricePerPerson').textContent = price;
    
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('leisureDate').min = today;
    
    // Reset and calculate total
    updateLeisureTotal();
    
    const modal = new bootstrap.Modal(document.getElementById('leisureBookingModal'));
    modal.show();
}

// Update leisure total price
function updateLeisureTotal() {
    const participants = parseInt(document.getElementById('leisureParticipants').value) || 1;
    const total = currentLeisurePrice * participants;
    
    const totalElement = document.getElementById('leisureTotalPrice');
    if (totalElement) {
        totalElement.textContent = total.toFixed(2);
    }
}

// Initialize leisure page
document.addEventListener('DOMContentLoaded', function() {
    // Update total when participants change
    const participantsSelect = document.getElementById('leisureParticipants');
    if (participantsSelect) {
        participantsSelect.addEventListener('change', updateLeisureTotal);
    }
});

// Add leisure to cart
function addLeisureToCart() {
    const date = document.getElementById('leisureDate').value;
    const timeSlot = document.getElementById('leisureTimeSlot').value;
    const participants = parseInt(document.getElementById('leisureParticipants').value);
    
    if (!date) {
        showNotification('Please select a date', 'warning');
        return;
    }
    
    const item = {
        name: currentLeisureActivity,
        type: 'Leisure Activity',
        price: currentLeisurePrice,
        quantity: participants,
        details: `${date} - ${timeSlot} - ${participants} participant${participants > 1 ? 's' : ''}`
    };
    
    addToCart(item);
    bootstrap.Modal.getInstance(document.getElementById('leisureBookingModal')).hide();
}

// Proceed to leisure payment
function proceedToLeisurePayment() {
    const date = document.getElementById('leisureDate').value;
    const timeSlot = document.getElementById('leisureTimeSlot').value;
    const participants = parseInt(document.getElementById('leisureParticipants').value);
    
    if (!date) {
        showNotification('Please select a date', 'warning');
        return;
    }
    
    const orderDetails = {
        activity: currentLeisureActivity,
        date: date,
        timeSlot: timeSlot,
        participants: participants,
        total: parseFloat(document.getElementById('leisureTotalPrice').textContent)
    };
    
    bootstrap.Modal.getInstance(document.getElementById('leisureBookingModal')).hide();
    proceedToPayment(orderDetails);
}

