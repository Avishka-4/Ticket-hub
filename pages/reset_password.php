<?php
session_start();
require_once '../php/config.php';

// Check if user has verified the reset code
if (!isset($_SESSION['reset_verified']) || !isset($_SESSION['reset_user_id'])) {
    header('Location: forgot_password.php?error=Please verify your reset code first');
    exit();
}

$token = isset($_GET['token']) ? $_GET['token'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';

// Verify token matches session
if ($token !== $_SESSION['reset_token']) {
    header('Location: forgot_password.php?error=Invalid reset session');
    exit();
}

// Get user info
try {
    $stmt = $pdo->prepare("SELECT email, first_name FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['reset_user_id']]);
    $user = $stmt->fetch();
    
    if (!$user) {
        session_destroy();
        header('Location: forgot_password.php?error=User not found');
        exit();
    }
} catch (PDOException $e) {
    header('Location: forgot_password.php?error=An error occurred');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - TicketHub</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                                <i class="fas fa-check-circle text-success" style="font-size: 3rem;"></i>
                            </div>
                            <h2 class="fw-bold text-primary">Create New Password</h2>
                            <p class="text-muted">Enter a strong password for your account</p>
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

                        <form id="resetPasswordForm" action="../php/reset_password_process.php" method="POST">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                            
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">
                                    <i class="fas fa-lock me-1"></i>New Password
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" id="newPassword" 
                                           name="new_password" required minlength="6">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('newPassword')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Minimum 6 characters</small>
                                <div class="password-strength mt-2" id="passwordStrength"></div>
                            </div>

                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Confirm New Password
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" id="confirmPassword" 
                                           name="confirm_password" required minlength="6">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div id="passwordMatchMsg" class="mt-1"></div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="fas fa-check me-2"></i>Reset Password
                            </button>
                        </form>

                        <!-- Password Requirements -->
                        <div class="alert alert-info mt-3">
                            <h6 class="alert-heading">
                                <i class="fas fa-info-circle me-2"></i>Password Requirements
                            </h6>
                            <small>
                                • At least 6 characters long<br>
                                • Mix of uppercase and lowercase (recommended)<br>
                                • Include numbers and special characters (recommended)
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const button = field.nextElementSibling;
            const icon = button.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Password strength checker
        const passwordInput = document.getElementById('newPassword');
        const strengthDiv = document.getElementById('passwordStrength');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            let message = '';
            let color = '';
            
            if (password.length >= 6) strength++;
            if (password.length >= 10) strength++;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[^a-zA-Z0-9]/.test(password)) strength++;
            
            switch(strength) {
                case 0:
                case 1:
                    message = 'Weak';
                    color = 'danger';
                    break;
                case 2:
                case 3:
                    message = 'Medium';
                    color = 'warning';
                    break;
                case 4:
                case 5:
                    message = 'Strong';
                    color = 'success';
                    break;
            }
            
            if (password.length > 0) {
                strengthDiv.innerHTML = `<small class="text-${color}">Password Strength: <strong>${message}</strong></small>`;
            } else {
                strengthDiv.innerHTML = '';
            }
        });
        
        // Password match checker
        const confirmInput = document.getElementById('confirmPassword');
        const matchMsg = document.getElementById('passwordMatchMsg');
        
        confirmInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const confirm = this.value;
            
            if (confirm.length > 0) {
                if (password === confirm) {
                    matchMsg.innerHTML = '<small class="text-success"><i class="fas fa-check me-1"></i>Passwords match</small>';
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    matchMsg.innerHTML = '<small class="text-danger"><i class="fas fa-times me-1"></i>Passwords do not match</small>';
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            } else {
                matchMsg.innerHTML = '';
                this.classList.remove('is-valid', 'is-invalid');
            }
        });
        
        // Form validation
        document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (newPassword.length < 6) {
                e.preventDefault();
                alert('Password must be at least 6 characters long');
                return;
            }
            
            if (newPassword !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match');
                return;
            }
        });
    </script>
</body>
</html>