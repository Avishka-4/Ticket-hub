<?php
// Ensure session started before any output
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketHub - Your Gateway to Entertainment</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <?php
        // Compute base URL in case site is served from a subfolder like /xampp/htdocs/ticket booking/
        $documentRoot = realpath($_SERVER['DOCUMENT_ROOT']);
        $projectRoot = realpath(__DIR__);
        $baseUrl = rtrim(str_replace('\\', '/', str_replace($documentRoot, '', $projectRoot)), '/') . '/';
    ?>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section bg-gradient-to-r from-purple-600 to-blue-600 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold mb-4">Welcome to TicketHub</h1>
            <p class="text-xl mb-8">Your one-stop destination for all entertainment bookings</p>
            <!-- CTAs removed as requested -->
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12">Explore Categories</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Events Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-gradient-to-r from-red-500 to-pink-500 h-48 flex items-center justify-center">
                        <i class="fas fa-music text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Events & Concerts</h3>
                        <p class="text-gray-600 mb-4">Book tickets for concerts, festivals, and live performances</p>
                        <a href="pages/events.php" class="btn btn-primary">Explore Events</a>
                    </div>
                </div>

                <!-- Movies Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-48 flex items-center justify-center">
                        <i class="fas fa-film text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Movies & Theater</h3>
                        <p class="text-gray-600 mb-4">Watch the latest movies with premium seating options</p>
                        <a href="pages/movies.php" class="btn btn-primary">Book Movies</a>
                    </div>
                </div>

                <!-- Sports Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-48 flex items-center justify-center">
                        <i class="fas fa-futbol text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Sports Events</h3>
                        <p class="text-gray-600 mb-4">Get tickets for cricket, football, and other sports</p>
                        <a href="pages/sports.php" class="btn btn-primary">Sports Tickets</a>
                    </div>
                </div>

                <!-- Leisure Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-gradient-to-r from-orange-500 to-yellow-500 h-48 flex items-center justify-center">
                        <i class="fas fa-umbrella-beach text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Leisure Activities</h3>
                        <p class="text-gray-600 mb-4">Book surfing, diving, and adventure activities</p>
                        <a href="pages/leisure.php" class="btn btn-primary">Book Activities</a>
                    </div>
                </div>

                <!-- Food & Beverage Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-gradient-to-r from-purple-500 to-indigo-500 h-48 flex items-center justify-center">
                        <i class="fas fa-utensils text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Food & Beverages</h3>
                        <p class="text-gray-600 mb-4">Order delicious food and beverages online</p>
                        <a href="pages/food.php" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

                <!-- Places Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-gradient-to-r from-teal-500 to-blue-500 h-48 flex items-center justify-center">
                        <i class="fas fa-map-marked-alt text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Places & Tours</h3>
                        <p class="text-gray-600 mb-4">Discover amazing destinations and book tours</p>
                        <a href="pages/places.php" class="btn btn-primary">Explore Places</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="py-16">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12">Featured This Week</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-star text-warning"></i>
                                Rock Concert 2024
                            </h5>
                            <p class="card-text">Experience the best rock music with top artists performing live.</p>
                            <small class="text-muted">Starting from $25</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-trophy text-warning"></i>
                                Championship Final
                            </h5>
                            <p class="card-text">Don't miss the most anticipated sports event of the year.</p>
                            <small class="text-muted">Starting from $50</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-camera text-warning"></i>
                                Island Adventure
                            </h5>
                            <p class="card-text">Explore beautiful islands with our exclusive tour packages.</p>
                            <small class="text-muted">Starting from $150</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo $baseUrl; ?>assets/js/main.js"></script>
</body>
</html>