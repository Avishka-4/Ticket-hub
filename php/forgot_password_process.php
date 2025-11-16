<?php
require_once 'config.php';
require_once 'email_config.php'; // You'll need to create this file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    
    // Validation
    if (empty($email)) {
        header('Location: ../pages/forgot_password.php?error=Please enter your email address');
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../pages/forgot_password.php?error=Please enter a valid email address');
        exit();
    }
    
    try {
        // Check if email exists
        $stmt = $pdo->prepare("SELECT id, first_name, email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if (!$user) {
            // Don't reveal if email exists or not for security
            header('Location: ../pages/forgot_password.php?success=If your email is registered, you will receive a reset code shortly.');
            exit();
        }
        
        // Generate 6-digit code
        $resetCode = sprintf("%06d", mt_rand(0, 999999));
        $resetToken = bin2hex(random_bytes(32)); // Unique token for URL
        $expiryTime = date('Y-m-d H:i:s', strtotime('+15 minutes'));
        
        // Store reset code in database
        $stmt = $pdo->prepare("
            INSERT INTO password_resets (user_id, reset_code, reset_token, expires_at, created_at) 
            VALUES (?, ?, ?, ?, NOW())
            ON DUPLICATE KEY UPDATE 
                reset_code = VALUES(reset_code),
                reset_token = VALUES(reset_token),
                expires_at = VALUES(expires_at),
                created_at = NOW(),
                is_used = 0
        ");
        $stmt->execute([$user['id'], $resetCode, $resetToken, $expiryTime]);
        
        // Send email with reset code
    $emailSent = sendResetEmail($user['email'], $user['first_name'], $resetCode, $resetToken);

    if ($emailSent) {
        header('Location: ../pages/forgot_password.php?success=If your email is registered, you will receive a reset code shortly.');
        exit();
    } else {
        error_log("Failed to send reset email to: " . $user['email']);
        header('Location: ../pages/forgot_password.php?error=Failed to send reset code. Please try again.');
        exit();
    }
        
    } catch (PDOException $e) {
        error_log("Password reset error: " . $e->getMessage());
        header('Location: ../pages/forgot_password.php?error=An error occurred. Please try again later.');
        exit();
    }
} else {
    header('Location: ../pages/forgot_password.php');
    exit();
}

// Function to send reset email using PHPMailer
function sendResetEmail($to, $firstName, $resetCode, $resetToken) {
    global $mail; // PHPMailer instance from email_config.php
    
    try {
        $mail->clearAddresses();
        $mail->addAddress($to, $firstName);
        
        $mail->Subject = 'Password Reset Code - TicketHub';
        
        // HTML email template
        $mail->Body = '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { background: #f9fafb; padding: 30px; border-radius: 0 0 10px 10px; }
                .code-box { background: white; border: 2px dashed #6366f1; padding: 20px; text-align: center; margin: 20px 0; border-radius: 8px; }
                .code { font-size: 32px; font-weight: bold; color: #6366f1; letter-spacing: 5px; }
                .button { display: inline-block; background: #6366f1; color: white; padding: 12px 30px; text-decoration: none; border-radius: 8px; margin: 20px 0; }
                .footer { text-align: center; color: #6b7280; font-size: 12px; margin-top: 20px; }
                .warning { background: #fef3c7; border-left: 4px solid #f59e0b; padding: 15px; margin: 20px 0; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>🔐 Password Reset Request</h1>
                </div>
                <div class="content">
                    <p>Hi ' . htmlspecialchars($firstName) . ',</p>
                    <p>We received a request to reset your TicketHub account password. Use the code below to complete the process:</p>
                    
                    <div class="code-box">
                        <p style="margin: 0; font-size: 14px; color: #6b7280;">Your Reset Code</p>
                        <div class="code">' . $resetCode . '</div>
                        <p style="margin: 10px 0 0 0; font-size: 12px; color: #6b7280;">Valid for 15 minutes</p>
                    </div>
                    
                    <p>Or click the button below to reset your password directly:</p>
                    <div style="text-align: center;">
                        <a href="' . getBaseUrl() . '/pages/verify_reset_code.php?token=' . $resetToken . '" class="button">Reset Password</a>
                    </div>
                    
                    <div class="warning">
                        <strong>⚠️ Security Notice:</strong><br>
                        • This code expires in 15 minutes<br>
                        • If you didn\'t request this, please ignore this email<br>
                        • Never share this code with anyone
                    </div>
                    
                    <p>Need help? Contact our support team at support@tickethub.com</p>
                </div>
                <div class="footer">
                    <p>© 2024 TicketHub. All rights reserved.</p>
                    <p>This is an automated email. Please do not reply.</p>
                </div>
            </div>
        </body>
        </html>
        ';
        
        // Plain text version
        $mail->AltBody = "Hi $firstName,\n\n"
                       . "Your password reset code is: $resetCode\n\n"
                       . "This code will expire in 15 minutes.\n\n"
                       . "If you didn't request this, please ignore this email.\n\n"
                       . "TicketHub Support Team";
        
        return $mail->send();
        
    } catch (Exception $e) {
        error_log("Email sending failed: " . $mail->ErrorInfo);
        return false;
    }
}

// Helper function to get base URL
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $script = dirname(dirname($_SERVER['SCRIPT_NAME']));
    return $protocol . "://" . $host . rtrim($script, '/');
}
?>
