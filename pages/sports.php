<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports - TicketHub</title>
    
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
    <section class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-16">
        <div class="container">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-4">
                    <i class="fas fa-futbol me-3"></i>Sports Events
                </h1>
                <p class="text-xl mb-6">Get tickets for the most exciting sports events and matches</p>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-outline-primary active" data-filter="all">All Sports</button>
                        <button class="btn btn-outline-primary" data-filter="football">Football</button>
                        <button class="btn btn-outline-primary" data-filter="cricket">Cricket</button>
                        <button class="btn btn-outline-primary" data-filter="basketball">Basketball</button>
                        <button class="btn btn-outline-primary" data-filter="tennis">Tennis</button>
                        <button class="btn btn-outline-primary" data-filter="baseball">Baseball</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search sports events...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sports Events Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                
                <!-- Sports Event Card 1 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="football">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-green-600 to-green-800 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-football-ball text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">Championship</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">NFL Championship Final</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">Eagles</div>
                                        <small class="text-muted">Philadelphia</small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">Patriots</div>
                                        <small class="text-muted">New England</small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>January 15, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>6:30 PM EST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>MetLife Stadium, New Jersey
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $85</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('NFL Championship Final', 85)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="cricket">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-blue-600 to-indigo-600 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-baseball-ball text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">World Cup</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Cricket World Cup Semi-Final</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">India</div>
                                        <small class="text-muted">Team India</small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">Australia</div>
                                        <small class="text-muted">Aussies</small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>February 20, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2:00 PM IST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>Wankhede Stadium, Mumbai
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $45</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('Cricket World Cup Semi-Final', 45)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="basketball">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-orange-600 to-red-600 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-basketball-ball text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-warning position-absolute top-0 end-0 m-2">NBA Playoffs</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">NBA Playoff Game</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">Lakers</div>
                                        <small class="text-muted">Los Angeles</small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">Warriors</div>
                                        <small class="text-muted">Golden State</small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>March 10, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>8:00 PM PST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>Staples Center, Los Angeles
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $65</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('NBA Playoff Game', 65)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="tennis">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-green-500 to-lime-500 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-table-tennis text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">Grand Slam</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Wimbledon Men's Final</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">Djokovic</div>
                                        <small class="text-muted">Serbia</small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">Federer</div>
                                        <small class="text-muted">Switzerland</small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>July 14, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2:00 PM GMT
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>Centre Court, Wimbledon
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $120</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('Wimbledon Mens Final', 120)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="baseball">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-blue-700 to-red-700 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-baseball-ball text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-primary position-absolute top-0 end-0 m-2">World Series</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">MLB World Series Game 7</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">Yankees</div>
                                        <small class="text-muted">New York</small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">Dodgers</div>
                                        <small class="text-muted">Los Angeles</small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>October 30, 2024
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>8:00 PM EST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>Yankee Stadium, New York
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $95</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('MLB World Series Game 7', 95)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="football">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-red-600 to-purple-600 d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-futbol text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">Premier League</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Manchester Derby</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">Man United</div>
                                        <small class="text-muted">Red Devils</small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">Man City</div>
                                        <small class="text-muted">Citizens</small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>April 6, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>5:30 PM GMT
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>Old Trafford, Manchester
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From $75</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('Manchester Derby', 75)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Sports Booking Modal -->
    <div class="modal fade" id="sportsBookingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-ticket-alt me-2"></i>Book Sports Tickets
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 id="sportsEventTitle" class="fw-bold mb-3"></h6>
                            <div class="mb-3">
                                <label class="form-label">Select Section</label>
                                <div class="list-group">
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="sectionType" value="general">
                                        General Admission - $<span id="sportsGeneralPrice"></span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="sectionType" value="premium">
                                        Premium Seats - $<span id="sportsPremiumPrice"></span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="sectionType" value="vip">
                                        VIP Box - $<span id="sportsVipPrice"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Number of Tickets</label>
                                <select class="form-select" id="sportsTicketQuantity">
                                    <option value="1">1 Ticket</option>
                                    <option value="2">2 Tickets</option>
                                    <option value="3">3 Tickets</option>
                                    <option value="4">4 Tickets</option>
                                    <option value="5">5 Tickets</option>
                                    <option value="6">6 Tickets</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Stadium Layout</h6>
                            <div class="stadium-layout mb-3" style="min-height: 250px; border: 1px solid #ddd; border-radius: 8px; padding: 15px;">
                                <div class="text-center mb-3">
                                    <div class="bg-success text-white px-3 py-1 rounded">FIELD</div>
                                </div>
                                
                                <!-- Stadium sections -->
                                <div class="row text-center">
                                    <div class="col-12 mb-2">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-outline-warning btn-sm stadium-section" data-section="VIP-A">VIP A</button>
                                            <button class="btn btn-outline-warning btn-sm stadium-section" data-section="VIP-B">VIP B</button>
                                            <button class="btn btn-outline-warning btn-sm stadium-section" data-section="VIP-C">VIP C</button>
                                        </div>
                                        <small class="text-muted d-block">VIP Section</small>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                                            <button class="btn btn-outline-info btn-sm stadium-section" data-section="PREM-1">P1</button>
                                            <button class="btn btn-outline-info btn-sm stadium-section" data-section="PREM-2">P2</button>
                                            <button class="btn btn-outline-info btn-sm stadium-section" data-section="PREM-3">P3</button>
                                            <button class="btn btn-outline-info btn-sm stadium-section" data-section="PREM-4">P4</button>
                                            <button class="btn btn-outline-info btn-sm stadium-section" data-section="PREM-5">P5</button>
                                        </div>
                                        <small class="text-muted d-block">Premium Section</small>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-1">G1</button>
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-2">G2</button>
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-3">G3</button>
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-4">G4</button>
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-5">G5</button>
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-6">G6</button>
                                        </div>
                                        <small class="text-muted d-block">General Admission</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Selected seats display -->
                            <div class="mt-3">
                                <h6 class="fw-bold">Selected Sections:</h6>
                                <div id="selectedSections" class="text-muted">None selected</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="fw-bold">Total: $<span id="sportsTotalPrice">0.00</span></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="addSportsToCart()">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                        <button type="button" class="btn btn-success" onclick="proceedToSportsPayment()">
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
    <script src="../assets/js/sports.js"></script>
</body>
</html>