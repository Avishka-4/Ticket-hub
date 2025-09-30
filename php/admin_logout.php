<?php
session_start();

// Clear admin session
unset($_SESSION['admin_id']);
unset($_SESSION['admin_username']);
unset($_SESSION['admin_login_time']);
unset($_SESSION['is_admin']);

// Clear remember me cookie
if (isset($_COOKIE['admin_remember_token'])) {
    setcookie('admin_remember_token', '', time() - 3600, '/', '', true, true);
}

// Destroy session
session_destroy();

// Redirect to admin login
header('Location: ../pages/admin-login.php?success=You have been logged out successfully');
exit();
?>