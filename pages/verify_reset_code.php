<?php
session_start();
require_once '../php/config.php';

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

$token = isset($_GET['token']) ? $_GET['token'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';

// Verify token exists
if (empty($token)) {
    header('Location: forgot_password.php?error=Invalid reset link');
    exit();
}

// Check if token is valid and not expired
try {
    $stmt = $pdo->prepare("
        SELECT pr.*, u.email, u.first_name 
        FROM password_resets pr 
        JOIN users u ON pr.user_id = u.id 
        WHERE pr.reset_token = ? AND pr.is_used = 0 
    ");
    $stmt->execute([$token]);
    $resetData = $stmt->fetch();
    
    if (!$resetData) {
        header('Location: forgot_password.php?error=Reset link has expired or is invalid. Please request a new one.');
        exit();
    }
} catch (PDOException $e) {
    header('Location: forgot_password.php?error=An error occurred. Please try again.');
    exit();
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

<?php
// Helper function to mask email
function maskEmail($email) {
    $parts = explode('@', $email);
    $name = $parts[0];
    $domain = $parts[1];
    
    $maskedName = substr($name, 0, 2) . str_repeat('*', strlen($name) - 2);
    return $maskedName . '@' . $domain;
}
?>
