<?php
$currentPath = $_SERVER['PHP_SELF'];
$isInPagesFolder = strpos($currentPath, '/pages/') !== false;
$basePath = $isInPagesFolder ? './' : './pages/';
?>
<footer class="bg-dark text-white py-5 mt-5">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row justify-content-center text-center text-md-start">
            <!-- Company Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold mb-3">
                    <i class="fas fa-ticket-alt me-2 text-primary"></i>TicketHub
                </h5>
                <p class="text-light small mb-3">
                    Your trusted partner for all entertainment and leisure bookings. Experience the best events, movies, sports, and activities with us.
                </p>
                <div class="d-flex gap-3 justify-content-center justify-content-md-start">
                    <a href="#" class="social-icon" title="Facebook" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon" title="Twitter" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" title="Instagram" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon" title="LinkedIn" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="fw-bold mb-3 footer-heading">Quick Links</h6>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>events.php">
                            <i class="fas fa-chevron-right me-2"></i>Events
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>movies.php">
                            <i class="fas fa-chevron-right me-2"></i>Movies
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>sports.php">
                            <i class="fas fa-chevron-right me-2"></i>Sports
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>leisure.php">
                            <i class="fas fa-chevron-right me-2"></i>Leisure
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>food.php">
                            <i class="fas fa-chevron-right me-2"></i>Dining
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>places.php">
                            <i class="fas fa-chevron-right me-2"></i>Places
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Support -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="fw-bold mb-3 footer-heading">Support</h6>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>about.php">
                            <i class="fas fa-chevron-right me-2"></i>About Us
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>contact.php">
                            <i class="fas fa-chevron-right me-2"></i>Contact
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>terms_conditions.php">
                            <i class="fas fa-chevron-right me-2"></i>Terms
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo $basePath; ?>privacy_policy.php">
                            <i class="fas fa-chevron-right me-2"></i>Privacy
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="fw-bold mb-3 footer-heading">Get In Touch</h6>
                <ul class="list-unstyled footer-contact">
                    <li class="mb-3 d-flex align-items-start justify-content-center justify-content-md-start">
                        <i class="fas fa-map-marker-alt me-3 mt-1 text-primary"></i>
                        <small>Colombo 07, Sri Lanka</small>
                    </li>
                    <li class="mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                        <i class="fas fa-phone me-3 text-primary"></i>
                        <small>+94 (70) 123-4567</small>
                    </li>
                    <li class="mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                        <i class="fas fa-envelope me-3 text-primary"></i>
                        <small>tickethub.company@gmail.com</small>
                    </li>
                    <li class="mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                        <i class="fas fa-clock me-3 text-primary"></i>
                        <small>Mon - Fri: 9AM - 6PM</small>
                    </li>
                </ul>
            </div>
        
        <hr class="my-4 border-secondary opacity-25">
        
        <!-- Bottom Bar -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <small class="text-light opacity-75">
                    &copy; 2025 <strong>TicketHub</strong>. All rights reserved.
                </small>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-flex gap-3 justify-content-center justify-content-md-end align-items-center flex-wrap">
                    <small class="text-light opacity-75 d-flex align-items-center">
                        <i class="fas fa-shield-alt me-1 text-success"></i>
                        Secure
                    </small>
                    <small class="text-light opacity-75 d-flex align-items-center">
                        <i class="fas fa-lock me-1 text-success"></i>
                        SSL
                    </small>
                    <small class="text-light opacity-75 d-flex align-items-center">
                        <i class="fas fa-credit-card me-1 text-success"></i>
                        Safe Payment
                    </small>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* Footer Styles */
footer {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
}

/* Footer Headings */
.footer-heading {
    position: relative;
    padding-bottom: 0.75rem;
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 1px;
}

.footer-heading::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 2px;
    background: linear-gradient(to right, #6366f1, transparent);
}

@media (max-width: 767px) {
    .footer-heading::after {
        left: 50%;
        transform: translateX(-50%);
    }
}

/* Footer Links */
.footer-links li a,
.footer-contact li {
    color: #b8b9c0;
    text-decoration: none;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.footer-links li a:hover {
    color: #6366f1;
    padding-left: 5px;
}

.footer-links li a i.fa-chevron-right {
    font-size: 0.65rem;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.footer-links li a:hover i.fa-chevron-right {
    opacity: 1;
}

/* Social Icons */
.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.875rem;
}

.social-icon:hover {
    background: #6366f1;
    color: #fff;
    transform: translateY(-3px);
}

/* Contact Icons */
.footer-contact i {
    font-size: 0.875rem;
    width: 20px;
}

/* Bottom Bar */
footer hr {
    opacity: 0.1;
}

/* Responsive Adjustments */
@media (max-width: 767px) {
    footer .col-lg-3,
    footer .col-lg-2,
    footer .col-md-6 {
        text-align: center !important;
    }
    
    .footer-links li a,
    .footer-contact li {
        justify-content: center;
    }
}

/* Hover Effects */
footer a:not(.social-icon):not(.btn) {
    position: relative;
}

footer a:not(.social-icon):not(.btn)::after {
    content: '';
    position: absolute;
    width: 0;
    height: 1px;
    bottom: -2px;
    left: 0;
    background-color: #6366f1;
    transition: width 0.3s ease;
}

footer a:not(.social-icon):not(.btn):hover::after {
    width: 100%;
}

/* Smooth Animations */
footer * {
    transition: all 0.3s ease;
}
</style>