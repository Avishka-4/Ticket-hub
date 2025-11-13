<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$userId = $_SESSION['user_id'];

try {
    // Get user bookings with related item details
    $stmt = $pdo->prepare("
        SELECT b.*, 
               CASE 
                   WHEN b.booking_type = 'event' THEN e.title
                   WHEN b.booking_type = 'movie' THEN m.title
                   WHEN b.booking_type = 'sport' THEN s.title
                   WHEN b.booking_type = 'leisure' THEN l.title
                   WHEN b.booking_type = 'food' THEN f.name
                   WHEN b.booking_type = 'tour' THEN t.title
               END as item_name,
               CASE 
                   WHEN b.booking_type = 'event' THEN e.image
                   WHEN b.booking_type = 'movie' THEN m.image
                   WHEN b.booking_type = 'sport' THEN s.image
                   WHEN b.booking_type = 'leisure' THEN l.image
                   WHEN b.booking_type = 'food' THEN f.image
                   WHEN b.booking_type = 'tour' THEN t.image
               END as item_image
        FROM bookings b
        LEFT JOIN events e ON b.booking_type = 'event' AND b.item_id = e.id
        LEFT JOIN movies m ON b.booking_type = 'movie' AND b.item_id = m.id
        LEFT JOIN sports_events s ON b.booking_type = 'sport' AND b.item_id = s.id
        LEFT JOIN leisure_activities l ON b.booking_type = 'leisure' AND b.item_id = l.id
        LEFT JOIN food_items f ON b.booking_type = 'food' AND b.item_id = f.id
        LEFT JOIN tours t ON b.booking_type = 'tour' AND b.item_id = t.id
        WHERE b.user_id = ?
        ORDER BY b.created_at DESC
    ");
    $stmt->execute([$userId]);
    $bookings = $stmt->fetchAll();
    
} catch (PDOException $e) {
    $error = "Error fetching bookings: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-gray-50">
    <?php include '../includes/navbar.php'; ?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">My Bookings</h1>
                <p class="text-gray-600">Manage and view your ticket bookings</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <?php if (empty($bookings)): ?>
                <div class="text-center py-12">
                    <i class="fas fa-ticket-alt text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Bookings Yet</h3>
                    <p class="text-gray-500 mb-6">You haven't made any bookings yet. Start exploring!</p>
                    <a href="../index.php" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>Browse Events
                    </a>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($bookings as $booking): ?>
                        <div class="col-lg-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div>
                                            <h5 class="card-title mb-1"><?php echo htmlspecialchars($booking['item_name'] ?? 'Unknown Item'); ?></h5>
                                            <span class="badge bg-<?php echo $booking['status'] == 'confirmed' ? 'success' : ($booking['status'] == 'pending' ? 'warning' : 'danger'); ?>">
                                                <?php echo ucfirst($booking['status']); ?>
                                            </span>
                                        </div>
                                        <span class="badge bg-primary"><?php echo ucfirst($booking['booking_type']); ?></span>
                                    </div>
                                    
                                    <div class="booking-details">
                                        <p class="mb-2">
                                            <i class="fas fa-hashtag text-muted me-2"></i>
                                            <strong>Booking ID:</strong> <?php echo htmlspecialchars($booking['booking_reference']); ?>
                                        </p>
                                        
                                        <p class="mb-2">
                                            <i class="fas fa-calendar text-muted me-2"></i>
                                            <strong>Date:</strong> <?php echo date('M d, Y', strtotime($booking['booking_date'])); ?>
                                        </p>
                                        
                                        <?php if ($booking['booking_time']): ?>
                                            <p class="mb-2">
                                                <i class="fas fa-clock text-muted me-2"></i>
                                                <strong>Time:</strong> <?php echo date('g:i A', strtotime($booking['booking_time'])); ?>
                                            </p>
                                        <?php endif; ?>
                                        
                                        <p class="mb-2">
                                            <i class="fas fa-users text-muted me-2"></i>
                                            <strong>Seats:</strong> <?php echo $booking['seats']; ?>
                                        </p>
                                        
                                        <?php if ($booking['selected_seats']): ?>
                                            <?php $selectedSeats = json_decode($booking['selected_seats'], true); ?>
                                            <p class="mb-2">
                                                <i class="fas fa-chair text-muted me-2"></i>
                                                <strong>Selected Seats:</strong> <?php echo implode(', ', $selectedSeats); ?>
                                            </p>
                                        <?php endif; ?>
                                        
                                        <p class="mb-3">
                                            <i class="fas fa-dollar-sign text-muted me-2"></i>
                                            <strong>Total:</strong> <span class="text-success fw-bold">$<?php echo number_format($booking['total_price'], 2); ?></span>
                                        </p>
                                        
                                        <small class="text-muted">
                                            <i class="fas fa-calendar-plus me-1"></i>
                                            Booked on <?php echo date('M d, Y g:i A', strtotime($booking['created_at'])); ?>
                                        </small>
                                    </div>
                                    
                                    <div class="mt-3 d-flex gap-2">
                                        <button class="btn btn-outline-primary btn-sm" onclick="viewBookingDetails('<?php echo $booking['booking_reference']; ?>')">
                                            <i class="fas fa-eye me-1"></i>View Details
                                        </button>
                                        
                                        <?php if ($booking['status'] == 'confirmed' && strtotime($booking['booking_date']) > time()): ?>
                                            <button class="btn btn-outline-danger btn-sm" onclick="cancelBooking('<?php echo $booking['booking_reference']; ?>')">
                                                <i class="fas fa-times me-1"></i>Cancel
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php include '../includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewBookingDetails(bookingRef) {
            // Implement booking details modal
            alert('Booking details for: ' + bookingRef);
        }
        
        function cancelBooking(bookingRef) {
            if (confirm('Are you sure you want to cancel this booking?')) {
                // Implement booking cancellation
                alert('Booking cancellation for: ' + bookingRef);
            }
        }
    </script>
</body>
</html>