// Places page JavaScript

let currentPlacePrice = 0;
let currentPlaceName = '';

// Open place booking modal
function openPlaceBooking(placeName, basePrice) {
    currentPlaceName = placeName;
    currentPlacePrice = basePrice;
    
    document.getElementById('placeTourTitle').textContent = placeName;
    document.getElementById('placeBasePrice').textContent = basePrice;
    
    // Set minimum dates
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    
    document.getElementById('departureDate').min = today.toISOString().split('T')[0];
    document.getElementById('returnDate').min = tomorrow.toISOString().split('T')[0];
    
    // Reset and calculate total
    updatePlaceTotal();
    
    const modal = new bootstrap.Modal(document.getElementById('placeBookingModal'));
    modal.show();
}

// Update place total price
function updatePlaceTotal() {
    const adults = parseInt(document.getElementById('adultsCount').value) || 1;
    const children = parseInt(document.getElementById('childrenCount').value) || 0;
    const roomType = document.getElementById('roomType').value;
    
    // Calculate base price (children are 50% of adult price)
    let baseTotal = (adults * currentPlacePrice) + (children * currentPlacePrice * 0.5);
    
    // Room upgrade costs
    let roomUpgrade = 0;
    switch(roomType) {
        case 'deluxe':
            roomUpgrade = 3000;
            break;
        case 'suite':
            roomUpgrade = 5000;
            break;
        case 'presidential':
            roomUpgrade = 8000;
            break;
        default:
            roomUpgrade = 0;
    }
    
    // Add-ons
    let addOns = 0;
    const checkboxes = document.querySelectorAll('.additional-options input[type="checkbox"]:checked');
    checkboxes.forEach(checkbox => {
        addOns += parseFloat(checkbox.value) || 0;
    });
    
    const total = baseTotal + roomUpgrade + addOns;
    
    // Update display
    document.getElementById('placeBasePrice').textContent = currentPlacePrice;
    document.getElementById('roomUpgrade').textContent = roomUpgrade;
    document.getElementById('addOns').textContent = addOns;
    document.getElementById('placeTotalPrice').textContent = total.toFixed(2);
}

// Initialize places page
document.addEventListener('DOMContentLoaded', function() {
    // Update total when any input changes
    const inputs = [
        'adultsCount', 'childrenCount', 'roomType'
    ];
    
    inputs.forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener('change', updatePlaceTotal);
        }
    });
    
    // Add-on checkboxes
    const checkboxes = document.querySelectorAll('.additional-options input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updatePlaceTotal);
    });
    
    // Date validation
    const departureDate = document.getElementById('departureDate');
    const returnDate = document.getElementById('returnDate');
    
    if (departureDate && returnDate) {
        departureDate.addEventListener('change', function() {
            const departure = new Date(this.value);
            const minReturn = new Date(departure);
            minReturn.setDate(minReturn.getDate() + 1);
            returnDate.min = minReturn.toISOString().split('T')[0];
            
            // Reset return date if it's before departure
            if (returnDate.value && new Date(returnDate.value) <= departure) {
                returnDate.value = '';
            }
        });
    }
});

// Add place to cart
function addPlaceToCart() {
    const departureDate = document.getElementById('departureDate').value;
    const returnDate = document.getElementById('returnDate').value;
    const adults = parseInt(document.getElementById('adultsCount').value);
    const children = parseInt(document.getElementById('childrenCount').value);
    const roomType = document.getElementById('roomType').value;
    
    if (!departureDate || !returnDate) {
        showNotification('Please select departure and return dates', 'warning');
        return;
    }
    
    const totalPeople = adults + children;
    const total = parseFloat(document.getElementById('placeTotalPrice').textContent);
    
    const item = {
        name: currentPlaceName,
        type: 'Tour Package',
        price: total,
        quantity: 1,
        details: `${departureDate} to ${returnDate} - ${adults} adults, ${children} children - ${roomType} room`
    };
    
    addToCart(item);
    bootstrap.Modal.getInstance(document.getElementById('placeBookingModal')).hide();
}

// Proceed to place payment
function proceedToPlacePayment() {
    const departureDate = document.getElementById('departureDate').value;
    const returnDate = document.getElementById('returnDate').value;
    const adults = parseInt(document.getElementById('adultsCount').value);
    const children = parseInt(document.getElementById('childrenCount').value);
    
    if (!departureDate || !returnDate) {
        showNotification('Please select departure and return dates', 'warning');
        return;
    }
    
    const orderDetails = {
        tour: currentPlaceName,
        departureDate: departureDate,
        returnDate: returnDate,
        adults: adults,
        children: children,
        roomType: document.getElementById('roomType').value,
        total: parseFloat(document.getElementById('placeTotalPrice').textContent)
    };
    
    bootstrap.Modal.getInstance(document.getElementById('placeBookingModal')).hide();
    proceedToPayment(orderDetails);
}