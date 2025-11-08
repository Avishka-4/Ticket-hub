<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Simplified base URL logic
$baseUrl = '/Ticket-hub/';

// Debug information
error_log('Document Root: ' . $_SERVER['DOCUMENT_ROOT']);
error_log('Current Script: ' . $_SERVER['SCRIPT_NAME']);
error_log('Base URL: ' . $baseUrl);
?>
    <!-- Bootstrap Offcanvas Side Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="<?php echo $baseUrl; ?>index.php">
                <i class="fas fa-ticket-alt me-2"></i>TicketHub
            </a>
            
            <!-- Desktop Navigation (hidden on mobile) -->
            <div class="flex-grow-1 d-none d-lg-flex align-items-center justify-content-center" id="navbarNav">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseUrl; ?>index.php">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseUrl; ?>pages/events.php">
                            <i class="fas fa-music me-1"></i>Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseUrl; ?>pages/movies.php">
                            <i class="fas fa-film me-1"></i>Movies
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseUrl; ?>pages/sports.php">
                            <i class="fas fa-futbol me-1"></i>Sports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseUrl; ?>pages/leisure.php">
                            <i class="fas fa-umbrella-beach me-1"></i>Leisure
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseUrl; ?>pages/food.php">
                            <i class="fas fa-utensils me-1"></i>Foods
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseUrl; ?>pages/places.php">
                            <i class="fas fa-map-marked-alt me-1"></i>Places
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex ms-auto align-items-center gap-2">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i><?php echo $_SESSION['username']; ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>pages/profile.php">
                                    <i class="fas fa-user-circle me-2"></i>Profile
                                </a></li>
                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>php/logout.php">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo $baseUrl; ?>pages/login.php" class="btn btn-primary btn-small me-2" 
                        style="font-size: 14px; padding: 10px 20px;">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>

                        <a href="<?php echo $baseUrl; ?>pages/register.php" class="btn btn-primary btn-small me-2"
                        style="font-size: 14px; padding: 10px 12px;">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    <?php endif; ?>
                        <!-- <button class="btn btn-success btn-small ms-2" data-bs-toggle="modal" data-bs-target="#cartModal">
                            <i class="fas fa-shopping-cart me-1"></i>Cart 
                            <span class="badge bg-danger" id="cart-count">0</span>
                        </button> -->
                </div>
            </div>
            
            <!-- Mobile Navigation Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Offcanvas Sidebar for Mobile -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                <i class="fas fa-ticket-alt me-2 text-primary"></i>TicketHub
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseUrl; ?>index.php">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseUrl; ?>pages/events.php">
                        <i class="fas fa-music me-2"></i>Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseUrl; ?>pages/movies.php">
                        <i class="fas fa-film me-2"></i>Movies
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseUrl; ?>pages/sports.php">
                        <i class="fas fa-futbol me-2"></i>Sports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseUrl; ?>pages/leisure.php">
                        <i class="fas fa-umbrella-beach me-2"></i>Leisure
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseUrl; ?>pages/food.php">
                        <i class="fas fa-utensils me-2"></i>Foods
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseUrl; ?>pages/places.php">
                        <i class="fas fa-map-marked-alt me-2"></i>Places
                    </a>
                </li>
            </ul>
            
            <!-- User Menu for Mobile -->
            <div class="user-menu-mobile">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="d-grid gap-2">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-user-circle me-2 text-muted"></i>
                            <span class="fw-bold"><?php echo $_SESSION['username']; ?></span>
                        </div>
                        <a href="<?php echo $baseUrl; ?>pages/profile.php" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-user-circle me-1"></i>Profile
                        </a>
                        <a href="<?php echo $baseUrl; ?>php/logout.php" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    </div>
                <?php else: ?>
                    <div class="d-grid gap-2">
                        <a href="<?php echo $baseUrl; ?>pages/login.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                        <a href="<?php echo $baseUrl; ?>pages/register.php" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Cart Modal (unchanged) -->
    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-shopping-cart me-2"></i>Shopping Cart
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="cart-items">
                    <p class="text-center text-muted">Your cart is empty</p>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0">Total: <span id="cart-total">$0.00</span></h6>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
                        <button type="button" class="btn btn-primary" id="checkout-btn">
                            <i class="fas fa-credit-card me-1"></i>Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- No closing tags needed as this is an include file -->
