// ✅ EVENT BOOKING SCRIPT (UPDATED FOR NEW EVENT SYSTEM)

let selectedSeats = [];
let currentEvent = {
    name: "",
    basePrice: 0
};

// ✅ Open Booking Modal with Event Name + Base Price
function openBookingModal(eventName, price) {
    currentEvent.name = eventName;
    currentEvent.basePrice = price;

    document.getElementById("eventTitle").textContent = eventName;

    // Set ticket type prices
    document.getElementById("generalPrice").textContent = price;
    document.getElementById("vipPrice").textContent = (price * 1.5).toFixed(0);
    document.getElementById("premiumPrice").textContent = (price * 2).toFixed(0);

    // Reset seat selections
    selectedSeats = [];
    updateTotalPrice();

    const modal = new bootstrap.Modal(document.getElementById("bookingModal"));
    modal.show();
}

// ✅ Seat Selection Logic
document.addEventListener("DOMContentLoaded", () => {
    const seatButtons = document.querySelectorAll(".seat-btn");

    seatButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            const seat = this.dataset.seat;
            const maxSeats = parseInt(document.getElementById("ticketQuantity").value);

            if (this.classList.contains("selected")) {
                // Remove seat
                this.classList.remove("selected", "btn-success");
                this.classList.add("btn-outline-success");
                selectedSeats = selectedSeats.filter(s => s !== seat);

            } else {
                // Add seat
                if (selectedSeats.length < maxSeats) {
                    this.classList.remove("btn-outline-success");
                    this.classList.add("selected", "btn-success");
                    selectedSeats.push(seat);
                } else {
                    showNotification(`You can only select ${maxSeats} seats.`, "warning");
                }
            }

            updateTotalPrice();
        });
    });

    // ✅ Update seat limit when quantity changes
    const qty = document.getElementById("ticketQuantity");

    if (qty) {
        qty.addEventListener("change", function () {
            const maxSeats = parseInt(this.value);

            // Remove extra seats
            if (selectedSeats.length > maxSeats) {
                const removed = selectedSeats.slice(maxSeats);

                removed.forEach(seat => {
                    const btn = document.querySelector(`[data-seat="${seat}"]`);
                    if (btn) {
                        btn.classList.remove("selected", "btn-success");
                        btn.classList.add("btn-outline-success");
                    }
                });

                selectedSeats = selectedSeats.slice(0, maxSeats);
            }

            updateTotalPrice();
        });
    }

    // ✅ Ticket Type Change
    const ticketTypes = document.querySelectorAll("input[name='ticketType']");
    ticketTypes.forEach(radio => {
        radio.addEventListener("change", updateTotalPrice);
    });
});

// ✅ Calculate Total Price
function updateTotalPrice() {
    const qty = parseInt(document.getElementById("ticketQuantity").value) || 1;
    const selectedType = document.querySelector("input[name='ticketType']:checked");

    let multiplier = 1;

    if (selectedType) {
        if (selectedType.value === "vip") multiplier = 1.5;
        if (selectedType.value === "premium") multiplier = 2;
    }

    const total = currentEvent.basePrice * multiplier * qty;

    document.getElementById("totalPrice").textContent = total.toFixed(2);
}

// ✅ Add to Cart
function addEventToCart() {
    if (selectedSeats.length === 0) {
        showNotification("Please select your seats first.", "warning");
        return;
    }

    const selectedType = document.querySelector("input[name='ticketType']:checked");
    
    if (!selectedType) {
        showNotification("Please select a ticket type.", "warning");
        return;
    }

    const qty = parseInt(document.getElementById("ticketQuantity").value);
    const type = selectedType.value;

    const multiplier = type === "vip" ? 1.5 : type === "premium" ? 2 : 1;

    const pricePerTicket = currentEvent.basePrice * multiplier;

    const cartItem = {
        name: currentEvent.name,
        type: "Event Ticket",
        price: pricePerTicket,
        quantity: qty,
        details: `${type.toUpperCase()} - Seats: ${selectedSeats.join(", ")}`
    };

    // ✅ Add to cart (your function)
    addToCart(cartItem);

    bootstrap.Modal.getInstance(document.getElementById("bookingModal")).hide();
}

// ✅ Proceed to Payment
function proceedEventPayment() {
    if (selectedSeats.length === 0) {
        showNotification("Please select your seats first.", "warning");
        return;
    }

    const selectedType = document.querySelector("input[name='ticketType']:checked");
    
    if (!selectedType) {
        showNotification("Please select a ticket type.", "warning");
        return;
    }

    const paymentData = {
        event: currentEvent.name,
        seats: selectedSeats,
        type: selectedType.value,
        total: parseFloat(document.getElementById("totalPrice").textContent)
    };

    bootstrap.Modal.getInstance(document.getElementById("bookingModal")).hide();

    // ✅ Your function to proceed payment
    proceedToPayment(paymentData);
}
