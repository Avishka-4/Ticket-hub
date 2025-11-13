<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - TicketHub</title>
    
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
<body class="bg-gray-100">
    <?php include '../includes/navbar.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="fas fa-key text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h2 class="fw-bold text-primary">Forgot Password?</h2>
                            <p class="text-muted">No worries! Enter your email and we'll send you a reset code.</p>
                        </div>

                        <?php if ($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?php echo htmlspecialchars($error); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <?php echo htmlspecialchars($success); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form id="forgotPasswordForm" action="../php/forgot_password_process.php" method="POST">
                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i>Email Address
                                </label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" 
                                       placeholder="Enter your registered email" required autofocus>
                                <small class="text-muted">We'll send a 6-digit verification code to this email</small>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="fas fa-paper-plane me-2"></i>Send Reset Code
                            </button>

                            <div class="text-center">
                                <a href="login.php" class="text-decoration-none">
                                    <i class="fas fa-arrow-left me-1"></i>Back to Login
                                </a>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <p class="text-muted mb-2">Need help?</p>
                            <a href="contact.php" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-headset me-1"></i>Contact Support
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Security Info Card -->
                <div class="card mt-3 bg-info bg-opacity-10 border-info">
                    <div class="card-body">
                        <h6 class="card-title text-info">
                            <i class="fas fa-shield-alt me-2"></i>Security Information
                        </h6>
                        <small class="text-muted">
                            • Reset codes are valid for 15 minutes<br>
                            • Codes can only be used once<br>
                            • Never share your reset code with anyone
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Form validation
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;

            if (!email) {
                e.preventDefault();
                alert('Please enter your email address');
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Please enter a valid email address');
                return;
            }
        });
    </script>
</body>
</html>
