<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verify session
    if (!isset($_SESSION['reset_verified']) || !isset($_SESSION['reset_user_id'])) {
        header('Location: ../pages/forgot_password.php?error=Invalid session. Please start over.');
        exit();
    }
    
    $token = trim($_POST['token']);
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    $userId = $_SESSION['reset_user_id'];
    
    // Validation
    if (empty($newPassword) || empty($confirmPassword)) {
        header('Location: ../pages/reset_password.php?token=' . urlencode($token) . '&error=Please fill in all fields');
        exit();
    }
    
    if (strlen($newPassword) < 6) {
        header('Location: ../pages/reset_password.php?token=' . urlencode($token) . '&error=Password must be at least 6 characters long');
        exit();
    }
    
    if ($newPassword !== $confirmPassword) {
        header('Location: ../pages/reset_password.php?token=' . urlencode($token) . '&error=Passwords do not match');
        exit();
    }
    
    try {
        // Verify token is still valid
        $stmt = $pdo->prepare("
        SELECT * FROM password_resets 
        WHERE reset_token = ? 
        AND user_id = ? 
        AND is_used = 0
        ");
        $stmt->execute([$token, $userId]);
        $resetData = $stmt->fetch();

        if (!$resetData) {
            session_destroy();
            header('Location: ../pages/forgot_password.php?error=Reset token has expired. Please request a new one.');
            exit();
        }

        // Manual expiry check
        $expires_at = strtotime($resetData['expires_at']);
        $current_time = time();
        if ($current_time > $expires_at) {
            session_destroy();
            header('Location: ../pages/forgot_password.php?error=Reset token has expired. Please request a new one.');
            exit();
        }
        
        // Update password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ?, updated_at = NOW() WHERE id = ?");
        $stmt->execute([$hashedPassword, $userId]);
        
        // Mark reset token as used
        $stmt = $pdo->prepare("UPDATE password_resets SET is_used = 1 WHERE reset_token = ?");
        $stmt->execute([$token]);
        
        // Get user info for email notification
        $stmt = $pdo->prepare("SELECT email, first_name FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();
        
        // Send confirmation email
        sendPasswordChangedEmail($user['email'], $user['first_name']);
        
        // Clear session
        unset($_SESSION['reset_verified']);
        unset($_SESSION['reset_user_id']);
        unset($_SESSION['reset_token']);
        
        // Redirect to login with success message
        header('Location: ../pages/login.php?success=Password reset successfully! You can now login with your new password.');
        exit();
        
    } catch (PDOException $e) {
        error_log("Password reset error: " . $e->getMessage());
        header('Location: ../pages/reset_password.php?token=' . urlencode($token) . '&error=An error occurred. Please try again.');
        exit();
    }
} else {
    header('Location: ../pages/forgot_password.php');
    exit();
}

// Function to send password changed confirmation email
function sendPasswordChangedEmail($to, $firstName) {
    require_once 'email_config.php';
    
    try {
        $mail->clearAddresses();
        $mail->addAddress($to, $firstName);
        
        $mail->Subject = 'Password Changed Successfully - TicketHub';
        
        $mail->Body = '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { background: #f9fafb; padding: 30px; border-radius: 0 0 10px 10px; }
                .success-icon { font-size: 48px; margin-bottom: 20px; }
                .info-box { background: white; border-left: 4px solid #10b981; padding: 15px; margin: 20px 0; border-radius: 4px; }
                .button { display: inline-block; background: #6366f1; color: white; padding: 12px 30px; text-decoration: none; border-radius: 8px; margin: 20px 0; }
                .footer { text-align: center; color: #6b7280; font-size: 12px; margin-top: 20px; }
                .warning { background: #fef3c7; border-left: 4px solid #f59e0b; padding: 15px; margin: 20px 0; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <div class="success-icon">✅</div>
                    <h1>Password Changed Successfully</h1>
                </div>
                <div class="content">
                    <p>Hi ' . htmlspecialchars($firstName) . ',</p>
                    <p>This is a confirmation that your TicketHub account password has been successfully changed.</p>
                    
                    <div class="info-box">
                        <strong>Account Security Information:</strong><br>
                        • Password changed on: ' . date('F j, Y \a\t g:i A') . '<br>
                        • IP Address: ' . $_SERVER['REMOTE_ADDR'] . '<br>
                        • Device: ' . $_SERVER['HTTP_USER_AGENT'] . '
                    </div>
                    
                    <div class="warning">
                        <strong>⚠️ Didn\'t make this change?</strong><br>
                        If you did not request this password change, please contact our support team immediately at support@tickethub.com or reset your password again.
                    </div>
                    
                    <p>You can now login to your account using your new password.</p>
                    
                    <div style="text-align: center;">
                        <a href="' . getBaseUrl() . '/pages/login.php" class="button">Login to Your Account</a>
                    </div>
                    
                    <p>Thank you for keeping your account secure!</p>
                </div>
                <div class="footer">
                    <p>© 2024 TicketHub. All rights reserved.</p>
                    <p>This is an automated email. Please do not reply.</p>
                </div>
            </div>
        </body>
        </html>
        ';
        
        $mail->AltBody = "Hi $firstName,\n\n"
                       . "Your TicketHub account password has been successfully changed.\n\n"
                       . "Changed on: " . date('F j, Y \a\t g:i A') . "\n\n"
                       . "If you didn't make this change, please contact support immediately.\n\n"
                       . "TicketHub Support Team";
        
        return $mail->send();
        
    } catch (Exception $e) {
        error_log("Password change notification email failed: " . $e->getMessage());
        return false;
    }
}

function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $script = dirname(dirname($_SERVER['SCRIPT_NAME']));
    return $protocol . "://" . $host . rtrim($script, '/');
}
?>
