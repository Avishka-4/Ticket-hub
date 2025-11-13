<?php
require_once 'config.php';
require_once 'email_config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = trim($_POST['token']);
    
    if (empty($token)) {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit();
    }
    
    try {
        // Get reset data
        $stmt = $pdo->prepare("
            SELECT pr.*, u.email, u.first_name 
            FROM password_resets pr 
            JOIN users u ON pr.user_id = u.id 
            WHERE pr.reset_token = ? AND pr.is_used = 0
        ");
        $stmt->execute([$token]);
        $resetData = $stmt->fetch();
        
        if (!$resetData) {
            echo json_encode(['success' => false, 'message' => 'Invalid or expired reset request']);
            exit();
        }
        
        // Check if last resend was less than 1 minute ago (rate limiting)
        $lastResend = strtotime($resetData['created_at']);
        if (time() - $lastResend < 60) {
            echo json_encode(['success' => false, 'message' => 'Please wait before requesting another code']);
            exit();
        }
        
        // Generate new code
        $newResetCode = sprintf("%06d", mt_rand(0, 999999));
        $expiryTime = date('Y-m-d H:i:s', strtotime('+15 minutes'));
        
        // Update database
        $stmt = $pdo->prepare("
            UPDATE password_resets 
            SET reset_code = ?, expires_at = ?, created_at = NOW() 
            WHERE reset_token = ?
        ");
        $stmt->execute([$newResetCode, $expiryTime, $token]);
        
        // Send new email
        $emailSent = sendResetEmail($resetData['email'], $resetData['first_name'], $newResetCode, $token);
        
        if ($emailSent) {
            echo json_encode(['success' => true, 'message' => 'New code sent successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to send email']);
        }
        
    } catch (PDOException $e) {
        error_log("Resend code error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'An error occurred']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

function sendResetEmail($to, $firstName, $resetCode, $resetToken) {
    global $mail;
    
    try {
        $mail->clearAddresses();
        $mail->addAddress($to, $firstName);
        
        $mail->Subject = 'New Password Reset Code - TicketHub';
        
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
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>🔄 New Reset Code</h1>
                </div>
                <div class="content">
                    <p>Hi ' . htmlspecialchars($firstName) . ',</p>
                    <p>You requested a new password reset code. Here is your new 6-digit code:</p>
                    
                    <div class="code-box">
                        <p style="margin: 0; font-size: 14px; color: #6b7280;">Your New Reset Code</p>
                        <div class="code">' . $resetCode . '</div>
                        <p style="margin: 10px 0 0 0; font-size: 12px; color: #6b7280;">Valid for 15 minutes</p>
                    </div>
                    
                    <p>Or click the button below:</p>
                    <div style="text-align: center;">
                        <a href="' . getBaseUrl() . '/pages/verify_reset_code.php?token=' . $resetToken . '" class="button">Verify Code</a>
                    </div>
                </div>
                <div class="footer">
                    <p>© 2024 TicketHub. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ';
        
        $mail->AltBody = "Hi $firstName,\n\nYour new password reset code is: $resetCode\n\nThis code will expire in 15 minutes.\n\nTicketHub Support Team";
        
        return $mail->send();
        
    } catch (Exception $e) {
        error_log("Email sending failed: " . $mail->ErrorInfo);
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
