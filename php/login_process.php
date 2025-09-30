<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    
    if (empty($email) || empty($password)) {
        header('Location: ../pages/login.php?error=Please fill in all fields');
        exit();
    }
    
    try {
        $stmt = $pdo->prepare("SELECT id, first_name, last_name, email, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['email'] = $user['email'];
            
            if ($remember) {
                // Set remember me cookie for 30 days
                $token = bin2hex(random_bytes(32));
                setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/');
                
                // Store token in database (you would need to create a remember_tokens table)
                // For demo purposes, we'll skip this implementation
            }
            
            header('Location: ../index.php?success=Welcome back!');
            exit();
        } else {
            header('Location: ../pages/login.php?error=Invalid email or password');
            exit();
        }
    } catch (PDOException $e) {
        header('Location: ../pages/login.php?error=An error occurred. Please try again.');
        exit();
    }
} else {
    header('Location: ../pages/login.php');
    exit();
}
?>