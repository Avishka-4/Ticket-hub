// Sports page JavaScript

let selectedSections = [];
let currentSportsPrice = 0;
let currentSportsEvent = '';

// Open sports booking modal
function openSportsBooking(eventName, basePrice) {
    currentSportsEvent = eventName;
    currentSportsPrice = basePrice;
    
    document.getElementById('sportsEventTitle').textContent = eventName;
    document.getElementById('sportsGeneralPrice').textContent = basePrice;
    document.getElementById('sportsPremiumPrice').textContent = (basePrice * 1.5).toFixed(0);
    document.getElementById('sportsVipPrice').textContent = (basePrice * 2.5).toFixed(0);
    
    // Reset selections
    selectedSections = [];
    updateSportsTotalPrice();
    updateSelectedSections();
    
    const modal = new bootstrap.Modal(document.getElementById('sportsBookingModal'));
    modal.show();
}

// Stadium section selection
document.addEventListener('DOMContentLoaded', function() {
    const stadiumSections = document.querySelectorAll('.stadium-section');
    stadiumSections.forEach(section => {
        section.addEventListener('click', function() {
            const sectionNumber = this.dataset.section;
            
            if (this.classList.contains('selected')) {
                // Deselect section
                this.classList.remove('selected', 'btn-success');
                this.classList.add('btn-outline-success', 'btn-outline-info', 'btn-outline-warning');
                selectedSections = selectedSections.filter(s => s !== sectionNumber);
            } else {
                // Select section
                const maxSections = parseInt(document.getElementById('sportsTicketQuantity').value);
                if (selectedSections.length < maxSections) {
                    this.classList.remove('btn-outline-success', 'btn-outline-info', 'btn-outline-warning');
                    this.classList.add('selected', 'btn-success');
                    selectedSections.push(sectionNumber);
                } else {
                    showNotification(`You can only select ${maxSections} sections`, 'warning');
                }
            }
            updateSportsTotalPrice();
            updateSelectedSections();
        });
    });
    
    // Section type selection
    const sectionTypes = document.querySelectorAll('input[name="sectionType"]');
    sectionTypes.forEach(radio => {
        radio.addEventListener('change', updateSportsTotalPrice);
    });
    
    // Quantity change
    const quantitySelect = document.getElementById('sportsTicketQuantity');
    if (quantitySelect) {
        quantitySelect.addEventListener('change', function() {
            const maxSections = parseInt(this.value);
            
            // Deselect extra sections if quantity is reduced
            if (selectedSections.length > maxSections) {
                const sectionsToRemove = selectedSections.slice(maxSections);
                sectionsToRemove.forEach(sectionNumber => {
                    const sectionButton = document.querySelector(`[data-section="${sectionNumber}"]`);
                    if (sectionButton) {
                        sectionButton.classList.remove('selected', 'btn-success');
                        sectionButton.classList.add('btn-outline-success');
                    }
                });
                selectedSections = selectedSections.slice(0, maxSections);
            }
            updateSportsTotalPrice();
            updateSelectedSections();
        });
    }
});

// Update selected sections display
function updateSelectedSections() {
    const display = document.getElementById('selectedSections');
    if (display) {
        display.textContent = selectedSections.length > 0 ? selectedSections.join(', ') : 'None selected';
    }
}

// Update sports total price
function updateSportsTotalPrice() {
    const quantity = parseInt(document.getElementById('sportsTicketQuantity').value) || 1;
    const selectedType = document.querySelector('input[name="sectionType"]:checked');
    let multiplier = 1;
    
    if (selectedType) {
        switch(selectedType.value) {
            case 'premium':
                multiplier = 1.5;
                break;
            case 'vip':
                multiplier = 2.5;
                break;
            default:
                multiplier = 1;
        }
    }
    
    const total = currentSportsPrice * multiplier * quantity;
    const totalElement = document.getElementById('sportsTotalPrice');
    if (totalElement) {
        totalElement.textContent = total.toFixed(2);
    }
}

// Add sports to cart
function addSportsToCart() {
    if (selectedSections.length === 0) {
        showNotification('Please select your sections first', 'warning');
        return;
    }
    
    const selectedType = document.querySelector('input[name="sectionType"]:checked');
    if (!selectedType) {
        showNotification('Please select a section type', 'warning');
        return;
    }
    
    const quantity = parseInt(document.getElementById('sportsTicketQuantity').value);
    const multiplier = selectedType.value === 'premium' ? 1.5 : selectedType.value === 'vip' ? 2.5 : 1;
    const price = currentSportsPrice * multiplier;
    
    const item = {
        name: currentSportsEvent,
        type: 'Sports Ticket',
        price: price,
        quantity: quantity,
        details: `${selectedType.value.toUpperCase()} Section - ${selectedSections.join(', ')}`
    };
    
    addToCart(item);
    bootstrap.Modal.getInstance(document.getElementById('sportsBookingModal')).hide();
}

// Proceed to sports payment
function proceedToSportsPayment() {
    if (selectedSections.length === 0) {
        showNotification('Please select your sections first', 'warning');
        return;
    }
    
    const selectedType = document.querySelector('input[name="sectionType"]:checked');
    if (!selectedType) {
        showNotification('Please select a section type', 'warning');
        return;
    }
    
    const orderDetails = {
        event: currentSportsEvent,
        sections: selectedSections,
        sectionType: selectedType.value,
        total: parseFloat(document.getElementById('sportsTotalPrice').textContent)
    };
    
    bootstrap.Modal.getInstance(document.getElementById('sportsBookingModal')).hide();
    proceedToPayment(orderDetails);
}