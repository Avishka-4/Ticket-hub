<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - TicketHub</title>
    
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
    <section class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-16">
        <div class="container">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-4">
                    <i class="fas fa-music me-3"></i>Live Events & Concerts
                </h1>
                <p class="text-xl mb-6">Discover amazing live performances, concerts, and festivals</p>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-outline-primary active" data-filter="all">All Events</button>
                        <button class="btn btn-outline-primary" data-filter="concerts">Concerts</button>
                        <button class="btn btn-outline-primary" data-filter="festivals">Festivals</button>
                        <button class="btn btn-outline-primary" data-filter="comedy">Comedy Shows</button>
                        <button class="btn btn-outline-primary" data-filter="theater">Theater</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search events...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                
                <!-- Event Card 1 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="concerts">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-red-500 to-pink-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-microphone text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">Hot</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Rock Legends Live 2024</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>December 15, 2024
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Madison Square Garden, NYC
                            </p>
                            <p class="card-text">Experience the greatest rock hits with legendary performers in an unforgettable night of music.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $45</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Rock Legends Live 2024', 45)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="festivals">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-green-500 to-blue-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-glass-cheers text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">3 Days</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Summer Music Festival</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>July 20-22, 2024
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Central Park, NYC
                            </p>
                            <p class="card-text">Three days of non-stop music featuring top artists from around the world in a beautiful outdoor setting.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $120</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Summer Music Festival', 120)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="comedy">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-yellow-500 to-orange-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-laugh text-6xl text-white"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Comedy Night Special</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>November 30, 2024
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Comedy Club Downtown
                            </p>
                            <p class="card-text">Laugh until your sides hurt with the funniest comedians performing their best material.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $25</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Comedy Night Special', 25)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="theater">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-purple-500 to-pink-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-theater-masks text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Limited</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Shakespeare in the Park</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>August 10, 2024
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Riverside Theater
                            </p>
                            <p class="card-text">A classic theatrical experience featuring the timeless works of William Shakespeare.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $35</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.6)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Shakespeare in the Park', 35)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="concerts">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-blue-500 to-cyan-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-guitar text-6xl text-white"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Jazz & Blues Night</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>October 5, 2024
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Blue Note Jazz Club
                            </p>
                            <p class="card-text">An intimate evening of smooth jazz and soulful blues with renowned musicians.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $55</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Jazz & Blues Night', 55)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="festivals">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-indigo-500 to-purple-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-drum text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">New</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Electronic Dance Festival</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>September 15, 2024
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Convention Center Plaza
                            </p>
                            <p class="card-text">Dance the night away with top DJs and electronic music artists from around the globe.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $75</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.5)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Electronic Dance Festival', 75)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-ticket-alt me-2"></i>Book Event Tickets
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 id="eventTitle" class="fw-bold mb-3"></h6>
                            <div class="mb-3">
                                <label class="form-label">Select Date & Time</label>
                                <select class="form-select">
                                    <option>December 15, 2024 - 8:00 PM</option>
                                    <option>December 16, 2024 - 8:00 PM</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ticket Type</label>
                                <div class="list-group">
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="ticketType" value="general">
                                        General Admission - $<span id="generalPrice"></span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="ticketType" value="vip">
                                        VIP - $<span id="vipPrice"></span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="ticketType" value="premium">
                                        Premium - $<span id="premiumPrice"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Seat Selection</h6>
                            <div class="seat-map mb-3" style="min-height: 200px; border: 1px solid #ddd; border-radius: 8px; padding: 15px;">
                                <div class="text-center mb-3">
                                    <div class="bg-dark text-white px-3 py-1 rounded">STAGE</div>
                                </div>
                                <div class="seat-grid">
                                    <!-- Seat selection will be handled by JavaScript -->
                                    <p class="text-muted text-center">Click to select seats</p>
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        <button class="btn btn-outline-success btn-sm seat-btn" data-seat="A1">A1</button>
                                        <button class="btn btn-outline-success btn-sm seat-btn" data-seat="A2">A2</button>
                                        <button class="btn btn-outline-success btn-sm seat-btn" data-seat="A3">A3</button>
                                        <button class="btn btn-outline-success btn-sm seat-btn" data-seat="A4">A4</button>
                                    </div>
                                    <div class="d-flex justify-content-center gap-2 flex-wrap mt-2">
                                        <button class="btn btn-outline-success btn-sm seat-btn" data-seat="B1">B1</button>
                                        <button class="btn btn-outline-success btn-sm seat-btn" data-seat="B2">B2</button>
                                        <button class="btn btn-outline-success btn-sm seat-btn" data-seat="B3">B3</button>
                                        <button class="btn btn-outline-success btn-sm seat-btn" data-seat="B4">B4</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Number of Tickets</label>
                                <select class="form-select" id="ticketQuantity">
                                    <option value="1">1 Ticket</option>
                                    <option value="2">2 Tickets</option>
                                    <option value="3">3 Tickets</option>
                                    <option value="4">4 Tickets</option>
                                    <option value="5">5 Tickets</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="fw-bold">Total: $<span id="totalPrice">0.00</span></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="addToCart()">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                        <button type="button" class="btn btn-success" onclick="proceedToPayment()">
                            <i class="fas fa-credit-card me-2"></i>Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/events.js"></script>
</body>
</html>