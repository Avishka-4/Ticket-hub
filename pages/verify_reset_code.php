<?php
// Enable all error reporting and custom logging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Custom logging function
function debug_log($message) {
    $log_file = __DIR__ . '/../../debug.log';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($log_file, "[$timestamp] $message\n", FILE_APPEND | LOCK_EX);
}

debug_log("=== verify_reset_code.php STARTED ===");

session_start();
require_once '../php/config.php';

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    debug_log("User already logged in, redirecting to index");
    header('Location: ../index.php');
    exit();
}

$token = isset($_GET['token']) ? $_GET['token'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';

debug_log("Token from URL: " . $token);
debug_log("Error message: " . $error);

// Verify token exists
if (empty($token)) {
    debug_log("ERROR: Empty token received");
    header('Location: forgot_password.php?error=Invalid reset link');
    exit();
}

// Check if token is valid and not expired
try {
    debug_log("Checking token in database: " . $token);
    
    // First, let's check what exactly is in the database
    $debug_stmt = $pdo->prepare("SELECT * FROM password_resets WHERE reset_token = ?");
    $debug_stmt->execute([$token]);
    $debug_data = $debug_stmt->fetch(PDO::FETCH_ASSOC);
    
    debug_log("Raw database data: " . print_r($debug_data, true));
    
    if ($debug_data) {
        debug_log("Database check - Is used: " . $debug_data['is_used']);
        debug_log("Database check - Expires at: " . $debug_data['expires_at']);
        debug_log("Database check - Current time: " . date('Y-m-d H:i:s'));
        
        // Check expiry manually
        $expires_at = strtotime($debug_data['expires_at']);
        $current_time = time();
        $is_expired = $current_time > $expires_at;
        debug_log("Manual expiry check: " . ($is_expired ? 'EXPIRED' : 'NOT EXPIRED'));
    }
    
    // Try the main query but simpler
    $stmt = $pdo->prepare("
        SELECT pr.*, u.email, u.first_name 
        FROM password_resets pr 
        JOIN users u ON pr.user_id = u.id 
        WHERE pr.reset_token = ? AND pr.is_used = 0
    ");
    $stmt->execute([$token]);
    $resetData = $stmt->fetch();
    
    debug_log("Main query result: " . ($resetData ? "FOUND" : "NOT FOUND"));
    
    if ($resetData) {
        // Manual validation instead of relying on SQL conditions
        $is_used = $resetData['is_used'];
        $expires_at = strtotime($resetData['expires_at']);
        $current_time = time();
        
        debug_log("Manual validation - Is used: $is_used, Expired: " . ($current_time > $expires_at ? 'YES' : 'NO'));
        
        if ($is_used == 1) {
            debug_log("ERROR: Token already used");
            header('Location: forgot_password.php?error=This reset link has already been used. Please request a new one.');
            exit();
        }
        
        if ($current_time > $expires_at) {
            debug_log("ERROR: Token expired");
            header('Location: forgot_password.php?error=Reset link has expired. Please request a new one.');
            exit();
        }
        
        debug_log("SUCCESS: Token validated manually for user: " . $resetData['email']);
        
    } else {
        debug_log("ERROR: Token not found in main query");
        header('Location: forgot_password.php?error=Reset link is invalid. Please request a new one.');
        exit();
    }
    
} catch (PDOException $e) {
    debug_log("DATABASE ERROR: " . $e->getMessage());
    header('Location: forgot_password.php?error=An error occurred. Please try again.');
    exit();
}

debug_log("=== verify_reset_code.php LOADING PAGE ===");

// Helper function to mask email
function maskEmail($email) {
    $parts = explode('@', $email);
    $name = $parts[0];
    $domain = $parts[1];
    
    $maskedName = substr($name, 0, 2) . str_repeat('*', strlen($name) - 2);
    return $maskedName . '@' . $domain;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Reset Code - TicketHub</title>
    
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
                                <i class="fas fa-lock text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h2 class="fw-bold text-primary">Verify Reset Code</h2>
                            <p class="text-muted">Enter the 6-digit code sent to<br>
                                <strong><?php echo maskEmail($resetData['email']); ?></strong>
                            </p>
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

                        <form id="verifyCodeForm" action="../php/verify_code_process.php" method="POST">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                            
                            <div class="mb-4">
                                <label class="form-label text-center d-block">
                                    <i class="fas fa-keyboard me-1"></i>Enter 6-Digit Code
                                </label>
                                <div class="d-flex justify-content-center gap-2 mb-2" id="codeInputs">
                                    <input type="text" class="form-control form-control-lg text-center code-input" 
                                           maxlength="1" pattern="[0-9]" required style="width: 50px; font-size: 24px;">
                                    <input type="text" class="form-control form-control-lg text-center code-input" 
                                           maxlength="1" pattern="[0-9]" required style="width: 50px; font-size: 24px;">
                                    <input type="text" class="form-control form-control-lg text-center code-input" 
                                           maxlength="1" pattern="[0-9]" required style="width: 50px; font-size: 24px;">
                                    <input type="text" class="form-control form-control-lg text-center code-input" 
                                           maxlength="1" pattern="[0-9]" required style="width: 50px; font-size: 24px;">
                                    <input type="text" class="form-control form-control-lg text-center code-input" 
                                           maxlength="1" pattern="[0-9]" required style="width: 50px; font-size: 24px;">
                                    <input type="text" class="form-control form-control-lg text-center code-input" 
                                           maxlength="1" pattern="[0-9]" required style="width: 50px; font-size: 24px;">
                                </div>
                                <input type="hidden" name="reset_code" id="fullCode" required>
                                <small class="text-muted d-block text-center">Code expires in <span id="timer" class="fw-bold text-danger"></span></small>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="fas fa-check me-2"></i>Verify Code
                            </button>

                            <div class="text-center">
                                <p class="text-muted mb-2">Didn't receive the code?</p>
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="resendBtn" onclick="resendCode()">
                                    <i class="fas fa-redo me-1"></i>Resend Code
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="card mt-3 bg-light">
                    <div class="card-body">
                        <h6 class="card-title">
                            <i class="fas fa-lightbulb text-warning me-2"></i>Tips
                        </h6>
                        <small class="text-muted">
                            • Check your spam folder if you don't see the email<br>
                            • Make sure you entered the correct email address<br>
                            • Contact support if you continue to have issues
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Simple fixed 15-minute countdown (bypass timezone issues)
        let timeLeft = 15 * 60; // 15 minutes in seconds

        // Get the actual creation time from PHP and calculate remaining time properly
        const createdAt = new Date('<?php echo $resetData['created_at']; ?>').getTime();
        const expiresAt = createdAt + (15 * 60 * 1000); // 15 minutes from creation
        const now = new Date().getTime();
        const actualTimeLeft = Math.max(0, Math.floor((expiresAt - now) / 1000));

        console.log("Created at: <?php echo $resetData['created_at']; ?>");
        console.log("Calculated expiry: " + new Date(expiresAt));
        console.log("Actual time left: " + actualTimeLeft + " seconds");

        // Use the actual calculated time or fallback to 15 minutes
        timeLeft = actualTimeLeft > 0 ? actualTimeLeft : 15 * 60;

        // Countdown timer
        const timerInterval = setInterval(() => {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            
            document.getElementById('timer').textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                document.getElementById('timer').textContent = 'EXPIRED';
                document.getElementById('verifyCodeForm').innerHTML = '<div class="alert alert-danger">This reset code has expired. Please request a new one.</div><a href="forgot_password.php" class="btn btn-primary w-100">Request New Code</a>';
            } else {
                timeLeft--;
            }
        }, 1000);
        
        // Code input handling
        const codeInputs = document.querySelectorAll('.code-input');
        
        codeInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                const value = e.target.value;
                
                // Only allow numbers
                if (!/^\d*$/.test(value)) {
                    e.target.value = '';
                    return;
                }
                
                // Auto-focus next input
                if (value && index < codeInputs.length - 1) {
                    codeInputs[index + 1].focus();
                }
                
                // Update hidden field with complete code
                updateFullCode();
            });
            
            input.addEventListener('keydown', (e) => {
                // Handle backspace
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    codeInputs[index - 1].focus();
                }
                
                // Handle paste
                if (e.key === 'v' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                    navigator.clipboard.readText().then(text => {
                        const digits = text.replace(/\D/g, '').substring(0, 6);
                        digits.split('').forEach((digit, i) => {
                            if (codeInputs[i]) {
                                codeInputs[i].value = digit;
                            }
                        });
                        updateFullCode();
                        if (digits.length === 6) {
                            codeInputs[5].focus();
                        }
                    });
                }
            });
        });
        
        function updateFullCode() {
            const code = Array.from(codeInputs).map(input => input.value).join('');
            document.getElementById('fullCode').value = code;
        }
        
        // Form submission
        document.getElementById('verifyCodeForm').addEventListener('submit', function(e) {
            updateFullCode();
            const code = document.getElementById('fullCode').value;
            
            if (code.length !== 6 || !/^\d{6}$/.test(code)) {
                e.preventDefault();
                alert('Please enter a valid 6-digit code');
                return;
            }
        });
        
        // Resend code function
        function resendCode() {
            const btn = document.getElementById('resendBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Sending...';
            
            // Send request to resend email
            fetch('../php/resend_reset_code.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'token=<?php echo urlencode($token); ?>'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('New code sent! Please check your email.');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    alert(data.message || 'Failed to resend code. Please try again.');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-redo me-1"></i>Resend Code';
                }
            })
            .catch(error => {
                alert('An error occurred. Please try again.');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-redo me-1"></i>Resend Code';
            });
        }
    </script>
</body>
</html>