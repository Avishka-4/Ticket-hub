<?php
session_start();

use Google\Service\Oauth2;
use Google\Client;

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

// Google Client Setup
require_once 'vendor/autoload.php';
require_once '../php/config.php';

$client = new Google\Client();
$client->setClientId('524339942255-718c0182d43pvvvp8kh60dcqt0eeulo1.apps.googleusercontent.com');
$client->setClientSecret('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'); 
$client->setRedirectUri('http://localhost/Ticket-hub/pages/login.php'); 
$client->addScope('email');
$client->addScope('profile');

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';

// Handle Google OAuth callback
if (isset($_GET['code'])) {
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token);

        // Get user info from Google
        $google_service = new Google\Service\Oauth2($client);
        $google_account_info = $google_service->userinfo->get();
        
        $email = $google_account_info->email;
        $firstName = $google_account_info->givenName ?? '';
        $lastName = $google_account_info->familyName ?? '';
        $fullName = $google_account_info->name;
        
        // Check if user already exists
        $stmt = $pdo->prepare("SELECT id, first_name, last_name FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch();
        
        if ($existingUser) {
            // User exists, log them in
            $_SESSION['user_id'] = $existingUser['id'];
            $_SESSION['username'] = $existingUser['first_name'] . ' ' . $existingUser['last_name'];
            $_SESSION['email'] = $email;
            header('Location: ../index.php?success=Welcome back!');
            exit();
        } else {
            // New user, create account
            $randomPassword = bin2hex(random_bytes(16));
            $hashedPassword = password_hash($randomPassword, PASSWORD_DEFAULT);
            
            // Split name if not provided separately
            if (empty($firstName) && empty($lastName)) {
                $nameParts = explode(' ', $fullName, 2);
                $firstName = $nameParts[0];
                $lastName = $nameParts[1] ?? '';
            }
            
            $stmt = $pdo->prepare("
                INSERT INTO users (first_name, last_name, email, password) 
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([$firstName, $lastName, $email, $hashedPassword]);
            
            // Auto login
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['username'] = $firstName . ' ' . $lastName;
            $_SESSION['email'] = $email;
            
            header('Location: ../index.php?success=Account created successfully! Welcome to TicketHub!');
            exit();
        }
    } catch (Exception $e) {
        $error = "Google login failed. Please try again.";
    }
}

// Handle Google login button click
if (isset($_POST['google_register'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
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
    <title>Login - TicketHub</title>
    
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
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </h2>
                            <p class="text-muted">Welcome back! Please sign in to your account.</p>
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

                        <!-- Social Login Options -->
                        <div class="d-grid gap-2 mb-4">
                            <form method="POST" class="d-inline">
                                <button type="submit" name="google_register" class="btn btn-outline-danger w-100">
                                    <i class="fab fa-google me-2"></i>Sign up with Google
                                </button>
                            </form>
                        </div>

                        <form id="loginForm" action="../php/login_process.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i>Email Address
                                </label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Password
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In
                            </button>

                            <div class="text-center mb-3">
                                <a href="forgot_password.php" class="text-decoration-none">Forgot your password?</a>
                            </div>

                            <hr>

                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    Don't have an account? 
                                    <a href="register.php" class="text-decoration-underline">Sign up here</a>
                                </small>
                            </div>
                            
                            <div class="text-center mt-2">
                                <small class="text-muted">
                                    <a href="admin-login.php" class="text-decoration-underline">Admin Login</a>
                                </small>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Demo Credentials Card -->
                <div class="card mt-3 bg-info bg-opacity-10 border-info">
                    <div class="card-body">
                        <h6 class="card-title text-info">
                            <i class="fas fa-info-circle me-2"></i>Demo Credentials
                        </h6>
                        <small class="text-muted">
                            <strong>Email:</strong> demo@tickethub.com<br>
                            <strong>Password:</strong> password
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
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in all required fields');
                return;
            }

            if (password.length < 6) {
                e.preventDefault();
                alert('Password must be at least 6 characters long');
                return;
            }
        });
    </script>
</body>
</html>