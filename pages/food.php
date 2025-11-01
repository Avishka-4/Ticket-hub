<?php
// Prevent infinite reloads
header("Cache-Control: max-age=300, must-revalidate");
session_start();
require_once '../php/config.php';

// Debug information
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Prevent auto-refresh -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <style>
        .hero-section {
            /* Use the provided header background image with a dark overlay for better text visibility */
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../assets/images/foods/backgroung for head section.jpeg');
            background-size: cover;
            background-position: center;
            padding: 80px 0;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            color: #fff;
            /* keep text readable over images with a subtle shadow */
            text-shadow: 0 2px 6px rgba(0,0,0,0.55);
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
        }
        .festival-card:hover .card-img-top {
            transform: scale(1.05);
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
    <section class="hero-section text-white">
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
                    <img src="../assets/images/foods/food-fest-1.jpg" class="card-img-top" alt="Asian Street Food Festival">
                    <div class="card-body">
                        <h5 class="card-title">Asian Street Food Festival</h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Downtown Square
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-calendar me-2 text-primary"></i>November 15, 2025
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-clock me-2 text-success"></i>11:00 AM - 10:00 PM
                        </p>
                        <div class="mb-3">
                            <span class="cuisine-tag">Asian Fusion</span>
                            <span class="cuisine-tag">Street Food</span>
                            <span class="cuisine-tag">Dim Sum</span>
                        </div>
                        <button class="btn btn-outline-primary w-100 btn-details" 
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal"
                                data-title="Asian Street Food Festival"
                                data-description="Experience authentic Asian street food culture!"
                                data-venue="Downtown Square"
                                data-date="November 15, 2025"
                                data-time="11:00 AM - 10:00 PM"
                                data-fee="$5"
                                data-cuisines="Asian Fusion, Street Food, Dim Sum, Noodles">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Details</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <img src="../assets/images/foods/food-fest-2.jpg" class="card-img-top" alt="Mediterranean Food Festival">
                    <div class="card-body">
                        <h5 class="card-title">Mediterranean Food Festival</h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Seaside Park
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
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal"
                                data-title="Mediterranean Food Festival"
                                data-description="Savor the flavors of the Mediterranean coast!"
                                data-venue="Seaside Park"
                                data-date="November 25, 2025"
                                data-time="12:00 PM - 9:00 PM"
                                data-fee="$8"
                                data-cuisines="Greek, Italian, Spanish, Seafood">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Details</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <img src="../assets/images/foods/food-fest-3.jpg" class="card-img-top" alt="Dessert Paradise">
                    <div class="card-body">
                        <h5 class="card-title">Dessert Paradise</h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Grand Plaza
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
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal"
                                data-title="Dessert Paradise"
                                data-description="Indulge in a sweet wonderland of desserts!"
                                data-venue="Grand Plaza"
                                data-date="December 5, 2025"
                                data-time="10:00 AM - 8:00 PM"
                                data-fee="$6"
                                data-cuisines="Cakes, Ice Cream, Pastries, Chocolates">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Details</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <img src="../assets/images/foods/food-fest-4.jpg" class="card-img-top" alt="BBQ & Grill Fest">
                    <div class="card-body">
                        <h5 class="card-title">BBQ & Grill Fest</h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Riverside Garden</p>
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
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal"
                                data-title="BBQ & Grill Fest"
                                data-description="The ultimate celebration of grilled and smoked delicacies!"
                                data-venue="Riverside Garden"
                                data-date="December 15, 2025"
                                data-time="4:00 PM - 11:00 PM"
                                data-fee="$12"
                                data-cuisines="BBQ, Grilled, Smoked, Steaks">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Details</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card festival-card shadow-sm">
                    <img src="../assets/images/foods/food-fest-5.jpg" class="card-img-top" alt="International Food Fair">
                    <div class="card-body">
                        <h5 class="card-title">International Food Fair</h5>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Convention Center
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-calendar me-2 text-primary"></i>December 30, 2025
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-clock me-2 text-success"></i>11:00 AM - 10:00 PM
                        </p>
                        <div class="mb-3">
                            <span class="cuisine-tag">Global</span>
                            <span class="cuisine-tag">International</span>
                            <span class="cuisine-tag">Fusion</span>
                        </div>
                        <button class="btn btn-outline-primary w-100 btn-details" 
                                data-bs-toggle="modal" 
                                data-bs-target="#festivalModal"
                                data-title="International Food Fair"
                                data-description="A global culinary journey featuring cuisines from around the world!"
                                data-venue="Convention Center"
                                data-date="December 30, 2025"
                                data-time="11:00 AM - 10:00 PM"
                                data-fee="$15"
                                data-cuisines="Global, International, Fusion, World Cuisine">
                            <i class="fas fa-info-circle"></i>
                            <span class="fw-bold">View Details</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Festival Details Modal -->
    <div class="modal fade" id="festivalModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-utensils me-2"></i>
                        <span id="modalTitle">Festival Details</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold">Description</h6>
                            <p id="modalDescription" class="text-muted mb-4"></p>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light p-3 rounded">
                                <h6 class="fw-bold mb-3">Event Details</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                        <strong>Venue:</strong> <span id="modalVenue"></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-calendar me-2 text-primary"></i>
                                        <strong>Date:</strong> <span id="modalDate"></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-clock me-2 text-success"></i>
                                        <strong>Time:</strong> <span id="modalTime"></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-ticket-alt me-2 text-warning"></i>
                                        <strong>Entry Fee:</strong> <span id="modalFee"></span>
                                    </li>
                                </ul>
                                
                                <h6 class="fw-bold mb-2 mt-4">Featured Cuisines</h6>
                                <div id="modalCuisines" class="d-flex flex-wrap gap-2">
                                    <!-- Cuisine tags will be inserted here -->
                                </div>
                            </div>
                            
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <button class="btn btn-primary w-100 mt-4">
                                    <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                                </button>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-primary w-100 mt-4">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login to Book Tickets
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Prevent page reload -->
    <script>
        // Debugging helper
        console.log('Script starting...');
        
        // Stop any existing page refresh
        if (window.stop) {
            window.stop();
        } else if (document.execCommand) {
            document.execCommand('Stop');
        }

        // Initialize modal
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded');
            
            // Handle image errors immediately
            const images = document.querySelectorAll('.card-img-top');
            console.log('Found ' + images.length + ' images');
            
            images.forEach((img, index) => {
                console.log('Processing image ' + index);
                if (img.complete) {
                    console.log('Image ' + index + ' already loaded');
                    if (img.naturalWidth === 0) {
                        console.log('Image ' + index + ' failed to load, using placeholder');
                        img.src = 'https://via.placeholder.com/600x400?text=Food+Festival';
                    }
                } else {
                    console.log('Image ' + index + ' not yet loaded');
                    img.onerror = function() {
                        console.log('Image ' + index + ' error occurred, using placeholder');
                        this.src = 'https://via.placeholder.com/600x400?text=Food+Festival';
                    };
                }
            });

            // Modal handling
            const modal = document.getElementById('festivalModal');
            if (!modal) {
                console.error('Festival modal not found');
                return;
            }

            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                if (!button) {
                    console.error('Modal trigger button not found');
                    return;
                }

                // set modal image from the trigger button's data-image attribute
                const imageSrc = button.dataset.image;
                const modalImgEl = document.getElementById('modalImage');
                if (modalImgEl && imageSrc) {
                    modalImgEl.src = imageSrc;
                }

                const modalElements = {
                    'modalTitle': button.dataset.title || 'Festival Details',
                    'modalDescription': button.dataset.description || 'No description available',
                    'modalVenue': button.dataset.venue || 'Venue TBA',
                    'modalDate': button.dataset.date || 'Date TBA',
                    'modalTime': button.dataset.time || 'Time TBA',
                    'modalFee': button.dataset.fee || 'Price TBA'
                };

                // Update modal elements
                for (const [id, text] of Object.entries(modalElements)) {
                    const element = document.getElementById(id);
                    if (element) {
                        element.textContent = text;
                    } else {
                        console.error(`Modal element ${id} not found`);
                    }
                }

                // Update cuisines
                const cuisinesContainer = document.getElementById('modalCuisines');
                if (cuisinesContainer && button.dataset.cuisines) {
                    cuisinesContainer.innerHTML = '';
                    button.dataset.cuisines.split(',').forEach(cuisine => {
                        if (cuisine.trim()) {
                            const span = document.createElement('span');
                            span.className = 'cuisine-tag';
                            span.textContent = cuisine.trim();
                            cuisinesContainer.appendChild(span);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>