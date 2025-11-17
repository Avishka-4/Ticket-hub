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


    $sql = "INSERT INTO tbl_order (full_name,email_address,phone_number,members,num_rooms,d_date,r_date,num_nights,p_method,account_number,account_name,cvv,total_price)
    VALUES ('$full_name','$email_address','$phone_number','$members','$num_rooms','$d_date','$r_date','$num_nights','$p_method','$account_number','$account_name','$cvv','$total_price')";

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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    form{
        width: 60%;
        padding: 20px;
        border: 1px solid black;
        border-radius: 10px;
        align-items: center;
        justify-content: center;
        display: flex;
    }
    .form-p{
        justify-content: center;
        display: flex;
        padding-top: 50px;
    }
    .h2{
      text-align: center;
      font-family: 'Times New Roman', Times, serif;
    }

</style>
<body >
    <div class="form-p">
    <form class="row g-3" action="order.php" method="POST">
      <h2 class="h2">Fill this Form</h2>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" name="full_name" required>
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" placeholder="Enater Your Email Address" name="email_address">
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone-number" placeholder="Enater Your Phone Number" name="phone_number" required>
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Number of Members</label>
    <input type="number" min="1" max="20" class="form-control" id="members" oninput="calculateTotal()" name="members" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Number of Rooms(1 Romm for 4 members)</label>
    <input type="number" min="1" max="5" class="form-control" id="num_rooms" oninput="calculateTotal()" name="rooms" required>
  </div>
  <div class="col-md-3">
    <label for="inputEmail4" class="form-label">Departure Date</label>
    <input type="date" class="form-control" id="date" name="d_date" required>
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Return Date</label>
    <input type="date" class="form-control" id="date" name="r_date" required>
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Number of Nigths</label>
    <input type="number" min="1" max="30" class="form-control" id="nights" name="num_nights" oninput="calculateTotal()" required>
  </div>
   <div class="col-md-3">
    <label for="inputState" class="form-label">Payment Mothod</label>
    <select id="inputState" class="form-select" name="p_method" required>
      <option selected>Choose Your Payment Mothod</option>
      <option value="card">Debit Card</option>
      <option value="card">Credi Card</option>
    </select>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Account Number</label>
    <input type="text" class="form-control" id="inputnumber" placeholder="Please Enter Your Account Number" name="account_number" required>
  </div>
  <div class="col-9">
    <label for="inputAddress2" class="form-label">Account Holder Name</label>
    <input type="text" class="form-control" id="name" placeholder="Please Enter Account Holder Name" name="account_name" required>
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">CVV</label>
    <input type="text" class="form-control" id="number" placeholder="cvv" name="cvv" required>
  </div>
  <div class="col-12">
    <label>Total Amount(LKR)</label>
  <input type="text" id="total" class="form-control" readonly name="total_price">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pay Now</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </div>
</form>
</div>

    <script>
      
      const member_price = 1000;
      const room_price = 3500;

      function calculateTotal() {
        let members = parseInt(document.getElementById("members").value) || 0;
        let rooms = parseInt(document.getElementById("num_rooms").value) || 0;
        let nights = parseInt(document.getElementById("nights").value) || 0;

        let total = [(members * member_price) + (rooms * room_price)]*nights;

        document.getElementById("total").value = total.toLocaleString() + " LKR";
    }
    calculateTotal();
    </script>
</body>
</html>