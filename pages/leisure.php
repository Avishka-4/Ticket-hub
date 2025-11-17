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
    <link rel="stylesheet" href="../assets/css/index.css">

    <style>
        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 9s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.3) translateX(-8%);
        }
        .card-body{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    
    <!-- Hero Section -->
    <section id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/images/leisure/1.jpg" class="d-block w-100 vh-50" alt="boat ride">
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle w-75">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-3 d-none d-md-block">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h1>
                        <h2 class="fw-bold mb-2 d-md-none">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h2>
                        <p class="lead mb-4 d-none d-md-block">Book exciting adventures and leisure activities</p>
                        <p class="mb-3 d-md-none">Book exciting adventures and leisure activities</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/images/leisure/2.jpg" class="d-block w-100 vh-50" alt="Cycling">
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle w-75">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-3 d-none d-md-block">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h1>
                        <h2 class="fw-bold mb-2 d-md-none">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h2>
                        <p class="lead mb-4 d-none d-md-block">Book exciting adventures and leisure activities</p>
                        <p class="mb-3 d-md-none">Book exciting adventures and leisure activities</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/images/leisure/3.jpg" class="d-block w-100 vh-50" alt="Camping">
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle w-75">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-3 d-none d-md-block">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h1>
                        <h2 class="fw-bold mb-2 d-md-none">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h2>
                        <p class="lead mb-4 d-none d-md-block">Book exciting adventures and leisure activities</p>
                        <p class="mb-3 d-md-none">Book exciting adventures and leisure activities</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/images/leisure/4.jpg" class="d-block w-100 vh-50" alt="Walking">
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle w-75">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-3 d-none d-md-block">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h1>
                        <h2 class="fw-bold mb-2 d-md-none">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h2>
                        <p class="lead mb-4 d-none d-md-block">Book exciting adventures and leisure activities</p>
                        <p class="mb-3 d-md-none">Book exciting adventures and leisure activities</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/images/leisure/5.jpg" class="d-block w-100 vh-50" alt="Surfing">
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle w-75">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-3 d-none d-md-block">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h1>
                        <h2 class="fw-bold mb-2 d-md-none">
                            <i class="fas fa-umbrella-beach"></i>Leisure Activities
                        </h2>
                        <p class="lead mb-4 d-none d-md-block">Book exciting adventures and leisure activities</p>
                        <p class="mb-3 d-md-none">Book exciting adventures and leisure activities</p>
                    </div>
                </div>
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
                        <button class="btn btn-outline-primary" data-filter="crafts">Relaxing</button>
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
                <div class="col-md-6 col-lg-4 mb-4" data-category="Water Sports">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px;">
                                <img src="../assets/images/leisure/scuba diver.jpg" alt="Scuba Diving" class="w-100 h-100 object-cover">
                                <!-- <i class="fas fa-swimmer text-6xl text-white"></i> -->
                            </div>
                            <span class="card-category badge bg-info position-absolute top-0 end-0 m-2">Water Sports</span>
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
                                <span class="fw-bold text-success fs-5"> 10000 LKR/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100">
                                <i class="fas fa-calendar-plus me-2"></i><a href="order.php">Book Now</a>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 2 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="Water Sports">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-water text-6xl text-white"></i> -->
                                 <img src="../assets/images/leisure/surfing.jpg" alt="Surfing Lessons" class="w-100 h-100 object-cover">
                            </div>
                            <span class="card-category badge bg-warning position-absolute top-0 end-0 m-2">Water Sports</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Professional Surfing Lessons</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>1h 30m | Beginner to Advanced
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Arugam Bay Beach
                            </p>
                            <p class="card-text">Learn to surf with professional instructors on the best waves in town. With skilled instructors, quality surfboards, and access to Arugambay’s every session brings you closer to mastering the ocean. Stay with us, surf with us, and feel the true spirit of Arugambay the paradise for wave lovers.</p>
                            
                            <div class="mb-3 mt-2">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 18')">Dec 18</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 21')">Dec 21</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 24')">Dec 24</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">7000 LKR/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.7)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Professional Surfing Lessons', 7000)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 3 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="Adventure">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-mountain text-6xl text-white"></i> -->
                                 <img src="../assets/images/leisure/rock climbing.jpg" alt="Rock Climbing" class="w-100 h-100 object-cover">

                            </div>
                            <span class="card-category badge bg-success position-absolute top-0 end-0 m-2">Adventure</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Rock Climbing Experience</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>10 hours | Ages 12-60
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Peacock Hill and Ramboda waterfall in Sri Lanka
                            </p>
                            <p class="card-text">Challenge yourself with guided rock climbing on natural cliffs. Safety equipment provided.
                                Visitors say the sound of rushing water, cool breezes, and chance for a cold water dip create a calming, unforgettable escape into nature.
                            </p>
                            
                            <div class="mb-3 mt-4">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 19')">Dec 19</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 23')">Dec 23</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 26')">Dec 26</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">20500 LKR/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.8)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Rock Climbing Experience', 20500)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 4 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="Adventure">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-purple-500 to-pink-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-palette text-6xl text-white"></i> -->
                                <img src="../assets/images/leisure/zip lining.jpg" alt="zip lining" class="w-100 h-100 object-cover">
                            </div>
                        </div>
                        <span class="card-category badge bg-warning position-absolute top-0 end-0 m-2">Adventure</span>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Flying Ravana Adventure Park</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>3-5 hours | All ages welcome
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Ella, Sri Lanka
                            </p>
                            <p class="card-text">Flying Ravana is Sri Lanka’s first ever mega dual zip-line, located amidst the luscious green estates of Ella,Sri Lanka.
                                The two-wire zip-line stretches for more than half a kilometre, slides at max 80kmph and offers a bird’s-eye view of the beautiful hills of the island.
                            </p>
                            
                            <div class="mb-3 mt-4">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 17')">Dec 17</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 20')">Dec 20</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 23')">Dec 23</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5"> 13700 LKR/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.6)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Flying Ravana Adventure Park', 13700)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 5 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="Relaxing">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-indigo-500 to-purple-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-spa text-6xl text-white"></i> -->
                                 <img src="../assets/images/leisure/Golf.jpg" alt="Golf" class="w-100 h-100 object-cover">
                            </div>
                            <span class="card-category badge bg-info position-absolute top-0 end-0 m-2">Relaxing</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Swing Ceylon Mini Golf - Unawatuna </h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>2-3 hours | Beginner friendly
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>beach town of Unawatuna near Galle
                            </p>
                            <p class="card-text">Swing Ceylon is not your average mini-golf course.It’s Sri Lanka’s top-rated mini-golf destination, and nature in one unforgettable outing.
                                Play 18 imaginative holes inspired by iconic Sri Lankan landmarks like the Nine Arch Bridge and Sigiriya Rock, surrounded by lush palm trees and local wildlife.
                            </p>
                            
                            <div class="mb-3 mt-1">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 21')">Dec 21</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 28')">Dec 28</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Jan 4')">Jan 4</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5"> 8500 LKR/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <small class="text-muted ms-1">(4.9)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Swing Ceylon Mini Golf - Unawatuna', 8500)">
                                <i class="fas fa-calendar-plus me-2"></i>Book Activity
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 6 -->
                <div class="col-md-6 col-lg-4 mb-4" data-category="Water Sports">
                    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="position-relative">
                            <div class="card-img-top bg-gradient-to-r from-yellow-500 to-orange-500 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <!-- <i class="fas fa-hiking text-6xl text-white"></i> -->
                                 <img src="../assets/images/leisure/boat.jpg" alt="boat" class="w-100 h-100 object-cover">
                            </div>
                            <span class="card-category badge bg-success position-absolute top-0 end-0 m-2">Water Sports</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold ">Avant Leisure Adventure Sports</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-clock me-2"></i>7 mins 30 Sec | Moderate difficulty
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Bentota, Sri Lanka
                            </p>
                            <p class="card-text">Feel the rush as you ride the latest Yamaha and Sea-Doo jet skis across the scenic Bentota River.
                                Avant Leisure Adventure Sports offers top-tier equipment, personalized safety briefings, and unmatched service.Open year-round with flexible rental options, we’re here to make every ride smooth, safe, and unforgettable.
                            </p>
                            
                            <div class="mb-3 mt-2">
                                <small class="text-muted fw-bold">Available Dates:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 16')">Dec 16</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 19')">Dec 19</button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="selectActivityDate(this, 'Dec 22')">Dec 22</button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold text-success fs-5">5000 LKR/person</span>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <small class="text-muted ms-1">(4.5)</small>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="openLeisureBooking('Avant Leisure Adventure Sports', 5000)">
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
                                    <option>7:00 AM - 12:00 PM</option>
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
                                        
                                    </ul>
                                </div>
                                <div class="mb-2">
                                    <strong>What to Bring:</strong>
                                    <ul class="mt-1 mb-0">
                                        <li>Comfortable clothing</li>
                                        <li>Protection items</li>
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
                                <strong>Price per person: LKR <span id="leisurePricePerPerson"></span></strong><br>
                                <strong>Total: LKR <span id="leisureTotalPrice"></span></strong>
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
