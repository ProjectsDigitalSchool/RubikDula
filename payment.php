<header>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<style>

@import url("https://fonts.googleapis.com/css2?family=Onest:wght@200&display=swap");

body {
  font-family: "Onest", sans-serif;
}

.navbar {
  font-size: 19px;
  padding-top: 2rem !important;
  padding-bottom: 2rem !important;
  top: 0;
  left: 0;
}

.navbar-light .navbar-nav .nav-link {
  padding: 0 20px;
  color: black;
  transition: 0.4s ease;
}

.navbar-light .navbar-nav .nav-link:hover,
.navbar i:hover,
.navbar-light .navbar-nav .nav-link.active .navbar i:hover {
  color: rgb(197, 197, 156);
}

.navbar i {
  font-size: 1.2rem;
  padding: 0 0.7px;
  transition: 0.4s ease;
  cursor: pointer;
  margin-left: 5px;
}

.card{

border: none;
}

.card-header {
    padding: .5rem 1rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: none;
}

.btn-light:focus {
    color: #212529;
    background-color: #e2e6ea;
    border-color: #dae0e5;
    box-shadow: 0 0 0 0.2rem rgba(216,217,219,.5);
}

.form-control{

  height: 50px;
border: 2px solid #eee;
border-radius: 6px;
font-size: 14px;
}

.form-control:focus {
color: #495057;
background-color: #fff;
border-color: #039be5;
outline: 0;
box-shadow: none;

}

.input{

position: relative;
}

.input i{

  position: absolute;
top: 16px;
left: 11px;
color: #989898;
}

.input input{

text-indent: 25px;
}

.card-text{

font-size: 13px;
margin-left: 6px;
}

.certificate-text{

font-size: 12px;
}


.billing{
font-size: 11px;
}  

.super-price{

  top: 0px;
font-size: 22px;
}

.super-month{

  font-size: 11px;
}


.line{
color: #bfbdbd;
}

.free-button{

  background: #1565c0;
height: 52px;
font-size: 15px;
border-radius: 8px;
}


.payment-card-body{

flex: 1 1 auto;
padding: 24px 1rem !important;

}
#container-card{
  min-width: 560px;
}
@media(max-width:763px){
  #container-card{
  min-width: fit-content;
}
}
</style>
</header>

<?php
include('header.php');

if(isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];
  
} else {
  echo "Order ID not provided.";
}

?>







      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="Text form-weight-bold">Payment</h2>
            <hr class="mx-auto">
            <p id="successMessage" class="text-center" style="display: none; color: green;">Payment Successful</p>

        </div>

      </section>
      
            </div>
            <div class="container d-flex justify-content-center align-content-center mt-5 mb-5">

            

            <div id="container-card" class="row g-3 justify-content-center">

              <div class="col-md-6">  
                
                <span>Payment Method</span>
                <div class="card">

                  <div class="accordion" id="accordionExample">
                    
                    <div class="card">
                      <div class="card-header p-0" id="headingTwo">
                        <h2 class="mb-0">
                          <button id="paypalBtn" class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="d-flex align-items-center justify-content-between">

                              <span>Paypal</span>
                              <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                              
                            </div>
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                        <input type="text" id="paypal_email" name="paypal_email" class="form-control" placeholder="PayPal Email">
                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header p-0">
                        <h2 class="mb-0">
                          <button id="creditCardBtn" class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="d-flex align-items-center justify-content-between">

                              <span>Credit card</span>
                              <div class="icons">
                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                <img src="https://i.imgur.com/35tC99g.png" width="30">
                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                              </div>
                              
                            </div>
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body payment-card-body">
  <span class="font-weight-normal card-text">Card Number</span>
  <div class="input">
  <i class="fa fa-credit-card"></i>
  <input type="text" id="card_number" name="card_number" class="form-control" placeholder="0000 0000 0000 0000" maxlength="19" oninput="formatCardNumber(this)">
</div>

  <div class="row mt-3 mb-3">
    <div class="col-md-6">
      <span class="font-weight-normal card-text">Expiry Date</span>
      <div class="input">
        <i class="fa fa-calendar"></i>
        <input type="text" id="expiry_date" name="expiry_date" class="form-control" placeholder="MM/YY" oninput="formatExpiryDate(this)">
      </div> 
    </div>


    <div class="col-md-6">
  <span class="font-weight-normal card-text">CVC/CVV</span>
  <div class="input">
    <i class="fa fa-lock"></i>
    <input type="text" id="cvv" name="cvv" class="form-control" placeholder="000" maxlength="3" oninput="validateCVV(this)">
  </div> 
</div>

                          </div>

          
                         
                        </div>
                        
                      </div>
                    </div>
                    
                  </div>
                  
                </div>

                <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>


                    

                    <form onsubmit="return validatePayment(<?php echo $order_id; ?>);" class="pay-now mx-5 mt-2" style="align-content: center;" action="./server/paymentLogic.php" method="POST">
                        <?php if(isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
                            <p>Total: $ <?php echo $_SESSION['total'];?></p>
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                            <input type="hidden" name="order_status" value="<?php echo isset($_SESSION['order_status']) ? $_SESSION['order_status'] : '';  ?>">
                            <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>">
                            <input class="btn btn-primary" name="order_pay_btn" type="submit" value="Pay Now">
                        <?php } else { ?>
                            <p>You do not have an order</p>
                        <?php } ?>
                    </form>



                    
              </div>
              
            </div>
            

          </div>
                    



          <div><?php include('footer.php');?></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>                  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
$(document).ready(function() {
    // Use Bootstrap's collapse events for a cleaner transition
    $('#paypalBtn').on('click', function() {
        $('#collapseOne').collapse('hide');
        $('#collapseTwo').collapse('show');
    });

    $('#creditCardBtn').on('click', function() {
        $('#collapseTwo').collapse('hide');
        $('#collapseOne').collapse('show');
    });
});

</script>

<script>
  function formatCardNumber(input) {
    // Remove non-numeric characters
    let cardNumber = input.value.replace(/\D/g, '');
    
    // Format the number by inserting spaces every 4 characters
    cardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');
    
    // Limit the length to 19 characters
    if (cardNumber.length > 19) {
      cardNumber = cardNumber.slice(0, 19);
    }
    
    // Update the input value
    input.value = cardNumber;
  }

   function validateCVV(input) {
    // Allow only numbers in the CVV field and limit the length to 3 characters
    input.value = input.value.replace(/\D/g, '').slice(0, 3);
  }

   function validateCardNumber(input) {
    // Allow only numbers in the card number field
    input.value = input.value.replace(/\D/g, '');
  }

  function formatExpiryDate(input) {
  // Allow only numbers in the expiry date field
  let sanitizedValue = input.value.replace(/\D/g, '');

  // Format MM/YY
  let formattedDate = '';
  if (sanitizedValue.length > 2) {
    formattedDate = sanitizedValue.slice(0, 2) + '/' + sanitizedValue.slice(2, 4);
  } else {
    formattedDate = sanitizedValue;
  }

  // Update the input value with the formatted date
  input.value = formattedDate;
}



function validatePayment() {

    var paypalEmail = document.getElementById('paypal_email').value;
    var cardNumber = document.getElementById('card_number').value;

    // Check if either PayPal or Card fields are empty
    if ((paypalEmail.trim() === '' && cardNumber.trim() === '') ||
        (paypalEmail.trim() !== '' && cardNumber.trim() !== '')) {
      alert('Please fill in either PayPal email or Card details, not both or none.');
      return false; // Prevent form submission
    }

    var confirmed = confirm('Are you sure you want to proceed with the payment?');
    if (confirmed) {
      console.log("123123test");
  var successMessage = document.getElementById('successMessage');
  if (!successMessage) {
    successMessage = document.createElement('p');
    successMessage.id = 'successMessage';
    successMessage.classList.add('text-center');
    successMessage.style.color = 'green';
    successMessage.textContent = 'Payment Successful';
    document.querySelector('.container').appendChild(successMessage);
  } else {
    successMessage.style.display = 'block';
  }

  // Hide the form after successful payment
  document.querySelector('form').style.display = 'none';

  // Redirect to account.php after 3 seconds
  setTimeout(function() {
    window.location.href = 'account.php';
  }, 3000);
  return true;
}
else{}
 // Prevent form submission
  }
</script>

</body>
</html>