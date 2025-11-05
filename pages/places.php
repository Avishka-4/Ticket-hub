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
                <p class="text-xl mb-6">Discover amazing destinations and book unforgettable tours</p>
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
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-cyan-500 to-blue-500 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-umbrella-beach text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">Featured</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Tropical Paradise Island</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Maldives
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>5 Days / 4 Nights
                            </p>
                            <p class="card-text">Experience crystal clear waters, white sandy beaches, and luxury overwater bungalows in this tropical paradise.</p>
                            
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Tour Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Private beach access</li>
                                    <li>Snorkeling & diving</li>
                                    <li>Sunset cruise</li>
                                    <li>Spa treatments</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $1,299</span>
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
                                <i class="fas fa-plane me-2"></i>Book Tour
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="mountains">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-green-600 to-emerald-600 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-mountain text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">Adventure</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Alpine Mountain Adventure</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Swiss Alps
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>7 Days / 6 Nights
                            </p>
                            <p class="card-text">Explore breathtaking mountain landscapes, pristine lakes, and charming alpine villages in the heart of the Swiss Alps.</p>
                            
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Tour Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Cable car rides</li>
                                    <li>Hiking trails</li>
                                    <li>Mountain lodges</li>
                                    <li>Local cuisine</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $899</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Alpine Mountain Adventure', 899)">
                                <i class="fas fa-plane me-2"></i>Book Tour
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="cities">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-purple-600 to-indigo-600 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-city text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Popular</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">European Capital Cities</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Paris, London, Rome
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>10 Days / 9 Nights
                            </p>
                            <p class="card-text">Discover the rich history, culture, and cuisine of Europe's most iconic capitals on this comprehensive tour.</p>
                            
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Tour Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Guided city tours</li>
                                    <li>Museum visits</li>
                                    <li>Local experiences</li>
                                    <li>Historic landmarks</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $1,599</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('European Capital Cities', 1599)">
                                <i class="fas fa-plane me-2"></i>Book Tour
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="historical">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-yellow-600 to-orange-600 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-monument text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-primary position-absolute top-0 end-0 m-2">Historical</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Ancient Wonders Explorer</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Egypt & Greece
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>12 Days / 11 Nights
                            </p>
                            <p class="card-text">Journey through time exploring ancient pyramids, temples, and archaeological wonders of two great civilizations.</p>
                            
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Tour Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Pyramids of Giza</li>
                                    <li>Acropolis of Athens</li>
                                    <li>Nile River cruise</li>
                                    <li>Expert guides</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $1,899</span>
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
                                <i class="fas fa-plane me-2"></i>Book Tour
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="adventure">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-red-600 to-orange-600 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-fire text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">Extreme</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Safari Adventure</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Kenya & Tanzania
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>8 Days / 7 Nights
                            </p>
                            <p class="card-text">Experience the thrill of African wildlife up close in their natural habitat with guided safari tours and luxury lodges.</p>
                            
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Tour Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Big Five spotting</li>
                                    <li>Serengeti plains</li>
                                    <li>Luxury tented camps</li>
                                    <li>Professional guides</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $2,199</span>
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
                                <i class="fas fa-plane me-2"></i>Book Tour
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="beaches">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-blue-600 to-teal-600 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-water text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">Relaxing</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Caribbean Island Hopping</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Bahamas & Jamaica
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>6 Days / 5 Nights
                            </p>
                            <p class="card-text">Relax on pristine beaches, enjoy water sports, and experience the vibrant culture of the Caribbean islands.</p>
                            
                            <div class="tour-highlights mb-3">
                                <small class="fw-bold text-muted">Tour Highlights:</small>
                                <ul class="small mt-1 mb-0">
                                    <li>Beach resorts</li>
                                    <li>Water activities</li>
                                    <li>Cultural experiences</li>
                                    <li>Local cuisine</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $999</span>
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
                                <i class="fas fa-plane me-2"></i>Book Tour
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