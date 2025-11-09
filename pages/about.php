<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body class="bg-gray-50">
    <?php include '../includes/navbar.php'; ?>
    
    <!-- Hero Section -->
    <section class="hero-section bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl font-bold mb-6">About TicketHub</h1>
                <p class="text-xl mb-8 opacity-90">
                    Your premier destination for unforgettable experiences. We connect you with the best events, 
                    entertainment, and adventures around the world.
                </p>
                <div class="flex justify-center gap-4">
                    <div class="stat-item">
                        <div class="text-3xl font-bold">1M+</div>
                        <div class="text-sm opacity-75">Happy Customers</div>
                    </div>
                    <div class="stat-item">
                        <div class="text-3xl font-bold">10K+</div>
                        <div class="text-sm opacity-75">Events Hosted</div>
                    </div>
                    <div class="stat-item">
                        <div class="text-3xl font-bold">50+</div>
                        <div class="text-sm opacity-75">Cities Worldwide</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-6xl mx-auto">
            
            <!-- Our Story Section -->
            <div class="row align-items-center mb-16">
                <div class="col-lg-6 mb-8 mb-lg-0">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Story</h2>
                    <p class="text-gray-600 mb-4">
                        Founded in 2025, TicketHub began with a simple vision: to make discovering and booking 
                        amazing experiences as easy as a few clicks. What started as a small startup has grown 
                        into a global platform connecting millions of people with their perfect entertainment.
                    </p>
                    <p class="text-gray-600 mb-4">
                        We believe that life's best moments happen when we step outside our comfort zone and 
                        try something new. Whether it's a blockbuster movie premiere, a thrilling sports match, 
                        or a unique cultural event, we're here to make it happen.
                    </p>
                    <p class="text-gray-600">
                        Today, we're proud to be the trusted choice for event discovery and booking, 
                        serving customers in over 50 cities worldwide.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="story-image-grid">
                        <div class="row g-3">
                            <div class="col-6">
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=300&h=300&fit=crop" 
                                     alt="Concert" class="img-fluid rounded shadow">
                            </div>
                            <div class="col-6">
                                <img src="../assets/images/theater.jpg" 
                                     alt="Theater" class="img-fluid rounded shadow">
                            </div>
                            <div class="col-6">
                                <img src="https://images.unsplash.com/photo-1431324155629-1a6deb1dec8d?w=300&h=300&fit=crop" 
                                     alt="Sports" class="img-fluid rounded shadow">
                            </div>
                            <div class="col-6">
                                <img src="https://images.unsplash.com/photo-1505236858219-8359eb29e329?w=300&h=300&fit=crop" 
                                     alt="Food" class="img-fluid rounded shadow">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mission & Vision -->
            <div class="row mb-16">
                <div class="col-lg-6 mb-8 mb-lg-0">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="mission-icon mb-4">
                                <i class="fas fa-bullseye text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="card-title text-2xl font-bold mb-3">Our Mission</h3>
                            <p class="text-gray-600">
                                To democratize access to extraordinary experiences by providing a seamless, 
                                secure, and user-friendly platform that connects people with the events 
                                and activities they love.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="vision-icon mb-4">
                                <i class="fas fa-eye text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="card-title text-2xl font-bold mb-3">Our Vision</h3>
                            <p class="text-gray-600">
                                To become the world's most trusted and innovative platform for live experiences, 
                                enriching lives by making unforgettable moments accessible to everyone, everywhere.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Our Values -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Our Core Values</h2>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="value-card text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-users text-primary"></i>
                            </div>
                            <h4 class="font-bold mb-3">Customer First</h4>
                            <p class="text-gray-600">
                                Every decision we make puts our customers at the center. 
                                Your satisfaction is our success.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="value-card text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-shield-alt text-primary"></i>
                            </div>
                            <h4 class="font-bold mb-3">Trust & Security</h4>
                            <p class="text-gray-600">
                                We maintain the highest standards of security and transparency 
                                in every transaction.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="value-card text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-lightbulb text-primary"></i>
                            </div>
                            <h4 class="font-bold mb-3">Innovation</h4>
                            <p class="text-gray-600">
                                We constantly evolve and improve our platform to deliver 
                                the best possible experience.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="value-card text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-globe text-primary"></i>
                            </div>
                            <h4 class="font-bold mb-3">Accessibility</h4>
                            <p class="text-gray-600">
                                Great experiences should be available to everyone, 
                                regardless of background or location.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="value-card text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-handshake text-primary"></i>
                            </div>
                            <h4 class="font-bold mb-3">Partnership</h4>
                            <p class="text-gray-600">
                                We collaborate closely with event organizers, venues, and 
                                communities to create lasting connections.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="value-card text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-heart text-primary"></i>
                            </div>
                            <h4 class="font-bold mb-3">Passion</h4>
                            <p class="text-gray-600">
                                We're passionate about creating memorable experiences 
                                and celebrating life's special moments.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Meet Our Team</h2>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-card text-center">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop&crop=face" 
                                 alt="Head of Marketing" class="team-photo mb-3">
                            <h5 class="font-bold">Mike Chen</h5>
                            <p class="text-primary mb-2">Head of Marketing</p>
                            <p class="text-gray-600 small">
                                Creative strategist connecting events with their perfect audiences.
                            </p>
                            <div class="social-links">
                                <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-primary"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-card text-center">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200&h=200&fit=crop&crop=face" 
                                 alt="Customer Success" class="team-photo mb-3">
                            <h5 class="font-bold">Emily Davis</h5>
                            <p class="text-primary mb-2">Customer Success</p>
                            <p class="text-gray-600 small">
                                Dedicated to ensuring every customer has an amazing experience.
                            </p>
                            <div class="social-links">
                                <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-primary"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-card text-center">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop&crop=face" 
                                 alt="Head of Marketing" class="team-photo mb-3">
                            <h5 class="font-bold">Mike Chen</h5>
                            <p class="text-primary mb-2">Head of Marketing</p>
                            <p class="text-gray-600 small">
                                Creative strategist connecting events with their perfect audiences.
                            </p>
                            <div class="social-links">
                                <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-primary"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-card text-center">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200&h=200&fit=crop&crop=face" 
                                 alt="Customer Success" class="team-photo mb-3">
                            <h5 class="font-bold">Emily Davis</h5>
                            <p class="text-primary mb-2">Customer Success</p>
                            <p class="text-gray-600 small">
                                Dedicated to ensuring every customer has an amazing experience.
                            </p>
                            <div class="social-links">
                                <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-primary"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Call to Action -->
            <div class="text-center bg-gradient-to-r from-blue-50 to-purple-50 p-8 rounded-lg">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Ready to Discover Amazing Experiences?</h3>
                <p class="text-gray-600 mb-6">
                    Join millions of users who trust TicketHub for their entertainment needs. 
                    Start exploring today!
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="../index.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-search me-2"></i>Browse Events
                    </a>
                    <a href="contact.php" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include '../includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        .stat-item {
            padding: 0 2rem;
            border-right: 1px solid rgba(255,255,255,0.3);
        }
        
        .stat-item:last-child {
            border-right: none;
        }
        
        .value-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .value-card:hover {
            transform: translateY(-5px);
        }
        
        .value-icon i {
            font-size: 2.5rem;
            background: linear-gradient(45deg, #007bff, #6f42c1);
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .team-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #f8f9fa;
        }
        
        .team-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .team-card:hover {
            transform: translateY(-5px);
        }
        
        .social-links a {
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        
        .social-links a:hover {
            color: #0056b3 !important;
        }
    </style>
</body>
</html>