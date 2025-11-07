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
                            <img src="pages\event-image\event1.jpg" 
                                 class="card-img-top" 
                                 style="height: 200px; object-fit: cover;" 
                                 alt="SUN FM Presents – Clean Bandit Live in Concert">

                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">Hot</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">SUN FM Presents – Clean Bandit Live in Concert</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>28 December 2025 – 6:00 PM
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Lotus Tower, Colombo
                            </p>
                            <p class="card-text">World-famous band Clean Bandit performing live for the first time in Sri Lanka.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs. 12,000</span>
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
                           <img src="../assets/images/events/event2.jpg" 
                                class="card-img-top" 
                                style="height: 200px; object-fit: cover;" 
                                 alt="Colombo Food Festival 2026">

                            <span class="badge bg-success position-absolute top-0 end-0 m-2">3 Days</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Colombo Food Festival 2026</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>12 Jan 2026 – 10:00 AM
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Galle Face Green, Colombo
                            </p>
                            <p class="card-text">Street food, live music & Sri Lanka’s biggest culinary celebration.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs. 500</span>
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
                            <img src="../assets/images/events/event3.jpg" 
                                class="card-img-top" 
                                style="height: 200px; object-fit: cover;" 
                                alt="Cinnamon Life Christmas Carnival">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Cinnamon Life Christmas Carnival</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>1–25 Dec 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Cinnamon Life, Colombo 02
                            </p>
                            <p class="card-text">Christmas market, fun games, Santa parade & live performances.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs. 1,000</span>
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
                            <img src="../assets/images/events/event4.jpg" 
                                 class="card-img-top" 
                                 style="height: 200px; object-fit: cover;" 
                                 alt="Kandy Esala Perahera – 2025">

                            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Limited</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Kandy Esala Perahera – 2025</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>December 10, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Kandy City
                            </p>
                            <p class="card-text">Sri Lanka’s most iconic cultural parade with dancers, drummers & elephants.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs. 3,500</span>
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
                            <img src="../assets/images/events/event5.jpg" 
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
                            <p class="card-text">Top Sri Lankan comedians performing live. Laugh till you drop!</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs. 2,00</span>
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
                            <img src="../assets/images/events/event6.jpg" 
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
                            <p class="card-text">3 days of EDM, camping & nature adventure in the mountains.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From Rs. 8,500</span>
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
                                    <option>December 15, 2025 - 8:00 PM</option>
                                    <option>December 16, 2025 - 8:00 PM</option>
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