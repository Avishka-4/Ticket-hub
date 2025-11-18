<?php

  $con = new mysqli('localhost','root','1234','tickethub');
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
        background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c, #4facfe, #00f2fe);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        min-height: 100vh;
        overflow-x: hidden;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .floating-particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) translateX(0px);
            opacity: 0.3;
        }
        50% {
            transform: translateY(-20px) translateX(10px);
            opacity: 1;
        }
    }

    .form-container {
        position: relative;
        z-index: 10;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 2rem 1rem;
    }

    .booking-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        border: 2px solid rgba(147, 51, 234, 0.3);
        box-shadow: 
            0 20px 40px rgba(147, 51, 234, 0.3),
            0 0 80px rgba(147, 51, 234, 0.2),
            inset 0 0 100px rgba(255, 255, 255, 0.1);
        width: 100%;
        max-width: 800px;
        padding: 3rem;
        position: relative;
        overflow: hidden;
        animation: cardGlow 3s ease-in-out infinite alternate;
    }

    @keyframes cardGlow {
        0% {
            box-shadow: 
                0 20px 40px rgba(147, 51, 234, 0.3),
                0 0 80px rgba(147, 51, 234, 0.2),
                inset 0 0 100px rgba(255, 255, 255, 0.1);
        }
        100% {
            box-shadow: 
                0 25px 50px rgba(147, 51, 234, 0.4),
                0 0 100px rgba(147, 51, 234, 0.3),
                inset 0 0 120px rgba(255, 255, 255, 0.15);
        }
    }

    .booking-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #9333ea, #ec4899, #06b6d4, #10b981, #f59e0b, #ef4444);
        border-radius: 25px;
        z-index: -1;
        animation: borderGlow 3s linear infinite;
        opacity: 0.7;
    }

    @keyframes borderGlow {
        0%, 100% {
            background: linear-gradient(45deg, #9333ea, #ec4899, #06b6d4, #10b981, #f59e0b, #ef4444);
        }
        16.66% {
            background: linear-gradient(45deg, #ec4899, #06b6d4, #10b981, #f59e0b, #ef4444, #9333ea);
        }
        33.33% {
            background: linear-gradient(45deg, #06b6d4, #10b981, #f59e0b, #ef4444, #9333ea, #ec4899);
        }
        50% {
            background: linear-gradient(45deg, #10b981, #f59e0b, #ef4444, #9333ea, #ec4899, #06b6d4);
        }
        66.66% {
            background: linear-gradient(45deg, #f59e0b, #ef4444, #9333ea, #ec4899, #06b6d4, #10b981);
        }
        83.33% {
            background: linear-gradient(45deg, #ef4444, #9333ea, #ec4899, #06b6d4, #10b981, #f59e0b);
        }
    }

    .form-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #9333ea, #ec4899, #06b6d4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 2rem;
        position: relative;
        animation: titlePulse 2s ease-in-out infinite alternate;
    }

    @keyframes titlePulse {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.05);
        }
    }

    .form-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, #9333ea, #ec4899, #06b6d4);
        border-radius: 2px;
        animation: lineGlow 2s ease-in-out infinite alternate;
    }

    @keyframes lineGlow {
        0% {
            box-shadow: 0 0 10px rgba(147, 51, 234, 0.5);
            width: 100px;
        }
        100% {
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.8);
            width: 120px;
        }
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-label {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: #9333ea;
        text-shadow: 0 0 10px rgba(147, 51, 234, 0.6);
    }

    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(147, 51, 234, 0.3);
        border-radius: 15px;
        color: white;
        padding: 12px 20px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        font-size: 0.95rem;
    }

    .form-control:focus, .form-select:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: #9333ea;
        box-shadow: 
            0 0 25px rgba(147, 51, 234, 0.4),
            inset 0 0 20px rgba(147, 51, 234, 0.1);
        color: white;
        outline: none;
        transform: translateY(-2px);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-select option {
        background: #1a1a2e;
        color: white;
    }

    .input-glow {
        position: relative;
    }

    .input-glow::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        background: linear-gradient(45deg, #9333ea, #ec4899, #06b6d4, #10b981);
        border-radius: 15px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
        filter: blur(8px);
    }

    .form-control:focus + .input-glow::after,
    .form-select:focus + .input-glow::after {
        opacity: 0.7;
    }

    .row {
        gap: 1rem 0;
    }

    .total-display {
        background: linear-gradient(135deg, rgba(147, 51, 234, 0.3), rgba(236, 72, 153, 0.3));
        border: 2px solid rgba(147, 51, 234, 0.5);
        border-radius: 20px;
        padding: 20px;
        text-align: center;
        margin: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .total-display::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% {
            left: -100%;
        }
        100% {
            left: 100%;
        }
    }

    .total-label {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .total-amount {
        color: #10b981;
        font-size: 2rem;
        font-weight: 700;
        text-shadow: 0 0 20px rgba(16, 185, 129, 0.6);
        animation: amountPulse 2s ease-in-out infinite alternate;
    }

    @keyframes amountPulse {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
        }
    }

    .btn-container {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

    .btn-glow {
        background: linear-gradient(135deg, #9333ea, #ec4899);
        border: none;
        border-radius: 25px;
        padding: 15px 40px;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(147, 51, 234, 0.4);
    }

    .btn-glow:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(147, 51, 234, 0.6);
        background: linear-gradient(135deg, #a855f7, #f472b6);
    }

    .btn-glow::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-glow:hover::before {
        left: 100%;
    }

    .btn-reset {
        background: linear-gradient(135deg, #64748b, #475569);
        border: none;
        border-radius: 25px;
        padding: 15px 40px;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(100, 116, 139, 0.4);
    }

    .btn-reset:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(100, 116, 139, 0.6);
        background: linear-gradient(135deg, #475569, #334155);
    }

    @media (max-width: 768px) {
        .booking-card {
            margin: 1rem;
            padding: 2rem 1.5rem;
        }
        
        .form-title {
            font-size: 2rem;
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
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.3), rgba(5, 150, 105, 0.3));
        border: 2px solid rgba(16, 185, 129, 0.5);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 2rem;
        color: #10b981;
        text-align: center;
        font-weight: 600;
        animation: successPulse 2s ease-in-out infinite alternate;
    }

    @keyframes successPulse {
        0% {
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
        }
        100% {
            box-shadow: 0 0 40px rgba(16, 185, 129, 0.6);
        }
    }
</style>
<body>
    <!-- Floating Particles Background -->
    <div class="floating-particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 0.5s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 1.5s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 2.5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 3.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 4s;"></div>
    </div>

    <div class="form-container">
        <div class="booking-card">
            <?php if($_SERVER['REQUEST_METHOD']==='POST' && $result): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle me-2"></i>
                    Your booking has been confirmed! We'll contact you soon with further details.
                </div>
            <?php endif; ?>
            
            <form class="row g-0" action="order.php" method="POST">
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
                    <div class="input-glow">
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" name="full_name" required>
                    </div>
                </div>

                <div class="col-12 form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email Address
                    </label>
                    <div class="input-glow">
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email_address">
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="phone-number" class="form-label">
                        <i class="fas fa-phone"></i>
                        Phone Number
                    </label>
                    <div class="input-glow">
                        <input type="text" class="form-control" id="phone-number" placeholder="Enter Your Phone Number" name="phone_number" required>
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="members" class="form-label">
                        <i class="fas fa-users"></i>
                        Number of Members
                    </label>
                    <div class="input-glow">
                        <input type="number" min="1" max="20" class="form-control" id="members" oninput="calculateTotal()" name="members" required>
                    </div>
                </div>

                <div class="col-md-6 form-group">
                    <label for="num_rooms" class="form-label">
                        <i class="fas fa-bed"></i>
                        Number of Rooms (1 Room for 4 members)
                    </label>
                    <div class="input-glow">
                        <input type="number" min="1" max="5" class="form-control" id="num_rooms" oninput="calculateTotal()" name="num_rooms" required>
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="d_date" class="form-label">
                        <i class="fas fa-calendar-alt"></i>
                        Departure Date
                    </label>
                    <div class="input-glow">
                        <input type="date" class="form-control" id="d_date" name="d_date" required>
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="r_date" class="form-label">
                        <i class="fas fa-calendar-check"></i>
                        Return Date
                    </label>
                    <div class="input-glow">
                        <input type="date" class="form-control" id="r_date" name="r_date" required>
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="nights" class="form-label">
                        <i class="fas fa-moon"></i>
                        Number of Nights
                    </label>
                    <div class="input-glow">
                        <input type="number" min="1" max="30" class="form-control" id="nights" name="num_nights" oninput="calculateTotal()" required>
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="p_method" class="form-label">
                        <i class="fas fa-credit-card"></i>
                        Payment Method
                    </label>
                    <div class="input-glow">
                        <select id="p_method" class="form-select" name="p_method" required>
                            <option value="" selected>Choose Your Payment Method</option>
                            <option value="card">Debit Card</option>
                            <option value="card">Credit Card</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 form-group">
                    <label for="account_number" class="form-label">
                        <i class="fas fa-hashtag"></i>
                        Account Number
                    </label>
                    <div class="input-glow">
                        <input type="text" class="form-control" id="account_number" placeholder="Please Enter Your Account Number" name="account_number" required>
                    </div>
                </div>

                <div class="col-md-9 form-group">
                    <label for="account_name" class="form-label">
                        <i class="fas fa-user-tag"></i>
                        Account Holder Name
                    </label>
                    <div class="input-glow">
                        <input type="text" class="form-control" id="account_name" placeholder="Please Enter Account Holder Name" name="account_name" required>
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="cvv" class="form-label">
                        <i class="fas fa-lock"></i>
                        CVV
                    </label>
                    <div class="input-glow">
                        <input type="text" class="form-control" id="cvv" placeholder="CVV" name="cvv" required>
                    </div>
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