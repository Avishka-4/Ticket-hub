// Main JavaScript file for TicketHub

// Global variables
let cart = [];
let cartTotal = 0;

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
    loadCartFromStorage();
    updateCartDisplay();
});

// Initialize application
function initializeApp() {
    // Add loading animation to buttons
    addLoadingAnimations();
    
    // Initialize tooltips
    initializeTooltips();
    
    // Add smooth scrolling
    addSmoothScrolling();
    
    // Initialize cart functionality
    initializeCart();
}

// Add loading animations to buttons
function addLoadingAnimations() {
    const buttons = document.querySelectorAll('button[type="submit"], .btn-primary, .btn-success');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.disabled) {
                const originalText = this.innerHTML;
                this.innerHTML = '<span class="loading"></span> Processing...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 2000);
            }
        });
    });
}

// Initialize tooltips
function initializeTooltips() {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
}

// Add smooth scrolling
function addSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Initialize cart functionality
function initializeCart() {
    const cartModal = document.getElementById('cartModal');
    if (cartModal) {
        cartModal.addEventListener('show.bs.modal', function() {
            displayCartItems();
        });
    }
}

// Cart Management Functions
function addToCart(item) {
    const existingItem = cart.find(cartItem => 
        cartItem.name === item.name && cartItem.type === item.type
    );
    
    if (existingItem) {
        existingItem.quantity += item.quantity || 1;
    } else {
        cart.push({
            ...item,
            id: generateId(),
            quantity: item.quantity || 1,
            addedAt: new Date().toISOString()
        });
    }
    
    saveCartToStorage();
    updateCartDisplay();
    showNotification('Item added to cart!', 'success');
}

function removeFromCart(itemId) {
    cart = cart.filter(item => item.id !== itemId);
    saveCartToStorage();
    updateCartDisplay();
    displayCartItems();
    showNotification('Item removed from cart!', 'info');
}

function updateCartQuantity(itemId, newQuantity) {
    const item = cart.find(item => item.id === itemId);
    if (item) {
        if (newQuantity <= 0) {
            removeFromCart(itemId);
        } else {
            item.quantity = newQuantity;
            saveCartToStorage();
            updateCartDisplay();
            displayCartItems();
        }
    }
}

function clearCart() {
    cart = [];
    saveCartToStorage();
    updateCartDisplay();
    displayCartItems();
    showNotification('Cart cleared!', 'info');
}

// Update cart display in navbar
function updateCartDisplay() {
    const cartCount = document.getElementById('cart-count');
    const cartTotal = document.getElementById('cart-total');
    
    if (cartCount) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
        cartCount.style.display = totalItems > 0 ? 'inline' : 'none';
    }
    
    if (cartTotal) {
        const total = calculateCartTotal();
        cartTotal.textContent = `$${total.toFixed(2)}`;
    }
}

// Display cart items in modal
function displayCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    if (!cartItemsContainer) return;
    
    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p class="text-center text-muted">Your cart is empty</p>';
        return;
    }
    
    let cartHTML = '';
    cart.forEach(item => {
        cartHTML += `
            <div class="cart-item d-flex justify-content-between align-items-center mb-3 p-3 border rounded">
                <div class="flex-grow-1">
                    <h6 class="mb-1">${item.name}</h6>
                    <small class="text-muted">${item.type}</small>
                    ${item.details ? `<br><small class="text-muted">${item.details}</small>` : ''}
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-secondary btn-sm me-2" onclick="updateCartQuantity('${item.id}', ${item.quantity - 1})">-</button>
                    <span class="mx-2">${item.quantity}</span>
                    <button class="btn btn-outline-secondary btn-sm me-3" onclick="updateCartQuantity('${item.id}', ${item.quantity + 1})">+</button>
                    <span class="fw-bold me-3">$${(item.price * item.quantity).toFixed(2)}</span>
                    <button class="btn btn-outline-danger btn-sm" onclick="removeFromCart('${item.id}')">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
    });
    
    cartItemsContainer.innerHTML = cartHTML;
}

// Calculate cart total
function calculateCartTotal() {
    return cart.reduce((total, item) => total + (item.price * item.quantity), 0);
}

// Storage functions
function saveCartToStorage() {
    localStorage.setItem('tickethub_cart', JSON.stringify(cart));
}

function loadCartFromStorage() {
    const savedCart = localStorage.getItem('tickethub_cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
    }
}

// Utility functions
function generateId() {
    return Date.now().toString(36) + Math.random().toString(36).substr(2);
}

function formatDate(dateString) {
    const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    return new Date(dateString).toLocaleDateString('en-US', options);
}

function formatCurrency(amount) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(amount);
}

// Show notification
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} notification-toast position-fixed`;
    notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.3s ease;
    `;
    
    notification.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
            <span>${message}</span>
            <button type="button" class="btn-close ms-auto" onclick="this.parentElement.parentElement.remove()"></button>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.opacity = '1';
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 300);
    }, 5000);
}

// Payment processing functions
function proceedToPayment(orderDetails) {
    // Simulate payment processing
    showNotification('Processing payment...', 'info');
    
    setTimeout(() => {
        const success = Math.random() > 0.1; // 90% success rate
        
        if (success) {
            clearCart();
            showNotification('Payment successful! Confirmation sent to your email.', 'success');
            
            // Redirect to success page or show success modal
            showSuccessModal(orderDetails);
        } else {
            showNotification('Payment failed. Please try again.', 'danger');
        }
    }, 3000);
}

function showSuccessModal(orderDetails) {
    const modalHTML = `
        <div class="modal fade" id="successModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">
                            <i class="fas fa-check-circle me-2"></i>Booking Confirmed!
                        </h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h4 class="mb-3">Thank You for Your Purchase!</h4>
                        <p class="mb-3">Your booking has been confirmed and you will receive a confirmation email shortly.</p>
                        <div class="bg-light p-3 rounded mb-3">
                            <strong>Order ID:</strong> TH-${generateId().toUpperCase()}<br>
                            <strong>Total:</strong> ${formatCurrency(calculateCartTotal())}<br>
                            <strong>Date:</strong> ${formatDate(new Date())}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="window.location.reload()">Continue Shopping</button>
                        <button type="button" class="btn btn-outline-primary" onclick="window.print()">Print Receipt</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    const modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
    
    // Remove modal from DOM when hidden
    document.getElementById('successModal').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });
}

// Form validation
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;
    
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });
    
    return isValid;
}

// Search functionality
function initializeSearch() {
    const searchInputs = document.querySelectorAll('input[type="text"][placeholder*="Search"]');
    searchInputs.forEach(input => {
        input.addEventListener('input', debounce(function() {
            const query = this.value.toLowerCase();
            filterItems(query);
        }, 300));
    });
}

function filterItems(query) {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        const title = card.querySelector('.card-title')?.textContent.toLowerCase() || '';
        const text = card.querySelector('.card-text')?.textContent.toLowerCase() || '';
        const shouldShow = title.includes(query) || text.includes(query);
        
        card.closest('.col-md-6, .col-lg-4, .col-md-4').style.display = shouldShow ? 'block' : 'none';
    });
}

// Debounce function for search
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Category filtering
function initializeCategoryFilter() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
            filterByCategory(filter);
        });
    });
}

function filterByCategory(category) {
    const items = document.querySelectorAll('[data-category]');
    items.forEach(item => {
        const itemCategory = item.dataset.category;
        const shouldShow = category === 'all' || itemCategory === category;
        
        item.style.display = shouldShow ? 'block' : 'none';
        
        // Add animation
        if (shouldShow) {
            item.classList.add('fade-in');
            setTimeout(() => {
                item.classList.remove('fade-in');
            }, 600);
        }
    });
}

// Initialize all functionality when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeSearch();
    initializeCategoryFilter();
});

// Checkout process
function proceedToCheckout() {
    if (cart.length === 0) {
        showNotification('Your cart is empty!', 'warning');
        return;
    }
    
    // Show checkout modal or redirect to checkout page
    showCheckoutModal();
}

function showCheckoutModal() {
    const checkoutHTML = `
        <div class="modal fade" id="checkoutModal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-credit-card me-2"></i>Checkout
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="fw-bold mb-3">Payment Information</h6>
                                <form id="paymentForm">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Card Number</label>
                                        <input type="text" class="form-control" placeholder="1234 5678 9012 3456" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Expiry Date</label>
                                            <input type="text" class="form-control" placeholder="MM/YY" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">CVV</label>
                                            <input type="text" class="form-control" placeholder="123" required>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <h6 class="fw-bold mb-3">Order Summary</h6>
                                <div id="checkoutSummary" class="bg-light p-3 rounded">
                                    <!-- Order summary will be populated here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="processPayment()">
                            <i class="fas fa-lock me-2"></i>Complete Payment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', checkoutHTML);
    
    // Populate order summary
    populateCheckoutSummary();
    
    const modal = new bootstrap.Modal(document.getElementById('checkoutModal'));
    modal.show();
    
    // Remove modal from DOM when hidden
    document.getElementById('checkoutModal').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });
}

function populateCheckoutSummary() {
    const summaryContainer = document.getElementById('checkoutSummary');
    if (!summaryContainer) return;
    
    let summaryHTML = '';
    cart.forEach(item => {
        summaryHTML += `
            <div class="d-flex justify-content-between mb-2">
                <span>${item.name} x${item.quantity}</span>
                <span>$${(item.price * item.quantity).toFixed(2)}</span>
            </div>
        `;
    });
    
    const total = calculateCartTotal();
    const tax = total * 0.08; // 8% tax
    const grandTotal = total + tax;
    
    summaryHTML += `
        <hr>
        <div class="d-flex justify-content-between mb-2">
            <span>Subtotal:</span>
            <span>$${total.toFixed(2)}</span>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <span>Tax:</span>
            <span>$${tax.toFixed(2)}</span>
        </div>
        <hr>
        <div class="d-flex justify-content-between fw-bold">
            <span>Total:</span>
            <span>$${grandTotal.toFixed(2)}</span>
        </div>
    `;
    
    summaryContainer.innerHTML = summaryHTML;
}

function processPayment() {
    if (validateForm('paymentForm')) {
        const orderDetails = {
            items: cart,
            total: calculateCartTotal(),
            timestamp: new Date().toISOString()
        };
        
        // Close checkout modal
        bootstrap.Modal.getInstance(document.getElementById('checkoutModal')).hide();
        
        // Process payment
        proceedToPayment(orderDetails);
    } else {
        showNotification('Please fill in all required fields', 'danger');
    }
}

// Initialize everything when the page loads
window.addEventListener('load', function() {
    // Add fade-in animation to page elements
    const elements = document.querySelectorAll('.card, .hero-section, section');
    elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            element.style.transition = 'all 0.6s ease';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, index * 100);
    });
});