// Movies page JavaScript

let selectedMovieSeats = [];
let currentMoviePrice = 0;
let currentMovieName = '';
let selectedShowtime = '';

// Select showtime
function selectShowtime(button, time) {
    // Remove active class from all showtime buttons in the same card
    const card = button.closest('.card');
    const showtimeButtons = card.querySelectorAll('.btn-outline-primary');
    showtimeButtons.forEach(btn => {
        btn.classList.remove('active', 'btn-primary');
        btn.classList.add('btn-outline-primary');
    });
    
    // Add active class to selected button
    button.classList.remove('btn-outline-primary');
    button.classList.add('active', 'btn-primary');
    
    selectedShowtime = time;
}

// Open movie booking modal
function openMovieBooking(movieName, basePrice) {
    currentMovieName = movieName;
    currentMoviePrice = basePrice;
    
    document.getElementById('movieTitle').textContent = movieName;
    document.getElementById('selectedTime').value = selectedShowtime || '';
    
    // Reset selections
    selectedMovieSeats = [];
    updateMovieTotalPrice();
    updateSelectedSeatsDisplay();
    
    const modal = new bootstrap.Modal(document.getElementById('movieBookingModal'));
    modal.show();
}

// Movie seat selection
document.addEventListener('DOMContentLoaded', function() {
    const movieSeats = document.querySelectorAll('.movie-seat');
    movieSeats.forEach(seat => {
        seat.addEventListener('click', function() {
            const seatNumber = this.dataset.seat;
            
            if (this.classList.contains('selected')) {
                // Deselect seat
                this.classList.remove('selected', 'btn-success');
                this.classList.add('btn-outline-success');
                selectedMovieSeats = selectedMovieSeats.filter(s => s !== seatNumber);
            } else {
                // Select seat
                const maxSeats = parseInt(document.getElementById('movieTicketQuantity').value);
                if (selectedMovieSeats.length < maxSeats) {
                    this.classList.remove('btn-outline-success');
                    this.classList.add('selected', 'btn-success');
                    selectedMovieSeats.push(seatNumber);
                } else {
                    showNotification(`You can only select ${maxSeats} seats`, 'warning');
                }
            }
            updateMovieTotalPrice();
            updateSelectedSeatsDisplay();
        });
    });
    
    // Update seats when quantity changes
    const quantitySelect = document.getElementById('movieTicketQuantity');
    if (quantitySelect) {
        quantitySelect.addEventListener('change', function() {
            const maxSeats = parseInt(this.value);
            
            // Deselect extra seats if quantity is reduced
            if (selectedMovieSeats.length > maxSeats) {
                const seatsToRemove = selectedMovieSeats.slice(maxSeats);
                seatsToRemove.forEach(seatNumber => {
                    const seatButton = document.querySelector(`.movie-seat[data-seat="${seatNumber}"]`);
                    if (seatButton) {
                        seatButton.classList.remove('selected', 'btn-success');
                        seatButton.classList.add('btn-outline-success');
                    }
                });
                selectedMovieSeats = selectedMovieSeats.slice(0, maxSeats);
            }
            updateMovieTotalPrice();
            updateSelectedSeatsDisplay();
        });
    }
});

// Update selected seats display
function updateSelectedSeatsDisplay() {
    const display = document.getElementById('selectedSeats');
    if (display) {
        display.textContent = selectedMovieSeats.length > 0 ? selectedMovieSeats.join(', ') : 'None';
    }
}

// Update movie total price
function updateMovieTotalPrice() {
    const quantity = parseInt(document.getElementById('movieTicketQuantity').value) || 1;
    const total = currentMoviePrice * quantity;
    
    const totalElement = document.getElementById('movieTotalPrice');
    if (totalElement) {
        totalElement.textContent = total.toFixed(2);
    }
}

// Add movie to cart
function addMovieToCart() {
    if (!selectedShowtime) {
        showNotification('Please select a showtime first', 'warning');
        return;
    }
    
    if (selectedMovieSeats.length === 0) {
        showNotification('Please select your seats', 'warning');
        return;
    }
    
    const cinema = document.getElementById('cinemaSelect').value;
    const date = document.getElementById('dateSelect').value;
    const quantity = parseInt(document.getElementById('movieTicketQuantity').value);
    
    const item = {
        name: currentMovieName,
        type: 'Movie Ticket',
        price: currentMoviePrice,
        quantity: quantity,
        details: `${cinema} - ${date} ${selectedShowtime} - Seats: ${selectedMovieSeats.join(', ')}`
    };
    
    addToCart(item);
    bootstrap.Modal.getInstance(document.getElementById('movieBookingModal')).hide();
}

// Proceed to movie payment
function proceedToMoviePayment() {
    if (!selectedShowtime) {
        showNotification('Please select a showtime first', 'warning');
        return;
    }
    
    if (selectedMovieSeats.length === 0) {
        showNotification('Please select your seats', 'warning');
        return;
    }
    
    const orderDetails = {
        movie: currentMovieName,
        showtime: selectedShowtime,
        seats: selectedMovieSeats,
        cinema: document.getElementById('cinemaSelect').value,
        date: document.getElementById('dateSelect').value,
        total: parseFloat(document.getElementById('movieTotalPrice').textContent)
    };
    
    bootstrap.Modal.getInstance(document.getElementById('movieBookingModal')).hide();
    proceedToPayment(orderDetails);
}