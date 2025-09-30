<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food & Beverages - TicketHub</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-red-600 to-orange-600 text-white py-16">
        <div class="container">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-4">
                    <i class="fas fa-utensils me-3"></i>Food & Beverages
                </h1>
                <p class="text-xl mb-6">Delicious food and refreshing drinks delivered to your doorstep</p>
            </div>
        </div>
    </section>

    <!-- Category Tabs -->
    <section class="py-4 bg-light">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center" id="foodTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#appetizers">
                        <i class="fas fa-leaf me-2"></i>Appetizers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#mains">
                        <i class="fas fa-hamburger me-2"></i>Main Dishes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#desserts">
                        <i class="fas fa-ice-cream me-2"></i>Desserts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#beverages">
                        <i class="fas fa-cocktail me-2"></i>Beverages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#alcohol">
                        <i class="fas fa-wine-glass me-2"></i>Alcoholic Drinks
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Food Items -->
    <section class="py-5">
        <div class="container">
            <div class="tab-content" id="foodTabContent">
                
                <!-- Appetizers Tab -->
                <div class="tab-pane fade show active" id="appetizers">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-green-500 to-lime-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-seedling text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Caesar Salad</h5>
                                    <p class="text-muted small">Fresh romaine lettuce, croutons, parmesan</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$8.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Caesar Salad', 8.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-yellow-500 to-orange-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-pepper-hot text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Buffalo Wings</h5>
                                    <p class="text-muted small">Spicy chicken wings with blue cheese dip</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$12.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Buffalo Wings', 12.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-purple-500 to-pink-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-cheese text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Mozzarella Sticks</h5>
                                    <p class="text-muted small">Crispy fried mozzarella with marinara sauce</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$9.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Mozzarella Sticks', 9.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Dishes Tab -->
                <div class="tab-pane fade" id="mains">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-red-600 to-red-800 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-hamburger text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Classic Burger</h5>
                                    <p class="text-muted small">Beef patty, lettuce, tomato, cheese, fries</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$15.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Classic Burger', 15.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-orange-500 to-yellow-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-pizza-slice text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Margherita Pizza</h5>
                                    <p class="text-muted small">Fresh mozzarella, tomato sauce, basil</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$18.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Margherita Pizza', 18.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-green-600 to-blue-600 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-fish text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Grilled Salmon</h5>
                                    <p class="text-muted small">Atlantic salmon with vegetables and rice</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$22.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Grilled Salmon', 22.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desserts Tab -->
                <div class="tab-pane fade" id="desserts">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-brown-500 to-amber-600 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-birthday-cake text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Chocolate Cake</h5>
                                    <p class="text-muted small">Rich chocolate cake with vanilla frosting</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$6.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Chocolate Cake', 6.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-pink-500 to-red-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-ice-cream text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Vanilla Ice Cream</h5>
                                    <p class="text-muted small">Premium vanilla ice cream with toppings</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$4.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Vanilla Ice Cream', 4.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-yellow-500 to-orange-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-cookie-bite text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Cheesecake</h5>
                                    <p class="text-muted small">New York style cheesecake with berries</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$7.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Cheesecake', 7.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Beverages Tab -->
                <div class="tab-pane fade" id="beverages">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-blue-500 to-cyan-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-coffee text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Premium Coffee</h5>
                                    <p class="text-muted small">Freshly brewed arabica coffee</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$3.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Premium Coffee', 3.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-orange-500 to-red-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-glass-whiskey text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Fresh Orange Juice</h5>
                                    <p class="text-muted small">Freshly squeezed orange juice</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$4.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Fresh Orange Juice', 4.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-green-500 to-blue-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-glass-martini text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Smoothie Bowl</h5>
                                    <p class="text-muted small">Mixed berry smoothie with granola</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$8.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Smoothie Bowl', 8.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alcoholic Drinks Tab -->
                <div class="tab-pane fade" id="alcohol">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-red-700 to-purple-700 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-wine-bottle text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Red Wine</h5>
                                    <p class="text-muted small">Premium red wine from Italy</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$12.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Red Wine', 12.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-yellow-600 to-amber-600 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-beer text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Craft Beer</h5>
                                    <p class="text-muted small">Local craft beer selection</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$6.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Craft Beer', 6.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="card-img-top bg-gradient-to-r from-blue-600 to-indigo-600 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-cocktail text-6xl text-white"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Signature Cocktail</h5>
                                    <p class="text-muted small">House special cocktail mix</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">$9.99</span>
                                        <button class="btn btn-primary btn-sm" onclick="addFoodToCart('Signature Cocktail', 9.99)">
                                            <i class="fas fa-plus me-1"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Order Summary Sticky Footer -->
    <div id="orderSummary" class="position-fixed bottom-0 start-0 end-0 bg-white border-top shadow-lg p-3" style="display: none; z-index: 1050;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-shopping-bag text-primary me-2"></i>
                        <span id="orderItemCount">0 items</span>
                        <span class="ms-3">Total: $<span id="orderTotal">0.00</span></span>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-outline-primary me-2" onclick="viewCart()">
                        <i class="fas fa-eye me-1"></i>View Cart
                    </button>
                    <button class="btn btn-success" onclick="proceedToCheckout()">
                        <i class="fas fa-credit-card me-1"></i>Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Food Cart Modal -->
    <div class="modal fade" id="foodCartModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-shopping-cart me-2"></i>Your Order
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="foodCartItems">
                        <!-- Cart items will be populated here -->
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold">Delivery Information</h6>
                            <div class="mb-3">
                                <label class="form-label">Delivery Address</label>
                                <textarea class="form-control" rows="3" placeholder="Enter your delivery address"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Your phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold">Order Options</h6>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deliveryOption" id="delivery" checked>
                                    <label class="form-check-label" for="delivery">
                                        <i class="fas fa-truck me-1"></i>Delivery ($2.99)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deliveryOption" id="pickup">
                                    <label class="form-check-label" for="pickup">
                                        <i class="fas fa-store me-1"></i>Pickup (Free)
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Special Instructions</label>
                                <textarea class="form-control" rows="2" placeholder="Any special requests..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div>Subtotal: $<span id="foodSubtotal">0.00</span></div>
                                <div>Delivery: $<span id="deliveryFee">2.99</span></div>
                                <div class="fw-bold">Total: $<span id="foodGrandTotal">0.00</span></div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
                        <button type="button" class="btn btn-success" onclick="placeOrder()">
                            <i class="fas fa-check me-2"></i>Place Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/food.js"></script>
</body>
</html>