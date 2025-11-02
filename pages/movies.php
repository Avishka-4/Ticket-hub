<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies - TicketHub</title>
    
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
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-4">
                    <i class="fas fa-film me-3"></i>Movies & Theater
                </h1>
                <p class="text-xl mb-6">Book your favorite movies with premium seating experience</p>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-outline-primary active" data-filter="all">All Movies</button>
                        <button class="btn btn-outline-primary" data-filter="action">Action</button>
                        <button class="btn btn-outline-primary" data-filter="comedy">Comedy</button>
                        <button class="btn btn-outline-primary" data-filter="drama">Drama</button>
                        <button class="btn btn-outline-primary" data-filter="horror">Horror</button>
                        <button class="btn btn-outline-primary" data-filter="sci-fi">Sci-Fi</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search movies...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Movies Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                
                <!-- Movie Card 1 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="action">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-red-600 to-orange-600 d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-video text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">New Release</span>
                            <div class="position-absolute bottom-0 start-0 m-2">
                                <span class="badge bg-warning text-dark">PG-13</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Neera</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2h 11min | Romance, Action
                            </p>
                            <div class="mb-2">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(8.5/10)</small>
                                </div>
                            </div>
                            <p class="card-text">Neera is a heartfelt tale of love, rediscovery, and the unseen threads that bind us. </p>
                            
                            <!-- Show Times -->
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Today's Showtimes:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '12:30 PM')">10:30 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '3:45 PM')">3:45 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '7:00 PM')">7:00 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '10:15 PM')">10:15 PM</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 400LKR</span>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openMovieBooking('Action Hero Chronicles', 12)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Movie Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="comedy">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-yellow-500 to-orange-500 d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-laugh-squint text-6xl text-white"></i>
                            </div>
                            <div class="position-absolute bottom-0 start-0 m-2">
                                <span class="badge bg-success text-white">PG</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">The Twists</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>1h 45min | Animatio, Comedy, Family
                            </p>
                            <div class="mb-2">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(9.2/10)</small>
                                </div>
                            </div>
                            <p class="card-text">Two orphans join forces with a family of magical animals to save their city from the powerful Mr. and Mrs. Twit, the meanest, smelliest, nastiest people in the world.</p>
                            
                            <!-- Show Times -->
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Today's Showtimes:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '1:00 PM')">1:00 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '4:30 PM')">4:30 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '7:45 PM')">7:45 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '10:30 PM')">10:30 PM</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 450LKR</span>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openMovieBooking('Comedy Central Deluxe', 10)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Movie Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="sci-fi">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-purple-600 to-blue-600 d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-rocket text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">IMAX</span>
                            <div class="position-absolute bottom-0 start-0 m-2">
                                <span class="badge bg-warning text-dark">PG-13</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">War of the Worlds</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2h 30min | Sci-Fi, Thriller
                            </p>
                            <div class="mb-2">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(9.0/10)</small>
                                </div>
                            </div>
                            <p class="card-text">A colossal invasion of Earth is coming in this off-kilter take on the legendary novel of the same name, filled with present-day theme</p>
                            
                            <!-- Show Times -->
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Today's Showtimes:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '2:00 PM')">2:00 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '6:00 PM')">6:00 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '9:30 PM')">9:30 PM</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 500LKR</span>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openMovieBooking('Space Odyssey 2025', 15)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Movie Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="drama">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-gray-600 to-gray-800 d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-heart text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Award Winner</span>
                            <div class="position-absolute bottom-0 start-0 m-2">
                                <span class="badge bg-danger text-white">R</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Rani</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2h 5min | Drama
                            </p>
                            <div class="mb-2">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(8.7/10)</small>
                                </div>
                            </div>
                            <p class="card-text">The film follows Dr. Manorani Saravanamuttu's relentless pursuit of justice after the tragic abduction and murder of her son, Richard de Zoysa, a journalist, writer, and human rights activist, in 1990.</p>
                            
                            <!-- Show Times -->
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Today's Showtimes:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '1:30 PM')">1:30 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '5:15 PM')">5:15 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '8:45 PM')">8:45 PM</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 400LKR</span>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openMovieBooking('The Hearts Journey', 11)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Movie Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="horror">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-red-800 to-black d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-ghost text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-dark position-absolute top-0 end-0 m-2">Horror</span>
                            <div class="position-absolute bottom-0 start-0 m-2">
                                <span class="badge bg-danger text-white">R</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Until Dawn</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>1h 50min | Horror, Thriller
                            </p>
                            <div class="mb-2">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-o"></i>
                                    <small class="text-muted ms-1">(7.8/10)</small>
                                </div>
                            </div>
                            <p class="card-text">A group of friends trapped in a time loop, where mysterious foes chase and kill them in gruesome ways, must survive until dawn to escape it.</p>
                            
                            <!-- Show Times -->
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Today's Showtimes:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '7:30 PM')">7:30 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '10:00 PM')">10:00 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '11:59 PM')">11:59 PM</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 550LKR</span>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openMovieBooking('Midnight Shadows', 13)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Movie Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="action">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-green-600 to-blue-600 d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-mask text-6xl text-white"></i>
                            </div>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">Superhero</span>
                            <div class="position-absolute bottom-0 start-0 m-2">
                                <span class="badge bg-warning text-dark">PG-13</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Pravegaya</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2h 20min | Action, Superhero
                            </p>
                            <div class="mb-2">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(9.1/10)</small>
                                </div>
                            </div>
                            <p class="card-text">A Young man fights for his lost bike with courage. Honest Gangster with his foolish brother who destroyed everything.</p>
                            
                            <!-- Show Times -->
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Today's Showtimes:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '12:00 PM')">12:00 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '4:00 PM')">4:00 PM</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectShowtime(this, '8:00 PM')">8:00 PM</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">From 400LKR</span>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openMovieBooking('Guardian Force', 14)">
                                <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Movie Booking Modal -->
    <div class="modal fade" id="movieBookingModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-ticket-alt me-2"></i>Book Movie Tickets
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h6 id="movieTitle" class="fw-bold mb-3"></h6>
                            <div class="mb-3">
                                <label class="form-label">Select Cinema</label>
                                <select class="form-select" id="cinemaSelect">
                                    <option>AMC Theater Downtown</option>
                                    <option>Regal Cinema Complex</option>
                                    <option>CineMax IMAX Theater</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Date</label>
                                <select class="form-select" id="dateSelect">
                                    <option>Today - Dec 15, 2024</option>
                                    <option>Tomorrow - Dec 16, 2024</option>
                                    <option>Dec 17, 2024</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Selected Time</label>
                                <input type="text" class="form-control" id="selectedTime" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Number of Tickets</label>
                                <select class="form-select" id="movieTicketQuantity">
                                    <option value="1">1 Ticket</option>
                                    <option value="2">2 Tickets</option>
                                    <option value="3">3 Tickets</option>
                                    <option value="4">4 Tickets</option>
                                    <option value="5">5 Tickets</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="fw-bold mb-3">Theater Seating</h6>
                            <div class="theater-seating mb-3">
                                <div class="text-center mb-3">
                                    <div class="bg-dark text-white px-4 py-2 rounded" style="display: inline-block;">SCREEN</div>
                                </div>
                                
                                <!-- Seating Chart -->
                                <div class="seating-chart p-3" style="background: #f8f9fa; border-radius: 8px;">
                                    <div class="row justify-content-center mb-2">
                                        <div class="col-auto">
                                            <div class="d-flex gap-1">
                                                <span class="text-muted small me-3">A</span>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A1">1</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A2">2</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A3">3</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A4">4</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A5">5</button>
                                                <span class="mx-3"></span>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A6">6</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A7">7</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A8">8</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A9">9</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="A10">10</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row justify-content-center mb-2">
                                        <div class="col-auto">
                                            <div class="d-flex gap-1">
                                                <span class="text-muted small me-3">B</span>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B1">1</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B2">2</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B3">3</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B4">4</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B5">5</button>
                                                <span class="mx-3"></span>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B6">6</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B7">7</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B8">8</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B9">9</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="B10">10</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row justify-content-center mb-2">
                                        <div class="col-auto">
                                            <div class="d-flex gap-1">
                                                <span class="text-muted small me-3">C</span>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C1">1</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C2">2</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C3">3</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C4">4</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C5">5</button>
                                                <span class="mx-3"></span>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C6">6</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C7">7</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C8">8</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C9">9</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="C10">10</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-auto">
                                            <div class="d-flex gap-1">
                                                <span class="text-muted small me-3">D</span>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D1">1</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D2">2</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D3">3</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D4">4</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D5">5</button>
                                                <span class="mx-3"></span>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D6">6</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D7">7</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D8">8</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D9">9</button>
                                                <button class="btn btn-outline-success btn-sm movie-seat" data-seat="D10">10</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center mt-3">
                                    <div class="d-flex justify-content-center gap-4">
                                        <div class="d-flex align-items-center">
                                            <div class="btn btn-outline-success btn-sm me-2" style="pointer-events: none;"></div>
                                            <small>Available</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="btn btn-success btn-sm me-2" style="pointer-events: none;"></div>
                                            <small>Selected</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="btn btn-secondary btn-sm me-2" style="pointer-events: none;"></div>
                                            <small>Occupied</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <strong>Selected Seats: </strong><span id="selectedSeats">None</span><br>
                                <strong>Total: $<span id="movieTotalPrice">0.00</span></strong>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="addMovieToCart()">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                        <button type="button" class="btn btn-success" onclick="proceedToMoviePayment()">
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
    <script src="../assets/js/movies.js"></script>
</body>
</html>
