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
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../assets/images/event-image/1.jpg" class="d-block w-100 vh-50" alt="Event">
            <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
                <div class="text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-umbrella-beach"></i>Live Events & Concerts
                    </h1>
                    <p class="lead mb-4">Discover amazing live performances, concerts, and festivals.</p>
                </div>
            </div>
            <!-- Mobile caption -->
            <div class="carousel-caption d-md-none position-absolute top-50 start-50 translate-middle w-75">
                <div class="text-center">
                    <h2 class="fw-bold mb-2">
                        <i class="fas fa-umbrella-beach"></i>Live Events & Concerts
                    </h2>
                    <p class="mb-3">Discover amazing live performances, concerts, and festivals.</p>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="../assets/images/event-image/2.jpg" class="d-block w-100 vh-50" alt="Event">
            <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
                <div class="text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-umbrella-beach"></i>Live Events & Concerts
                    </h1>
                    <p class="lead mb-4">Discover amazing live performances, concerts, and festivals.</p>
                </div>
            </div>
            <!-- Mobile caption -->
            <div class="carousel-caption d-md-none position-absolute top-50 start-50 translate-middle w-75">
                <div class="text-center">
                    <h2 class="fw-bold mb-2">
                        <i class="fas fa-umbrella-beach"></i>Live Events & Concerts
                    </h2>
                    <p class="mb-3">Discover amazing live performances, concerts, and festivals.</p>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="../assets/images/event-image/3.jpg" class="d-block w-100 vh-50" alt="Event">
            <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
                <div class="text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-umbrella-beach"></i>Live Events & Concerts
                    </h1>
                    <p class="lead mb-4">Discover amazing live performances, concerts, and festivals.</p>
                </div>
            </div>
            <!-- Mobile caption -->
            <div class="carousel-caption d-md-none position-absolute top-50 start-50 translate-middle w-75">
                <div class="text-center">
                    <h2 class="fw-bold mb-2">
                        <i class="fas fa-umbrella-beach"></i>Live Events & Concerts
                    </h2>
                    <p class="mb-3">Discover amazing live performances, concerts, and festivals.</p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
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
                            <img src="../assets\images\event-image\event1.jpg" 
                                 class="card-img-top" 
                                 style="height: 200px; object-fit: cover;" 
                                 alt="SUN FM Presents – Clean Bandit Live in Concert">

                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">Hot</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">SUN FM Presents – Bandit Live in Concert</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>28 December 2025 – 6:00 PM
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Lotus Tower, Colombo
                            </p>
                            <p class="card-text">World-famous band Clean Bandit performing live for the first time in Sri Lanka.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 12,000LKR</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('SUN FM Presents – Clean Bandit Live in Concert', 12000)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="Fun">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                           <img src="../assets\images\event-image\event2.jpg" 
                                class="card-img-top" 
                                style="height: 200px; object-fit: cover;" 
                                 alt="Sébastien Léger & Roy Rosenfeld — Lost Miracle">

                            <span class="badge bg-success position-absolute top-0 end-0 m-2">Favourite</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Léger & Roy Rosenfeld — Lost Miracle</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>24 January 2026 – 04:00 PM
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Galle Face Green, Colombo
                            </p>
                            <p class="card-text">If you enjoy energetic electronic music and want a major event in Colombo, this one fits.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 500LKR</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Léger & Roy Rosenfeld — Lost Miracle', 500)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="comedy">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets\images\event-image\event3.jpg" 
                                class="card-img-top" 
                                style="height: 200px; object-fit: cover;" 
                                alt="Nenjame Nenjame – Tamil Musical Concert">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Nenjame Nenjame – Tamil Musical Concert</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>1–25 Dec 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Cinnamon Life, Colombo 02
                            </p>
                            <p class="card-text">Tamil musical concert by singers Shakthisree Gopalan / Harish Jayaraj …</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 1,000LKR</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Nenjame Nenjame – Tamil Musical Concert', 1000)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="theater">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets\images\event-image\event4.jpg" 
                                 class="card-img-top" 
                                 style="height: 200px; object-fit: cover;" 
                                 alt="The Saiko Show – 2025">

                            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Limited</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">The Saiko Show – 2025</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>December 10, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Viharamahadevi Open Air Theatre, Colombo.
                            </p>
                            <p class="card-text">Good for a general live-music outing in Colombo(not specifically Tamil-language).</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 3,500LKR</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.6)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('The Saiko Show', 3500)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="concerts">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets\images\event-image\event5.jpg" 
                                class="card-img-top" 
                                style="height: 200px; object-fit: cover;" 
                                 alt="Colombo Stand-up Comedy Night">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Colombo Stand-up Comedy Night</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>15 Feb 2026 – 7:00 PM
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Nelum Pokuna Theatre, Colombo
                            </p>
                            <p class="card-text">Top Sri Lankan comedians performing live. Laugh till you drop!
                                Come & Enjoy!!
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 2,000LKR</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Colombo Stand-up Comedy Night', 2000)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="festivals">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets\images\event-image\event6.jpg" 
                                 class="card-img-top" 
                                 style="height: 200px; object-fit: cover;" 
                                 alt="Deep Jungle Music Festival – Ella">
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">New</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Deep Jungle Music Festival – Ella</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>Januvary 15, 2026
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Ella Forest Range
                            </p>
                            <p class="card-text">Three days of EDM, camping & nature adventure in the mountains.

                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 8,500LKR</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.5)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openBookingModal('Deep Jungle Music Festival – Ella', 8500)">
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
                                <label class="form-label">Ticket Type</label>
                                <div class="list-group">
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="ticketType" value="general">
                                        General Admission - LKR<span id="generalPrice"></span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="ticketType" value="vip">
                                        VIP - LKR<span id="vipPrice"></span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="ticketType" value="premium">
                                        Premium - LKR<span id="premiumPrice"></span>
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
                            <span class="fw-bold">Total: LKR<span id="totalPrice">0.00</span></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="proceedToPayment()">
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
    <script src="../assets/js/events.js"></script>
</body>
</html>