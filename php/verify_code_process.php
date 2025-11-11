<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = trim($_POST['token']);
    $resetCode = trim($_POST['reset_code']);
    
    // Validation
    if (empty($token) || empty($resetCode)) {
        header('Location: ../pages/verify_reset_code.php?token=' . urlencode($token) . '&error=Please enter the reset code');
        exit();
    }
    
    if (strlen($resetCode) !== 6 || !ctype_digit($resetCode)) {
        header('Location: ../pages/verify_reset_code.php?token=' . urlencode($token) . '&error=Please enter a valid 6-digit code');
        exit();
    }
    
    try {
        // Verify token and code
        $stmt = $pdo->prepare("
            SELECT pr.*, u.email, u.first_name 
            FROM password_resets pr 
            JOIN users u ON pr.user_id = u.id 
            WHERE pr.reset_token = ? 
            AND pr.reset_code = ? 
            AND pr.is_used = 0 
        ");
        $stmt->execute([$token, $resetCode]);
        $resetData = $stmt->fetch();

        if (!$resetData) {
            header('Location: ../pages/verify_reset_code.php?token=' . urlencode($token) . '&error=Invalid code. Please try again.');
            exit();
        }

        // Manual expiry check
        $expires_at = strtotime($resetData['expires_at']);
        $current_time = time();
        if ($current_time > $expires_at) {
            header('Location: ../pages/forgot_password.php?error=Reset code has expired. Please request a new one.');
            exit();
        }
        
        // Code is valid, redirect to reset password page
        $_SESSION['reset_user_id'] = $resetData['user_id'];
        $_SESSION['reset_token'] = $token;
        $_SESSION['reset_verified'] = true;
        
        header('Location: ../pages/reset_password.php?token=' . urlencode($token));
        exit();
        
    } catch (PDOException $e) {
        error_log("Code verification error: " . $e->getMessage());
        header('Location: ../pages/verify_reset_code.php?token=' . urlencode($token) . '&error=An error occurred. Please try again.');
        exit();
    }
} else {
    header('Location: ../pages/forgot_password.php');
    exit();
}
?>