<?php
session_start();

// Redirect if already logged in as admin
if (isset($_SESSION['admin_id'])) {
    header('Location: admin-dashboard.php');
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
    <title>Admin Login - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 min-h-screen">
    <div class="container-fluid min-h-screen d-flex align-items-center justify-content-center">
        <div class="row w-100 max-w-4xl mx-auto">
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
                <div class="text-center text-white">
                    <i class="fas fa-shield-alt text-6xl mb-4 text-primary"></i>
                    <h2 class="text-3xl font-bold mb-3">Admin Portal</h2>
                    <p class="text-lg opacity-75">Secure access to TicketHub management system</p>
                    <div class="mt-6">
                        <div class="d-flex justify-content-center gap-4 text-sm">
                            <div class="admin-feature">
                                <i class="fas fa-users text-primary"></i>
                                <div>User Management</div>
                            </div>
                            <div class="admin-feature">
                                <i class="fas fa-calendar text-primary"></i>
                                <div>Event Control</div>
                            </div>
                            <div class="admin-feature">
                                <i class="fas fa-chart-bar text-primary"></i>
                                <div>Analytics</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="card shadow-2xl border-0 w-100 bg-white/95 backdrop-blur" style="max-width: 400px;">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="admin-logo mb-3">
                                <i class="fas fa-user-shield text-4xl text-primary"></i>
                            </div>
                            <h1 class="h3 font-bold text-gray-800">Admin Login</h1>
                            <p class="text-muted">Access the administrative dashboard</p>
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
                        
                        <form method="POST" action="../php/admin_login_process.php" id="adminLoginForm">
                            <div class="mb-3">
                                <label for="username" class="form-label">Administrator Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-user-shield text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control" id="username" name="username" 
                                           placeholder="Enter admin username" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Administrator Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-key text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Enter admin password" required>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-4 form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Keep me signed in
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Access Dashboard
                            </button>
                            
                            <div class="text-center">
                                <a href="login.php" class="text-decoration-none text-muted">
                                    <i class="fas fa-arrow-left me-1"></i>Back to User Login
                                </a>
                            </div>
                        </form>
                        
                        <!-- Demo Admin Credentials -->
                        <div class="mt-4 p-3 bg-info bg-opacity-10 border border-info rounded">
                            <h6 class="text-info mb-2">
                                <i class="fas fa-info-circle me-2"></i>Demo Admin Access
                            </h6>
                            <small class="text-muted">
                                <strong>Username:</strong> admin<br>
                                <strong>Password:</strong> admin123
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
        document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            if (!username || !password) {
                e.preventDefault();
                alert('Please fill in all fields');
            }
        });
    </script>
    
    <style>
        .admin-feature {
            text-align: center;
            opacity: 0.8;
        }
        
        .admin-feature i {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .card {
            backdrop-filter: blur(10px);
        }
        
        body {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
        }
    </style>
</body>
</html>