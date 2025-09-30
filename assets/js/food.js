// Food page JavaScript

let foodCart = [];
let foodTotal = 0;

// Add food item to cart
function addFoodToCart(itemName, price) {
    const existingItem = foodCart.find(item => item.name === itemName);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        foodCart.push({
            id: generateId(),
            name: itemName,
            price: price,
            quantity: 1
        });
    }
    
    updateFoodOrderSummary();
    showNotification(`${itemName} added to cart!`, 'success');
}

// Update food order summary
function updateFoodOrderSummary() {
    const orderSummary = document.getElementById('orderSummary');
    const itemCount = document.getElementById('orderItemCount');
    const orderTotal = document.getElementById('orderTotal');
    
    const totalItems = foodCart.reduce((sum, item) => sum + item.quantity, 0);
    const total = foodCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    
    if (itemCount) {
        itemCount.textContent = `${totalItems} item${totalItems !== 1 ? 's' : ''}`;
    }
    
    if (orderTotal) {
        orderTotal.textContent = total.toFixed(2);
    }
    
    if (orderSummary) {
        orderSummary.style.display = totalItems > 0 ? 'block' : 'none';
    }
    
    foodTotal = total;
}

// View cart
function viewCart() {
    populateFoodCart();
    const modal = new bootstrap.Modal(document.getElementById('foodCartModal'));
    modal.show();
}

// Populate food cart modal
function populateFoodCart() {
    const cartContainer = document.getElementById('foodCartItems');
    const subtotalElement = document.getElementById('foodSubtotal');
    const grandTotalElement = document.getElementById('foodGrandTotal');
    
    if (!cartContainer) return;
    
    if (foodCart.length === 0) {
        cartContainer.innerHTML = '<p class="text-center text-muted">Your cart is empty</p>';
        return;
    }
    
    let cartHTML = '';
    foodCart.forEach(item => {
        cartHTML += `
            <div class="d-flex justify-content-between align-items-center mb-3 p-3 border rounded">
                <div class="flex-grow-1">
                    <h6 class="mb-1">${item.name}</h6>
                    <small class="text-muted">$${item.price.toFixed(2)} each</small>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-secondary btn-sm me-2" onclick="updateFoodQuantity('${item.id}', ${item.quantity - 1})">
                        <i class="fas fa-minus"></i>
                    </button>
                    <span class="mx-2">${item.quantity}</span>
                    <button class="btn btn-outline-secondary btn-sm me-3" onclick="updateFoodQuantity('${item.id}', ${item.quantity + 1})">
                        <i class="fas fa-plus"></i>
                    </button>
                    <span class="fw-bold me-3">$${(item.price * item.quantity).toFixed(2)}</span>
                    <button class="btn btn-outline-danger btn-sm" onclick="removeFoodItem('${item.id}')">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
    });
    
    cartContainer.innerHTML = cartHTML;
    
    // Update totals
    const subtotal = foodCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const deliveryFee = document.getElementById('delivery').checked ? 2.99 : 0;
    const grandTotal = subtotal + deliveryFee;
    
    if (subtotalElement) subtotalElement.textContent = subtotal.toFixed(2);
    if (grandTotalElement) grandTotalElement.textContent = grandTotal.toFixed(2);
    
    // Update delivery fee display
    updateDeliveryFee();
}

// Update food item quantity
function updateFoodQuantity(itemId, newQuantity) {
    const item = foodCart.find(item => item.id === itemId);
    if (item) {
        if (newQuantity <= 0) {
            removeFoodItem(itemId);
        } else {
            item.quantity = newQuantity;
            updateFoodOrderSummary();
            populateFoodCart();
        }
    }
}

// Remove food item
function removeFoodItem(itemId) {
    foodCart = foodCart.filter(item => item.id !== itemId);
    updateFoodOrderSummary();
    populateFoodCart();
    showNotification('Item removed from cart', 'info');
}

// Update delivery fee
function updateDeliveryFee() {
    const deliveryRadio = document.getElementById('delivery');
    const pickupRadio = document.getElementById('pickup');
    const deliveryFeeElement = document.getElementById('deliveryFee');
    
    if (deliveryRadio && pickupRadio && deliveryFeeElement) {
        const deliveryFee = deliveryRadio.checked ? 2.99 : 0;
        deliveryFeeElement.textContent = deliveryFee.toFixed(2);
        
        // Update grand total
        const subtotal = foodCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const grandTotal = subtotal + deliveryFee;
        document.getElementById('foodGrandTotal').textContent = grandTotal.toFixed(2);
    }
}

// Initialize food page
document.addEventListener('DOMContentLoaded', function() {
    // Delivery option change listeners
    const deliveryOptions = document.querySelectorAll('input[name="deliveryOption"]');
    deliveryOptions.forEach(option => {
        option.addEventListener('change', updateDeliveryFee);
    });
});

// Proceed to checkout
function proceedToCheckout() {
    if (foodCart.length === 0) {
        showNotification('Your cart is empty!', 'warning');
        return;
    }
    
    // Close food cart modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('foodCartModal'));
    if (modal) modal.hide();
    
    // Show checkout modal (from main.js)
    showCheckoutModal();
}

// Place order
function placeOrder() {
    const deliveryAddress = document.querySelector('textarea[placeholder*="delivery address"]').value;
    const phoneNumber = document.querySelector('input[placeholder*="phone"]').value;
    
    if (!deliveryAddress.trim()) {
        showNotification('Please enter delivery address', 'warning');
        return;
    }
    
    if (!phoneNumber.trim()) {
        showNotification('Please enter phone number', 'warning');
        return;
    }
    
    const deliveryOption = document.querySelector('input[name="deliveryOption"]:checked').value;
    const subtotal = foodCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const deliveryFee = deliveryOption === 'delivery' ? 2.99 : 0;
    const total = subtotal + deliveryFee;
    
    const orderDetails = {
        items: foodCart,
        deliveryOption: deliveryOption,
        address: deliveryAddress,
        phone: phoneNumber,
        subtotal: subtotal,
        deliveryFee: deliveryFee,
        total: total
    };
    
    // Clear cart and close modal
    foodCart = [];
    updateFoodOrderSummary();
    bootstrap.Modal.getInstance(document.getElementById('foodCartModal')).hide();
    
    // Show success message
    showNotification('Order placed successfully! You will receive a confirmation call shortly.', 'success');
    
    // Show order confirmation
    showFoodOrderConfirmation(orderDetails);
}

// Show food order confirmation
function showFoodOrderConfirmation(orderDetails) {
    const confirmationHTML = `
        <div class="modal fade" id="foodOrderConfirmation" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">
                            <i class="fas fa-check-circle me-2"></i>Order Confirmed!
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <i class="fas fa-utensils text-success" style="font-size: 3rem;"></i>
                            <h4 class="mt-3">Thank you for your order!</h4>
                            <p class="text-muted">Order ID: FD-${generateId().toUpperCase()}</p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold">Order Details:</h6>
                                ${orderDetails.items.map(item => 
                                    `<div class="d-flex justify-content-between">
                                        <span>${item.name} x${item.quantity}</span>
                                        <span>$${(item.price * item.quantity).toFixed(2)}</span>
                                    </div>`
                                ).join('')}
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <strong>Total: $${orderDetails.total.toFixed(2)}</strong>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold">Delivery Info:</h6>
                                <p><strong>Method:</strong> ${orderDetails.deliveryOption === 'delivery' ? 'Delivery' : 'Pickup'}</p>
                                <p><strong>Address:</strong> ${orderDetails.address}</p>
                                <p><strong>Phone:</strong> ${orderDetails.phone}</p>
                                <p><strong>Estimated Time:</strong> 30-45 minutes</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="window.location.reload()">Continue Shopping</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', confirmationHTML);
    const modal = new bootstrap.Modal(document.getElementById('foodOrderConfirmation'));
    modal.show();
    
    // Remove modal from DOM when hidden
    document.getElementById('foodOrderConfirmation').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });
}