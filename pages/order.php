<?php

  $con = new mysqli('localhost','root','','tickethub');
  if($con){
    echo "";
  }else{
    die(mysqli_error($con));
  }
  
  if($_SERVER['REQUEST_METHOD']==='POST'){
    $full_name      = $_POST['full_name'];
    $email_address  = $_POST['email_address'];
    $phone_number   = $_POST['phone_number'];
    $members        = $_POST['members'];
    $num_rooms      = $_POST['num_rooms']?? '';
    $d_date         = $_POST['d_date'];
    $r_date         = $_POST['r_date'];
    $num_nights    = $_POST['num_nights']?? '';
    $p_method       = $_POST['p_method'];
    $account_number = $_POST['account_number'];
    $account_name   = $_POST['account_name'];
    $cvv            = $_POST['cvv'];
    $total_price    = $_POST['total_price']?? '';

    // Generate booking reference
    $booking_reference = 'TOUR-' . strtoupper(uniqid());
    
    // Clean price value (remove "LKR" and commas)
    $clean_price = preg_replace('/[^0-9.]/', '', str_replace(',', '', $total_price));
    
    // Create additional booking details as JSON
    $booking_details = json_encode([
        'full_name' => $full_name,
        'email_address' => $email_address,
        'phone_number' => $phone_number,
        'num_rooms' => $num_rooms,
        'departure_date' => $d_date,
        'return_date' => $r_date,
        'num_nights' => $num_nights,
        'payment_method' => $p_method,
        'account_number' => $account_number,
        'account_name' => $account_name,
        'cvv' => $cvv
    ]);

    $sql = "INSERT INTO `bookings` (booking_type, booking_reference, booking_date, seats, total_price, selected_seats, status)
    VALUES ('tour', '$booking_reference', '$d_date', '$members', '$clean_price', '$booking_details', 'pending')";

    $result = mysqli_query($con,$sql);
    if($result){
      echo "";
    } else {
      die(mysqli_error($con));
    } 
  }

  $con->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Journey - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        overflow-x: hidden;
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 2rem 1rem;
    }

    .booking-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(147, 51, 234, 0.2);
        box-shadow: 0 10px 30px rgba(147, 51, 234, 0.15);
        width: 100%;
        max-width: 800px;
        padding: 2.5rem;
        position: relative;
    }

    .form-title {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        color: #6b46c1;
        margin-bottom: 2rem;
        position: relative;
    }

    .form-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #9333ea, #ec4899);
        border-radius: 2px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        color: #4b5563;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: #9333ea;
        width: 16px;
    }

    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.9);
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        color: #374151;
        padding: 12px 16px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .form-control:focus, .form-select:focus {
        background: #ffffff;
        border-color: #9333ea;
        box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.1);
        color: #374151;
        outline: none;
    }

    .form-control::placeholder {
        color: #9ca3af;
    }

    .form-select option {
        background: white;
        color: #374151;
    }

    .btn-container {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

    .btn-glow {
        background: linear-gradient(135deg, #9333ea, #7c3aed);
        border: none;
        border-radius: 12px;
        padding: 15px 30px;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(147, 51, 234, 0.3);
    }

    .btn-glow:hover {
        background: linear-gradient(135deg, #7c3aed, #6d28d9);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(147, 51, 234, 0.4);
        color: white;
    }

    .btn-reset {
        background: linear-gradient(135deg, #64748b, #475569);
        border: none;
        border-radius: 12px;
        padding: 15px 30px;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(100, 116, 139, 0.3);
    }

    .btn-reset:hover {
        background: linear-gradient(135deg, #475569, #334155);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
    }

    .total-display {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        border: 2px solid #e5e7eb;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        margin: 2rem 0;
        position: relative;
    }

    .total-label {
        color: #6b7280;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .total-amount {
        color: #059669;
        font-size: 1.5rem;
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .booking-card {
            margin: 1rem;
            padding: 2rem 1.5rem;
        }
        
        .form-title {
            font-size: 1.75rem;
        }
        
        .btn-container {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-glow, .btn-reset {
            width: 100%;
            max-width: 300px;
        }
    }

    /* Success message styling */
    .success-message {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        border: 2px solid #10b981;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 2rem;
        color: #065f46;
        text-align: center;
        font-weight: 600;
    }

    .success-message i {
        color: #10b981;
        font-size: 1.5rem;
        margin-right: 10px;
    }
</style>
<body>
    <div class="form-container">
        <div class="booking-card">
            <?php if($_SERVER['REQUEST_METHOD']==='POST' && $result): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    Your booking has been confirmed! We'll contact you soon with further details.
                </div>
            <?php endif; ?>
            
            <form class="row g-3" action="order.php" method="POST">
                <div class="col-12">
                    <h2 class="form-title">
                        Fill this Form
                    </h2>
                </div>

                <div class="col-12 form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i>
                        Full Name
                    </label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" name="full_name" required>
                </div>

                <div class="col-12 form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email Address
                    </label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email_address">
                </div>

                <div class="col-md-3 form-group">
                    <label for="phone-number" class="form-label">
                        <i class="fas fa-phone"></i>
                        Phone Number
                    </label>
                    <input type="text" class="form-control" id="phone-number" placeholder="Enter Your Phone Number" name="phone_number" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="members" class="form-label">
                        <i class="fas fa-users"></i>
                        Number of Members
                    </label>
                    <input type="number" min="1" max="20" class="form-control" id="members" oninput="calculateTotal()" name="members" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="num_rooms" class="form-label">
                        <i class="fas fa-bed"></i>
                        Number of Rooms (1 Room for 4 members)
                    </label>
                    <input type="number" min="1" max="5" class="form-control" id="num_rooms" oninput="calculateTotal()" name="num_rooms" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="d_date" class="form-label">
                        <i class="fas fa-calendar-alt"></i>
                        Departure Date
                    </label>
                    <input type="date" class="form-control" id="d_date" name="d_date" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="r_date" class="form-label">
                        <i class="fas fa-calendar-check"></i>
                        Return Date
                    </label>
                    <input type="date" class="form-control" id="r_date" name="r_date" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="nights" class="form-label">
                        <i class="fas fa-moon"></i>
                        Number of Nights
                    </label>
                    <input type="number" min="1" max="30" class="form-control" id="nights" name="num_nights" oninput="calculateTotal()" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="p_method" class="form-label">
                        <i class="fas fa-credit-card"></i>
                        Payment Method
                    </label>
                    <select id="p_method" class="form-select" name="p_method" required>
                        <option value="" selected>Choose Your Payment Method</option>
                        <option value="card">Debit Card</option>
                        <option value="card">Credit Card</option>
                    </select>
                </div>

                <div class="col-12 form-group">
                    <label for="account_number" class="form-label">
                        <i class="fas fa-hashtag"></i>
                        Account Number
                    </label>
                    <input type="text" class="form-control" id="account_number" placeholder="Please Enter Your Account Number" name="account_number" required>
                </div>

                <div class="col-md-9 form-group">
                    <label for="account_name" class="form-label">
                        <i class="fas fa-user-tag"></i>
                        Account Holder Name
                    </label>
                    <input type="text" class="form-control" id="account_name" placeholder="Please Enter Account Holder Name" name="account_name" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="cvv" class="form-label">
                        <i class="fas fa-lock"></i>
                        CVV
                    </label>
                    <input type="text" class="form-control" id="cvv" placeholder="CVV" name="cvv" required>
                </div>

                <div class="col-12">
                    <label class="form-label">
                        <i class="fas fa-calculator me-2"></i>
                        Total Amount (LKR)
                    </label>
                    <input type="text" id="total" class="form-control" readonly name="total_price">
                </div>

                <div class="col-12">
                    <div class="btn-container">
                        <button type="submit" class="btn-glow">Pay Now</button>
                        <button type="reset" class="btn-reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const member_price = 1000;
        const room_price = 3500;

        function calculateTotal() {
            let members = parseInt(document.getElementById("members").value) || 0;
            let rooms = parseInt(document.getElementById("num_rooms").value) || 0;
            let nights = parseInt(document.getElementById("nights").value) || 0;

            let total = [(members * member_price) + (rooms * room_price)] * nights;

            document.getElementById("total").value = total.toLocaleString() + " LKR";
        }

        calculateTotal();
    </script>
</body>
</html>