<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places & Tours - TicketHub</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <style>
        .card-img-top {
            object-fit: cover;
            height: 250px;
            width: 100%;
        }
        .image-overlay {
            position: relative;
            overflow: hidden;
        }
        .image-overlay::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.3) 100%);
        }
    </style>
    
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-teal-600 to-blue-600 text-white py-16">
        <div class="container">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-4">
                    <i class="fas fa-map-marked-alt me-3"></i>Places & Tours
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
                        <button class="btn btn-outline-primary" data-filter="mountains">Mountains</button>
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
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Tropical Paradise Island', 1299)">
                                Book Now
                            </button>
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
                            <p class="card-text">It is approximately 150 kilometres (93 mi) south of Colombo and is situated at an elevation of 4 metres (13 ft) above sea level. Mirissa's beach and nightlife make it a popular tourist destination.</p>
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
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Alpine Mountain Adventure', 899)">Book Now
                            </button>
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
                            <h5 class="card-title fw-bold">European Capital Cities</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>10 Days / 9 Nights
                            </p>
                            <p class="card-text">Hikkaduwa, in south-west of Sri Lanka, is a large costal tourist area, covering 11 different villages over six kilometres (31⁄2 miles) on the ocean, and three kilometres (2 miles) inland.</p>
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
                                <span class="fw-bold text-success fs-5">From Rs.300,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('European Capital Cities', 1599)">Book Now
                            </button>
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
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Ancient Wonders Explorer', 1899)">
                                </i>Book Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="adventure">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative image-overlay">
                            <img src="..\assets\images\places\Arugam-bay.jpg" class="card-img-top" alt="Safari Adventure">
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
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Safari Adventure', 2199)">
                                </i>Book Now
                            </button>
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
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Caribbean Island Hopping', 999)">
                                Book Now
                            </button>
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
                        <i class="fas fa-plane me-2"></i>Book Your Tour
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
                            <div class="mb-3">
                                <label class="form-label">Return Date</label>
                                <input type="date" class="form-control" id="returnDate">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Adults (18+)</label>
                                    <select class="form-select" id="adultsCount">
                                        <option value="1">1 Adult</option>
                                        <option value="2">2 Adults</option>
                                        <option value="3">3 Adults</option>
                                        <option value="4">4 Adults</option>
                                        <option value="5">5 Adults</option>
                                        <option value="6">6 Adults</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Children (2-17)</label>
                                    <select class="form-select" id="childrenCount">
                                        <option value="0">No Children</option>
                                        <option value="1">1 Child</option>
                                        <option value="2">2 Children</option>
                                        <option value="3">3 Children</option>
                                        <option value="4">4 Children</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Room Type</label>
                                <select class="form-select" id="roomType">
                                    <option value="standard">Standard Room</option>
                                    <option value="deluxe">Deluxe Room (+$200)</option>
                                    <option value="suite">Suite (+$500)</option>
                                    <option value="presidential">Presidential Suite (+$1000)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Tour Package Includes</h6>
                            <div class="tour-package-details p-3 bg-light rounded mb-3">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span>Round-trip airfare</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span>Accommodation</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span>Daily breakfast</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span>Guided tours</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span>Airport transfers</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span>Travel insurance</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <h6 class="fw-bold mb-3">Additional Options</h6>
                            <div class="additional-options">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="travelInsurance" value="50">
                                    <label class="form-check-label" for="travelInsurance">
                                        Premium Travel Insurance (+$50)
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="airportLounge" value="25">
                                    <label class="form-check-label" for="airportLounge">
                                        Airport Lounge Access (+$25)
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="photoPackage" value="75">
                                    <label class="form-check-label" for="photoPackage">
                                        Professional Photo Package (+$75)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mt-3">
                                <label class="form-label">Special Requests</label>
                                <textarea class="form-control" rows="3" placeholder="Any special requirements or preferences..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div>Base price: $<span id="placeBasePrice">0</span> per person</div>
                                <div>Room upgrade: $<span id="roomUpgrade">0</span></div>
                                <div>Add-ons: $<span id="addOns">0</span></div>
                                <div class="fw-bold fs-5">Total: $<span id="placeTotalPrice">0.00</span></div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="addPlaceToCart()">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                        <button type="button" class="btn btn-success" onclick="proceedToPlacePayment()">
                            <i class="fas fa-credit-card me-2"></i>Book Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/places.js"></script>
</body>
</html>