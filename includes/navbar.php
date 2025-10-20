<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$documentRoot = realpath($_SERVER['DOCUMENT_ROOT']);
$projectRoot = realpath(__DIR__ . '/..');
$baseUrl = rtrim(str_replace('\\', '/', str_replace($documentRoot, '', $projectRoot)), '/') . '/';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="<?php echo $baseUrl; ?>index.php">
            <i class="fas fa-ticket-alt me-2"></i>TicketHub
        </a>
        
        <div class="flex-grow-1 d-flex align-items-center" id="navbarNav" style="display:flex !important;">
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
                        <i class="fas fa-utensils me-1"></i></i>Dining
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
    </div>
</nav>

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