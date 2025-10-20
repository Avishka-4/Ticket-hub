<?php
session_start();
require_once '../php/config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$userId = $_SESSION['user_id'];
$error = '';
$success = '';

try {
    // Get user information
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
    
    if (!$user) {
        header('Location: login.php');
        exit();
    }
    
    // Get user bookings count
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM bookings WHERE user_id = ?");
    $stmt->execute([$userId]);
    $bookingsCount = $stmt->fetch()['total'];
    
    // Get total spent
    $stmt = $pdo->prepare("SELECT SUM(total_price) as total_spent FROM bookings WHERE user_id = ? AND status = 'confirmed'");
    $stmt->execute([$userId]);
    $totalSpent = $stmt->fetch()['total_spent'] ?? 0;
    
    // Handle profile update
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $phone = trim($_POST['phone']);
        $dateOfBirth = $_POST['dateOfBirth'];
        $gender = $_POST['gender'];
        
        if (empty($firstName) || empty($lastName)) {
            $error = "First name and last name are required";
        } else {
            $stmt = $pdo->prepare("
                UPDATE users SET 
                first_name = ?, 
                last_name = ?, 
                phone = ?, 
                date_of_birth = ?, 
                gender = ?,
                updated_at = NOW()
                WHERE id = ?
            ");
            
            if ($stmt->execute([$firstName, $lastName, $phone, $dateOfBirth, $gender, $userId])) {
                $_SESSION['username'] = $firstName . ' ' . $lastName;
                $success = "Profile updated successfully!";
                // Refresh user data
                $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->execute([$userId]);
                $user = $stmt->fetch();
            } else {
                $error = "Failed to update profile";
            }
        }
    }
    
    // Handle password change
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        
        if (!password_verify($currentPassword, $user['password'])) {
            $error = "Current password is incorrect";
        } elseif (strlen($newPassword) < 6) {
            $error = "New password must be at least 6 characters";
        } elseif ($newPassword !== $confirmPassword) {
            $error = "Passwords do not match";
        } else {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            
            if ($stmt->execute([$hashedPassword, $userId])) {
                $success = "Password changed successfully!";
            } else {
                $error = "Failed to change password";
            }
        }
    }
    
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-gray-50">
    <?php include '../includes/navbar.php'; ?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8">
                <div class="d-flex align-items-center">
                    <div class="me-4">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; font-size: 40px;">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div>
                        <h1 class="h2 mb-1"><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h1>
                        <p class="text-muted mb-0">
                            <i class="fas fa-envelope me-2"></i><?php echo htmlspecialchars($user['email']); ?>
                        </p>
                        <p class="text-muted">
                            <i class="fas fa-calendar me-2"></i>Member since <?php echo date('F Y', strtotime($user['created_at'])); ?>
                        </p>
                    </div>
                </div>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <?php echo htmlspecialchars($error); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo htmlspecialchars($success); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Stats Row -->
            <div class="row mb-8">
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fas fa-ticket-alt text-primary fa-2x mb-3"></i>
                            <h3 class="h5 card-title"><?php echo $bookingsCount; ?></h3>
                            <p class="text-muted mb-0">Total Bookings</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fas fa-dollar-sign text-success fa-2x mb-3"></i>
                            <h3 class="h5 card-title">$<?php echo number_format($totalSpent, 2); ?></h3>
                            <p class="text-muted mb-0">Total Spent</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fas fa-star text-warning fa-2x mb-3"></i>
                            <h3 class="h5 card-title">Gold</h3>
                            <p class="text-muted mb-0">Member Status</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fas fa-gift text-info fa-2x mb-3"></i>
                            <h3 class="h5 card-title">150 pts</h3>
                            <p class="text-muted mb-0">Reward Points</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button">
                        <i class="fas fa-user-circle me-2"></i>Profile Information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="bookings-tab" data-bs-toggle="tab" data-bs-target="#bookings" type="button">
                        <i class="fas fa-history me-2"></i>My Bookings
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button">
                        <i class="fas fa-lock me-2"></i>Security
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="preferences-tab" data-bs-toggle="tab" data-bs-target="#preferences" type="button">
                        <i class="fas fa-cog me-2"></i>Preferences
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="profileTabContent">
                
                <!-- Profile Information Tab -->
                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Profile Information</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstName" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastName" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Email Address (Read-only)</label>
                                    <input type="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                                    <small class="text-muted">Contact support to change email</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="dateOfBirth" value="<?php echo $user['date_of_birth'] ?? ''; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male" <?php echo $user['gender'] == 'male' ? 'selected' : ''; ?>>Male</option>
                                            <option value="female" <?php echo $user['gender'] == 'female' ? 'selected' : ''; ?>>Female</option>
                                            <option value="other" <?php echo $user['gender'] == 'other' ? 'selected' : ''; ?>>Other</option>
                                            <option value="prefer_not_to_say" <?php echo $user['gender'] == 'prefer_not_to_say' ? 'selected' : ''; ?>>Prefer not to say</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <button type="submit" name="update_profile" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Changes
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary">
                                        <i class="fas fa-undo me-2"></i>Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Bookings Tab -->
                <div class="tab-pane fade" id="bookings" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-ticket-alt me-2"></i>My Bookings</h5>
                        </div>
                        <div class="card-body">
                            <a href="bookings.php" class="btn btn-primary mb-3">
                                <i class="fas fa-eye me-2"></i>View All Bookings
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>TB-001</td>
                                            <td><span class="badge bg-info">Movie</span></td>
                                            <td>Dec 15, 2024</td>
                                            <td>$35.00</td>
                                            <td><span class="badge bg-success">Confirmed</span></td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>TB-002</td>
                                            <td><span class="badge bg-success">Event</span></td>
                                            <td>Jan 20, 2025</td>
                                            <td>$89.99</td>
                                            <td><span class="badge bg-success">Confirmed</span></td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Tab -->
                <div class="tab-pane fade" id="security" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-key me-2"></i>Change Password</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Current Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="currentPassword" id="currentPassword" required>
                                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('currentPassword')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('newPassword')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <small class="text-muted">Minimum 6 characters</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <button type="submit" name="change_password" class="btn btn-primary">
                                            <i class="fas fa-lock me-2"></i>Change Password
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-shield-alt me-2"></i>Security Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">Two-Factor Authentication</h6>
                                                <small class="text-muted">Add extra security to your account</small>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm">Enable</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">Active Sessions</h6>
                                                <small class="text-muted">Manage your active login sessions</small>
                                            </div>
                                            <button class="btn btn-outline-warning btn-sm">View</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">Login History</h6>
                                                <small class="text-muted">See your recent login activity</small>
                                            </div>
                                            <button class="btn btn-outline-info btn-sm">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preferences Tab -->
                <div class="tab-pane fade" id="preferences" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-bell me-2"></i>Notification Preferences</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    <label class="form-check-label" for="emailNotifications">
                                        <strong>Email Notifications</strong>
                                        <small class="d-block text-muted">Receive booking confirmations and updates via email</small>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="promotions" checked>
                                    <label class="form-check-label" for="promotions">
                                        <strong>Promotional Emails</strong>
                                        <small class="d-block text-muted">Receive special offers and discounts</small>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="smsNotifications">
                                    <label class="form-check-label" for="smsNotifications">
                                        <strong>SMS Notifications</strong>
                                        <small class="d-block text-muted">Get important updates via SMS</small>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="reminderEmails" checked>
                                    <label class="form-check-label" for="reminderEmails">
                                        <strong>Event Reminders</strong>
                                        <small class="d-block text-muted">Receive reminders before your booked events</small>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Preferences
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Danger Zone -->
            <div class="card shadow-sm border-danger mt-8">
                <div class="card-header bg-danger">
                    <h5 class="mb-0 text-white"><i class="fas fa-exclamation-triangle me-2"></i>Danger Zone</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Download Your Data</h6>
                            <p class="text-muted small">Download a copy of your personal data in a portable format</p>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-download me-1"></i>Download Data
                            </button>
                        </div>
                        <div class="col-md-6">
                            <h6>Delete Account</h6>
                            <p class="text-muted small">Permanently delete your account and all associated data</p>
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fas fa-trash me-1"></i>Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Delete Account</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Are you sure you want to delete your account?</strong></p>
                    <p class="text-muted">This action cannot be undone. All your data, bookings, and account information will be permanently deleted.</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-info-circle me-2"></i>
                        Please type your email address to confirm deletion
                    </div>
                    <input type="email" class="form-control" placeholder="Confirm your email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete Account</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.type === 'password' ? 'text' : 'password';
            field.type = type;
        }
    </script>
</body>
</html>