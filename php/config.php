<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$host = 'localhost';
$dbname = 'tickethub';
$username = 'root';
$password = '1234';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // Test the connection with a simple query
    $test = $pdo->query("SELECT 1");
} catch(PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    $error = "Failed to connect to database. Please contact administrator.";
    // Don't expose database credentials in production
    if ($_SERVER['SERVER_NAME'] === 'localhost') {
        $error .= " Error: " . $e->getMessage();
    }
    die($error);
}
?>