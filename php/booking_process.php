<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'Please login to make a booking']);
        exit();
    }
    
    $userId = $_SESSION['user_id'];
    $bookingType = $input['type'];
    $itemId = $input['item_id'];
    $date = $input['date'];
    $time = $input['time'];
    $seats = $input['seats'] ?? 1;
    $totalPrice = $input['total_price'];
    $selectedSeats = isset($input['selected_seats']) ? json_encode($input['selected_seats']) : null;
    
    try {
        // Generate booking reference
        $bookingReference = 'TB' . strtoupper(substr($bookingType, 0, 2)) . date('Ymd') . rand(1000, 9999);
        
        // Insert booking
        $stmt = $pdo->prepare("
            INSERT INTO bookings (user_id, booking_type, item_id, booking_reference, booking_date, booking_time, 
                                seats, total_price, selected_seats, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'confirmed')
        ");
        
        $result = $stmt->execute([
            $userId, $bookingType, $itemId, $bookingReference, $date, $time, 
            $seats, $totalPrice, $selectedSeats
        ]);
        
        if ($result) {
            echo json_encode([
                'success' => true, 
                'message' => 'Booking confirmed successfully!',
                'booking_reference' => $bookingReference
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to create booking']);
        }
        
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
    
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>