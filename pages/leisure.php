<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leisure Activities - TicketHub</title>
    
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
    <section id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="height: 450px;">
            <div class="carousel-item active position-relative">
            <img src="../assets/images/leisure/1.jpg" class="d-block w-100" alt="boat ride">
            <div class="carousel-caption d-md-block position-absolute top-50 start-50 translate-middle ">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-3 ">
                    <i class="fas fa-umbrella-beach"></i>Leisure Activities
                </h1>
                <p class="text-xl mb-6">Book exciting adventures and leisure activities</p>
            </div>
        </div>
            </div>
            <div class="carousel-item position-relative">
            <img src="../assets/images/leisure/2.jpg" class="d-block w-100" alt="Cycling">
            <div class=" carousel-caption d-md-block position-absolute top-50 start-50 translate-middle">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-3 ">
                    <i class="fas fa-umbrella-beach"></i>Leisure Activities
                </h1>
                <p class="text-xl mb-6">Book exciting adventures and leisure activities</p>
            </div>
        </div>
            </div>
            <div class="carousel-item position-relative">
            <img src="../assets/images/leisure/3.jpg" class="d-block w-100" alt="Camping">
            <div class=" carousel-caption d-md-block position-absolute top-50 start-50 translate-middle">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-3">
                    <i class="fas fa-umbrella-beach"></i>Leisure Activities
                </h1>
                <p class="text-xl mb-6">Book exciting adventures and leisure activities</p>
            </div>
        </div>
            </div>
            <div class="carousel-item position-relative">
            <img src="../assets/images/leisure/4.jpg" class="d-block w-100" alt="Walking">
            <div class=" carousel-caption d-md-block position-absolute top-50 start-50 translate-middle">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-3">
                    <i class="fas fa-umbrella-beach"></i>Leisure Activities
                </h1>
                <p class="text-xl mb-6">Book exciting adventures and leisure activities</p>
            </div>
        </div>
            </div>
            <div class="carousel-item position-relative">
            <img src="../assets/images/leisure/5.jpg" class="d-block w-100" alt="Surfing">
            <div class="carousel-caption d-md-block position-absolute top-50 start-50 translate-middle">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-3">
                    <i class="fas fa-umbrella-beach"></i>Leisure Activities
                </h1>
                <p class="text-xl mb-6">Book exciting adventures and leisure activities</p>
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
                        <button class="btn btn-outline-primary active" data-filter="all">All Activities</button>
                        <button class="btn btn-outline-primary" data-filter="water">Water Sports</button>
                        <button class="btn btn-outline-primary" data-filter="adventure">Adventure</button>
                        <button class="btn btn-outline-primary" data-filter="crafts">Arts & Crafts</button>
                        <button class="btn btn-outline-primary" data-filter="wellness">Wellness</button>
                        <button class="btn btn-outline-primary" data-filter="outdoor">Outdoor</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search activities...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                
                <!-- Activity Card 1 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="water">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px;">
                                <img src="../assets/images/leisure/scuba diver.jpg" alt="Scuba Diving" class="w-100 h-100 object-cover">
                                <!-- <i class="fas fa-swimmer text-6xl text-white"></i> -->
                            </div>
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">Popular</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Scuba Diving Adventure</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2-3 Hours | All skill levels
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Sun Diving Centre, Yakdehimulla, Unawatuna, Sri Lanka​
                            </p>
                            <p class="card-text">Explore the underwater world with certified instructors. Perfect for beginners and experienced divers alike.So many packages to choose for beginners , Certified divers, and Certification Courses </p>
                            
                            <!-- Available Dates -->
                            <div class="mb-3 mt-2">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 20')">Dec 20</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 22')">Dec 22</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 25')">Dec 25</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">Rs.100000/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Scuba Diving Adventure', 89)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="water">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-water text-6xl text-white"></i> -->
                                 <img src="../assets/images/leisure/surfing.jpg" alt="Surfing Lessons" class="w-100 h-100 object-cover">
                            </div>
                            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Trending</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Professional Surfing Lessons</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>1h 30m | Beginner to Advanced
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Arugam Bay Beach
                            </p>
                            <p class="card-text">Learn to surf with professional instructors on the best waves in town. Equipment included.</p>
                            
                            <div class="mb-3 mt-4">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 18')">Dec 18</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 21')">Dec 21</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 24')">Dec 24</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">Rs.7000/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Professional Surfing Lessons', 65)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="adventure">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-mountain text-6xl text-white"></i> -->
                                 <img src="../assets/images/leisure/rock climbing.jpg" alt="Rock Climbing" class="w-100 h-100 object-cover">

                            </div>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">Adventure</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Rock Climbing Experience</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>10 hours | Ages 12-60
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Peacock Hill and Ramboda waterfall in Sri Lanka
                            </p>
                            <p class="card-text">Challenge yourself with guided rock climbing on natural cliffs. Safety equipment provided.</p>
                            
                            <div class="mb-3 mt-4">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 19')">Dec 19</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 23')">Dec 23</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 26')">Dec 26</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">$68/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Rock Climbing Experience', 95)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="crafts">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-purple-500 to-pink-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-palette text-6xl text-white"></i> -->
                                <img src="../assets/images/leisure/zip lining.jpg" alt="zip lining" class="w-100 h-100 object-cover">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Flying Ravana Adventure Park</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2.5 hours | All ages welcome
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Creative Arts Studio
                            </p>
                            <p class="card-text">Create beautiful ceramic pieces in this hands-on workshop. Perfect for families and art enthusiasts.</p>
                            
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 17')">Dec 17</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 20')">Dec 20</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 23')">Dec 23</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">$45/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.6)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Pottery & Ceramic Workshop', 45)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="wellness">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-indigo-500 to-purple-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-spa text-6xl text-white"></i> -->
                                 <img src="../assets/images/leisure/Golf.jpg" alt="Golf" class="w-100 h-100 object-cover">
                            </div>
                            <span class="badge bg-info position-absolute top-0 end-0 m-2">Relaxing</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Swing Ceylon Mini Golf</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>6 hours | Beginner friendly
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Zen Garden Retreat Center
                            </p>
                            <p class="card-text">Find inner peace with guided yoga sessions and meditation practices in a serene environment.</p>
                            
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 21')">Dec 21</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 28')">Dec 28</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Jan 4')">Jan 4</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">$75/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Yoga & Meditation Retreat', 75)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="outdoor">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-yellow-500 to-orange-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-hiking text-6xl text-white"></i> -->
                                 <img src="../assets/images/leisure/boat.jpg" alt="boat" class="w-100 h-100 object-cover">
                            </div>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">Nature</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Avant Leisure Adventure Sports</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>4 hours | Moderate difficulty
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>National Forest Trail
                            </p>
                            <p class="card-text">Explore scenic trails with experienced guides and discover local wildlife and flora.</p>
                            
                            <div class="mb-3">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 16')">Dec 16</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 19')">Dec 19</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 22')">Dec 22</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">$35/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.5)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Guided Nature Hiking', 35)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Leisure Booking Modal -->
    <div class="modal fade" id="leisureBookingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-calendar-plus me-2"></i>Book Activity
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 id="leisureActivityTitle" class="fw-bold mb-3"></h6>
                            <div class="mb-3">
                                <label class="form-label">Select Date</label>
                                <input type="date" class="form-control" id="leisureDate">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Time Slot</label>
                                <select class="form-select" id="leisureTimeSlot">
                                    <option>9:00 AM - 1:00 PM</option>
                                    <option>2:00 PM - 6:00 PM</option>
                                    <option>7:00 AM - 12:00 PM (Early Bird)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Number of Participants</label>
                                <select class="form-select" id="leisureParticipants">
                                    <option value="1">1 Person</option>
                                    <option value="2">2 People</option>
                                    <option value="3">3 People</option>
                                    <option value="4">4 People</option>
                                    <option value="5">5 People</option>
                                    <option value="6">6 People</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Activity Details</h6>
                            <div class="activity-info p-3 bg-light rounded mb-3">
                                <div class="mb-2">
                                    <strong>What's Included:</strong>
                                    <ul class="mt-1 mb-0">
                                        <li>Professional instruction</li>
                                        <li>All necessary equipment</li>
                                        <li>Safety briefing</li>
                                        <li>Light refreshments</li>
                                    </ul>
                                </div>
                                <div class="mb-2">
                                    <strong>What to Bring:</strong>
                                    <ul class="mt-1 mb-0">
                                        <li>Comfortable clothing</li>
                                        <li>Sunscreen</li>
                                        <li>Water bottle</li>
                                        <li>Camera (optional)</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Special Requests (Optional)</label>
                                <textarea class="form-control" rows="3" placeholder="Any special requirements or requests..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <strong>Price per person: $<span id="leisurePricePerPerson">0</span></strong><br>
                                <strong>Total: $<span id="leisureTotalPrice">0.00</span></strong>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="addLeisureToCart()">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                        <button type="button" class="btn btn-success" onclick="proceedToLeisurePayment()">
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
    <script src="../assets/js/leisure.js"></script>
</body>
</html>
