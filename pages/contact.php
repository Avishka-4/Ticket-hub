<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body class="bg-gray-50">
    <?php include '../includes/navbar.php'; ?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Contact Us</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Have questions or need assistance? We're here to help! Get in touch with our friendly support team.
                </p>
            </div>
            
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body p-5">
                            <h3 class="card-title mb-4">Send us a Message</h3>
                            
                            <form id="contactForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                    <div class="col-12">
                                        <label for="subject" class="form-label">Subject *</label>
                                        <select class="form-select" id="subject" required>
                                            <option value="">Select a subject</option>
                                            <option value="booking">Booking Support</option>
                                            <option value="payment">Payment Issues</option>
                                            <option value="technical">Technical Support</option>
                                            <option value="refund">Refund Request</option>
                                            <option value="feedback">Feedback</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="message" class="form-label">Message *</label>
                                        <textarea class="form-control" id="message" rows="6" 
                                                placeholder="Please describe your inquiry in detail..." required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="newsletter">
                                            <label class="form-check-label" for="newsletter">
                                                Subscribe to our newsletter for updates and special offers
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fas fa-paper-plane me-2"></i>Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="col-lg-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4">Contact Information</h5>
                            
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Address</h6>
                                        <p class="text-muted mb-0">123 Entertainment Street<br>City Center, State 12345</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-phone text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Phone</h6>
                                        <p class="text-muted mb-0">+1 (555) 123-4567</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Email</h6>
                                        <p class="text-muted mb-0">support@tickethub.com</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-clock text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Business Hours</h6>
                                        <p class="text-muted mb-0">
                                            Mon - Fri: 9:00 AM - 6:00 PM<br>
                                            Sat - Sun: 10:00 AM - 4:00 PM
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4">Follow Us</h5>
                            <div class="d-flex gap-3">
                                <a href="#" class="social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Section -->
            <div class="mt-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Frequently Asked Questions</h3>
                
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#collapse1" aria-expanded="true">
                                        How can I cancel or modify my booking?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        You can cancel or modify your booking by logging into your account and visiting the "My Bookings" section. 
                                        Cancellations made 24 hours before the event are eligible for full refund.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#collapse2">
                                        What payment methods do you accept?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We accept all major credit cards (Visa, MasterCard, American Express), PayPal, 
                                        and digital wallets like Apple Pay and Google Pay.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#collapse3">
                                        How do I receive my tickets?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        After successful payment, you'll receive an email confirmation with your e-tickets. 
                                        You can also access and download your tickets from your account dashboard.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#collapse4">
                                        Is my personal information secure?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, we use industry-standard SSL encryption to protect your personal and payment information. 
                                        We never store your credit card details on our servers.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include '../includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Simple validation
            if (!data.firstName || !data.lastName || !data.email || !data.subject || !data.message) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Simulate form submission
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('Thank you for contacting us! We\'ll get back to you within 24 hours.');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    </script>
    
    <style>
        .contact-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--bs-primary-bg-subtle);
            border-radius: 50%;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: var(--bs-primary);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background-color: var(--bs-primary-dark);
            transform: translateY(-2px);
            color: white;
        }
        
        .contact-item {
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }
        
        .contact-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
    </style>
</body>
</html>