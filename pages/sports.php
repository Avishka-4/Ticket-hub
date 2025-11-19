<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports - TicketHub Sri Lanka</title>
    
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
<section class="relative bg-gradient-to-r from-green-600 to-blue-600 text-white py-20 bg-cover bg-center" 
    style="background-image: url('../assets/images/sports/SPR.png'); aspect-ratio: 3 / 1; background-blend-mode: overlay;">
    <div class="container">
        <div class="text-center relative z-10">
            <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">
                <i class="fas fa-futbol me-3"></i>Sri Lankan Sports Events
            </h1>
            <p class="text-xl mb-0 drop-shadow-md">
                Get tickets for Sri Lanka’s biggest matches and tournaments
            </p>
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
                        <button class="btn btn-outline-primary" data-filter="football">Cricket</button>
                        <button class="btn btn-outline-primary" data-filter="cricket">Rugby</button>
                        <button class="btn btn-outline-primary" data-filter="basketball">Football</button>
                        <button class="btn btn-outline-primary" data-filter="tennis">Athletics</button>
                        <button class="btn btn-outline-primary" data-filter="baseball">Volleyball</button>
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
                            <img src="../assets/images/sports/CRI.png">
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">ODI Series</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sri Lanka vs India - ODI Match</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">Sri Lanka</div>
                                        <small class="text-muted"></small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">India</div>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>December 12, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2:30 PM IST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>R. Premadasa Stadium, Colombo
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From LKR 2500</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('Sri Lanka vs India - ODI Match', 2500, 3500, 5000)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="cricket">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets/images/sports/RUG.png">
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">RUGBY Cup</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Dialog Rugby League</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">Kandy SC</div>
                                        <small class="text-muted"></small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">CR & FC</div>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>November 20, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>4:00 PM IST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>Nittawela Stadium, Kandy
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From LKR 1200</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('Dialog Rugby League', 1200, 1800, 2500)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="basketball">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets/images/sports/FB.png">
                            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Football</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Football Championship</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold">Sudar Ozhi</div>
                                        <small class="text-muted"></small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold">Ding Dong</div>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>December 5, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>7:30 PM PST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>Hindu Ground, valaichenai
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From LKR 800</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('Football Championship', 800, 1200, 2000)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="tennis">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets/images/sports/NAC.png">
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">National Games</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">National Athletics Championship</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold"></div>
                                        <small class="text-muted"></small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6"></span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold"></div>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>August 18, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>9:00 AM GMT
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>Sugathadasa Stadium, Colombo
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From LKR 600</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('National Athletics Championship', 600, 900, 1500)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Sports Event Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="baseball">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets/images/sports/VLB.png">
                            <span class="badge bg-primary position-absolute top-0 end-0 m-2">National Volleyball</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sri Lanka Army vs Air Force - Volleyball</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold"></div>
                                        <small class="text-muted"></small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6"></span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold"></div>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>October 9, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>6:00 PM IST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>National Volleyball Centre, Maharagama
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From LKR 500</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('Sri Lanka Army vs Air Force - Volleyball', 500, 800, 1200)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="baseball">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <img src="../assets/images/sports/BSB.png">
                            <span class="badge bg-primary position-absolute top-0 end-0 m-2">National Basketball</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sri Lanka Police vs Navy - Basketball</h5>
                            <div class="match-teams mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <div class="fw-bold"></div>
                                        <small class="text-muted"></small>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-primary fs-6"></span>
                                    </div>
                                    <div class="text-center">
                                        <div class="fw-bold"></div>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-2">
                                <i class="fas fa-calendar me-2"></i>November 11, 2025
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>7:00 PM IST
                            </p>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>National Basket Centre, Hingragoda
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From LKR 600</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.5)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openSportsBooking('Sri Lanka Police vs Navy - Basketball', 600, 900, 1500)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sports Event Card 7 -->
                

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
                                        General Admission - LKR<span id="sportsGeneralPrice"></span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="sectionType" value="premium">
                                        Premium Seats - LKR<span id="sportsPremiumPrice"></span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="radio" name="sectionType" value="vip">
                                        VIP Box - LKR<span id="sportsVipPrice"></span>
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
                                            <button class="btn btn-outline-warning btn-sm stadium-section" data-section="VIP-A">>VIP Colombo</button>
                                            <button class="btn btn-outline-warning btn-sm stadium-section" data-section="VIP-B">VIP Kandy</button>
                                            
                                        </div>
                                        <small class="text-muted d-block">VIP Boxes</small>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                                            <button class="btn btn-outline-info btn-sm stadium-section" data-section="PREM-1">P1</button>
                                            <button class="btn btn-outline-info btn-sm stadium-section" data-section="PREM-2">P2</button>
                                            <button class="btn btn-outline-info btn-sm stadium-section" data-section="PREM-3">P3</button>
                                            
                                        </div>
                                        <small class="text-muted d-block">Premium Section</small>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-1">G1</button>
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-2">G2</button>
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-3">G3</button>
                                            <button class="btn btn-outline-success btn-sm stadium-section" data-section="GEN-4">G4</button>
                                            
                                        </div>
                                        <small class="text-muted d-block">General Admission</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Selected seats display -->
                            <div class="mt-3">
                                <h6 class="fw-bold">Selected Sections:</h6>
                                <div id="selectedSections" class="text-muted">No sections selected yet</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="fw-bold">Total: LKR<span id="sportsTotalPrice">0.00</span></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </button>
                        <button type="button" class="btn btn-success" onclick="proceedToSportsPayment()">
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
    <script src="../assets/js/sports.js"></script>
</body>
</html>
