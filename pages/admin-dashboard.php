<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-login.php');
    exit();
}

require_once '../php/config.php';

// Get user statistics
// Initialize variables with default values
$totalUsers = 0;
$activeUsers = 0;
$newUsers = 0;
$recentActivity = array();

try {
    // Total users
    $stmt = $pdo->query("SELECT COUNT(*) as total_users FROM users");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalUsers = $result ? intval($result['total_users']) : 0;
    
    // Active users (logged in within last 24 hours)
    $stmt = $pdo->query("SELECT COUNT(*) as active_users FROM users WHERE last_login >= NOW() - INTERVAL 24 HOUR");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $activeUsers = $result ? intval($result['active_users']) : 0;
    
    // New users this month
    $stmt = $pdo->query("SELECT COUNT(*) as new_users FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $newUsers = $result ? intval($result['new_users']) : 0;
    
    // Recent user activity (last 10 logins)
    $stmt = $pdo->query("
        SELECT u.username, u.email, u.last_login, u.created_at, 
               COALESCE((SELECT COUNT(*) FROM bookings WHERE user_id = u.id), 0) as total_bookings
        FROM users u
        WHERE u.username IS NOT NULL 
        ORDER BY u.last_login DESC 
        LIMIT 10
    ");
    $recentActivity = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}

$success = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <!-- Simple Admin Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-shield-alt me-2"></i>TicketHub Admin
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="../php/admin_logout.php">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="container py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <?php if ($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?php echo htmlspecialchars($success); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div id="content-area">
                    <!-- User Statistics Cards -->
                    <div class="row g-4 mb-4">
                        <!-- Total Users Card -->
                        <div class="col-md-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="text-white-50">Total Users</h6>
                                            <h2 class="mb-0"><?php echo number_format($totalUsers); ?></h2>
                                        </div>
                                        <div class="bg-white rounded-circle p-3">
                                            <i class="fas fa-users fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Active Users Card -->
                        <div class="col-md-4">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="text-white-50">Active Users (24h)</h6>
                                            <h2 class="mb-0"><?php echo number_format($activeUsers); ?></h2>
                                        </div>
                                        <div class="bg-white rounded-circle p-3">
                                            <i class="fas fa-user-clock fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- New Users Card -->
                        <div class="col-md-4">
                            <div class="card bg-info text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="text-white-50">New Users This Month</h6>
                                            <h2 class="mb-0"><?php echo number_format($newUsers); ?></h2>
                                        </div>
                                        <div class="bg-white rounded-circle p-3">
                                            <i class="fas fa-user-plus fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent User Activity -->
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-history me-2 text-primary"></i>Recent User Activity
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Total Bookings</th>
                                            <th>Last Login</th>
                                            <th>Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recentActivity as $user): ?>
                                        <tr>
                                            <td>
                                                <i class="fas fa-user-circle me-2 text-muted"></i>
                                                <?php echo htmlspecialchars($user['username']); ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                                            <td>
                                                <span class="badge bg-primary">
                                                    <?php echo number_format($user['total_bookings']); ?> bookings
                                                </span>
                                            </td>
                                            <td>
                                                <i class="fas fa-clock me-1 text-muted"></i>
                                                <?php echo $user['last_login'] ? date('M d, Y H:i', strtotime($user['last_login'])) : 'Never'; ?>
                                            </td>
                                            <td>
                                                <i class="fas fa-calendar me-1 text-muted"></i>
                                                <?php echo date('M d, Y', strtotime($user['created_at'])); ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>