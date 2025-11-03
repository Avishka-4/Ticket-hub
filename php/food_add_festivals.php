<?php
session_start();
require_once 'config.php';

// Check if the user is an admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../pages/admin-login.php');
    exit();
}

// Handle file upload
$uploadDir = '../assets/images/festivals/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$imageUrl = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tempName = $_FILES['image']['tmp_name'];
    $fileName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;
    
    if (move_uploaded_file($tempName, $targetPath)) {
        $imageUrl = 'assets/images/festivals/' . $fileName;
    }
}

// Insert festival data into database
try {
    $stmt = $pdo->prepare("
        INSERT INTO food_items (
            title, place, date, time, description, 
            location, entrance_fee, menu_highlights, image_url
        ) VALUES (
            ?, ?, ?, ?, ?, 
            ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $_POST['title'],
        $_POST['place'],
        $_POST['date'],
        $_POST['time'],
        $_POST['description'],
        $_POST['location'],
        $_POST['entrance_fee'],
        $_POST['menu_highlights'],
        $imageUrl
    ]);

    // Redirect back with success message
    header('Location: ../pages/food.php?success=Festival added successfully');
    exit();
} catch (PDOException $e) {
    // Redirect back with error message
    header('Location: ../pages/food.php?error=' . urlencode('Error adding festival: ' . $e->getMessage()));
    exit();
}
?>