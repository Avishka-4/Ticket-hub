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
    .btn btn-primary{
        color: while !important;
    }
    
</style>
<body >
    <div class="form-p">
    <form class="row g-3">
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Full Name</label>
    <input type="name" class="form-control" id="name" placeholder="Enter Your Full Name">
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" placeholder="Enater Your Email Address">
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="phone" placeholder="Enater Your Phone Number">
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Number of Members</label>
    <input type="number" min="1" max="20" class="form-control" id="members">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Departure Date</label>
    <input type="date" class="form-control" id="date">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Return Date</label>
    <input type="date" class="form-control" id="date">
  </div>
   <div class="col-md-6">
    <label for="inputState" class="form-label">Payment Mothod</label>
    <select id="inputState" class="form-select">
      <option selected>Choose Your Payment Mothod</option>
      <option>Debit Card</option>
      <option>Credi Card</option>
    </select>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Account Number</label>
    <input type="" class="form-control" id="inputAddress" placeholder="Please Enter Your Account Number">
  </div>
  <div class="col-9">
    <label for="inputAddress2" class="form-label">Account Holder Name</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Please Enter Account Holder Name">
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">CVV</label>
    <input type="number" class="form-control" id="inputCity" placeholder="CVV">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pay Now</button>
    <button type="submit" class="btn btn-primary"><a href="places.php">Back to Places</a></button>
  </div>

  <script>
  // get inputs
  const priceInput = document.getElementById('price');
  const quantityInput = document.getElementById('quantity');
  const totalInput = document.getElementById('total');

  // function to calculate total
  function calculateTotal() {
    const price = parseFloat(priceInput.value) || 0;
    const quantity = parseFloat(quantityInput.value) || 0;
    const total = price * quantity;
    totalInput.value = total.toFixed(2); // show 2 decimal places
  }

  // add event listeners
  priceInput.addEventListener('input', calculateTotal);
  quantityInput.addEventListener('input', calculateTotal);
</script>

</form>
</div>
</body>
</html>