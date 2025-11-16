<?php
// Prevent infinite reloads
header("Cache-Control: max-age=300, must-revalidate");
session_start();
require_once '../php/config.php';

// Debug information
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Compute a robust base URL (handles spaces in folder names)
$documentRoot = realpath($_SERVER['DOCUMENT_ROOT']);
$projectRoot = realpath(dirname(__DIR__)); 
$baseUrl = rtrim(str_replace('\\', '/', str_replace($documentRoot, '', $projectRoot)), '/') . '/';

// Helper to version assets for cache-busting using file modification time
function asset_url($relativePath) {
    global $projectRoot, $baseUrl;
    $fsPath = $projectRoot . '/' . str_replace('\\', '/', $relativePath);
    $version = @filemtime($fsPath);
    return $baseUrl . $relativePath . ($version ? ('?v=' . $version) : '');
}

// Versioned URL relative to THIS page (avoids base URL issues with spaces)
function versioned_rel($relativeFromPage) {
    $fsPath = realpath(__DIR__ . '/' . $relativeFromPage);
    $version = $fsPath ? @filemtime($fsPath) : null;
    return $relativeFromPage . ($version ? ('?v=' . $version) : '');
}

// Fetch food festivals from database
require_once '../php/food_festivals.php';
$festivals = getFoodFestivals();
if (empty($festivals) && !isset($error)) {
    // If no festivals found and no error occurred, this is normal behavior
    // Leave $festivals empty to show default cards
    error_log("No festivals found in database - using default cards");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Food Festival Fiesta - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo versioned_rel('../assets/css/style.css'); ?>">
    <link rel="stylesheet" href="../assets/css/index.css">
    <!-- Aggressively preload ALL images with multiple methods -->
    <link rel="preload" as="image" href="../assets/images/foods/header-hero.jpg">
    <link rel="preload" as="image" href="../assets/images/foods/food-fest-1.jpg">
    <link rel="preload" as="image" href="../assets/images/foods/food-fest-2.jpg">
    <link rel="preload" as="image" href="../assets/images/foods/food-fest-3.jpg">
    <link rel="preload" as="image" href="../assets/images/foods/food-fest-4.jpg">
    <link rel="preload" as="image" href="../assets/images/foods/food-fest-5.jpg">
    
    <!-- Force immediate image loading in head -->
    <script>
        // Preload images immediately when script tag is parsed
        (function() {
            const imagesToPreload = [
                '../assets/images/foods/header-hero.jpg',
                '../assets/images/foods/food-fest-1.jpg',
                '../assets/images/foods/food-fest-2.jpg',
                '../assets/images/foods/food-fest-3.jpg',
                '../assets/images/foods/food-fest-4.jpg',
                '../assets/images/foods/food-fest-5.jpg'
            ];
            
            console.log('Preloading images in HEAD...');
            imagesToPreload.forEach((src, index) => {
                const img = new Image();
                const timestamp = Date.now() + index; // Unique timestamp for each
                img.src = src + '?preload=' + timestamp;
                console.log('Preloading:', img.src);
                
                img.onload = () => console.log('Preloaded successfully:', src);
                img.onerror = () => console.log('Preload failed:', src);
            });
        })();
    </script>
    <!-- Prevent auto-refresh -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <style>
        /* Modal styles */
        #modalDescription {
            white-space: pre-line;
            line-height: 1.6;
            font-size: 1rem;
            color: #333;
        }
        
        .hero-section {
            /* Initial fallback background while image loads */
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%) !important;
            padding: 80px 0;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            color: #fff;
            /* keep text readable over images with a subtle shadow */
            text-shadow: 0 2px 6px rgba(0,0,0,0.55);
            min-height: 500px;
        }
        
        /* Debug helper */
        .hero-section.image-loaded {
            border: 3px solid lime !important;
        }

        .festival-card {
            transition: all 0.3s ease;
            height: 100%;
            background: white;
            border: none;
            overflow: hidden;
        }
        .festival-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
            background: linear-gradient(45deg, #f0f0f0 25%, transparent 25%), 
                        linear-gradient(-45deg, #f0f0f0 25%, transparent 25%), 
                        linear-gradient(45deg, transparent 75%, #f0f0f0 75%), 
                        linear-gradient(-45deg, transparent 75%, #f0f0f0 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }
        .festival-card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        /* Loading state for images */
        .card-img-top[src*="placeholder"] {
            background: #e2e8f0;
        }
        .festival-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255,255,255,0.95);
            padding: 8px 15px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 500;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.3);
        }
        .cuisine-tag {
            font-size: 0.8rem;
            padding: 5px 12px;
            border-radius: 20px;
            background: #f0f4ff;
            color: #0d6efd;
            margin: 3px;
            display: inline-block;
            transition: all 0.2s ease;
            border: 1px solid #e0e7ff;
        }
        .cuisine-tag:hover {
            background: #e0e7ff;
            transform: translateY(-1px);
        }
        .feature-icon {
            width: 56px;
            height: 56px;
            display: inline-block;
            object-fit: cover;
            border-radius: 6px;
            /* no color-forcing filter so uploaded JPGs keep their colors */
        }
        /* Fallback hero background image element */
        .hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }
        .hero-section > .container, .hero-section * {
            position: relative;
            z-index: 1;
        }
        /* Style for the view details button */
        .btn-details {
            padding: 10px 20px !important;
            transition: all 0.3s ease !important;
            background: white !important;
            border: 1px solid #0d6efd !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
        }
        
        .btn-details:hover {
            background: #f8f9fa !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.15) !important;
        }

        /* .nav-item{
            margin-left: 15px;
        }

        .navbar .navbar-brand {
            font-size: 1.3rem;
            font-weight: 700;
            color: #007bff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: color 0.3s ease;
            margin-left: 35px;
        }

        .nav-link {
            font-weight: 200;
            color: var(--dark-color) !important;
            margin: 0 3px;
            border-radius: 6px;
            padding: 8px 16px !important;
            transition: all 0.3s ease;
            margin-left: 10px;
        } */
    </style>
</head>
<body class="bg-light">
    <!-- Debug info -->
    <script>
        console.log('Page load started');
        window.addEventListener('load', function() {
            console.log('Page fully loaded');
        });
        window.addEventListener('beforeunload', function(e) {
            console.log('Page unloading', e);
        });
        window.addEventListener('unload', function() {
            console.log('Page unloaded');
        });
    </script>
    
    <?php include '../includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section text-white position-relative" id="heroSection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-4">
                        <i class="fas fa-utensils me-3"></i>Food Festival Fiesta
                    </h1>
                    <p class="lead mb-4">Experience culinary delights from around the world at our vibrant food festivals</p>
                    <div class="row justify-content-center g-4 mt-3">
                        <div class="col-md-4">
                            <div class="p-3 bg-white bg-opacity-10 rounded-3 text-center">
                                    <h5 class="mb-0">Multiple Venues</h5>
                                    <small>Across the city</small>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-white bg-opacity-10 rounded-3 text-center">
                                    <h5 class="mb-0">Regular Events</h5>
                                    <small>Throughout the year</small>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-white bg-opacity-10 rounded-3 text-center">
                                    <h5 class="mb-0">Family Friendly</h5>
                                    <small>Fun for everyone</small>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Festivals Section -->
    <section class="container mb-5">
        <h2 class="text-center mb-4">Upcoming Food Festivals</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <!-- Five New Festival Cards -->
            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <div class="festival-badge">
                        <i class="fas fa-star text-warning me-1"></i>Featured
                    </div>
                    <img src="../assets/images/foods/food-fest-1.jpg" class="card-img-top" alt="Asian Street Food Festival" loading="eager">
                    <div class="card-body">
                        <h5 class="card-title">Culinary Art Food Expo </h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>BMICH
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-calendar me-2 text-primary"></i>November 29, 2025
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-clock me-2 text-success"></i>11:00 AM - 10:00 PM
                        </p>
                        <div class="mb-3">
                            <span class="cuisine-tag">Asian Fusion</span>
                            <span class="cuisine-tag">Street Food</span>
                        </div>
                            <button class="btn btn-outline-primary w-100 btn-details" 
                                onclick="showFestivalDetails('Culinary Art Food Expo (CAFE)', 'Join us for an extraordinary culinary journey at CAFE 2025! Experience the finest selection of international and local cuisine, live cooking demonstrations by renowned chefs, and interactive food workshops. This premier food event brings together over 50 vendors showcasing their signature dishes, innovative food concepts, and culinary expertise.')"
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Event Details</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <div class="festival-badge">
                        <i class="fas fa-star text-warning me-1"></i>Trending
                    </div>
                    <img src="../assets/images/foods/food-fest-2.jpg" class="card-img-top" alt="Mediterranean Food Festival" loading="eager">
                    <div class="card-body">
                        <h5 class="card-title">Grand Trunk Road Food Fest</h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Colombo City Center
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-calendar me-2 text-primary"></i>November 25, 2025
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-clock me-2 text-success"></i>12:00 PM - 9:00 PM
                        </p>
                        <div class="mb-3">
                            <span class="cuisine-tag">Greek</span>
                            <span class="cuisine-tag">Italian</span>
                            <span class="cuisine-tag">Spanish</span>
                        </div>
                            <button class="btn btn-outline-primary w-100 btn-details" 
                                onclick="showFestivalDetails('Grand Trunk Road Food Fest', 'Embark on a gastronomic adventure at the Grand Trunk Road Food Fest! This unique festival celebrates the diverse culinary heritage of South Asia\'s historic trade route. Discover authentic street food, traditional delicacies, and modern fusion dishes from regions spanning from Bengal to Peshawar. Experience live cooking demonstrations, cultural performances, and the vibrant atmosphere of this legendary route.')"
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Event Details</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <img src="../assets/images/foods/food-fest-3.jpg" class="card-img-top" alt="Dessert Paradise" loading="eager">
                    <div class="card-body">
                        <h5 class="card-title">Colombo Flavour Fiesta</h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Green Path , Colombo
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-calendar me-2 text-primary"></i>December 5, 2025
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-clock me-2 text-success"></i>10:00 AM - 8:00 PM
                        </p>
                        <div class="mb-3">
                            <span class="cuisine-tag">Cakes</span>
                            <span class="cuisine-tag">Ice Cream</span>
                            <span class="cuisine-tag">Pastries</span>
                        </div>
                            <button class="btn btn-outline-primary w-100 btn-details" 
                                onclick="showFestivalDetails('Colombo Flavour Fiesta', 'Experience the essence of Sri Lankan cuisine at Colombo Flavour Fiesta! This vibrant festival brings together the best local chefs and food artisans showcasing authentic Sri Lankan dishes, street food favorites, and contemporary fusion creations. Enjoy live cooking demonstrations, traditional food preparation methods, and the aromatic spices that make Sri Lankan cuisine unique. Don\'t miss special workshops on making hoppers, kottu, and traditional curries.')"
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Event Details</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <img src="../assets/images/foods/food-fest-4.jpg" class="card-img-top" alt="BBQ & Grill Fest" loading="eager">
                    <div class="card-body">
                        <h5 class="card-title">Fairway Colombo Street Food Festival</h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Hospital Street (Dutch Hospital) , Colombo</p>
                        <p class="mb-2">
                            <i class="fas fa-calendar me-2 text-primary"></i>December 15, 2025
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-clock me-2 text-success"></i>4:00 PM - 11:00 PM
                        </p>
                        <div class="mb-3">
                            <span class="cuisine-tag">BBQ</span>
                            <span class="cuisine-tag">Grilled</span>
                            <span class="cuisine-tag">Smoked</span>
                        </div>
                            <button class="btn btn-outline-primary w-100 btn-details" 
                                onclick="showFestivalDetails('Fairway Colombo Street Food Festival', 'Step into the historic Dutch Hospital precinct for an unforgettable evening of street food delights! The Fairway Colombo Street Food Festival transforms this colonial-era building into a bustling food haven, featuring the best street food vendors from across Colombo. Explore a diverse range of local and international street food, from kottu and isso wade to tacos and sliders. Enjoy live music, cultural performances, and the unique ambiance of Old Colombo while savoring your favorite street food delicacies.')"
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Event Details</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <img src="../assets/images/foods/food-fest-5.jpg" class="card-img-top" alt="International Food Fair" loading="eager">
                    <div class="card-body">
                        <h5 class="card-title">Spicy Street Food Festival 2026 (SSFF) </h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Diyatha Uyana road , Battaramulla
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-calendar me-2 text-primary"></i>December 30, 2025
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-clock me-2 text-success"></i>11:00 AM - 10:00 PM
                        </p>
                        <div class="mb-3">
                            <span class="cuisine-tag">Foods</span>
                            <span class="cuisine-tag">International</span>
                            <span class="cuisine-tag">Games</span>
                            
                        </div>
                            <button class="btn btn-outline-primary w-100 btn-details" 
                                onclick="showFestivalDetails('Spicy Street Food Festival', 'Heat up your taste buds at the Spicy Street Food Festival in Diyatha Uyana! This exciting event celebrates the spicier side of street food culture, featuring vendors specializing in hot and flavorful dishes from around Sri Lanka and beyond. Challenge yourself with different levels of spiciness, from mild to extreme. Enjoy cooking competitions, spice mixing demonstrations, and cool refreshments to balance the heat. A perfect event for spicy food lovers and adventure seekers!')"
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Event Details</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Festival Details Modal -->
    <div class="modal fade" id="festivalModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-utensils me-2"></i>
                        <span id="modalTitle">Festival Details</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <h6 class="fw-bold">Description</h6>
                        <div id="modalDescription" class="text-muted mb-4"></div>
                    </div>
                    
                    <div class="mb-4">
                        <h6 class="fw-bold">Contact Information</h6>
                        <ul class="list-unstyled text-muted">
                            <li><i class="fas fa-phone me-2"></i><span id="modalContact">Contact numbers will appear here</span></li>
                            <li><i class="fas fa-envelope me-2"></i><span id="modalEmail">Email will appear here</span></li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold">Ticket Prices</h6>
                        <ul class="list-unstyled text-muted">
                            <li id="modalPrices">Price information will appear here</li>
                        </ul>
                    </div>
                    
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets Now
                            </button>
                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                I'll deal with it later
                            </button>
                        </div>
                    <?php else: ?>
                        <div class="d-grid gap-2">
                            <a href="login.php" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt me-2"></i>Login to Book Tickets
                            </a>
                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                I'll deal with it later
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Prevent page reload -->
    <script>
        // Function to show festival details in modal
        function showFestivalDetails(title, description) {
            console.log('Showing details for:', title);
            console.log('Description:', description);
            
            // Update modal content
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDescription').textContent = description;

            // Set contact information based on festival
            let contact = '';
            let email = '';
            let prices = '';

            switch(title) {
                case 'Culinary Art Food Expo (CAFE)':
                    contact = '+94 11 2456789 - Saman, +94 77 1234567 - Lionel';
                    email = 'cafe@tickethub.lk';
                    prices = 'Regular: Rs. 1000<br>VIP: Rs. 2500<br>Children (under 12): Rs. 500';
                    break;
                case 'Grand Trunk Road Food Fest':
                    contact = '+94 11 2789456 - Mahinda, +94 76 8901234 - B.K.Perera';
                    email = 'gtrfest@tickethub.lk';
                    prices = 'Regular: Rs. 800<br>VIP: Rs. 2000<br>Children (under 12): Free';
                    break;
                case 'Colombo Flavour Fiesta':
                    contact = '+94 11 2345678 - Sunil, +94 75 6789012 - Ranil';
                    email = 'flavourfiesta@tickethub.lk';
                    prices = 'Regular: Rs. 750<br>VIP: Rs. 1800<br>Family Pack (4 persons): Rs. 2500';
                    break;
                case 'Fairway Colombo Street Food Festival':
                    contact = '+94 11 2567890 - Sumedha, +94 78 3456789 - Saman';
                    email = 'fairwayfest@tickethub.lk';
                    prices = 'Regular: Rs. 500<br>VIP: Rs. 1500<br>Children (under 12): Free';
                    break;
                case 'Spicy Street Food Festival':
                    contact = '+94 11 2678901 - Saduni, +94 71 4567890 - Pahan';
                    email = 'spicyfest@tickethub.lk';
                    prices = 'Regular: Rs. 600<br>VIP: Rs. 1600<br>Family Pack (4 persons): Rs. 2000';
                    break;
                default:
                    contact = 'Contact information not available';
                    email = 'info@tickethub.lk';
                    prices = 'Price information not available';
            }

            document.getElementById('modalContact').textContent = contact;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalPrices').innerHTML = prices;
        }
        
        // Debugging helper
        console.log('Script starting...');
        
        // Stop any existing page refresh
        if (window.stop) {
            window.stop();
        } else if (document.execCommand) {
            document.execCommand('Stop');
        }

        // Override browser cache completely 
        function disableCacheForImages() {
            // Intercept all image requests and add cache busters
            const originalSetAttribute = Image.prototype.setAttribute;
            Image.prototype.setAttribute = function(name, value) {
                if (name === 'src' && !value.includes('?')) {
                    value += '?nocache=' + Math.random();
                }
                return originalSetAttribute.call(this, name, value);
            };
        }
        
        // Force load hero background image with multiple aggressive methods
        function forceLoadHeroImage() {
            const heroSection = document.querySelector('.hero-section');
            if (!heroSection) {
                console.error('Hero section not found!');
                return;
            }
            
            console.log('Loading hero image with aggressive methods...');
            
            // Method 1: Try multiple URL variations
            const baseUrl = window.location.origin + window.location.pathname.replace('/pages/food.php', '');
            const timestamp = Date.now();
            const imageUrls = [
                `../assets/images/foods/header-hero.jpg?v=${timestamp}`,
                `${baseUrl}/assets/images/foods/header-hero.jpg?v=${timestamp}`,
                `/ticket booking/assets/images/foods/header-hero.jpg?v=${timestamp}`,
                `../assets/images/foods/header-hero.jpg`,
                `assets/images/foods/header-hero.jpg`
            ];
            
            let urlIndex = 0;
            
            function tryNextUrl() {
                if (urlIndex >= imageUrls.length) {
                    console.error('All image URLs failed, using fallback color');
                    heroSection.style.background = 'linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%)';
                    return;
                }
                
                const currentUrl = imageUrls[urlIndex];
                console.log(`Trying URL ${urlIndex + 1}:`, currentUrl);
                
                const testImg = new Image();
                
                testImg.onload = function() {
                    console.log('SUCCESS! Hero image loaded:', currentUrl);
                    
                    // Apply background aggressively with multiple methods
                    const bgStyle = `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("${currentUrl}")`;
                    
                    heroSection.style.cssText += `
                        background: ${bgStyle} !important;
                        background-image: ${bgStyle} !important;
                        background-size: cover !important;
                        background-position: center !important;
                        background-repeat: no-repeat !important;
                    `;
                    
                    // Double-check it applied
                    setTimeout(() => {
                        const computedStyle = window.getComputedStyle(heroSection);
                        console.log('Final background-image:', computedStyle.backgroundImage);
                    }, 100);
                };
                
                testImg.onerror = function() {
                    console.log(`URL ${urlIndex + 1} failed:`, currentUrl);
                    urlIndex++;
                    tryNextUrl();
                };
                
                testImg.src = currentUrl;
            }
            
            tryNextUrl();
        }
        
        // Initialize everything immediately
        disableCacheForImages();
        forceLoadHeroImage();
        
        // Also run after DOM ready as backup
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                disableCacheForImages();
                forceLoadHeroImage();
                forceLoadCardImages();
            });
        } else {
            forceLoadCardImages();
        }

        // Force load all card images without cache issues
        function forceLoadCardImages() {
            const images = document.querySelectorAll('.card-img-top');
            console.log('Force loading ' + images.length + ' card images...');
            
            const baseUrl = window.location.origin + window.location.pathname.replace('/pages/food.php', '');
            const timestamp = Date.now();
            
            images.forEach((img, index) => {
                const originalSrc = img.getAttribute('src');
                const imageName = originalSrc.split('/').pop().split('?')[0]; // Extract just the filename
                
                console.log(`Loading card image ${index + 1}: ${imageName}`);
                
                // Try multiple URL patterns for each image
                const imageUrls = [
                    `../assets/images/foods/${imageName}?v=${timestamp}`,
                    `${baseUrl}/assets/images/foods/${imageName}?v=${timestamp}`,
                    `/ticket booking/assets/images/foods/${imageName}?v=${timestamp}`,
                    `../assets/images/foods/${imageName}`,
                    `assets/images/foods/${imageName}`
                ];
                
                let urlIndex = 0;
                
                function tryNextImageUrl() {
                    if (urlIndex >= imageUrls.length) {
                        console.log(`All URLs failed for image ${index + 1}, using placeholder`);
                        img.src = 'https://via.placeholder.com/600x400?text=Food+Festival';
                        img.style.border = '2px solid red';
                        return;
                    }
                    
                    const currentUrl = imageUrls[urlIndex];
                    const testImg = new Image();
                    
                    testImg.onload = function() {
                        console.log(`SUCCESS! Card image ${index + 1} loaded:`, currentUrl);
                        img.src = currentUrl;
                        img.style.border = '2px solid green'; // Visual confirmation
                        setTimeout(() => img.style.border = '', 2000); // Remove after 2 seconds
                    };
                    
                    testImg.onerror = function() {
                        console.log(`Card image ${index + 1} URL ${urlIndex + 1} failed:`, currentUrl);
                        urlIndex++;
                        tryNextImageUrl();
                    };
                    
                    testImg.src = currentUrl;
                }
                
                tryNextImageUrl();
            });
        }

        // Initialize modal and force load images
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded');
            
            // Force load all card images
            forceLoadCardImages();

            // Debug: Check all view details buttons
            document.querySelectorAll('.btn-details').forEach((btn, index) => {
                console.log(`Button ${index + 1} data:`, {
                    title: btn.getAttribute('data-title'),
                    description: btn.getAttribute('data-description')
                });
            });

            // Modal handling
            const modal = document.getElementById('festivalModal');
            if (!modal) {
                console.error('Festival modal not found');
                return;
            }

            modal.addEventListener('show.bs.modal', function(event) {
                console.log('Modal show event triggered');
                
                const button = event.relatedTarget;
                if (!button) {
                    console.error('Modal trigger button not found');
                    return;
                }
                
                console.log('Button clicked:', button);
                console.log('Button dataset:', button.dataset);
                
                // Get the description and title directly from dataset
                const description = button.dataset.description;
                const title = button.dataset.title;
                
                console.log('Retrieved data:', { title, description });

                // Update the modal content
                const modalTitle = document.getElementById('modalTitle');
                const modalDescription = document.getElementById('modalDescription');

                console.log('Modal elements:', {
                    titleElement: modalTitle,
                    descriptionElement: modalDescription
                });

                if (modalTitle) {
                    modalTitle.textContent = title || 'Festival Details';
                    console.log('Updated title to:', modalTitle.textContent);
                } else {
                    console.error('Modal title element not found');
                }

                if (modalDescription) {
                    modalDescription.textContent = description || 'No description available';
                    console.log('Updated description to:', modalDescription.textContent);
                } else {
                    console.error('Modal description element not found');
                }

                // Force update modal content
                modal.style.display = 'block';
                setTimeout(() => {
                    modal.style.display = '';
                }, 0);
            });
        });
    </script>
</body>
</html>