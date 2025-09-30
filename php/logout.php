<?php
session_start();

// Clear user session
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['email']);

// Destroy session
session_destroy();

// Redirect to login page
header('Location: ../pages/login.php?success=You have been logged out successfully');
exit();
?>