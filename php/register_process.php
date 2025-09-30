<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $terms = isset($_POST['terms']);
    $newsletter = isset($_POST['newsletter']);
    
    // Validation
    $errors = [];
    
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($password)) {
        $errors[] = "Please fill in all required fields";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address";
    }
    
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    }
    
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }
    
    if (!$terms) {
        $errors[] = "You must agree to the Terms & Conditions";
    }
    
    if (!empty($errors)) {
        header('Location: ../pages/register.php?error=' . urlencode(implode(', ', $errors)));
        exit();
    }
    
    try {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            header('Location: ../pages/register.php?error=Email already registered');
            exit();
        }
        
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user
        $stmt = $pdo->prepare("
            INSERT INTO users (first_name, last_name, email, phone, password, date_of_birth, gender) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$firstName, $lastName, $email, $phone, $hashedPassword, $dateOfBirth, $gender]);
        
        // Auto login after registration
        session_start();
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $firstName . ' ' . $lastName;
        $_SESSION['email'] = $email;
        
        header('Location: ../index.php?success=Registration successful! Welcome to TicketHub!');
        exit();
        
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate entry
            header('Location: ../pages/register.php?error=Email already registered');
        } else {
            header('Location: ../pages/register.php?error=An error occurred. Please try again.');
        }
        exit();
    }
} else {
    header('Location: ../pages/register.php');
    exit();
}
?>