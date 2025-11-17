<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places & Best Destinations in Sri Lanka- TicketHub</title>
    
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
    <section class="bg-gradient-to-r from-teal-600 to-blue-600 text-white py-16">
        <div class="container">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-4">
                    <i class="fas fa-map-marked-alt me-3"></i>Places & Best Destinations in Sri Lanka
                </h1>
                <p class="text-xl mb-6">Discover amazing destinations and get unforgettable experience</p>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-outline-primary active" data-filter="all">All Destinations</button>
                        <button class="btn btn-outline-primary" data-filter="beaches">Beaches</button>
                        <button class="btn btn-outline-primary" data-filter="cities">City Tours</button>
                        <button class="btn btn-outline-primary" data-filter="historical">Historical</button>
                        <button class="btn btn-outline-primary" data-filter="adventure">Adventure</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search destinations...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Places Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                
                <!-- Destination Card 1 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="beaches">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images\places\ella.jpg" class="card-img-top" alt="Tropical Paradise Island">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Ella</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>5 Days / 4 Nights
                            </p>
                            <p class="card-text">Ella is a small, picturesque town nestled in the highlands of Sri Lanka, known for its breathtaking scenery and laid-back, bohemian atmosphere.</p>
                            <br>
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Destination Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Historical</li>
                                    <li>Adventure</li>
                                    <li>Photography</li>
                                </ul>
                            </div>
                            <br>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs.180,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="mountains">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images\places\mirissa.jpg" class="card-img-top" alt="Alpine Mountain Adventure">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Mirissa</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>7 Days / 6 Nights
                            </p>
                            <p class="card-text">Mirissa is a popular coastal town on Sri Lanka's south coast known for its beautiful beaches, whale watching tours, and surfing. It features popular spots like Mirissa Beach, the secluded Secret Beach, Parrot Rock for sunset views, and Coconut Tree Hill.</p>
                            <br>
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Destination Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Adventure</li>
                                    <li>Photography</li>
                                    <li>Beach</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs.220,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="cities">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images\places\hikkaduwa.jpg" class="card-img-top" alt="European Capital Cities">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Hikkaduwa</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>10 Days / 9 Nights
                            </p>
                            <p class="card-text">The Best Tourist Destination in Sri Lanka. Hikkaduwa is a popular coastal town in Sri Lanka known for its beautiful beaches, vibrant surfing and diving scenes, and a protected coral reef. Located about 100km south of Colombo, it attracts tourists with its laid-back yet energetic atmosphere, opportunities for seeing turtles at Turtle Beach.</p>
                            <br>
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Destination Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Photography</li>
                                    <li>Adventure</li>
                                    <li>Beach</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs">From Rs.5,000.00 per day for one person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="historical">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images\places\maligawa.jpg" class="card-img-top" alt="Ancient Wonders Explorer">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Ancient Wonders Explorer</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>12 Days / 11 Nights
                            </p>
                            <p class="card-text">The Sri Dalada Maligawa, or Temple of the Sacred Tooth Relic, is a Buddhist temple in Kandy, Sri Lanka, and a UNESCO World Heritage site.</p>
                            <br>
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Destination Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Historical</li>
                                    <li>Cultural</li>
                                    <li>Sacred</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs.200,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.6)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="adventure">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images/places/Arugam-bay.jpg" class="card-img-top" alt="Safari Adventure">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Arugam Bay</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>8 Days / 7 Nights
                            </p>
                            <p class="card-text">Arugam Bay is a charming coastal town on the eastern coast of Sri Lanka, renowned for its golden sandy beaches and world-class surf breaks.</p>
                            <br>
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Destination Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Historical</li>
                                    <li>Beach</li>
                                    <li>Photography</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs.280,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="beaches">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images\places\sigiriya.jpg" class="card-img-top" alt="Caribbean Island Hopping">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sigiriya</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>6 Days / 5 Nights
                            </p>
                            <p class="card-text">Sigiriya, a UNESCO World Heritage site in Sri Lanka, is an ancient rock fortress and palace built by King Kashyapa in the 5th century A.D.</p>
                            <br>
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Destination Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Historical</li>
                                    <li>Cultural</li>
                                    <li>Photography</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs.230,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Places Booking Modal -->
    <div class="modal fade" id="placeBookingModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plane me-2"></i>Book Your Adventure:
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 id="placeTourTitle" class="fw-bold mb-3"></h6>
                            <div class="mb-3">
                                <label class="form-label">Departure Date</label>
                                <input type="date" class="form-control" id="departureDate">
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs.250,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 8 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="beaches">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images\places\Anuradhapura.jpg" class="card-img-top" alt="Caribbean Island Hopping">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Anuradhapura</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>6 Days / 5 Nights
                            </p>
                            <p class="card-text">Anuradhapura's main attractions include the sacred Jaya Sri Maha Bodhi tree, ancient stupas like Ruwanwelisaya and Abhayagiri Stupa, the rock-carved Isurumuniya Temple, and the Samadhi Buddha statue</p>
                            <br>
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Destination Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Historical</li>
                                    <li>Cultural</li>
                                    <li>Photography</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs.220,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 9 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="beaches">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images\places\jaffna.jpg" class="card-img-top" alt="Caribbean Island Hopping">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Jaffna</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>6 Days / 5 Nights
                            </p>
                            <p class="card-text">Jaffna is the capital of the Northern Province of Sri Lanka, located on a peninsula known for its distinct Tamil culture. It features significant historical sites like the Jaffna Fort and the Nallur Kandaswamy Temple, alongside agricultural and fishing industries.</p>
                            <br>
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Destination Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Historical</li>
                                    <li>Cultural</li>
                                    <li>Photography</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs.230,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100"><a href="order.php">Book Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/places.js"></script>
</body>
</html>