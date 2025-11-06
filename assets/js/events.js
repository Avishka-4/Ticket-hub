// =============================
// 🎟️ Event Booking Page JS
// Works with 6 Sri Lankan events from the database
// =============================

let selectedSeats = [];
let currentEventPrice = 0;
let currentEventName = '';
let currentEventCategory = '';

// Open event booking modal
function openBookingModal(eventName, basePrice, category = '') {
    currentEventName = eventName;
    currentEventPrice = parseFloat(basePrice);
    currentEventCategory = category;

    document.getElementById('eventTitle').textContent = eventName;
    document.getElementById('generalPrice').textContent = basePrice;
    document.getElementById('vipPrice').textContent = (basePrice * 1.5).toFixed(2);
    document.getElementById('premiumPrice').textContent = (basePrice * 2).toFixed(2);

    // Reset selections
    selectedSeats = [];
    document.querySelectorAll('.seat-btn').forEach(btn => {
        btn.classList.remove('selected', 'btn-success');
        btn.classList.add('btn-outline-success');
    });

    // Reset ticket type
    document.querySelectorAll('input[name="ticketType"]').forEach(radio => (radio.checked = false));

    updateTotalPrice();

    const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
    modal.show();
}

// 🎫 Seat Selection Functionality
document.addEventListener('DOMContentLoaded', function () {
    const seatButtons = document.querySelectorAll('.seat-btn');
    const quantitySelect = document.getElementById('ticketQuantity');

    seatButtons.forEach(button => {
        button.addEventListener('click', function () {
            const seatNumber = this.dataset.seat;

            if (this.classList.contains('selected')) {
                // Deselect seat
                this.classList.remove('selected', 'btn-success');
                this.classList.add('btn-outline-success');
                selectedSeats = selectedSeats.filter(seat => seat !== seatNumber);
            } else {
                // Select seat (limit to ticket quantity)
                const maxSeats = parseInt(quantitySelect.value);
                if (selectedSeats.length < maxSeats) {
                    this.classList.remove('btn-outline-success');
                    this.classList.add('selected', 'btn-success');
                    selectedSeats.push(seatNumber);
                } else {
                    showNotification(`You can only select ${maxSeats} seats`, 'warning');
                }
            }
            updateTotalPrice();
        });
    });

    // Update seats when quantity changes
    if (quantitySelect) {
        quantitySelect.addEventListener('change', function () {
            const maxSeats = parseInt(this.value);
            if (selectedSeats.length > maxSeats) {
                const seatsToRemove = selectedSeats.slice(maxSeats);
                seatsToRemove.forEach(seatNumber => {
                    const seatButton = document.querySelector(`[data-seat="${seatNumber}"]`);
                    if (seatButton) {
                        seatButton.classList.remove('selected', 'btn-success');
                        seatButton.classList.add('btn-outline-success');
                    }
                });
                selectedSeats = selectedSeats.slice(0, maxSeats);
            }
            updateTotalPrice();
        });
    }

    // Ticket type selection
    const ticketTypes = document.querySelectorAll('input[name="ticketType"]');
    ticketTypes.forEach(radio => {
        radio.addEventListener('change', updateTotalPrice);
    });
});

// 💰 Update Total Price
function updateTotalPrice() {
    const quantity = parseInt(document.getElementById('ticketQuantity').value) || 1;
    const selectedType = document.querySelector('input[name="ticketType"]:checked');
    let multiplier = 1;

    if (selectedType) {
        switch (selectedType.value) {
            case 'vip':
                multiplier = 1.5;
                break;
            case 'premium':
                multiplier = 2;
                break;
            default:
                multiplier = 1;
        }
    }

    const total = currentEventPrice * multiplier * quantity;
    document.getElementById('totalPrice').textContent = total.toFixed(2);
}

// 🛒 Add to Cart
function addToCart() {
    if (selectedSeats.length === 0) {
        showNotification('Please select your seats first', 'warning');
        return;
    }

    const selectedType = document.querySelector('input[name="ticketType"]:checked');
    if (!selectedType) {
        showNotification('Please select a ticket type', 'warning');
        return;
    }

    const quantity = parseInt(document.getElementById('ticketQuantity').value);
    const multiplier = selectedType.value === 'vip' ? 1.5 : selectedType.value === 'premium' ? 2 : 1;
    const price = currentEventPrice * multiplier;

    const item = {
        name: currentEventName,
        category: currentEventCategory,
        price: price,
        quantity: quantity,
        details: `${selectedType.value.toUpperCase()} - Seats: ${selectedSeats.join(', ')}`
    };

    console.log('Added to cart:', item);
    showNotification(`${currentEventName} tickets added to cart!`, 'success');
    bootstrap.Modal.getInstance(document.getElementById('bookingModal')).hide();
}

// 💳 Proceed to Payment
function proceedToPayment() {
    if (selectedSeats.length === 0) {
        showNotification('Please select your seats first', 'warning');
        return;
    }

    const selectedType = document.querySelector('input[name="ticketType"]:checked');
    if (!selectedType) {
        showNotification('Please select a ticket type', 'warning');
        return;
    }

    const orderDetails = {
        event: currentEventName,
        category: currentEventCategory,
        seats: selectedSeats,
        ticketType: selectedType.value,
        total: parseFloat(document.getElementById('totalPrice').textContent)
    };

    console.log('Proceeding to payment:', orderDetails);
    showNotification(`Redirecting to payment for ${currentEventName}`, 'info');
    bootstrap.Modal.getInstance(document.getElementById('bookingModal')).hide();
}

// 🔔 Notification Toast
function showNotification(message, type = 'info') {
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} position-fixed bottom-0 end-0 m-3`;
    alert.style.zIndex = 1050;
    alert.textContent = message;

    document.body.appendChild(alert);
    setTimeout(() => alert.remove(), 3000);
}
