// Events page JavaScript

let selectedSeats = [];
let currentEventPrice = 0;
let currentEventName = '';

// Open event booking modal
function openBookingModal(eventName, basePrice) {
    currentEventName = eventName;
    currentEventPrice = basePrice;
    
    document.getElementById('eventTitle').textContent = eventName;
    document.getElementById('generalPrice').textContent = basePrice;
    document.getElementById('vipPrice').textContent = (basePrice * 1.5).toFixed(0);
    document.getElementById('premiumPrice').textContent = (basePrice * 2).toFixed(0);
    
    // Reset selections
    selectedSeats = [];
    updateTotalPrice();
    
    const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
    modal.show();
}

// Seat selection functionality
document.addEventListener('DOMContentLoaded', function() {
    const seatButtons = document.querySelectorAll('.seat-btn');
    seatButtons.forEach(button => {
        button.addEventListener('click', function() {
            const seatNumber = this.dataset.seat;
            
            if (this.classList.contains('selected')) {
                // Deselect seat
                this.classList.remove('selected', 'btn-success');
                this.classList.add('btn-outline-success');
                selectedSeats = selectedSeats.filter(seat => seat !== seatNumber);
            } else {
                // Select seat (limit to ticket quantity)
                const maxSeats = parseInt(document.getElementById('ticketQuantity').value);
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
    const quantitySelect = document.getElementById('ticketQuantity');
    if (quantitySelect) {
        quantitySelect.addEventListener('change', function() {
            const maxSeats = parseInt(this.value);
            
            // Deselect extra seats if quantity is reduced
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

// Update total price
function updateTotalPrice() {
    const quantity = parseInt(document.getElementById('ticketQuantity').value) || 1;
    const selectedType = document.querySelector('input[name="ticketType"]:checked');
    let multiplier = 1;
    
    if (selectedType) {
        switch(selectedType.value) {
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

// Add to cart
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
        type: 'Event Ticket',
        price: price,
        quantity: quantity,
        details: `${selectedType.value.toUpperCase()} - Seats: ${selectedSeats.join(', ')}`
    };
    
    addToCart(item);
    bootstrap.Modal.getInstance(document.getElementById('bookingModal')).hide();
}

// Proceed to payment
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
        seats: selectedSeats,
        ticketType: selectedType.value,
        total: parseFloat(document.getElementById('totalPrice').textContent)
    };
    
    bootstrap.Modal.getInstance(document.getElementById('bookingModal')).hide();
    proceedToPayment(orderDetails);
}