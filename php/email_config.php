<?php
/**
 * Email Configuration for TicketHub
 * Using PHPMailer for sending emails
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require '../pages/vendor/autoload.php'; 
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

// Create PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0; 
    $mail->isSMTP();
    
    // SMTP Configuration - CHANGE THESE VALUES
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tickethub.company@gmail.com'; // email address
    $mail->Password   = 'vuld jegy qzpq znbo'; // email password or app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; 
    
    // Sender information
    $mail->setFrom('noreply@tickethub.com', 'TicketHub Support');
    $mail->addReplyTo('support@tickethub.com', 'TicketHub Support');
    
    // Email format
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    
} catch (Exception $e) {
    error_log("PHPMailer configuration error: {$mail->ErrorInfo}");
}

?>