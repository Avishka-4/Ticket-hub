<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    
    // Validation
    if (empty($username) || empty($password)) {
        header('Location: ../pages/admin-login.php?error=Please fill in all fields');
        exit();
    }
    
    try {
        // Check admin credentials (you should create an admins table)
        // For demo purposes, using hardcoded credentials
        $validAdmins = [
            'admin' => password_hash('admin123', PASSWORD_DEFAULT),
            'superadmin' => password_hash('super123', PASSWORD_DEFAULT),
            'manager' => password_hash('manager123', PASSWORD_DEFAULT)
        ];
        
        if (array_key_exists($username, $validAdmins)) {
            // Verify password
            if (password_verify($password, $validAdmins[$username])) {
                // Start admin session
                session_start();
                $_SESSION['admin_id'] = $username;
                $_SESSION['admin_username'] = $username;
                $_SESSION['admin_login_time'] = time();
                $_SESSION['is_admin'] = true;
                
                // Set remember me cookie if requested
                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    setcookie('admin_remember_token', $token, time() + (30 * 24 * 60 * 60), '/', '', true, true);
                    // You should store this token in database for security
                }
                
                header('Location: ../pages/admin-dashboard.php?success=Welcome back, Administrator!');
                exit();
            } else {
                header('Location: ../pages/admin-login.php?error=Invalid username or password');
                exit();
            }
        } else {
            header('Location: ../pages/admin-login.php?error=Invalid username or password');
            exit();
        }
        
    } catch (Exception $e) {
        header('Location: ../pages/admin-login.php?error=An error occurred. Please try again.');
        exit();
    }
} else {
    header('Location: ../pages/admin-login.php');
    exit();
}
?>