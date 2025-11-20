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
    <link rel="stylesheet" href="../assets/css/index.css">

    <style>
        /* Custom styles for the booking modal */
        .booking-modal-header {
            background: linear-gradient(135deg, #0d6efd 0%, #198754 100%);
            color: white;
        }
        
        .price-breakdown {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            border-left: 4px solid #0d6efd;
        }
        
        .feature-list i {
            color: #198754;
            width: 20px;
        }
        
        .option-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .option-card:hover {
            border-color: #0d6efd;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #198754;
        }
        
        .date-input:focus, .select-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        /* Hero container */
        .hero {
            position: relative;
        }

        /* Make carousel images cover and have responsive heights */
        .hero .carousel-inner img {
            width: 100%;
            height: 60vh;              
            object-fit: cover;
        }
        @media (max-width: 768px) {
            .hero .carousel-inner img {
            height: 40vh;           
            }
        }

        /* Overlay panel centered on the images */
        .hero-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            width: calc(100% - 2rem);
            max-width: 980px;
            padding: 1rem 1.25rem;
            border-radius: 0.5rem;
            text-align: center;
        }

        /* Responsive title and subtitle using clamp() */
        .hero-title {
            color: #fff;
            margin: 0;
            font-weight: 700;
            line-height: 1.05;
            font-size: clamp(1.4rem, 6vw, 2.8rem); /* scales between phone and desktop */
        }

        .hero-sub {
            color: #fff;
            margin-top: 0.5rem;
            font-size: clamp(0.95rem, 3.5vw, 1.25rem);
        }

        /* Slight shadow for carousel controls so they remain visible */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.5));
        }

        /* Optional: reduce overlay padding on very small screens */
        @media (max-width: 400px) {
            .hero-overlay {
            padding: 0.6rem 0.8rem;
            }
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

    <div class="hero">
  <!-- Overlay (text inside the image box) -->
  <div class="hero-overlay">
    <h1 class="hero-title">
      <i class="fas fa-map-marked-alt me-2" aria-hidden="true"></i>
      Places &amp; Best Destinations in Sri Lanka
    </h1>
    <p class="hero-sub">Discover amazing destinations and get unforgettable experiences</p>
  </div>

  <!-- Carousel -->
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../assets/images/places/home1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../assets/images/places/home2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../assets/images/places/home3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>


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
                                <span class="fw-bold text-success fs-5">From Rs.18,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Ella Tour', 18000)">Book Now</button>
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
                                <span class="fw-bold text-success fs-5">From Rs.22,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Mirissa Beach Tour', 22000)">Book Now</button>
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
                            <h5 class="card-title fw-bold">Hikkaduwa Beach</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>10 Days / 9 Nights
                            </p>
                            <p class="card-text">Hikkaduwa, in south-west of Sri Lanka, is a large costal tourist area, covering 11 different villages over six kilometres (31⁄2 miles) on the ocean, and three kilometres (2 miles) inland.</p>
                            <br>
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
                                <span class="fw-bold text-success fs-5">From Rs.30,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Hikkaduwa Beach Tour', 30000)">Book Now</button>
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
                            <h5 class="card-title fw-bold">Temple of the Sacred Tooth</h5>
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
                                <span class="fw-bold text-success fs-5">From Rs.20,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.6)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Temple of the Sacred Tooth Tour', 20000)">Book Now</button>
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
                                <span class="fw-bold text-success fs-5">From Rs.28,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Arugam Bay Surf Adventure', 28000)">Book Now</button>
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
                                <span class="fw-bold text-success fs-5">From Rs.23,000.00</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openPlaceBooking('Sigiriya Rock Fortress Tour', 23000)">Book Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Places Booking Modal -->
    <div class="modal fade" id="placeBookingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header booking-modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plane me-2"></i>Book Your Adventure: <span id="placeTourTitle"></span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Departure Date</label>
                                <input type="date" class="form-control date-input" id="departureDate">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Return Date</label>
                                <input type="date" class="form-control date-input" id="returnDate">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Adults (18+)</label>
                                    <select class="form-select select-input" id="adultsCount">
                                        <option value="1">1 Adult</option>
                                        <option value="2">2 Adults</option>
                                        <option value="3">3 Adults</option>
                                        <option value="4">4 Adults</option>
                                        <option value="5">5 Adults</option>
                                        <option value="6">6 Adults</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Children (2-17)</label>
                                    <select class="form-select select-input" id="childrenCount">
                                        <option value="0">No Children</option>
                                        <option value="1">1 Child</option>
                                        <option value="2">2 Children</option>
                                        <option value="3">3 Children</option>
                                        <option value="4">4 Children</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Room Type</label>
                                <select class="form-select select-input" id="roomType">
                                    <option value="standard">Standard Room</option>
                                    <option value="deluxe">Deluxe Room (+Rs.3000)</option>
                                    <option value="suite">Suite (+Rs.5000)</option>
                                    <option value="presidential">Presidential Suite (+Rs.8000)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Tour Package Includes</h6>
                            <div class="tour-package-details p-3 bg-light rounded mb-3 feature-list">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span>Round-trip airfare</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span>Accommodation</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span>Daily breakfast</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span>Guided tours</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span>Airport transfers</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span>Travel insurance</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <h6 class="fw-bold mb-3">Additional Options</h6>
                            <div class="additional-options">
                                <div class="form-check mb-2 p-2 option-card">
                                    <input class="form-check-input me-3" type="checkbox" id="travelInsurance" value="2000">
                                    <label class="form-check-label" for="travelInsurance">
                                        Premium Travel Insurance (+Rs.2000)
                                    </label>
                                </div>
                                <div class="form-check mb-2 p-2 option-card">
                                    <input class="form-check-input me-2" type="checkbox" id="airportLounge" value="2500">
                                    <label class="form-check-label" for="airportLounge">
                                        Airport Lounge Access (+Rs.2500)
                                    </label>
                                </div>
                                <div class="form-check mb-2 p-2 option-card">
                                    <input class="form-check-input me-2" type="checkbox" id="photoPackage" value="7500">
                                    <label class="form-check-label" for="photoPackage">
                                        Professional Photo Package (+Rs.7500)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mt-3">
                                <label class="form-label fw-bold">Special Requests</label>
                                <textarea class="form-control" rows="3" placeholder="Any special requirements or preferences..."></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="price-breakdown mt-4">
                        <h6 class="fw-bold mb-3">Price Breakdown</h6>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Base price:</span>
                            <span>Rs.<span id="placeBasePrice">0</span></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Room upgrade:</span>
                            <span>Rs.<span id="roomUpgrade">0</span></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Add-ons:</span>
                            <span>Rs.<span id="addOns">0</span></span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between total-price">
                            <span>Total:</span>
                            <span>Rs.<span id="placeTotalPrice">0.00</span></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/places.js"></script>
</body>
</html>