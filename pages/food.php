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
            background: linear-gradient(135deg, #FF4B2B, #FF416C);
            padding: 80px 0;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('../assets/images/food-pattern.png');
            opacity: 0.1;
            pointer-events: none;
        }
        .festival-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            background: white;
        }
        .festival-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .festival-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255,255,255,0.95);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .cuisine-tag {
            font-size: 0.75rem;
            padding: 3px 8px;
            border-radius: 12px;
            background: #f8f9fa;
            color: #6c757d;
            margin: 2px;
            display: inline-block;
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
                            <div class="p-3 bg-white bg-opacity-10 rounded-3">
                                <i class="fas fa-map-marker-alt fa-2x mb-2"></i>
                                <h5 class="mb-0">Multiple Venues</h5>
                                <small>Across the city</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-white bg-opacity-10 rounded-3">
                                <i class="fas fa-calendar-alt fa-2x mb-2"></i>
                                <h5 class="mb-0">Regular Events</h5>
                                <small>Throughout the year</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-white bg-opacity-10 rounded-3">
                                <i class="fas fa-users fa-2x mb-2"></i>
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
            <?php if (empty($festivals)): ?>
                <!-- Default Festival Cards -->
                <div class="col-md-6 col-lg-4">
                    <div class="card festival-card shadow-sm">
                        <div class="festival-badge">
                            <i class="fas fa-star text-warning me-1"></i>Featured
                        </div>
                        <img src="../assets/images/food-fest-1.jpg" class="card-img-top" alt="Street Food Festival">
                        <div class="card-body">
                            <h5 class="card-title">Street Food Festival</h5>
                            <p class="mb-2">
                                <i class="fas fa-map-marker-alt me-2 text-danger"></i>Central Park
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-calendar me-2 text-primary"></i>November 15, 2025
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-clock me-2 text-success"></i>11:00 AM - 9:00 PM
                            </p>
                            <div class="mb-3">
                                <span class="cuisine-tag">Street Tacos</span>
                                <span class="cuisine-tag">Gourmet Burgers</span>
                                <span class="cuisine-tag">Asian Fusion</span>
                            </div>
                            <button class="btn btn-outline-primary w-100" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#festivalModal" 
                                    data-title="Street Food Festival"
                                    data-description="Experience the best street food from local vendors!"
                                    data-venue="Central Park"
                                    data-date="November 15, 2025"
                                    data-time="11:00 AM - 9:00 PM"
                                    data-fee="$5"
                                    data-cuisines="Street Tacos, Gourmet Burgers, Asian Fusion, Desserts">
                                <i class="fas fa-info-circle me-2"></i>View Details
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card festival-card shadow-sm">
                        <img src="../assets/images/food-fest-2.jpg" class="card-img-top" alt="International Food Fair">
                        <div class="card-body">
                            <h5 class="card-title">International Food Fair</h5>
                            <p class="mb-2">
                                <i class="fas fa-map-marker-alt me-2 text-danger"></i>City Convention Center
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-calendar me-2 text-primary"></i>December 1, 2025
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-clock me-2 text-success"></i>10:00 AM - 8:00 PM
                            </p>
                            <div class="mb-3">
                                <span class="cuisine-tag">Italian</span>
                                <span class="cuisine-tag">Chinese</span>
                                <span class="cuisine-tag">Mexican</span>
                            </div>
                            <button class="btn btn-outline-primary w-100" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#festivalModal"
                                    data-title="International Food Fair"
                                    data-description="A world tour of flavors under one roof!"
                                    data-venue="City Convention Center"
                                    data-date="December 1, 2025"
                                    data-time="10:00 AM - 8:00 PM"
                                    data-fee="$10"
                                    data-cuisines="Italian, Chinese, Mexican, Indian, Thai">
                                <i class="fas fa-info-circle me-2"></i>View Details
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card festival-card shadow-sm">
                        <img src="../assets/images/food-fest-3.jpg" class="card-img-top" alt="Sweet Treats Festival">
                        <div class="card-body">
                            <h5 class="card-title">Sweet Treats Festival</h5>
                            <p class="mb-2">
                                <i class="fas fa-map-marker-alt me-2 text-danger"></i>Riverside Park
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-calendar me-2 text-primary"></i>December 20, 2025
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-clock me-2 text-success"></i>12:00 PM - 10:00 PM
                            </p>
                            <div class="mb-3">
                                <span class="cuisine-tag">Desserts</span>
                                <span class="cuisine-tag">Ice Cream</span>
                                <span class="cuisine-tag">Chocolates</span>
                            </div>
                            <button class="btn btn-outline-primary w-100" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#festivalModal"
                                    data-title="Sweet Treats Festival"
                                    data-description="Indulge in the city's best desserts!"
                                    data-venue="Riverside Park"
                                    data-date="December 20, 2025"
                                    data-time="12:00 PM - 10:00 PM"
                                    data-fee="$8"
                                    data-cuisines="Cakes, Ice Cream, Chocolates, Pastries">
                                <i class="fas fa-info-circle me-2"></i>View Details
                            </button>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($festivals as $festival): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card festival-card shadow-sm">
                            <?php if ($festival['featured']): ?>
                                <div class="festival-badge">
                                    <i class="fas fa-star text-warning me-1"></i>Featured
                                </div>
                            <?php endif; ?>
                            <img src="<?php echo htmlspecialchars($festival['image'] ?? '../assets/images/food-fest-default.jpg'); ?>" 
                                 class="card-img-top" 
                                 alt="<?php echo htmlspecialchars($festival['title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($festival['title']); ?></h5>
                                <p class="mb-2">
                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i><?php echo htmlspecialchars($festival['venue']); ?>
                                </p>
                                <p class="mb-2">
                                    <i class="fas fa-calendar me-2 text-primary"></i><?php echo date('F j, Y', strtotime($festival['festival_date'])); ?>
                                </p>
                                <p class="mb-2">
                                    <i class="fas fa-clock me-2 text-success"></i>
                                    <?php 
                                        echo date('g:i A', strtotime($festival['start_time'])) . ' - ' . 
                                             date('g:i A', strtotime($festival['end_time']));
                                    ?>
                                </p>
                                <div class="mb-3">
                                    <?php 
                                        $cuisines = explode(',', $festival['cuisines']);
                                        foreach (array_slice($cuisines, 0, 3) as $cuisine): 
                                    ?>
                                        <span class="cuisine-tag"><?php echo htmlspecialchars(trim($cuisine)); ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <button class="btn btn-outline-primary w-100" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#festivalModal"
                                        data-title="<?php echo htmlspecialchars($festival['title']); ?>"
                                        data-description="<?php echo htmlspecialchars($festival['description']); ?>"
                                        data-venue="<?php echo htmlspecialchars($festival['venue']); ?>"
                                        data-date="<?php echo date('F j, Y', strtotime($festival['festival_date'])); ?>"
                                        data-time="<?php echo date('g:i A', strtotime($festival['start_time'])) . ' - ' . 
                                                             date('g:i A', strtotime($festival['end_time'])); ?>"
                                        data-fee="$<?php echo number_format($festival['entry_fee'], 2); ?>"
                                        data-cuisines="<?php echo htmlspecialchars($festival['cuisines']); ?>">
                                    <i class="fas fa-info-circle me-2"></i>View Details
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
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
                            <img id="modalImage" src="../assets/images/food-fest-default.jpg" class="img-fluid rounded mb-3" alt="Festival">
                            <h6 class="fw-bold">Description</h6>
                            <p id="modalDescription" class="text-muted"></p>
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